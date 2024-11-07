<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShopkeeperCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ShopKeeperController extends Controller
{
    //
    protected $view = 'shopkeeper.';

    /**
     * @method shows dashboard
     * @param
     * @return
     */
    public function index()
    {
        try{
           return view($this->view.'index');
        }
        catch(\Exception $e)
        {
            Log::error('ShopKeeperController: ' . $e->getMessage().'At Line:'.$e->getLine());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method shows products
     * @param
     * @return
     */
    public function showProducts()
    {
        try{
           $products =  Product::get();
            return view($this->view.'products')->with(['products'=> $products]);
        } catch(\Exception $e)
        {
            Log::error('ShopKeeperController: ' . $e->getMessage().'At Line:'.$e->getLine());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function cartProduct($id)
    {
        return $id;
    }
    /**
     * @method  helps to add product to carts
     * @param
     * @return
     */
    public function addToShopkeeperCart(Request $request)
    {
        try{
           if (Auth::check()) {
            if($request->has('proId') && $request->has('pprice'))
            {
                $userId = Auth::user()->id;
                $data = [
                    'user_id'          => isset($userId) ? $userId : null,
                    'product_id'       => isset($request->proId) ? $request->proId : null,
                    'product_price'    => isset($request->pprice) ? $request->pprice : null,
                    'total_price'      => $request->pprice * 1,
                ];
                $cart = new ShopkeeperCart;
                if($cart->where(['product_id'=>$request->proId,'user_id'=>$userId])->exists())
                {
                    $prodCount =  ShopkeeperCart::where('user_id',$userId)->count();
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
                $prodCount =  ShopkeeperCart::where('user_id',$userId)->count();
                return response()->json(['status' => true,'count' =>$prodCount]);
            }
        } else {
            Alert::info('Login', 'Hey User please make login')->persistent("Close")->autoClose(false);
        }
        return redirect()->back();
         } catch(\Exception $e)
         {
             Log::error('ShopKeeperController: ' . $e->getMessage().'At Line:'.$e->getLine());
             return back()->with(['error'=>$e->getMessage()]);
         }
    }
    /**
     * @method helps to fetch cart items
     * @param
     * @return
     */
    public function shopKeeperCartItems()
    {
        try{
            $data = $this->storeValues();
            if(sizeof($data))
            {
                return view('shopkeeper.cartItems')
                    ->with($data);
                }else{
                    return view('shopkeeper.cartItems');
                } 
       
         } catch(\Exception $e)
         {
             Log::error('ShopKeeperController: ' . $e->getMessage().'At Line:'.$e->getLine());
             return back()->with(['error'=>$e->getMessage()]);
         }
    }
     /**
     * @method 
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
             $cartProduct = ShopkeeperCart::where('user_id',$userId)->with('product')->get();
            //  dd($cartProduct);
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
     * @method helps to delete the cart items
     * @param
     * @return
     */
    public function deleteCartItem(Request $request)
    {
        try{
            $userId = Auth::user()->id;
            if($request->has('prodId'))
            {
               $itemDeleted =  ShopkeeperCart::where(['user_id'=>$userId,'id'=>$request->prodId])->delete();
               if($itemDeleted)
               {
                    return response()->json(['status'=>true,'route'=>route('shopkeeper.cart.items')]);
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
     * @method helps to delete the cart items
     * @param
     * @return
     */
    public function updateShopKeeperCart(Request $request)
    {
        try{
            dd("here we are ");
            if($request->has('quantity') && $request->has('itemId')){
                $cartItem = ShopkeeperCart::where('id',$request->itemId)->first();
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
}
