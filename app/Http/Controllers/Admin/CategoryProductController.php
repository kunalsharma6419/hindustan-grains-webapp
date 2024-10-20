<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryProductRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryProductController extends Controller
{
    //
    /**
     * @method helps to show index page
     * @param
     * @return
     */
    public function index()
    {
        try{
        $products = CategoryProduct::with('category')->get();
        return view('admin.categoryproduct.index')->with(['products'=>$products]);
        }catch(\Exception $e)
        {
            Log::error('CategoryProductController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method helps to show create page of product 
     * @param
     * @return
     */
    public function create()
    {
        try{
        $categories = Category::select('id','category_name')->get();
        return view('admin.categoryproduct.create')->with(['categories'=>$categories]);
        }catch(\Exception $e)
        {
            
            Log::error('CategoryProductController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method helps to store categoryproduct 
     * @param
     * @return
     */
    public function store(CategoryProductRequest $request)
    {
        try{
     
            $categoryProduct                    = new CategoryProduct;
            $categoryProduct->discounted_price  = $request->discounted_price ?? null;
            $categoryProduct->selling_price     = $request->selling_price ?? null;
            $categoryProduct->original_price    = $request->original_price ?? null;
            $categoryProduct->product_quality   = $request->product_quality ?? '';
            $categoryProduct->long_description  = $request->l_description ?? '';
            $categoryProduct->short_description = $request->s_description ?? '';
            $categoryProduct->product_rating    = $request->product_rating ?? null;
            $categoryProduct->product_name      = $request->product_name ?? '';
            $categoryProduct->category_id       = $request->category_name ?? '';
            if ($request->hasFile('files')) {
                $filePaths = []; 
                foreach ($request->file('files') as $cateFile) {
                    $fileName = time().$cateFile->getClientOriginalName();
                    $filePath = '/categoryProductImage/' . $fileName;
                    $cateFile->move(public_path('categoryProductImage'), $fileName);
                    $filePaths[] = $filePath;
                }
                $categoryProduct->product_image_path  = json_encode($filePaths);
            }
            if ($request->hasFile('filess')) {
                $filePaths = []; 
                foreach ($request->file('filess') as $cateFile) {
                    $fileName = time().$cateFile->getClientOriginalName();
                    $filePath = '/categoryProductImage/' . $fileName;
                    $cateFile->move(public_path('categoryProductImage'), $fileName);
                    $filePaths[] = $filePath;
                }
                $categoryProduct->quality_image_path   = json_encode($filePaths);
            }
           $savedCategoryProduct =  $categoryProduct->save();
           if($savedCategoryProduct)
           {
            return redirect()->route('category-product.index')->with('success', 'Category Product created successfully.');
           }else{
            return back()->with('error', 'Something went wrong.');
           }
            
        }catch(\Exception $e)
        {
            
            Log::error('CategoryProductController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
     /**
     * @method helps to edit page of categoryproduct 
     * @param
     * @return
     */
    public function edit($id)
    {
        try{
            $categories = Category::select('id','category_name')->get();
            $product = CategoryProduct::with('category')->whereId($id)->first();
            if($product)
            {
                return view('admin.categoryproduct.edit')->with(['products'=>$product,'categories'=>$categories]);
            }else{
                return redirect()->back()->with(['error'=>"Category Product not found"]);
            }
            }catch(\Exception $e)
            {
                Log::error('CategoryController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
    }
     /**
     * @method helps to store categoryproduct 
     * @param
     * @return
     */
    public function update(CategoryProductRequest $request,$id)
    {
        try{
          
            $categoryProduct       = CategoryProduct::whereId($id)->first();
            $newImagePathJsons     = null; 
            $qualityImagePathJsons = null;
            if($categoryProduct)
            {                 
                if ($request->hasFile('files')) {
                    $filePaths = []; 
                    foreach ($request->file('files') as $cateFile) {
                        $fileName = time().$cateFile->getClientOriginalName();
                        $filePath = '/categoryProductImage/' . $fileName;
                        $cateFile->move(public_path('categoryProductImage'), $fileName);
                        $filePaths[] = $filePath;
                }
                if($categoryProduct->product_image_path != null)
                {
                    $existingImagePathArray  =      json_decode($categoryProduct->product_image_path);
                    $newImagePathJsons       =      array_merge($existingImagePathArray,$filePaths);
                }else{
                    $newImagePathJsons       =      $filePaths;
                }
            }else{
                $newImagePathJsons       =      json_decode($categoryProduct->product_image_path);
            }
        
            if ($request->hasFile('filess')) {
                $filePaths = []; 
                foreach ($request->file('filess') as $cateFile) {
                    $fileName = time().$cateFile->getClientOriginalName();
                    $filePath = '/categoryProductImage/' . $fileName;
                    $cateFile->move(public_path('categoryProductImage'), $fileName);
                    $filePaths[] = $filePath;
                }
                if($categoryProduct->quality_image_path != null)
                {
                    $existingQualityImagePathArray      =      json_decode($categoryProduct->quality_image_path);
                    $qualityImagePathJsons              =      array_merge($existingQualityImagePathArray,$filePaths);
                }else{
                    $qualityImagePathJsons              =      $filePaths;
                }
            }
            else{
                $qualityImagePathJsons                   =      json_decode($categoryProduct->quality_image_path);
            }
            $data = [
                'discounted_price'    => $request->discounted_price ?? null,
                'selling_price'       => $request->selling_price ?? null,
                'original_price'      => $request->original_price ?? null,
                'product_quality'     => $request->product_quality ?? '',
                'long_description'    => $request->l_description ?? '',
                'short_description'   => $request->s_description ?? '',
                'product_rating'      => $request->product_rating ?? null,
                'product_name'        => $request->product_name ?? '',
                'category_id'         => $request->category_name ?? '',
                'product_image_path'  => isset($newImagePathJsons) ?  json_encode($newImagePathJsons) : null,
                'quality_image_path'  => isset($qualityImagePathJsons) ? json_encode($qualityImagePathJsons) : null,
              ];
             
             $savedCategoryProduct     =  $categoryProduct->where('id',$id)->update($data);
           if($savedCategoryProduct)
           {
            return redirect()->route('category-product.index')->with('success', 'Category Product updated successfully.');
           }else{
            return back()->with('error', 'Something went wrong.');
           }
            
        }}
        catch(\Exception $e)
        {
            Log::error('CategoryProductController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
      /**
     * @method helps to delete the specific Image
     * @param
     * @return
     */
    public function removeImage(Request $request)
    {
        try{
        $id          = $request->id;
        $productId   = $request->categoryId;
        $imageId     = $request->imageId;
        $product     = CategoryProduct::whereId($productId)->first();
      
        if($product)
        { 
            if($imageId == 1)
            {
                $path = $product->product_image_path;
            }else if($imageId == 2)
            {
                $path = $product->quality_image_path;
            }
            $imageArray  = json_decode($path);
            if (key_exists($id, $imageArray)) {
                $value       = $imageArray[$id]; 
                $pathOfImage = public_path($value);
                if (file_exists($pathOfImage)) {
                    unlink($pathOfImage); 
                    unset($imageArray[$id]);
                    $imageArray = array_values($imageArray);
                   if(sizeof($imageArray))
                   {
                    if($imageId == 1)
                    {
                        $product->product_image_path = json_encode($imageArray);
                        $product->save();
                    }else if($imageId == 2)
                    {
                     $product->quality_image_path  = json_encode($imageArray);
                     $product->save();
                    } 
                   }else{
                    if($imageId == 1)
                    {
                        $product->update([
                            'product_image_path' => null
                        ]);
                    }else if($imageId == 2)
                    {
                        $product->update([
                            'quality_image_path' => null
                        ]);
                    }
                   }
                    return response()->json(['status'=>true,'message'=>'Image removed successfully']);
                } else {
                    return response()->json(['status'=>false,'message'=>'Image doest not exist']);
                }
                } else {
                    return response()->json(['status'=>false,'message'=>'Image key not exist']);
                }  
        }
        else{
            return response()->json(['status'=>false,'message'=>'Category not found']);
        }
        }catch(\Exception $e)
        {
            Log::error('CategoryController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    
/**
     * @method helps to delete the specific record
     * @param
     * @return
     */
    public function delete($id)
    {
        try{
        $categoryProduct = CategoryProduct::whereId($id)->first();
        if($categoryProduct)
        {
            if($categoryProduct->quality_image_path !== null && $categoryProduct->product_image_path !== null)
            {
            
                $qualityImageArray =json_decode($categoryProduct->quality_image_path);
                foreach($qualityImageArray as $item)
                {
                    $imageToRemovePath = public_path($item);
                    if (file_exists($imageToRemovePath)) {
                        unlink($imageToRemovePath); 
                    }
                }
                $productImageArray =json_decode($categoryProduct->product_image_path);
                foreach($productImageArray as $item)
                    {
                        $imageToRemovePath = public_path($item);
                        if (file_exists($imageToRemovePath)) {
                            unlink($imageToRemovePath); 
                        }
                    }
                
                $categoryProduct->delete();
                return redirect()->route('category-product.index')->with('success', 'Category deleted successfully.');
            }
        
            elseif($categoryProduct->product_image_path !== null)
            {
         
                $productImageArray =json_decode($categoryProduct->product_image_path);
                foreach($productImageArray as $item)
                    {
                        $imageToRemovePath = public_path($item);
                        if (file_exists($imageToRemovePath)) {
                            unlink($imageToRemovePath); 
                        }
                    }
                    $categoryProduct->delete();
                    return redirect()->route('category-product.index')->with('success', 'CategoryProduct deleted successfully.');
            }
            elseif($categoryProduct->quality_image_path !== null)
            {
                $qualityImageArray =json_decode($categoryProduct->quality_image_path);
                foreach($qualityImageArray as $item)
                    {
                        $imageToRemovePath = public_path($item);
                        if (file_exists($imageToRemovePath)) {
                            unlink($imageToRemovePath); 
                        }
                    }
                    $categoryProduct->delete();
                    return redirect()->route('category-product.index')->with('success', 'CategoryProduct deleted successfully.');
            }
            
            else{
            $categoryProduct->delete();
            return redirect()->route('category-product.index')->with('success', 'CategoryProduct deleted successfully.');
            }
        }else{
            return back();
        }
        }catch(\Exception $e)
        {
            Log::error('CategoryController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
}
