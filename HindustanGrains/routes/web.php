<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware'=>['auth','web']],function(){
    Route::get('home',[AuthController::class, 'home'])->name('home');
    Route::get('add_invoice',[ProductController::class, 'myInvoice'])->name('my_invoice');
    Route::get('product_Search/{id}',[ProductController::class,'product_Search'])->name('product_Search');
    Route::post('product_store',[ProductController::class,'productStore'])->name('productStore');
    Route::get('product_invoice',[ProductController::class,'productInvoice'])->name('product_invoice');
    Route::get('product_invoice_view/{invoice_id}',[ProductController::class,'productInvoiceShow'])->name('product_invoice_view');
    Route::get('payment_status/{invoice_id}',[ProductController::class,'paymentStatus'])->name('payment_status');
    Route::post('payment_status/{invoice_id}',[ProductController::class,'productInvoiveStatus'])->name('payment_invoice_status');
});
