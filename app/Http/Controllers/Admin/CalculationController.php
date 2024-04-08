<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('admin.calculations.index', compact('products'));
    }

    public function calculate(Request $request)
    {
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

        return view('admin.calculations.index', compact('calculated_packets','products','product_quantity','packet_size','product_name','packet_unit','remaining_amount'));
    }

}
