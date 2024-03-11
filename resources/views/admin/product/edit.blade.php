@extends('admin.layouts.app')

@section('content')
<style>
    textarea {
        height: 100px;
        resize: vertical; /* Optional: Allow vertical resizing */
    }
</style>
<div class="row card">
	<div class="col-md-12 card-body">
		<form action="{{route('product.update',$products->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Product Name</label>
	                    <input type="text" class="form-control" name="name" value="{{$products->name}}" name="invoive_id" placeholder="Enter full name...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Quentity</label>
	                    <input type="number" class="form-control" name="quantity" value="{{$products->quantity}}" name="invoive_id" placeholder="Enter full name...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Original Price</label>
	                    <input type="number" class="form-control" name="original_price" value="{{$products->original_price}}" name="invoive_id" placeholder="Enter full name...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Selling Price</label>
	                    <input type="number" class="form-control" name="selling_price" value="{{$products->selling_price}}" placeholder="Enter full name...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Short Description</label>
	                    <textarea class="form-control" name="short_description" value="{{$products->short_description}}">{{$products->short_description}}</textarea>
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Long Description</label>
	                    <textarea class="form-control" name="long_description" value="{{$products->long_description}}">{{$products->long_description}}</textarea>
	                </div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Invoice No.</label>
	                    <input type="file" class="form-control" value="" name="image" placeholder="Enter full name...">
	                    <img class="img-fluid mt-2" src="{{asset($products->image)}}" width="10%">
	                </div>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection