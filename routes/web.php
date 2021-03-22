<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/details/{slug}', 'DetailsController@index')->name('details');

Route::post('/midtrans/callback', 'MidtransController@callback');
Route::get('/midtrans/success', 'MidtransController@successTransaction');
Route::get('/midtrans/pending', 'MidtransController@pendingTransaction');
Route::get('/midtrans/failed', 'MidtransController@failedTransaction');

Route::get('/checkout/{id}', 'CheckoutController@index')->name('checkout')->middleware('auth');
Route::post('/checkout/{id}', 'CheckoutController@process')->name('checkout-process')->middleware('auth');
Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')->name('checkout-create')->middleware('auth');
Route::get('/checkout/remove/{id}', 'CheckoutController@remove')->name('checkout-remove')->middleware('auth');
Route::get('/checkout/confirm/{id}', 'CheckoutController@success')->name('checkout-success')->middleware('auth');

route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
       Route::get('/', 'DashboardController@index')->name('dashboard');
       
       Route::resource('travel-package', 'TravelPackageController');
       Route::resource('gallery', 'GalleryController');
       Route::resource('transaction', 'TransactionController');
    });
Auth::routes(['verify' => true]);

