<?php

namespace App\Http\Controllers;

use App\Helpers\UserGroups;
use App\Notifications;
use App\Product;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {

    }

    public function edit($id){

        if( Auth::id() == $id ){

            $user = User::findOrFail($id);

            return view('user.edit', [
                'user' => $user
            ]);

        } else {
            return Redirect::to('/user/'.Auth::id())->withErrors(['noPermission' => 'No permission to edit this user!']);
        }

    }

    public function show($id){
        $user = User::findOrFail($id)->getAvatar();
        $products = [];

        foreach($user->products as $product){
            $product->user->getAvatar();
            $products[] = $product->getImages();
        }


        return view('user.show', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function subscriptions(){
        $products = Product::select('products.*')->where('subscriptions.user_id', Auth::id())->join('subscriptions', 'subscriptions.product_id', '=', 'products.id')->get();

        foreach($products as $product){
            $product->getImages();
        }

        return view('user/subscriptions', [
            'products' => $products
        ]);
    }

    public function products(){
        $products = Product::where('user_id', Auth::id())->get();

        foreach($products as $product){
            $product->getImages();
        }

        return view('user/products', [
            'products' => $products
        ]);
    }

    public function store(Request $request){
        $data = $request->input();
        $files = $request->file();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'string|nullable|max:255',
            'phone' => 'numeric|nullable',
            'description' => 'nullable',
            'public_phone' => 'nullable|boolean',
            'email' => 'required|string|max:255|unique:users,email,'.$data['id'],
        ]);

        if( !empty($data['id']) ) {
            if( Auth::id() == $data['id'])
                $user = User::findOrFail($data['id']);
            else
                return Redirect::to('/user/'.Auth::id())->withErrors(['noPermission' => 'No permission to edit this user!']);
        } else
            $user = new User();

        if($user->group >= UserGroups::GROWER && empty($user->phone))
            return Redirect::back()->withInput(Input::all())->withErrors(['emptyData' => 'Lūdzu aizpildi visus laukus!']);

        $user->name    = $data['name'];
        $user->surname = $data['surname'];
        $user->email   = $data['email'];
        $user->phone   = $data['phone'];
        $user->public_phone   = $data['public_phone'];
        $user->description = $data['description'];

        if($request->hasFile('image')) {
           $path = $request->file('image')->store(
                'users/'.Auth::id(),  'public'
            );

           if( !empty($user->image_path) )
               Storage::disk('public')->delete($user->image_path);

           $user->image_path = $path;
        }
        $user->save();

        return redirect('user/'.$user->id);

    }

    public function notificationsSeen(){

        $user = User::findOrFail(Auth::id());

        $notifications = Notifications::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(10)->get();

        foreach($notifications as $notification){
            $notification->isSeen($user->notifications_seen);
        }

        $user->notifications_seen = Carbon::now()->toDateTimeString();
        $user->save();

        return $notifications;

    }

    public function growerProfile(){
        $user = User::findOrFail(Auth::id());

        if(empty($user->email) || empty($user->phone)) {
            return view('product.beforeAdding');
        }

        $products = Product::where('user_id', Auth::id())->get();

        foreach($products as $product){
            $product->getImages();
        }

        return view('user.grower', [
            'products' => $products
        ]);
    }
}
