<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\TypeofpetController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Two\FacebookProvider;
use Symfony\Component\Mime\DependencyInjection\AddMimeTypeGuesserPass;
use App\Http\Middleware\AdminLogin as AdminLogin;
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

Route::get('/',[MyController::class,"homePage"])->name('home');
Route::get('/productlist/{type_name?}/{breed_name?}',[MyController::class,"productList"])->name('productlist');
Route::get('/productdetail/{id}',[MyController::class,"productDetail"])->name("productdetail");
Route::post('/productdetail/{id}',[MyController::class,"addToCart"])->name('productdetail');
Route::post('/comment/{id?}',[MyController::class,"postComment"])->name('addComment');
Route::get('/contact',[MyController::class,"contactUs"])->name("contact");
Route::get('/policy',[MyController::class,'policy'])->name('policy');
Route::get('/signin',[MyController::class,"get_signIn"])->name('signin');
Route::post('/signin',[MyController::class,"post_signIn"])->name('signin');
Route::get('/signup',[MyController::class,"get_signUp"])->name('signup');
Route::post('/signup',[MyController::class,"post_signUp"])->name('signup');
Route::get('/profie',[MyController::class,"get_profie"])->name('profie');
Route::post('/profie',[MyController::class,"post_user"])->name('changeuser');
Route::get('/favourite',[MyController::class,'get_favourite'])->name('favourite');
Route::post('/favourite',[MyController::class,'post_favourite'])->name('favourite');

Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/callback',[GoogleAuthController::class,'callbackGoogle']);


Route::get('/signout',[MyController::class,'signOut'])->name('signout');
Route::get('/addItem/{id}',[MyController::class,'addMore'])->name('addmore');
Route::get('/minusItem/{id}',[MyController::class,'minusOne'])->name('minus');
Route::get('/order',[MyController::class,'get_order'])->name('order');
Route::post('/order',[MyController::class,'post_order'])->name('order');
Route::get('/removeCart/{id}',[MyController::class,'removeCart'])->name("removeId");
Route::get('/ajax/modal/{id}',[MyController::class,'modal_product']);
Route::get('/ajax/{id}',[MyController::class,'addToCart2']);
Route::get('/ajax/cart/listcart',[MyController::class,'modalCart']);
Route::get('/ajax/favourite/{id}',[MyController::class,'add_favourite']);
// Auth::routes();
Route::group(["prefix"=>"admin",'middleware'=>'AdminLogin'],function(){
    Route::get('/dashboard',[AdminController::class,'get_dashboard'])->name('dashboard');
    Route::get('/profie',[AdminController::class,'get_profie'])->name('profieAdmin');
    Route::post('/profie',[AdminController::class,'post_profie'])->name('profieAdmin');
    Route::group(['prefix'=>'ajax'],function(){
        Route::get('breed/{id_type}',[AdminController::class,'ajax_breed']);
    });
    Route::group(["prefix"=>"typepet"],function(){
        Route::get('/',[AdminController::class,'get_listtype'])->name('listtype');
        Route::get('/addtype',[AdminController::class,'get_addtype'])->name('addtype');
        Route::post('/addtype',[AdminController::class,'post_addtype'])->name('addtype');
        Route::get('/edittype/{id}',[AdminController::class,'get_edittype'])->name('edittype');
        Route::post('/edittype/{id}',[AdminController::class,'post_edittype'])->name('edittype');
        Route::get('/deletetype/{id}',[AdminController::class,'deleteType'])->name('deleteType');
    });
    Route::group(['prefix'=>"breed"],function(){
        Route::get('/',[AdminController::class,'get_listbreed'])->name('listbreed');
        Route::get('/addbreed',[AdminController::class,'get_addbreed'])->name('addbreed');
        Route::post('/addbreed',[AdminController::class,'post_addbreed'])->name('addbreed');
        Route::get('/editbreed/{id}',[AdminController::class,'get_editbreed'])->name('editbreed');
        Route::post('/editbreed/{id}',[AdminController::class,'post_editbreed'])->name('editbreed');
        Route::get('/deletebreed/{id}',[AdminController::class,'deleteBreed'])->name('deleteBreed');
    });
    Route::group(["prefix"=>"pets"],function(){
        Route::get('/',[AdminController::class,'get_listpet'])->name('listpet');
        Route::get('/addpet',[AdminController::class,'get_addpet'])->name('addpet');
        Route::post('/addpet',[AdminController::class,'post_addpet'])->name('addpet');
        Route::get('/editpet/{id}',[AdminController::class,'get_editpet'])->name('editpet');
        Route::post('/editpet/{id}',[AdminController::class,'post_editpet'])->name('editpet');
        Route::get('/deletepet/{id}',[AdminController::class,'deletePet'])->name('deletePet');
    });
    Route::group(["prefix"=>"users"],function(){
        Route::get('/',[AdminController::class,'get_listuser'])->name('listuser');
        Route::get('/adduser',[AdminController::class,'get_adduser'])->name('adduser');
        Route::post('/adduser',[AdminController::class,'post_adduser'])->name('adduser');
        Route::get('/edituser/{id}',[AdminController::class,'get_edituser'])->name('edituser');
        Route::post('/edituser/{id}',[AdminController::class,'post_edituser'])->name('edituser');
        Route::get('/deleteuser/{id}',[AdminController::class,'deleteUser'])->name('deleteUser');
    });
    Route::group(["prefix"=>"orders"],function(){
        Route::get('/',[AdminController::class,'get_listorder'])->name('listorder');
        Route::get('/editorder/{id}',[AdminController::class,'get_editorder'])->name('editorder');
        Route::post('/editorder/{id}',[AdminController::class,'post_editorder'])->name('editorder');
        Route::get('/deleteorder/{id}',[AdminController::class,'deleteOrder'])->name('deleteOrder');
    });
});
Route::get('/admin',[AdminController::class,'get_login'])->name('admin_login');
Route::post('/admin',[AdminController::class,'post_login'])->name('admin_login');
