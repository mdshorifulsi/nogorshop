<?php

use Illuminate\Support\Facades\Route;


//category route...

Route::group(['as' => 'category.', 'prefix' => 'category', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'CategoryController@index')->name('index');
	Route::get('/create', 'CategoryController@create')->name('create');
	Route::post('/store', 'CategoryController@store')->name('store');
	Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
	Route::post('/update{id}', 'CategoryController@update')->name('update');
	Route::get('/delete{id}', 'CategoryController@destroy')->name('delete');
	Route::get('/inactive/{id}', 'CategoryController@inactive')->name('inactive');
	Route::get('/active/{id}', 'CategoryController@active')->name('active');

});

//subcategory route...

Route::group(['as' => 'subcategory.', 'prefix' => 'subcategory', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'SubCategoryController@index')->name('index');
	Route::get('/create', 'SubCategoryController@create')->name('create');
	Route::post('/store', 'SubCategoryController@store')->name('store');
	Route::get('/edit/{id}', 'SubCategoryController@edit')->name('edit');
	Route::post('/update/{id}', 'SubCategoryController@update')->name('update');
	Route::get('/delete{id}', 'SubCategoryController@destroy')->name('delete');

});

//Brand route...

Route::group(['as' => 'brand.', 'prefix' => 'brand', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'BrandController@index')->name('index');
	Route::get('/create', 'BrandController@create')->name('create');
	Route::post('/store', 'BrandController@store')->name('store');
	Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
	Route::post('/update{id}', 'BrandController@update')->name('update');
	Route::get('/delete{id}', 'BrandController@destroy')->name('delete');
	Route::get('/inactive/{id}', 'BrandController@inactive')->name('inactive');
	Route::get('/active/{id}', 'BrandController@active')->name('active');

});

//product route 

Route::group(['as' => 'product.', 'prefix' => 'product', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'ProductController@index')->name('index');
	Route::get('/create', 'ProductController@create')->name('create');
	Route::post('/store', 'ProductController@store')->name('store');
	Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
	Route::post('/update{id}', 'ProductController@update')->name('update');
	Route::get('/delete{id}', 'ProductController@destroy')->name('delete');
	Route::get('/inactive/{id}', 'ProductController@inactive')->name('inactive');
	Route::get('/active/{id}', 'ProductController@active')->name('active');

});

//slider route

Route::group(['as' => 'slider.', 'prefix' => 'slider', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'SliderController@index')->name('index');
	Route::get('/create', 'SliderController@create')->name('create');
	Route::post('/store', 'SliderController@store')->name('store');
	Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
	Route::post('/update{id}', 'SliderController@update')->name('update');
	Route::get('/delete{id}', 'SliderController@destroy')->name('delete');
	Route::get('/inactive/{id}', 'SliderController@inactive')->name('inactive');
	Route::get('/active/{id}', 'SliderController@active')->name('active');

});

//feature route  

Route::group(['as' => 'feature.', 'prefix' => 'feature', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'FeatureController@index')->name('index');
	Route::get('/create', 'FeatureController@create')->name('create');
	Route::post('/store', 'FeatureController@store')->name('store');
	Route::get('/edit/{id}', 'FeatureController@edit')->name('edit');
	Route::post('/update{id}', 'FeatureController@update')->name('update');
	Route::get('/delete{id}', 'FeatureController@destroy')->name('delete');
	Route::get('/inactive/{id}', 'FeatureController@inactive')->name('inactive');
	Route::get('/active/{id}', 'FeatureController@active')->name('active');

});

//coupon Route  

Route::group(['as' => 'coupon.', 'prefix' => 'coupon', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'CouponController@index')->name('index');
	Route::get('/create', 'CouponController@create')->name('create');
	Route::post('/store', 'CouponController@store')->name('store');
	Route::get('/edit/{id}', 'CouponController@edit')->name('edit');
	Route::post('/update{id}', 'CouponController@update')->name('update');
	Route::get('/delete{id}', 'CouponController@destroy')->name('delete');
	Route::get('/inactive/{id}', 'CouponController@inactive')->name('inactive');
	Route::get('/active/{id}', 'CouponController@active')->name('active');

});

//Order route 

Route::group(['as' => 'Order.', 'prefix' => 'Order', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'OrderController@index')->name('index');
	Route::get('/Pending/{id}', 'OrderController@Pending')->name('Pending');
	Route::get('/order_done/{id}', 'OrderController@order_done')->name('order_done');
	Route::get('details/{id}', 'OrderController@order_details')->name('details');

});

//setting route 

Route::group(['as' => 'setting.', 'prefix' => 'setting', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'SettingController@index')->name('index');
	Route::post('/update/{id}', 'SettingController@update')->name('update');

});


//stock route

Route::group(['as' => 'stock.', 'prefix' => 'stock', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('/', 'StockController@index')->name('index');
	Route::get('/edit{id}', 'StockController@edit')->name('edit');
	Route::post('/update{id}', 'StockController@update')->name('update');

});

//payment route... 

Route::group(['as' => 'payment.', 'prefix' => 'payment', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
	
	Route::get('/', 'PaymentController@index')->name('index');
	Route::get('/create', 'PaymentController@create')->name('create');
	Route::post('/store', 'PaymentController@store')->name('store');
	Route::get('/edit/{id}', 'PaymentController@edit')->name('edit');
	Route::post('/update{id}', 'PaymentController@update')->name('update');
	Route::get('/delete{id}', 'PaymentController@destroy')->name('delete');


});


//auth route

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {
	
	Route::get('/admin-login', 'AdminController@adminloginForm')->name('admin.login.form');
	Route::post('/admin-login', 'AdminController@admin_login')->name('admin.login');
	Route::get('/logout', 'AdminController@logout')->name('logout');
	
});



Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

	Route::get('dashboard', 'AdminController@admin_dashboard')->name('admin.dashboard');
	Route::get('/get/subcategory/{category_id}', 'ProductController@getsubcat')->name('getsubcat');

});
