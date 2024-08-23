<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;
use App\Models\CustomerInvoice;
use App\Models\ProductInvoice;
use App\Models\Product;
use App\Models\User;
use App\Models\PromoterSalaryTarget;
use Auth;

class ManagerController extends Controller
{
    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $ProductInvoice = CustomerInvoice::count();
        $producttotalgrant = ProductInvoice::sum('total_price');
        $customer = CustomerInvoice::count();
        $paymentstatus = PaymentStatus::where('payment_status', '!=', 'pending')->sum('amount_paid');
        $totalStockValue = Product::calculateTotalStockValue();
        $topProducts = Product::getTopSellingProducts();
        $totalInvoiceAmount = Product::getTotalInvoiceAmount();
        $totalInvoicePrice = $totalInvoiceAmount->totalInvoicePrice??0;
        $productWisePrices = Product::getProductWisePrices();
        $promoterSalaries = PromoterSalaryTarget::sum('monthly_salary');

        $remainingStockValue = $totalStockValue - $paymentstatus;

        return view('Manager.index', compact('user', 'product', 'ProductInvoice', 'customer', 'producttotalgrant', 'totalInvoicePrice', 'paymentstatus', 'remainingStockValue', 'topProducts', 'productWisePrices', 'promoterSalaries'));
    }

    public function invoiceList()
    {
       $customer_data=CustomerInvoice::orderBy('id','desc')->get();
        return view('Manager.Invoices.invoice_list',compact('customer_data'));
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
        return view('Manager.Invoices.invoice_show', compact('orderTotal','productData','englishnumber','ordernumber','customer_get','promoter_name'));
    }

    public function paymentStatusList()
    {
        $payment_status=PaymentStatus::orderBy('id','desc')->get();
        return view('Manager.Payments.paymentStatusList',compact('payment_status'));
    }

    public function productIndex()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('Manager.Products.index',compact('products'));
    }

    public function productShow($id)
    {
        $products=Product::find($id);
        return view('admin.product.show',compact('products'));
    }

    public function promoterIndex()
    {
        $promoters = User::where('id', '!=', Auth::id())->latest()->get();

        return view('Manager.Promoter.index', compact('promoters'));
    }

    public function userIndex()
    {
        $users = User::where('id', '!=', auth()->id()) // Exclude authenticated user's data
                ->whereNotIn('usertype', [1, 3]) // Exclude usertype 1 and 3
                ->latest('created_at')
                ->get();
        return view('Manager.User.index',compact('users'));
    }

    public function calculationIndex()
    {
        $products = Product::all();

        return view('Manager.calculations.index', compact('products'));
    }

    public function calculate(Request $request)
    {
        $request->flash();

        $products = Product::all();

        $request->validate([
            'raw_spice_quantity' => 'required|numeric|min:0',
            'packet_size' => 'required|numeric|min:0',
        ]);

        $product_quantity =  floatval($request->input('raw_spice_quantity'));
        $packet_size = floatval($request->input('packet_size'));
        $packet_unit = $request->input('packet_unit');
        $product_name = Product::find($request->input('product'))->name;

        if($packet_unit == 'kg'){
            $calculated_packets = floor($product_quantity/ $packet_size);
            $remaining_amount = ($product_quantity*1000) - ($calculated_packets * ($packet_size*1000));
        }
        else if($packet_unit == 'g'){
            $calculated_packets = floor(($product_quantity *1000)/ $packet_size);
            $remaining_amount = $product_quantity*1000 - ($calculated_packets * $packet_size);
        }

        return view('Manager.calculations.index', compact('calculated_packets','products','product_quantity','packet_size','product_name','packet_unit','remaining_amount'));
    }

    public function addToStock(Request $request) {

        $productId = $request->input('product_id');
        $calculatedPackets = $request->input('calculated_packets');

        $product = Product::findOrFail($productId);

        $product->packs_quantity += (float)$calculatedPackets;
        $product->save();

        return response()->json(['message' => 'Quantity updated successfully'], 200);
    }

}
