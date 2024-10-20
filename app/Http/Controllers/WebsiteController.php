<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\User;
use App\Models\WebCart;
use App\Models\WebOrderItem;
use App\Models\WebOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    //
     /**
     * @method shows web index page
     * @param
     * @return
     */
    public function index()
    {
        try{
            $categories = Category::with('products')->get();
            $pros = [];
            $FeaturedProducts = [];
            if($categories)
            {
                foreach($categories as $product)
                {
                  $pros[$product->category_name] =  $product->products;
                  $FeaturedProducts[]  = CategoryProduct::where('category_id',$product->id)->first();
                }
                return view('website.index')->with([
                    'categories' => $categories,
                    'products'   => $pros,
                    'featured'   => $FeaturedProducts,
                ]);
            }else{
                return redirect()->back();
            }
            
        }catch(\Exception $e)
        {
            Log::error('WebsiteController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
     /**
     * @method shows product shop page
     * @param
     * @return
     */
    public function shop($id)
    {
        try{
            $pId = base64_decode($id);
            $product = CategoryProduct::with('category')->where('id',$pId)->first();
            if($product)
            {
                $similarProducts =CategoryProduct::with('category')->where('category_id',$product->category_id)->where('id', '!=', $pId)->get();
                return view('website.shop')->with(['product'=>$product,'similarProducts'=>$similarProducts]);
            }else{
                return redirect()->back();
            }
        }catch(\Exception $e)
        {
            Log::error('WebsiteController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method shows product shopIndex page
     * @param
     * @return
     */
    public function shopIndex(Request $request)
    {
        try{
            if($request->has('sort') && $request->has('category_id'))
            {
                $categories = Category::select('id','category_name')->get();
                if($request->sort == "high")
                {
                 $products = CategoryProduct::with('category')->where('category_id',$request->category_id)->orderBy('selling_price','DESC')->get();
                }else if($request->sort == "low"){
                 $products = CategoryProduct::with('category')->where('category_id',$request->category_id)->orderBy('selling_price','ASC')->get();
                }
                if($products)
                {
                    return view('website.shopIndex')->with(['products'=>$products,'categories'=>$categories]);
                }else{
                    return redirect()->back();
                }
            }
            else{
                $categories = Category::select('id','category_name')->get();
                $products = CategoryProduct::with('category')->get();
                // $products = CategoryProduct::with('category')->paginate(6);
                if($products)
                {
                    return view('website.shopIndex')->with(['products'=>$products,'categories'=>$categories]);
                }else{
                    return redirect()->back();
                }
            }
           
        }
        catch(\Exception $e)
        {
            Log::error('WebsiteController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method helps to show categories on home page
     * @param
     * @return
     */
    public function categoryShow($id)
    {
        try{
            $pId = base64_decode($id);
            $category = Category::with('products')->where('id',$pId)->first();
            if($category)
            {
                $similarProducts =CategoryProduct::with('category')->where('category_id',$category->id)->get();
                return view('website.categoryShow')->with(['category'=>$category,'similarProducts'=>$similarProducts]);
            }else{
                return redirect()->back();
            }
        }catch(\Exception $e)
        {
            Log::error('WebsiteController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }

    /**
     * @method helps to store product in cart table
     * @param
     * @return
     */
    public function addToCart(Request $request)
    {
        try{
        if (Auth::check()) {
            if($request->has('proId') && $request->has('pprice') && $request->has('quant'))
            {
                $userId = Auth::user()->id;
                $data = [
                    'user_id'          => $userId ?? null,
                    'product_id'       => $request->proId ?? null,
                    'product_price'    => $request->pprice ?? null,
                    'product_quantity' => $request->quant ?? null,
                    'total_price'      => $request->pprice * $request->quant,
                ];
                $cart = new WebCart;
                if($cart->where(['product_id'=>$request->proId,'user_id'=>$userId])->exists())
                {
                    $prodCount =  WebCart::where('user_id',$userId)->count();
                    return response()->json(['status'=>true,'existedproduct'=> true,'count' =>$prodCount]);
                }
                else{
                    $cartEntry = $cart->create($data);
                    if($cartEntry)
                    {
                        $prodCount =  $cart->where('user_id',$userId)->count();
                        return response()->json(['status' => true,'count' =>$prodCount,'productAdded'=>true]);
                    }
                }
            }else{
                $userId = Auth::user()->id;
                $prodCount =  WebCart::where('user_id',$userId)->count();
                return response()->json(['status' => true,'count' =>$prodCount]);
            }
        } else {
            Alert::info('Login', 'Hey User please make login')->persistent("Close")->autoClose(false);
        }
        return redirect()->back();
    }
        catch(\Exception $e)
        {
            Log::error('WebsiteController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }

    /**
     * @method helps to get cart page 
     * @param
     * @return
     */
    public function getCart()
    {
        try{
            $data = $this->storeValues();
            if(sizeof($data))
            {
                return view('website.cart')
                    ->with($data);
                }else{
                    return view('website.cart');
                } 
        }catch(\Exception $e)
        {
            Log::error('WebsiteController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
     /**
     * @method helps to delete cart item
     * @param
     * @return
     */
        public function deleteCartItem(Request $request)
        {
            try{
                 $userId = Auth::user()->id;
                if($request->has('prodId'))
                {
                   $itemDeleted =  WebCart::where(['user_id'=>$userId,'id'=>$request->prodId])->delete();
                   if($itemDeleted)
                   {
                        return response()->json(['status'=>true,'route'=>route('cart.items')]);
                   }else{
                      return response()->json(['status'=>false]);
                   }
                }else{
                    return response()->json(['status'=>false]);
                }
            }catch(\Exception $e)
            {
                Log::error('WebsiteController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
        }
     /**
     * @method helps to update cart item quantity
     * @param
     * @return
     */
        public function updateCartValues(Request $request)
        {
            try{
                if($request->has('quantity') && $request->has('itemId')){
                    $cartItem = WebCart::where('id',$request->itemId)->first();
                    $data = [
                        'product_quantity' => $request->quantity,
                        'total_price'      => $request->quantity * $cartItem->product_price
                    ];
                    $updatedcart = $cartItem->update($data);
                    if($updatedcart)
                    {
                        return response()->json(['status'=>true,'route'=>route('cart.items')]);
                    }else{
                        return response()->json(['status'=>false,'message'=>'cart not updated']);
                    }
                }

            }catch(\Exception $e)
            {
                Log::error('WebsiteController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
        }
      /**
     * @method helps to get checkout page
     * @param
     * @return
     */
        public function getCheckout()
        {
            try{
                    if(Auth::check())
                    {
                        $user = Auth::user();
                        if($user)
                        {
                            $data = $this->storeValues();
                            $data['user'] = $user;
                            return view('website.checkout')->with($data);
                        }
                    }
                    else{
                        return view('website.checkout');
                    }
            }
            catch(\Exception $e)
            {
                Log::error('WebsiteController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
        }
   /**
     * @method helps to keep the cart values here 
     * @param
     * @return
     */
       public function storeValues()
       {
        try{
            $emptyData = [];
            if(Auth::check())
            {
                $userId = Auth::user()->id;
                $subtotal = null;
                $cartProduct = WebCart::where('user_id',$userId)->with('product')->get();
                if($cartProduct)
               {
                $cartImtemcount = count($cartProduct);
                    foreach($cartProduct as $item)
                    {
                        $subtotal += (int)$item->total_price;
                    }
                    $gst = (18 * $subtotal)/100;
                    $plateformFee = (2 * $gst)/100;
                    $shipping = (5 * $subtotal)/100;
                    $grandTotal = $subtotal + $gst + $plateformFee + $shipping;
                    $data = [
                        'cartProducts'  =>$cartProduct,
                        'cartImtemcount'=>$cartImtemcount,
                        'gst'           => round($gst,2) ?? '',
                        'plateformFee'  => round($plateformFee,2) ?? '',
                        'shipping'      => round($shipping,2) ?? '',
                        'subtotal'      => round($subtotal,2) ?? '',
                        'grandTotal'    => round($grandTotal,2) ?? ''
                    ];
                    return $data;
                }else{
                    return $emptyData;
                } 
            }else{
                return $emptyData;
            }
            
            }catch(\Exception $e)
            {
                Log::error('WebsiteController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
       }
    /**
     * @method helps to store data in orders table
     * @param
     * @return
     */
       public function placeOrder(Request $request)
       {
            try{
                if(Auth::check())
                {
                    $userId    =  Auth::user()->id;
                   $countItem  = WebCart::where('user_id',$userId)->count();
                    if($countItem == 0)
                    {
                        return redirect()->route('shop.index');
                    }
                    $storedData = $this->storeValues();
                    $productIds = WebCart::where('user_id',$userId)->pluck('product_id')->toArray();
               
                    $data = [
                        'user_id'      => Auth::user()->id,
                        'name'         =>  $request->name ?? '',
                        'phone'        =>  $request->phone ?? '',
                        'address'      =>  $request->address ?? '',
                        'email'        =>  $request->email  ?? '',
                        'pincode'      =>  $request->pincode ?? '',
                        'state'        =>  $request->state ?? '',
                        'city'         =>  $request->city ?? '',
                        'tracking_no'  =>  "HINDUSTAN".rand(1000,9999),
                        'total_price'  =>  $storedData['grandTotal'] ?? '',
                        // 'payment_mode' =>  $request->default_radio ?? null,
                        'payment_mode' =>  2,
                    ];
                    $webOrdersCreated = WebOrders::create($data);
                    if($webOrdersCreated)
                    {
                        $orderId = $webOrdersCreated->id;
                        foreach($productIds as $id)
                        {
                            $productData = WebCart::with('product')->where('product_id',$id)->first();
                            $totalPrice  = $productData->product_quantity * $productData->product_price;
                            $datas = [
                                'order_id'         => $webOrdersCreated->id ,
                                'product_id'       => $id,
                                'product_quantity' => $productData->product_quantity,
                                'product_price'    => $productData->product_price,
                                'total_price'      => (string)$totalPrice,
                            ];
                            $orderItemCreated = WebOrderItem::create($datas);
                        }
                        $webCartDeleted = WebCart::where('user_id',$userId)->delete();
                        if($webCartDeleted){
                            $id = $orderId;
                            Alert::info('Order Placed', 'Order Placed Successfully!!')->persistent('OK');
                            return redirect()->route('order.placed',['id'=> base64_encode($id)])->with(['success'=>true,'id'=>$id]);
                            // return redirect()->back()->with(['success'=>true,'orderId'=>$order->order_id]);
                    }
    
                    }else{
                        Alert::info('Order Failed','Something went wrong');
                        return redirect()->back();
                    }
                }else{
                    return redirect()->route('shop.index');
                } 
            }catch(\Exception $e)
            {
                Log::error('WebsiteController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
       }
       /**
        *@method helps to fetch the orderPlaced Page 
        *@param  orderId
        *@return 
        */
       public function orderPlacedPage($orderId)
       {
        try{
            if(Auth::check())
            {
                $placedOrderId = base64_decode($orderId);
                $products = WebOrderItem::with('product','order')->where(['order_id'=>$placedOrderId])->get();
                $orders   = WebOrders::where('id',$placedOrderId)->first();
                if($products && $orders)
                {
                    return view('website.orderplaced')->with(['products'=>$products,'orders'=>$orders]);
                }else{
                    return redirect()->back();
                }
            }
            return view('website.orderplaced');
        }
        catch(\Exception $e)
            {
                Log::error('WebsiteController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
    }
} 
