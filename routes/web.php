<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::post('product/getProduct', 'ProductsController@getProductById');
    Route::get('/product/{id}/statistic', ['uses' =>'ProductsController@statistic']);
    Route::resource('product', 'ProductsController');
    Route::get('user/subscriptions', 'UserController@subscriptions');
    Route::get('user/products', 'UserController@products');
    Route::get('user/grower', 'UserController@growerProfile');
    Route::get('user/notificationsSeen', 'UserController@notificationsSeen');
    Route::resource('user', 'UserController');
    Route::resource('icons', 'IconsController');
    Route::get('/subscribe/{id}', ['uses' => 'SubscribtionController@subscribe']);
    Route::get('/subscribe/notify/{id}', ['uses' =>'SubscribtionController@notify']);
});
Route::get('/terms-of-use', function () {
    return view('static.termsOfUse');
});