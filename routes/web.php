<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');









Route::post('/addtocart', [App\Http\Controllers\Frontend\CartController::class, 'addcart'])->name('addToCart');

Route::get('/all_cart', [App\Http\Controllers\Frontend\CartController::class, 'all_cart'])->name('all_cart'); //ajax request




Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');

Route::get('/cartremoveproduct/{rowId}', [App\Http\Controllers\Frontend\CartController::class, 'cartremoveproduct']);

Route::get('/cartUpdate/{rowId}/{qty}', [App\Http\Controllers\Frontend\CartController::class, 'cartUpdateqty']);




Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
	Route::post('couponApply', 'CartController@couponApply')->name('couponApply');
	Route::get('coupon_remove', 'CartController@coupon_remove')->name('coupon_remove');
	Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
	Route::get('myaccount', 'CustomerDashboardController@myaccount')->name('myaccount');
	
	Route::post('order-place', 'OrderController@order_place')->name('order.place');
	

});



Route::group(['namespace' => 'App\Http\Controllers'], function () {
	Route::get('product_by_category/{id}', 'HomeController@product_by_category')->name('product_by_category');

	Route::get('search', 'HomeController@search')->name('search');
	

});




