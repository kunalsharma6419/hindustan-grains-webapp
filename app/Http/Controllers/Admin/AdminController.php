<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;
use App\Models\CustomerInvoice;
use App\Models\ProductInvoice;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function invoiceList()
    {
       $customer_data=CustomerInvoice::orderBy('id','desc')->get(); 
        return view('admin.invoice_list',compact('customer_data'));
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
        return view('admin.invoice_show', compact('orderTotal','productData','englishnumber','ordernumber','customer_get','promoter_name'));
    }

    public function paymentStatusList()
    {
        $payment_status=PaymentStatus::orderBy('id','desc')->get();
        return view('admin.paymentStatusList',compact('payment_status'));
    }

}
