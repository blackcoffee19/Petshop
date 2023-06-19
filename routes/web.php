<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\TypeofpetController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Two\FacebookProvider;
use Symfony\Component\Mime\DependencyInjection\AddMimeTypeGuesserPass;
use App\Http\Middleware\AdminLogin as AdminLogin;
use App\Http\Controllers\Admin\ControllerAdmin;
use App\Http\Middleware\UserLogin;
use App\Http\Middleware\ManagerLogin;
use App\Http\Middleware\UpdateCart;
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
Route::post('/productdetail/{id?}',[MyController::class,"addToCart"])->name('productdetail');
Route::get('/delete_cmt/{id}',[MyController::class,'deleteCmt'])->name('delete_cmt');
Route::post('/edit_cmt/{id}',[MyController::class,'editCmt'])->name('edit_cmt');
Route::post('/comment/{id?}',[MyController::class,"postComment"])->name('addComment');
Route::get('/contact',[MyController::class,"contactUs"])->name("contact");
Route::post('/contact',[MyController::class,"mailToAdmin"])->name('contact');
Route::get('/policy',[MyController::class,'policy'])->name('policy');

Route::get('/signin',[MyController::class,"get_signIn"])->name('signin');
Route::post('/signin',[MyController::class,"post_signIn"])->name('signin');
Route::get('/signup',[MyController::class,"get_signUp"])->name('signup');
Route::post('/signup',[MyController::class,"post_signUp"])->name('signup');
Route::get('/verify/{token}', [MyController::class, 'verifyEmail'])->name('verify');
Route::get('/verify-send', [MyController::class, 'send_verifyEmail'])->name('verifyEmail');
Route::get('/forgot_password',[MyController::class,'get_forgotpass'])->name('send_ressetmail');
Route::post('/forgot_password',[MyController::class,'send_ressetmail'])->name('send_ressetmail');
Route::get('/reset_password/{token}',[MyController::class,'reset_newpassword'])->name('reset_password');
Route::post('/reset_password/create/password',[MyController::class,'create_newpassword'])->name('create_newpassword');
Route::get('/signup/confirm',[MyController::class,'get_signupconfirm'])->name('signup_confirm');
Route::get('/signout',[MyController::class,'signOut'])->name('signout');
Route::group(['prefix' => 'account', 'middleware' => ['UserLogin','UpdateCart']], function () {
    Route::get('/profie',[MyController::class,"get_profie"])->name('profie');
    Route::post('/profie',[MyController::class,"post_user"])->name('changeuser');
    Route::post('/edit-profie', [MyController::class, 'post_editprofie'])->name('edit_profie');
    Route::post('/change-password', [MyController::class, 'post_changepassword'])->name('change_password');
    Route::get('/user_order', [MyController::class, 'get_orderhistory'])->name('accountorder');
    Route::get('/list_address', [MyController::class, 'get_address'])->name('accountaddress');
    Route::get('/remove_address/{id}', [MyController::class, 'remove_address'])->name('removeAdd');
    Route::get('/default-address/{id}', [MyController::class, 'setdefault_address'])->name('setdefault_address');
    Route::post('/cancel-order',[MyController::class,'cancel_order'])->name('cancelorder');
});
Route::get('/order',[MyController::class,'get_order'])->name('order');
Route::post('/order',[MyController::class,'post_order'])->name('order');
Route::get('/ajax/get-address/{id}', [MyController::class, 'get_addressdetail']);
Route::post('/add_address', [MyController::class, 'add_address'])->name('post_address');
Route::post('/edit-order',[MyController::class,'post_urseditorder'])->name('user_editorder');
Route::get('/favourite',[MyController::class,'get_favourite'])->name('wishlist');
Route::post('/favourite',[MyController::class,'post_favourite'])->name('favourite');
Route::get('/feedback/{order_code?}',[MyController::class,'get_feedback'])->name('feedback');
Route::post('/feedback/{order_code?}',[MyController::class,'post_feedback'])->name('feedback');

Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/callback',[GoogleAuthController::class,'callbackGoogle']);

