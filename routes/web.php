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

Auth::routes();

Route::name('webhooks.mollie')->post('webhooks/mollie', [App\Http\Controllers\MollieController::class, 'webhook']);

Route::name('order.success')->get('/order', function () {
    return view('success');
});
Route::get('/summary', function () {
    return view('summary', ['data'=>['name'=>'baaziz houssein', 'fee'=> 20, 'value'=>500, 'gateway'=>'paypal', 'url'=>'#']]);
});
Route::group(['middleware' => ['auth']], function () {

    Route::name('mollie.pay')->post('/pay', [App\Http\Controllers\MollieController::class, 'pay']);
    
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/user', function () {
        return Auth::user();
    });
});
