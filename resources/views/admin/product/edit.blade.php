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
	                    <input type="text" class="form-control" name="name" value="{{$products->name}}"  placeholder="Enter full name...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Quentity</label>
	                    <input type="number" class="form-control" name="quantity" value="{{$products->packs_quantity}}"  placeholder="Enter Quentity...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Ingredient Quentity</label>
	                    <input type="number" class="form-control" name="ingredient_quantity" value="{{$products->pack_ingredient_quantity}}"  placeholder="Enter Ingredient Quentity...">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Raw Price</label>
						<input type="number" class="form-control" id="rawPrice" name="raw_price" min="0" max="450.50" onkeyup="calculateTotal();" value="{{$products->raw_price}}">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Packaging Price</label>
						<input type="number" class="form-control" id="packagingPrice" name="packaging_price" min="0" max="50.00" onkeyup="calculateTotal();" value="{{$products->packaging_price}}">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Original Price</label>
	                    <input type="number" class="form-control" id="originalPrice" name="original_price" value="{{$products->original_price}}"  placeholder="Enter full name..." min="0" max="500">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Retailer Price</label>
	                    <input type="number" class="form-control" name="retailer_price" value="{{$products->retailer_price}}" placeholder="Enter full name..." >
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Distributer Price</label>
	                    <input type="number" class="form-control" name="distributor_price" value="{{$products->distributer_price}}" >
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

@section('custom-script')
<script>
    function calculateTotal(input) {
        var rawPrice = parseFloat($('#rawPrice').val());
        var packagingPrice = parseFloat($('#packagingPrice').val());
        var originalPrice = rawPrice + packagingPrice;
        $('#originalPrice').val(originalPrice);
    }
</script>
@endsection