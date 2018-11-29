<?php

namespace App\Http\Controllers;

use App\Helpers\File;
use App\Icons;
use App\Product;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Debug\Tests\Exception\FlattenExceptionTest;

class IconsController extends Controller
{
    public function index(Request $request)
    {
        $icons = Icons::all();

        return view('icons.list', [
            'icons' => $icons
        ]);
    }

    public function create()
    {
        return view('icons.add');
    }

    public function edit($id){

        $icons = Icons::findOrFail($id);

        return view('icons.add', ['icons' => $icons]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group' => 'required|max:255',
            'item' => 'required',
        ]);

        $data = $request->input();
        $files = $request->file();

        if(!empty($data['id']))
            $icons = Icons::find($data['id']);
        else
            $icons = new Icons();

        $icons->group = $data['group'];
        $icons->item  = $data['item'];

        if($request->hasFile('image')) {

            $upload = $files['image'];

            $request->file('image')->storeAs(
                'products', $upload->getClientOriginalName(), 'public_images'
            );

            $icons->url  = $upload->getClientOriginalName();
        }

        $saved = $icons->save();

        return Redirect::to('icons');
    }

    public function destroy($id){
        $icon = Icons::findOrFail($id);
        $icon->delete();

        return Redirect::to('/icons');;
    }
}
