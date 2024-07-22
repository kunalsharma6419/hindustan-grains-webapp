<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInvoice;
use App\Models\PaymentStatus;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products=Product::orderBy('id','desc')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'raw_price' => 'required',
            'packaging_price' => 'required',
            'original_price' => 'required',
            'ingredient_quantity' => 'required',
            'retailer_price' => 'required',
            'distributor_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you're uploading an image
        ]);
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->packs_quantity = $validatedData['quantity'];
        $product->pack_ingredient_quantity = $validatedData['ingredient_quantity'];
        $product->raw_price = $validatedData['raw_price'];
        $product->packaging_price = $validatedData['packaging_price'];
        $product->original_price = $validatedData['original_price'];
        $product->retailer_price = $validatedData['retailer_price'];
        $product->distributer_price = $validatedData['distributor_price'];
        $product->short_description = $validatedData['short_description'];
        $product->long_description = $validatedData['long_description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = '/products/' . $fileName;
            $file->move(public_path('products'), $fileName);
            $product->image = $filePath;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $products=Product::find($id);
        return view('admin.product.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $products=Product::find($id);
        return view('admin.product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validatedData = $request->validate([
           'name' => 'required',
            'quantity' => 'required',
            'raw_price' => 'required',
            'packaging_price' => 'required',
            'original_price' => 'required',
            'ingredient_quantity' => 'required',
            'retailer_price' => 'required',
            'distributor_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id);

        $product->name = $validatedData['name'];
        $product->packs_quantity = $validatedData['quantity'];
        $product->pack_ingredient_quantity = $validatedData['ingredient_quantity'];
        $product->raw_price = $validatedData['raw_price'];
        $product->packaging_price = $validatedData['packaging_price'];
        $product->original_price = $validatedData['original_price'];
        $product->retailer_price = $validatedData['retailer_price'];
        $product->distributer_price = $validatedData['distributor_price'];
        $product->short_description = $validatedData['short_description'];
        $product->long_description = $validatedData['long_description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = '/products/' . $fileName;
            $file->move(public_path('products'), $fileName);
            $product->image = $filePath;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function profitLossPage()
    {
        $products=Product::getProductWisePrices();
        // dd($products);
        return view('admin.product.products-profit-loss',compact('products'));
    }
}
