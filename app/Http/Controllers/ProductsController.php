<?php

namespace App\Http\Controllers;

use App\Helpers\File;
use App\Helpers\UserGroups;
use App\Icons;
use App\Product;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Debug\Tests\Exception\FlattenExceptionTest;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $input = Input::all();

        if(!empty($input)) {
            $products = Product::fromSelects($input);
        }else {
            $products = Product::all();
        }

        foreach($products as $product){
            $product->getImages();
        }

        return view('product.list', [
            'products' => $products,
            'multiselect' => $input
        ]);
    }

    public function create()
    {
        $user = User::findOrFail(Auth::id());

        if(empty($user->email) || empty($user->phone)) {
            return view('product.beforeAdding');
        }

        return view('product.add');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id)->getImages();
        $product->user->getAvatar();

        return view('product.show', [
            'product' => $product
        ]);
    }

    public function edit($id){

        $user = User::findOrFail(Auth::id());

        if(empty($user->email) || empty($user->phone)) {
            return view('product.beforeAdding');
        }

        $product = Product::findOrFail($id);

        if( Auth::id() !== $product->user_id ){
            return Redirect::to('/product')->withErrors(['noPermission' => 'No permission to edit this product']);
        }

        $product->getImages();

        return view('product.edit', [
            'product' => $product
        ]);

    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|regex:/^[0-9]*\.?[0-9]*$/',
            'price_type' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'lat' => 'required',
            'lng' => 'required',
            'address' => 'required'
        ]);

        $data = $request->input();
        $files = $request->file();


        if( !empty($data['id']) ) {
            $product = Product::findOrFail($data['id']);

            if( Auth::id() !== $product->user_id ) {
                return redirect()->back()->withErrors(['noPermission'=>'No permission to edit this Product!']);
            }
        } else {
            $product = new Product();
        }

        $user = User::findOrFail(Auth::id());
        if( $user ){
            $user->group = UserGroups::GROWER;
            $user->save();
        }

        $product->title = $data['title'];
        $product->price = $data['price'];
        $product->price_type = $data['price_type'];
        $product->description = $data['description'];
        $product->ripe_time = $data['ripe_time'];
        $product->ripe_type = $data['ripe_type'];
        $product->type = $data['type'];
        $product->lat = round($data['lat'],6);
        $product->lng = round($data['lng'],6);
        $product->address = $data['formatted_address'];
        $product->lifecycle = 'start';
        $product->user_id = Auth::id();

        $saved = $product->save();

        if($saved && $request->hasFile('images')) {

            foreach($files['images'] as $key => $file){

                $fileDirectory = 'public/users/'.Auth::id().'/products/'.$product->id;

                Storage::putFile($fileDirectory, $file);

                if($key === 0) {
                    Image::make($file)->fit(500)->stream();
                    $file->storeAs($fileDirectory, 'thumbnail.'.$file->getClientOriginalExtension());
                }

            }

        }

        return Redirect::to('user/products');
    }

    public function statistic($id){

        $subscriptions = Subscription::where('product_id', $id)->get()->count();

        return view('product/statistic', [
            'subscriptions' => $subscriptions,
        ]);

    }

    public function getProductById(Request $request){
        $data = $request->input();

        $product = Product::findOrFail($data['id']);
        $product->getImages();
        $product->user();

        $product->is_user_subscribed = Subscription::check($product->id);

        return $product;
    }

}
