<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * @method helps to show categories of Grains
     * @param
     * @return
     */
    public function index()
    {
        try{
            $categoryData = category::with('products')->get();
            return view('admin.categories.index')->with(['categories' => $categoryData]);

        }catch(\Exception $e)
        {
            Log::error('CategoryController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method helps to show create page categories 
     * @param
     * @return
     */
    public function create()
    {
        try{
            return view('admin.categories.create');

        }catch(\Exception $e)
        {
            Log::error('CategoryController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
    /**
     * @method helps to store categories 
     * @param
     * @return
     */
    public function store(CategoryRequest $request)
    {
        try{
            $category = new Category;
            $category->category_name         = $request->category_name ?? "";
            $category->short_description     = $request->description ?? "";
            if ($request->hasFile('files')) {
                $filePaths = []; 
                foreach ($request->file('files') as $cateFile) {
                    $fileName = time().$cateFile->getClientOriginalName();
                    $filePath = '/categoryImage/' . $fileName;
                    $cateFile->move(public_path('categoryImage'), $fileName);
                    $filePaths[] = $filePath;
                }
               
                $category->category_image_path  = json_encode($filePaths);
            }
           $savedCategory =  $category->save();
           if($savedCategory)
           {
            return redirect()->route('category.index')->with('success', 'Category created successfully.');
           }else{
            return back()->with('error', 'Something went wrong.');
           }
            
        }catch(\Exception $e)
        {
            Log::error('CategoryController: ' . $e->getMessage());
            return back()->with(['error'=>$e->getMessage()]);
        }
    }
     /**
     * @method helps to edit page
     * @param
     * @return
     */
    public function edit($id)
    {
        try{
            $category = Category::whereId($id)->first();
            if($category)
            {
                return view('admin.categories.edit')->with(['categories'=>$category]);
            }else{
                return redirect()->back()->with(['error'=>"Category not found"]);
            }
            }catch(\Exception $e)
            {
                Log::error('CategoryController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
    }
     /**
     * @method helps to edit page
     * @param
     * @return
     */
    public function update($id,CategoryRequest $request)
    {
        try{
            $category = Category::whereId($id)->first();
            if($category)
            {
                $name            = $request->category_name ?? "";
                $descriptionn     = $request->description ?? "";
            
                if ($request->hasFile('files')) {
                    $filePaths = []; 
                    foreach ($request->file('files') as $cateFile) {
                        $fileName = time().$cateFile->getClientOriginalName();
                        $filePath = '/categoryImage/' . $fileName;
                        $cateFile->move(public_path('categoryImage'), $fileName);
                        $filePaths[] = $filePath;
                    }
                    if($category->category_image_path != null)
                    {
                        $existingImagePathArray  =      json_decode($category->category_image_path);
                        $newImagePathJsons       =      array_merge($existingImagePathArray,$filePaths);
                    }else{
                        $newImagePathJsons       =      $filePaths;
                    }
                      $data = [
                        'category_name'        => $name,
                        'short_description'    => $descriptionn,
                        'category_image_path'  => json_encode($newImagePathJsons)
                      ];
                      $category->where('id',$id)->update($data);
                      return redirect()->route('category.index')->with('success', 'Category updated successfully.');
                }else{
                    $data = [
                        'category_name'        => $name,
                        'short_description'    => $descriptionn,
                      ];
           
                      $category->where('id',$id)->update($data);
                      return redirect()->route('category.index')->with('success', 'Category updated successfully.');
                }
            }else{
                return redirect()->back()->with(['error'=>"Category not found"]);
            }
            }catch(\Exception $e)
            {
       
                Log::error('CategoryController: ' . $e->getMessage());
                return back()->with(['error'=>$e->getMessage()]);
            }
    }
     /**
     * @method helps to show the detail page
     * @param
     * @return
     */
    public function show($id)
    {
        // dd($id);
        return view('admin.categories.show');

    }
    /**
     * @method helps to delete the specific record
     * @param
     * @return
     */
    public function delete($id)
    {
        try{
        $category = Category::whereId($id)->first();
        if($category)
        {
            $categoryUsedCount = CategoryProduct::where('category_id',$id)->count();
            if($categoryUsedCount > 0)
            {
                return redirect()->route('category.index')->with(['error' => 'This Category is assciated with its product cant delete it.']);
            }
            if($category->category_image_path != null)
            {
            $imageArray =json_decode($category->category_image_path);
            foreach($imageArray as $item)
            {
                $imageToRemovePath = public_path($item);
                if (file_exists($imageToRemovePath)) {
                    unlink($imageToRemovePath); 
                }
            }
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
            }
            else{
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
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

     /**
     * @method helps to delete the specific Image
     * @param
     * @return
     */
    public function removeImage(Request $request)
    {
        try{
        $id          = $request->id;
        $categoryId  = $request->categoryId;
        $category    = Category::whereId($categoryId)->first();
      
        if($category)
        {
            $imageArray  = json_decode($category->category_image_path);
            if (key_exists($id, $imageArray)) {
                $value       = $imageArray[$id]; 
                $pathOfImage = public_path($value);
                if (file_exists($pathOfImage)) {
                    unlink($pathOfImage); 
                    unset($imageArray[$id]);
                    $imageArray = array_values($imageArray);
                   if(sizeof($imageArray))
                   {
                        $category->category_image_path = json_encode($imageArray);
                        $category->save();
                   }else{
                    $category->update([
                        'category_image_path' => null
                    ]);
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



}
