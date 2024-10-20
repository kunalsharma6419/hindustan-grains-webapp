@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        textarea {
            height: 100px;
            resize: vertical;
            /* Optional: Allow vertical resizing */
        }
       .ast{
        color: red;
       }
       .error{
        font-size: 14px;
            color: red;
        }

    </style>
    <div class="row card">
        <div class="col-md-12 card-body">
            <div class="d-flex text-center">
                <div>
                    <a href="{{route('category-product.index')}}"><i class="fa fa-arrow-left" style="font-size:24px;color:black;"></i></a>
                </div>
                <div>
                    <h4 class="card-title" style="margin-left:14px;margin-top:2px;">Create Product</h4>
                </div>
            </div>
          
            <form action="{{ route('category-product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Name <span  class="ast">*</span></label>
                            <select name="category_name" id=""  class="form-control">
                                <option value="">Please Select Category</option>
                                @foreach($categories as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Name <span  class="ast">*</span></label>
                            <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                            @error('product_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Rating <span  class="ast">*</span></label>
                            <select name="product_rating" id=""  class="form-control">
                                <option value="">Please Select Rating</option>
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="3.5">3.5</option>
                                <option value="4">4</option>
                                <option value="4.5">4.5</option>
                                <option value="5">5</option>
                            </select>
                            @error('product_rating')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div> --}}
                 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Original Price <span  class="ast">*</span></label>
                            <input type="number" class="form-control" name="original_price" id="original_price" placeholder="Original Price">
                            @error('original_price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selling Price <span  class="ast">*</span></label>
                            <input type="number" class="form-control" name="selling_price" id="selling_price" placeholder="Selling Price">
                            @error('selling_price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <span class="error" id="errorr"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Discounted Price <span  class="ast">*</span></label>
                            <input type="number" class="form-control" name="discounted_price" id="discounted_price" placeholder="Discounted Price">
                            @error('discounted_price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product short Description <span  class="ast">*</span></label>
                            <textarea class="form-control" name="s_description" placeholder="Short Description"></textarea>
                            @error('s_description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Quality <span  class="ast">*</span></label>
                            <select name="product_quality" id=""  class="form-control">
                                <option value="">Please Select Quality</option>
                                <option value="Good">Good</option>
                                <option value="Better">Better</option>
                                <option value="Best">Best</option>
                            </select>
                            @error('product_quality')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Product Long Description <span  class="ast">*</span></label>
                            {{-- <textarea class="form-control" name="l_description" placeholder="Long Description"></textarea> --}}
                            <textarea class="form-control" name="l_description" id="content" placeholder="Enter the Description" rows="5" name="body"></textarea>
                            @error('l_description')
                            <div class="error">{{ $message }}</div>
                             @enderror
                        </div>
                       
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                          
                            <div class="field" align="left">
                               <label>Product Images(For multiple images select all at once) </label>
                                <input type="file" id="files" name="files[]" multiple accept="image/png, image/jpeg, image/jpeg"/>
                              </div>
                              @error('files')
                              <div class="error">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          
                            <div class="field" align="left">
                               <label>Quality Images(For multiple images select all at once) </label>
                                <input type="file" id="filess" name="filess[]" multiple accept="image/png, image/jpeg, image/jpeg"/>
                              </div>
                              @error('filess')
                              <div class="error">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script>

    // var dprice = $("#discounted_price").val();
    // var sprice = $("#selling_price").val();
    // if(dprice == sprice)
    // {
    //     $("#errorr").val('Selling price can not be same as discounted price');
    // }
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        ClassicEditor.create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<link rel="stylesheet" href="{{asset('css\fileUpload.css')}}">
<script src="{{asset('js\multipleFileUpload.js')}}"></script>
<link rel="stylesheet" href="{{asset('css\qualityfile.css')}}">
<script src="{{asset('js\qualityfile.js')}}"></script>

