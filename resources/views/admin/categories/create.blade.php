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
                    <a href="{{route('category.index')}}"><i class="fa fa-arrow-left" style="font-size:24px;color:black;"></i></a>
                </div>
                <div>
                    <h4 class="card-title" style="margin-left:14px;margin-top:2px;">Create Category</h4>
                </div>
            </div>
          
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category Name <span  class="ast">*</span></label>
                            <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                            @error('category_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                     
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category short Description <span  class="ast">*</span></label>
                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                       
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                          
                            <div class="field" align="left">
                               <label>Category Images(For multiple images select all at once) </label>
                                <input type="file" id="files" name="files[]" multiple accept="image/png, image/jpeg, image/jpeg"/>
                              </div>
                              @error('files')
                              <div class="error">{{ $message }}</div>
                          @enderror
                    </div>
                   
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<link rel="stylesheet" href="{{asset('css\fileUpload.css')}}">
<script src="{{asset('js\multipleFileUpload.js')}}"></script>

