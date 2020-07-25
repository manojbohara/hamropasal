<?php

use Illuminate\Support\Facades\Route;
use App\Admin;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/merchant', 'Auth\LoginController@showMerchantLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/merchant', 'Auth\RegisterController@showMerchantRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/merchant', 'Auth\LoginController@MerchantLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/merchant', 'Auth\RegisterController@createMerchant');
Route::group(['prefix'=>'hamropasal/','namespace'=>'BackendController','middleware'=>'auth:admin'],function(){
Route::get('merchant/dashboard','MerchantController@dashboard')->name('merchant')->middleware('auth:merchant');
Route::resource('merchants', 'MerchantController');
Route::get('admin/dashboard','AdminController@index')->name('admin');	
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
Route::resource('/products','ProductController');
Route::resource('/coupons','CouponController');
Route::resource('banners','BannerController');
Route::resource('sizes','SizeController');
Route::resource('colors','ColorController');
Route::resource('productsize','ProductSizeController');
Route::resource('sliders','SliderController');
Route::resource('contacts','ContactController');
Route::resource('/blogs','BlogController');
});
Route::group(['namespace'=>'FrontendController'],function(){
	Route::get('/','WelcomeController');
	Route::get('/catproducts/viewcategorylist/{category}','ProductController@index')->name('products.category');
	Route::get('/catproducts/viewcategorylist/categoryList/{subcategory}','ProductController@index')->name('products.subcategory');
	Route::get('/productview/{product}','ProductController@show')->name('products.show');
	Route::post('/coupon','CouponController@store')->name('coupon.store');
    Route::delete('/coupon','CouponController@destroy')->name('coupon.destroy');
	Route::get('/cart','CartController@index')->name('cart.index');
	Route::post('/cart','CartController@store')->name('cart.store');
	Route::post('/remove', 'CartController@remove')->name('cart.remove');
	Route::post('/update', 'CartController@update')->name('cart.update');
	Route::post('/clear','CartController@destroy')->name('cart.destroy');
	Route::get('/payment','CheckoutController@payment')->name('payment.index');
	Route::get('/delivery','CheckoutController@delivery')->name('delivery.index');
	Route::get('/confirmation','CheckoutController@confirmation')->name('checkout.confirmation');
	Route::post('/chekout','CheckoutController@store')->name('checkout.store');
	Route::post('payment', 'CheckoutController@paymentStore')->name('payment.store');
	Route::get('/search','ProductController@search')->name('products.search');
	Route::get('store-location','WelcomeController@location')->name('store.location');
	Route::get('blog','BlogController@index')->name('blog.index');
	Route::post('blog','BlogController@blogComment')->name('blogComment.store');
	Route::get('blog/search','BlogController@search')->name('blog.search');
	Route::get('blog/{slug}','BlogController@show')->name('blog.show');
	Route::post('khalti/verification', 'CheckoutController@transaction')
	 ->name('khalti.verification');

});

