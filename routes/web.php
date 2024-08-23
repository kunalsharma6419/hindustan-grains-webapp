<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PromoterTargetController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CalculationController;
use App\Http\Controllers\Manager\ManagerController;

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
    ->middleware('guest');
// ->name('login');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['prefix' => 'promoter', 'middleware' => ['auth', 'web']], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('add_invoice', [ProductController::class, 'myInvoice'])->name('my_invoice');
    Route::get('product_Search/{id}', [ProductController::class, 'product_Search'])->name('product_Search');
    Route::post('product_store', [ProductController::class, 'productStore'])->name('productStore');
    Route::get('product_invoice', [ProductController::class, 'productInvoice'])->name('product_invoice');
    Route::get('product_invoice_view/{invoice_id}', [ProductController::class, 'productInvoiceShow'])->name('product_invoice_view');
    Route::get('payment_status/{invoice_id}', [ProductController::class, 'paymentStatus'])->name('payment_status');
    Route::post('payment_status/{invoice_id}', [ProductController::class, 'productInvoiveStatus'])->name('payment_invoice_status');
    Route::get('payment_status_list', [ProductController::class, 'productInvoiveStatusList'])->name('payment_status_list');
    Route::get('payment_status_list_show/{id}', [ProductController::class, 'productInvoiveStatusListShow'])->name('payment_status_list_show');
    Route::get('payment_status_list_edit/{id}', [ProductController::class, 'productInvoiveStatusListEdit'])->name('payment_status_list_edit');
    Route::post('payment_status_list_update/{id}', [ProductController::class, 'productInvoiveStatusListUpdate'])->name('payment_status_list_update');
    Route::get('pro_invoice_show_edit/{invoice_id}', [ProductController::class, 'invoiceShowEdit'])->name('pro_invoice_show_edit');
    Route::post('invoice_show_update/{invoice_id}', [AdminController::class, 'invoiceUpdate'])->name('pro_invoice_update');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('invoice_list', [AdminController::class, 'invoiceList'])->name('invoice_list');
    Route::get('invoice_show/{invoice_id}', [AdminController::class, 'invoiceShow'])->name('invoice_show');
    Route::get('invoice_show_edit/{invoice_id}', [AdminController::class, 'invoiceShowEdit'])->name('invoice_show_edit');
    Route::post('invoice_show_update/{invoice_id}', [AdminController::class, 'invoiceUpdate'])->name('invoice_update');
    Route::get('payment_list_status', [AdminController::class, 'paymentStatusList'])->name('payment_list_status');
    Route::any('profitLossPage', [AdminController::class, 'profitLossPage'])->name('profitLossPage');
    Route::get('product', [ProductsController::class, 'index'])->name('product.index');
    Route::get('product/{id}/edit', [ProductsController::class, 'edit'])->name('product.edit');
    Route::get('product/create', [ProductsController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductsController::class, 'store'])->name('product.store');
    Route::put('product/update/{id}', [ProductsController::class, 'update'])->name('product.update');
    Route::get('product/delete/{id}', [ProductsController::class, 'delete'])->name('product.delete');
    Route::get('product/show/{id}', [ProductsController::class, 'show'])->name('product.show');
    Route::get('product/profitLoss', [ProductsController::class, 'profitLossPage'])->name('product.profitLossPage');
    Route::get('promoter', [PromoterTargetController::class, 'index'])->name('promoter.index');
    Route::get('promoter/edit/{id}', [PromoterTargetController::class, 'edit'])->name('promoter.edit');
    Route::post('promoter/store', [PromoterTargetController::class, 'store'])->name('promoter.store');
    Route::resource('user', UserController::class);
    Route::get('add_invoive', [AdminController::class, 'addInvoice'])->name('admin.addinvoice');
    Route::get('add_invoive', [AdminController::class, 'addInvoice'])->name('admin.addinvoice');
    Route::post('product_store', [AdminController::class, 'addproductStore'])->name('admin.productStore');
    Route::get('product_Search/{id}', [AdminController::class, 'product_Search'])->name('admin.product_Search');
    Route::get('payment_status/{invoice_id}', [AdminController::class, 'addpaymentStatus'])->name('admin.payment_status');
    Route::post('payment_status/{invoice_id}', [AdminController::class, 'addproductInvoiveStatus'])->name('admin.payment_invoice_status');
    Route::get('payment_status_list_edit/{id}', [AdminController::class, 'productInvoiveStatusListEdit'])->name('admin.payment_status_list_edit');
    Route::post('payment_status_list_update/{id}', [AdminController::class, 'productInvoiveStatusListUpdate'])->name('admin.payment_status_list_update');
    Route::get('/calculations', [CalculationController::class, 'index'])->name('calculations.index');
    Route::post('/calculate', [CalculationController::class, 'calculate'])->name('calculation.calculate');
    Route::post('/stock/add', [CalculationController::class, 'addToStock'])->name('stock.add');
});

Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'web']], function () {
    Route::get('dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('invoice_list', [ManagerController::class, 'invoiceList'])->name('manager.invoice_list');
    Route::get('invoice_show/{invoice_id}', [ManagerController::class, 'invoiceShow'])->name('manager.invoice_show');
    Route::get('payment_list_status', [ManagerController::class, 'paymentStatusList'])->name('manager.payment_list_status');
    Route::get('product', [ManagerController::class, 'productIndex'])->name('manager.product.index');
    Route::get('product/show/{id}', [ManagerController::class, 'productShow'])->name('manager.product.show');
    Route::get('promoter', [ManagerController::class, 'promoterIndex'])->name('manager.promoter.index');
    Route::get('users', [ManagerController::class, 'userIndex'])->name('manager.user.index');
    Route::get('/calculations', [ManagerController::class, 'calculationIndex'])->name('manager.calculations.index');
    Route::post('/calculate', [ManagerController::class, 'calculate'])->name('manager.calculation.calculate');
    Route::post('/stock/add', [ManagerController::class, 'addToStock'])->name('manager.stock.add');
});

Route::get('logout', [AuthController::class, 'logout']);

\PWA::routes();
