<?php

namespace App\Http\Controllers;

use App\Notifications;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        foreach($products as $product){

            $product->getImages();

        }

        return view('home', [
            'products' => $products,
        ]);
    }

}
