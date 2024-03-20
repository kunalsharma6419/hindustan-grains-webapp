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
		<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Product Name</label>
	                    <input type="text" class="form-control" name="name">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Quentity</label>
	                    <input type="number" class="form-control" name="quantity">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Ingrendient Quentity</label>
	                    <input type="number" class="form-control" name="ingredient_quantity">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Original Price</label>
	                    <input type="number" class="form-control" name="original_price">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Retailer Price</label>
	                    <input type="number" class="form-control" name="retailer_price">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Distributor Price</label>
	                    <input type="number" class="form-control" name="distributor_price">
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Short Description</label>
	                    <textarea class="form-control" name="short_description"></textarea>
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Long Description</label>
	                    <textarea class="form-control" name="long_description"></textarea>
	                </div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Invoice No.</label>
	                    <input type="file" class="form-control" name="image">
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