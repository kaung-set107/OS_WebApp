<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware'=>'ShareData'],function(){
Route::get('/','PageController@index');
//for User Auth
Route::get('/login','User\AuthController@showlogin');
Route::post('/login','User\AuthController@postlogin');
Route::get('/register','User\AuthController@showregister');
Route::post('/register','User\AuthController@postregister');

Route::get('/logout','User\AuthController@logout');
Route::get('/product/{slug}','PageController@productdetail');
Route::get('/product/cart/add/{slug}','PageController@addtocart');
Route::get('/product/delete/{id}','PageController@deleteproduct');
Route::get('/cart','PageController@showcart');
Route::get('/order/cart','PageController@makeorder');

Route::get('/order/pending','PageController@pendingorder');
Route::get('/order/complete','PageController@completeorder');

//for profile update
Route::get('/profile','PageController@showprofile');
Route::post('/profile','PageController@postprofile');

//for side bar category list 
Route::get('/product/category/{slug}','PageController@byCategory');

//for search bar
Route::get('/search','PageController@search');

//changepass
Route::get('/changepassword','PageController@changepassword');
Route::post('/changepassword','PageController@postchangepassword');
});




//for admin Auth
Route::get('/admin/login','Admin\AuthController@showlogin');
Route::post('/admin/login','Admin\AuthController@postLogin');


//middleware for admin
Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.','middleware'=>'Admin'],function(){

  Route::get('/','PageController@dashboard');

  //for Category
  Route::resource('/category','CategoryController');

  //for Product
    Route::resource('/product','ProductController');

    //for Order
    Route::get('/order/pending','OrderController@pending');
    Route::get('/order/complete','OrderController@complete');
    Route::get('/order/complete/{id}','OrderController@makecomplete');

    //for user list
    Route::get('/user','PageController@user');

    //admin logout
    Route::get('/logout','AuthController@logout');


});