Route::get('/testing',[MyController::class,'get_test'])->name('test');
Route::get('/addItem/{id}',[MyController::class,'addMore'])->name('addmore');
Route::get('/minusItem/{id}',[MyController::class,'minusOne'])->name('minus');
Route::post('/addItemCart/{id}',[MyController::class,'cartadd_quan'])->name('cartadd');
Route::get('/checkout',[MyController::class,'get_checkout'])->name("checkout");
Route::get('/removeCart/{id}',[MyController::class,'removeCart'])->name("removeId");
Route::get('/ajax/edit_order/{id}', [MyController::class, 'ajax_getOrder']);
Route::post('/ajax/check-password', [MyController::class, 'check_password']);
Route::group(['prefix' => '/', 'middleware' => ['ManageLogin','UpdateCart']], function () {
    Route::get('/ajax/modal/show-product/{id}',[MyController::class,'modal_product']);
    Route::get('/ajax/add-cart/{id}',[MyController::class,'addToCart2']);
    Route::get('/ajax/cart/listcart',[MyController::class,'modalCart']);
    Route::get('/ajax/cart/clearcart',[MyController::class,'clearCart']);
    Route::get('/ajax/favourite/{id}',[MyController::class,'add_favourite']);
    Route::get('/ajax/addcompare/{id}',[MyController::class,'addCompare']);
    Route::get('/ajax/compare/showcompare',[MyController::class,'showCompare']);
    Route::get('/ajax/list_order/{sort}',[MyController::class,'ajax_listorder']);
    Route::get('/ajax/edit_order/{id}',[MyController::class,'ajax_getOrder']);
});
Route::get('/ajax/list-breed/{type}',[AdminController::class,'list_option_breed']);
Route::get('/ajax/slide/list-pet/{id?}',[AdminController::class,'list_petsl']);
Route::get('/ajax/banner/{id}',[AdminController::class,'model_editbanner']);
Route::get('/ajax/edit_slide/{id}',[AdminController::class,'get_editslide']);
Route::get('/ajax/message/show',[MyController::class,'get_listmessage']);
Route::post('/ajax-post/message',[MyController::class,'postajax_message']);
Route::get('/ajax/add-coupon/{coupon}', [MyController::class, 'addCoupon']);
Route::get('/ajax/delete-like/{id}',[MyController::class,'delete_like']);
Route::get('/ajax/add-like/{id}',[MyController::class,'add_like']);
Route::get('/ajax/ghtk_service/fee',[MyController::class,'ghtk_servicefee']);
Route::get('/ajax/ghn_service/service',[MyController::class,'ghn_getservice']);
Route::get('/ajax/ghn_service/fee',[MyController::class,'gtn_servicefee']);
Route::get('/ajax/ghtk_service/order',[MyController::class,'ghtk_order'])->name('ghtk_order');
Route::get('/ajax/show_coupon/{code}', [MyController::class, 'model_coupon']);
Route::get('/delcompare/{id}',[MyController::class,'delCompare'])->name('delCmp');
Route::get('/removeCmp',[MyController::class,'removeCompare'])->name('removeCmp');
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::group(['prefix' => 'manager'], function () {
    Route::get('/ajax/check-order/{id}', [MyController::class, 'modal_order']);
    Route::get('/ajax/check-notificate/{code}', [MyController::class, 'modal_notificate']);
    Route::post('/confirm', [MyController::class, 'post_confirmorder'])->name('confirm_order');
    Route::post('/remove-notificate', [MyController::class, 'post_removenoti'])->name('remove_notificate');
    Route::get('/list_order', [MyController::class, 'list_allorder'])->name('allorder');
});
// Auth::routes();
Route::group(["prefix"=>"admin",'middleware'=>'AdminLogin'],function(){
    Route::get('/dashboard',[AdminController::class,'get_dashboard'])->name('dashboard');
    Route::post('/confirm-order',[AdminController::class,'post_confirmOrder'])->name('statusOrder');
    Route::get('/profie',[AdminController::class,'get_profie'])->name('profieAdmin');
    Route::post('/profie',[AdminController::class,'post_profie'])->name('profieAdmin');
    Route::group(['prefix'=>'ajax'],function(){
        Route::get('breed/{id_type}',[AdminController::class,'ajax_breed']);
        Route::get('/view_order/{id}',[AdminController::class,'ajax_notificate']);
        Route::get('/remove-news/{id}',[AdminController::class,'ajax_removeNews']);
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
        Route::get('/list/{id?}',[AdminController::class,'get_listpet'])->name('listpet');
        Route::get('/search',[AdminController::class,'search_pet']);
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
        Route::get('/list/{sort?}',[AdminController::class,'get_listorder'])->name('listorder');
        Route::get('/editorder/{id}',[AdminController::class,'get_editorder'])->name('editorder');
        Route::post('/editorder/{id}',[AdminController::class,'post_editorder'])->name('editorder');
    });
    Route::group(["prefix"=>'slides'],function(){
        Route::get('/',[AdminController::class,'get_listslide'])->name('listslide');
        Route::post('/addslide',[AdminController::class,'post_addslide'])->name('addslide');
        Route::post('/editslide',[AdminController::class,'post_editslide'])->name('editslide');
        Route::get('/deleteslide/{id}',[AdminController::class,'deleteSlide'])->name('deleteslide');
    });
    Route::group(['prefix'=>'banner'],function(){
        Route::get('/',[AdminController::class,'get_listbanner'])->name('listbanner');
        Route::post('/editbanner',[AdminController::class,'post_editbanner'])->name('editbanner');
    });
    Route::group(['prefix'=>'coupon'],function(){
        Route::get('/',[AdminController::class,'get_listcoupon'])->name('listcoupon');
        Route::post('/addcoupon',[AdminController::class,'post_addcoupon'])->name('addcoupon');
        Route::post('/editcoupon',[AdminController::class,'post_editcoupon'])->name('editcoupon');
        Route::get('/deletecoupon/{id}',[AdminController::class,'deleteCoupon'])->name('deletecoupon');
        Route::get('/get_coupon/{id}',[AdminController::class,'ajax_getcoupon']);
    });
});
Route::get('/ajax/userorder/{id}',[AdminController::class,'ajax_orderUser']);
Route::get('/admin',[AdminController::class,'get_login'])->name('admin_login');
Route::post('/admin',[AdminController::class,'post_login'])->name('admin_login');
