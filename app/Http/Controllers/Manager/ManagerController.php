<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;
use App\Models\CustomerInvoice;
use App\Models\ProductInvoice;
use App\Models\Product;
use App\Models\User;
use Auth;

class ManagerController extends Controller
{
    public function index()
    {   
        $user=User::count();
        $product=Product::count();
        $ProductInvoice=ProductInvoice::count();
        $producttotalgrant=ProductInvoice::sum('total_price');
        $customer=CustomerInvoice::count();
        $paymentstatus=PaymentStatus::sum('amount_paid');
        // dd($user,$product,$ProductInvoice,$producttotalgrant,$customer,$paymentstatus);
        return view('manager.index',compact('user','product','ProductInvoice','customer','producttotalgrant','paymentstatus'));
    }

    public function invoiceList()
    {
       $customer_data=CustomerInvoice::orderBy('id','desc')->get(); 
        return view('manager.invoices.invoice_list',compact('customer_data'));
    }

    public function invoiceShow($invoice_id)
    {
        $orderTotal = ProductInvoice::where('invoice_id', $invoice_id)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
                        ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
                        ->where('product_invoices.invoice_id', $invoice_id)
                         ->orderBy('id','desc')
                        ->get();
        $customer_get=CustomerInvoice::where('invoice_id',$invoice_id)->first();
        $promoter_name=User::where('id',$customer_get->promoter_id)->first();
        $englishnumber=$this->numberToWords($orderTotal);
        $ordernumber=$invoice_id;
        return view('manager.invoices.invoice_show', compact('orderTotal','productData','englishnumber','ordernumber','customer_get','promoter_name'));
    }

    public function paymentStatusList()
    {
        $payment_status=PaymentStatus::orderBy('id','desc')->get();
        return view('manager.payments.paymentStatusList',compact('payment_status'));
    }

    public function productIndex()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('manager.products.index',compact('products'));
    }

    public function productShow($id)
    {
        $products=Product::find($id);
        return view('admin.product.show',compact('products'));
    }

    public function promoterIndex()
    {
        $promoters = User::where('id', '!=', Auth::id())->latest()->get();

        return view('manager.promoter.index', compact('promoters'));
    }

    public function calculationsIndex()
    {
        // Logic for viewing calculations
    }

    public function userIndex()
    {
        $users=User::latest('created_at')->get();
        return view('manager.user.index',compact('users'));
    }
    
}
