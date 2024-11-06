<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
}
