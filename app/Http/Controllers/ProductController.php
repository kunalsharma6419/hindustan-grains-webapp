<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInvoice;
use App\Models\CustomerInvoice;
use App\Models\PaymentStatus;
use Auth;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function myInvoice()
    {
        $product=Product::orderBy('id','desc')->get();
        return view('pramoter.my_invoice',compact('product'));
    }

    public function product_Search($id)
    {
        $product = Product::find($id);
        return response()->json([
            'data'=>$product,
            'success'=>200,
        ]);
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'id.*' => 'required|exists:products,id',
            'quantity.*' => 'required|integer|min:1',
            'totalprice.*' => 'required|numeric|min:0.01',
            'name' =>'required',
            'phone_number'=>'required',
            'full_address'=>'required',
        ]);
        $ordernumber ='A000'.rand(1111, 9999);
        $promoter_id=Auth::user()->id;
        $createdIds = [];
        foreach ($request->id as $key => $value) {
            $productInvoice = ProductInvoice::create([
                'promoter_id'=>$promoter_id,
                'product_id' => $request->id[$key],
                'quantity' => $request->quantity[$key],
                'selling_price' => $request->selling_price[$key],
                'total_price' => $request->totalprice[$key],
                'invoice_id' => $ordernumber,
            ]);
            $createdIds[] = $productInvoice->id;
            $product = Product::findOrFail($request->id[$key]);
            $product->quantity -= $request->quantity[$key];
            $product->save();
        }
        $customer=CustomerInvoice::create([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'gst_number'=>$request->gst_number,
            'invoice_id'=>$ordernumber,
            'promoter_id'=>$promoter_id,
            'full_address'=>$request->full_address,
        ]);
        $orderTotal = ProductInvoice::where('promoter_id',$promoter_id)->where('invoice_id', $ordernumber)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
                        ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
                        ->where('product_invoices.invoice_id', $ordernumber)
                        ->where('product_invoices.promoter_id', $promoter_id)
                        ->get();
        $customer_get=CustomerInvoice::find($customer->id);
        $englishnumber=$this->numberToWords($orderTotal);
        return view('invoice', compact('orderTotal','productData','englishnumber','ordernumber','customer_get'));
    }


    public function productInvoice()
    {
        $customer_data=CustomerInvoice::where('promoter_id',Auth::user()->id) ->orderBy('id','desc')->get();
        return view('pramoter.product_invoice',compact('customer_data'));
    }


    public function productInvoiceShow($invoice_id)
    {
        $promoter_id=Auth::user()->id;
        $orderTotal = ProductInvoice::where('promoter_id',$promoter_id)->where('invoice_id', $invoice_id)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
                        ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
                        ->where('product_invoices.invoice_id', $invoice_id)
                        ->where('product_invoices.promoter_id', $promoter_id)
                         ->orderBy('id','desc')
                        ->get();
        $customer_get=CustomerInvoice::where('promoter_id',$promoter_id)->where('invoice_id',$invoice_id)->first();
        $englishnumber=$this->numberToWords($orderTotal);
        $ordernumber=$invoice_id;
        return view('invoice', compact('orderTotal','productData','englishnumber','ordernumber','customer_get'));
    }

    public function paymentStatus($invoice_id)
    {
        $promoter_id=Auth::user()->id;
        $orderTotal = ProductInvoice::where('promoter_id',$promoter_id)->where('invoice_id', $invoice_id)->sum('total_price');
        $productData = ProductInvoice::join('products', 'product_invoices.product_id', '=', 'products.id')
                        ->select('products.*', 'product_invoices.quantity', 'product_invoices.total_price')
                        ->where('product_invoices.invoice_id', $invoice_id)
                        ->where('product_invoices.promoter_id', $promoter_id)
                        ->orderBy('id','desc')
                        ->get();
        $customer_get=CustomerInvoice::where('promoter_id',$promoter_id)->where('invoice_id',$invoice_id)->first();
        return view('pramoter.payment_status', compact('orderTotal','productData','invoice_id','customer_get'));
    }

    public function productInvoiveStatus(Request $request,$invoice_id)
    {
        $request->validate([
            'amount_paid'=>'required',
            'payment_status'=>'required',
            'payment_mode'=>'required',
        ]);
        $promoter_id=Auth::user()->id;
        $data=[
            'promoter_id'=>$promoter_id,
            'customer_id'=>$request->customer_id,
            'invoice_id'=>$request->invoive_id,
            'grant_total'=>$request->grant_total,
            'payment_mode'=>$request->payment_mode,
            'amount_paid'=>$request->amount_paid,
            'amount_due'=>$request->amount_due,
            'payment_percentage'=>$request->payment_percentage,
            'payment_status'=>$request->payment_status,
        ];
        if($files = $request->file('payment_prof')){
            $fileDetails = [];
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = '/invoice_proff/' . $fileName;
                $file->move(public_path('invoice_proff'), $fileName);
                $fileDetails[] = $filePath;
            }
            $data['payment_proof']= json_encode($fileDetails);
        }
        $res=PaymentStatus::create($data);
        if($res){
            return redirect()->route('product_invoice')->with('success','Pyament Update Successfully');
        }else{
            return redirect()->route('product_invoice')->with('error','errors somethinsg');
        }

    }

    public function productInvoiveStatusList()
    {
        $promoter_id=Auth::user()->id;
        $payment_status=PaymentStatus::where('promoter_id',$promoter_id)->orderBy('id','desc')->get();
        return view('pramoter.payment_status_list',compact('payment_status'));
    }

    public function productInvoiveStatusListShow($id)
    {
        $promoter_id=Auth::user()->id;
        $payment_status=PaymentStatus::where('promoter_id',$promoter_id)->find($id);
        $customer=CustomerInvoice::where('promoter_id',$promoter_id)->where('id',$payment_status->customer_id)->first();        
        return view('pramoter.payment_status_list_show',compact('payment_status','customer'));
    }

    public function productInvoiveStatusListEdit($id)
    {
        $promoter_id=Auth::user()->id;
        $product_id=PaymentStatus::where('promoter_id',$promoter_id)->latest()->find($id);

        $customer_get=CustomerInvoice::where('promoter_id',$promoter_id)->where('id',$product_id->customer_id)->first(); 
        $productData=PaymentStatus::where('promoter_id',$promoter_id)->where('invoice_id',$customer_get->invoice_id)->latest()->first();

        return view('pramoter.payment_status_edit', compact('productData','customer_get'));
  
    }

 public function productInvoiveStatusListUpdate(Request $request,$id)
{
    //dd($request->all());
    $request->validate([
        'amount_paid' => 'required',
        'payment_status' => 'required',
        'payment_mode' => 'required',
    ]);
    $promoter_id = Auth::user()->id;

    $productData=PaymentStatus::where('promoter_id',$promoter_id)->where('customer_id',$request->customer_id)->where('invoice_id',$request->invoive_id)->first();
   
    $data = [
        'promoter_id' => $promoter_id,
        'customer_id' => $request->customer_id,
        'payment_mode' => $request->payment_mode,
        'amount_paid' => $request->amount_paid,
        'amount_due' => $request->amount_due,
        'payment_percentage' => $request->payment_percentage,
        'payment_status' => $request->payment_status,
        'invoice_id' => $request->invoive_id,
        'grant_total' =>$productData->grant_total,
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


}
