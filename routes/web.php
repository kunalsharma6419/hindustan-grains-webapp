<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PromoterTargetController;
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
    return view('auth.login');
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

Route::group(['prefix'=>'promoter','middleware'=>['auth','web']],function(){
    Route::get('home',[AuthController::class, 'home'])->name('home');
    Route::get('add_invoice',[ProductController::class, 'myInvoice'])->name('my_invoice');
    Route::get('product_Search/{id}',[ProductController::class,'product_Search'])->name('product_Search');
    Route::post('product_store',[ProductController::class,'productStore'])->name('productStore');
    Route::get('product_invoice',[ProductController::class,'productInvoice'])->name('product_invoice');
    Route::get('product_invoice_view/{invoice_id}',[ProductController::class,'productInvoiceShow'])->name('product_invoice_view');
    Route::get('payment_status/{invoice_id}',[ProductController::class,'paymentStatus'])->name('payment_status');
    Route::post('payment_status/{invoice_id}',[ProductController::class,'productInvoiveStatus'])->name('payment_invoice_status');
    Route::get('payment_status_list',[ProductController::class,'productInvoiveStatusList'])->name('payment_status_list');
    Route::get('payment_status_list_show/{id}',[ProductController::class,'productInvoiveStatusListShow'])->name('payment_status_list_show');
    Route::get('payment_status_list_edit/{id}',[ProductController::class,'productInvoiveStatusListEdit'])->name('payment_status_list_edit');
    Route::post('payment_status_list_update/{id}',[ProductController::class,'productInvoiveStatusListUpdate'])->name('payment_status_list_update');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});


Route::group(['prefix'=>'admin','middleware'=>['auth','web']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('invoice_list',[AdminController::class,'invoiceList'])->name('invoice_list');
    Route::get('invoice_show/{invoice_id}',[AdminController::class,'invoiceShow'])->name('invoice_show');
    Route::get('payment_list_status',[AdminController::class,'paymentStatusList'])->name('payment_list_status');

    Route::get('product',[ProductsController::class,'index'])->name('product.index');
    Route::get('product/{id}/edit',[ProductsController::class,'edit'])->name('product.edit');
    Route::get('product/create',[ProductsController::class,'create'])->name('product.create');
    Route::post('product/store',[ProductsController::class,'store'])->name('product.store');
    Route::put('product/update/{id}',[ProductsController::class,'update'])->name('product.update');
    Route::get('product/delete/{id}',[ProductsController::class,'delete'])->name('product.delete');
    Route::get('product/show/{id}',[ProductsController::class,'show'])->name('product.show');
    Route::get('promoter',[PromoterTargetController::class,'index'])->name('promoter.index');
    Route::get('promoter/edit/{id}',[PromoterTargetController::class,'edit'])->name('promoter.edit');
    Route::post('promoter/store',[PromoterTargetController::class,'store'])->name('promoter.store');

});

