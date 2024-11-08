<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentStatus;
use App\Models\CustomerInvoice;
use App\Models\ProductInvoice;
use App\Models\Product;
use App\Models\User;
use App\Models\PromoterSalaryTarget;
use Auth;

class AdminController extends Controller
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
        $promoterWiseSalary = User::getPromoterWiseSalary();

        $remainingStockValue = $totalStockValue - $paymentstatus;

        return view('admin.index', compact('user', 'product', 'ProductInvoice', 'customer', 'producttotalgrant', 'totalInvoicePrice', 'paymentstatus', 'remainingStockValue', 'topProducts', 'productWisePrices', 'promoterSalaries', 'promoterWiseSalary'));
    }

    public function invoiceList()
    {
        $customer_data = CustomerInvoice::orderBy('id', 'desc')->get();
        return view('admin.invoice_list', compact('customer_data'));
    }

    public function invoiceShow($invoice_id)
    {
        $orderTotal = ProductInvoice::where('invoice_id', $invoice_id)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
            ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
            ->where('product_invoices.invoice_id', $invoice_id)
            ->orderBy('id', 'desc')
            ->get();
        $customer_get = CustomerInvoice::where('invoice_id', $invoice_id)->first();
        $promoter_name = User::where('id', $customer_get->promoter_id)->first();
        $englishnumber = $this->numberToWords($orderTotal);
        $ordernumber = $invoice_id;
        return view('admin.invoice_show', compact('orderTotal', 'productData', 'englishnumber', 'ordernumber', 'customer_get', 'promoter_name'));
    }

    public function paymentStatusList()
    {
        $payment_status = PaymentStatus::orderBy('id', 'desc')->get();
        return view('admin.paymentStatusList', compact('payment_status'));
    }


    public function addInvoice(Request $request)
    {
        $product = Product::orderBy('id', 'desc')->get();
        return view('admin.addinvoice', compact('product'));
    }

    public function addproductStore(Request $request)
    {
        $request->validate([
            'id.*' => 'required|exists:products,id',
            'quantity.*' => 'required|integer|min:1',
            'totalprice.*' => 'required|numeric|min:0.01',
            'name' => 'required',
            'phone_number' => 'required',
            'full_address' => 'required',
        ]);
        $ordernumber = 'A000' . rand(1111, 9999);
        $promoter_id = Auth::user()->id;
        $createdIds = [];
        $customerInvoiceAmount = 0;
        foreach ($request->id as $key => $value) {
            $productInvoice = ProductInvoice::create([
                'promoter_id' => $promoter_id,
                'product_id' => $request->id[$key],
                'quantity' => $request->quantity[$key],
                'selling_price' => $request->selling_price[$key],
                'total_price' => $request->totalprice[$key],
                'invoice_id' => $ordernumber,
            ]);
            $createdIds[] = $productInvoice->id;
            $product = Product::findOrFail($request->id[$key]);
            $product->packs_quantity -= $request->quantity[$key];
            $product->save();

            $customerInvoiceAmount += $request->totalprice[$key];
        }
        $customerInvoiceAmount += $request->delivery_charge;
        $customer = CustomerInvoice::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'gst_number' => $request->gst_number,
            'invoice_id' => $ordernumber,
            'promoter_id' => $promoter_id,
            'full_address' => $request->full_address,
            'customer_type' => $request->customer_type,
            'delivery_charge' => $request->delivery_charge,
            'total_invoice_amount' => $customerInvoiceAmount
        ]);
        $orderTotal = ProductInvoice::where('promoter_id', $promoter_id)->where('invoice_id', $ordernumber)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
            ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
            ->where('product_invoices.invoice_id', $ordernumber)
            ->where('product_invoices.promoter_id', $promoter_id)
            ->get();
        $customer_get = CustomerInvoice::find($customer->id);
        $englishnumber = $this->numberToWords($orderTotal);
        return view('invoice', compact('orderTotal', 'productData', 'englishnumber', 'ordernumber', 'customer_get'));
    }

    public function product_Search($id, Request $request)
    {
        $product = Product::find($id);
        return response()->json([
            'data' => $product,
            'success' => 200,
        ]);
    }


    public function addpaymentStatus($invoice_id)
    {
        $payment_status = PaymentStatus::orderBy('id', 'desc')->get();
        return view('manager.payments.paymentStatusList', compact('payment_status'));
    }

    public function addproductInvoiveStatus(Request $request, $invoice_id)
    {
        $request->validate([
            'amount_paid' => 'required',
            'payment_status' => 'required',
            'payment_mode' => 'required',
        ]);
        $promoter_id = Auth::user()->id;
        $data = [
            'promoter_id' => $promoter_id,
            'customer_id' => $request->customer_id,
            'invoice_id' => $request->invoive_id,
            'grant_total' => $request->grant_total,
            'payment_mode' => $request->payment_mode,
            'amount_paid' => $request->amount_paid,
            'amount_due' => $request->amount_due,
            'payment_percentage' => $request->payment_percentage,
            'payment_status' => $request->payment_status,
        ];
        if ($files = $request->file('payment_prof')) {
            $fileDetails = [];
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = '/invoice_proff/' . $fileName;
                $file->move(public_path('invoice_proff'), $fileName);
                $fileDetails[] = $filePath;
            }
            $data['payment_proof'] = json_encode($fileDetails);
        }
        $res = PaymentStatus::create($data);
        if ($res) {
            return redirect()->route('invoice_list')->with('success', 'Pyament Update Successfully');
        } else {
            return redirect()->route('invoice_list')->with('error', 'errors somethinsg');
        }
    }

    public function productInvoiveStatusListEdit($id)
    {
        $promoter_id = Auth::user()->id;
        $product_id = PaymentStatus::where('promoter_id', $promoter_id)->latest()->find($id);

        $customer_get = CustomerInvoice::where('promoter_id', $promoter_id)->where('id', $product_id->customer_id)->first();
        $productData = PaymentStatus::where('promoter_id', $promoter_id)->where('invoice_id', $customer_get->invoice_id)->latest()->first();

        return view('admin.payment_status_edit', compact('productData', 'customer_get'));
    }


    public function productInvoiveStatusListUpdate(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'amount_paid' => 'required',
            'payment_status' => 'required',
            'payment_mode' => 'required',
        ]);
        $promoter_id = Auth::user()->id;

        $productData = PaymentStatus::where('promoter_id', $promoter_id)->where('customer_id', $request->customer_id)->where('invoice_id', $request->invoive_id)->first();
        $promoter_id = Auth::user()->id;
        $promoter_id = Auth::user()->id;
        $data = [
            'promoter_id' => $promoter_id,
            'customer_id' => $request->customer_id,
            'payment_mode' => $request->payment_mode,
            'amount_paid' => $request->amount_paid,
            'amount_due' => $request->amount_due,
            'payment_percentage' => $request->payment_percentage,
            'payment_status' => $request->payment_status,
            'invoice_id' => $request->invoive_id,
            'grant_total' => $productData->grant_total,
        ];
        if ($request->hasFile('payment_prof')) {
            $file = $request->file('payment_prof');
            $fileName = $file->getClientOriginalName();
            $filePath = '/invoice_proff/' . $fileName;
            $file->move(public_path('invoice_proff'), $fileName);
            $data['payment_proof'] = $filePath;
        }

        $res = PaymentStatus::create($data);
        if ($res) {
            return redirect()->back()->with('success', 'Payment Inserted Successfully');
        } else {
            return redirect()->back()->with('error', 'Error inserting payment');
        }
    }

    public function invoiceShowEdit($invoice_id)
    {
        $orderTotal = ProductInvoice::where('invoice_id', $invoice_id)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
            ->select('products.*', 'product_invoices.quantity', 'product_invoices.selling_price as se_price', 'product_invoices.total_price')
            ->where('product_invoices.invoice_id', $invoice_id)
            ->orderBy('id', 'desc')
            ->get();
        $customer_get = CustomerInvoice::where('invoice_id', $invoice_id)->first();
        $promoter_name = User::where('id', $customer_get->promoter_id)->first();
        $englishnumber = $this->numberToWords($orderTotal);
        $ordernumber = $invoice_id;
        $product = Product::orderBy('id', 'desc')->get();

        return view('admin.invoice_show_edit', compact('orderTotal', 'productData', 'englishnumber', 'ordernumber', 'customer_get', 'promoter_name', 'product', 'invoice_id'));
    }

    public function invoiceUpdate(Request $request, $invoice_id)
    {
        // dd($request->all());
        $request->validate([
            'id.*' => 'required|exists:products,id',
            'quantity.*' => 'required|integer|min:1',
            'totalprice.*' => 'required|numeric|min:0.01',
            'name' => 'required',
            'phone_number' => 'required',
            'full_address' => 'required',
        ]);

        $productinvo = ProductInvoice::where('invoice_id', $invoice_id)->get();

        foreach ($productinvo as $pro_invoice) {
            $prod_in = ProductInvoice::find($pro_invoice->id)->delete();
            //dd($prod_in);
        }
        $promoter_id = Auth::user()->id;

        foreach ($request->id as $key => $value) {
            $productInvoice = ProductInvoice::create([
                'promoter_id' => $promoter_id,
                'product_id' => $request->id[$key],
                'quantity' => $request->quantity[$key],
                'selling_price' => $request->selling_price[$key],
                'total_price' => $request->totalprice[$key],
                'invoice_id' => $invoice_id,
            ]);
            $createdIds[] = $productInvoice->id;
            $product = Product::findOrFail($request->id[$key]);
            $product->packs_quantity -= $request->quantity[$key];
            $product->save();
        }
        $customer_get = CustomerInvoice::where('invoice_id', $invoice_id)->first();

        $orderTotal = ProductInvoice::where('promoter_id', $promoter_id)->where('invoice_id', $invoice_id)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
            ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
            ->where('product_invoices.invoice_id', $invoice_id)
            ->where('product_invoices.promoter_id', $promoter_id)
            ->get();
        $ordernumber = $invoice_id;
        $englishnumber = $this->numberToWords($orderTotal);
        return view('invoice', compact('orderTotal', 'productData', 'englishnumber', 'ordernumber', 'customer_get'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function profitLossPage()
    {
        $startDate = date('Y-m-d', strtotime('-1 month'));
        $endDate = date('Y-m-d', time());
        if (isset(request()->daterange)) {
            $dates = explode(' - ', request()->daterange);
            // dd($dates);
            $startDate = date('Y-m-d', strtotime($dates[0]));
            $endDate = date('Y-m-d', strtotime($dates[1]));
        }
        $getGrossDetails=User::getGrossDetails($startDate, $endDate);
        return view('admin.profit-loss',compact('getGrossDetails', 'startDate', 'endDate'));
    }
}
