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
        $product=Product::all();
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


    public function numberToWords($number) 
    {
        $ones = array(
            1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
            11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
            15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen'
        );
        $tens = array(
            2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty',
            6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'ninety'
        );

        $words = array();
        if ($number < 0) {
            $words[] = 'minus';
            $number = abs($number);
        }

        if ($number < 20) {
            $words[] = $ones[$number];
        } elseif ($number < 100) {
            $words[] = $tens[($number / 10)];
            if ($number % 10) {
                $words[] = $ones[$number % 10];
            }
        } elseif ($number < 1000) {
            $words[] = $ones[($number / 100)] . ' hundred';
            if ($number % 100) {
                $words[] = $this->numberToWords($number % 100);
            }
        } else {
            $baseUnit = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion');
            $base = pow(1000, floor(log($number, 1000)));
            $unit = $number / $base;
            $words[] = $this->numberToWords($unit) . ' ' . $baseUnit[floor(log($number, 1000))];
            if ($number % $base) {
                $words[] = $this->numberToWords($number % $base);
            }
        }

        return implode(' ', $words);
    }

    public function productInvoice()
    {
        $customer_data=CustomerInvoice::where('promoter_id',Auth::user()->id)->get();
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
        ];         
        if($files = $request->file('payment_proff')){
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

}
