@extends('admin.layouts.app')

@section('content')
<div class="row card">
	<div class="col-md-12 card-body">
		@if(session('error'))
		    <div class="alert alert-danger">
		        {{ session('error') }}
		    </div>
		@endif
		@if(session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
		<div class="table-responsive">
	    <table class="table">
	        <tbody>
	            <tr>
	                <td><h3><strong>Product Name</strong></h3></td>
	                <td><h3>{{$products->invoice_id}}</h3></td>
	            </tr>
	            <tr>
	                <td><strong>Quantity :</strong></td>
	                <td>{{$products->quantity}}</td>
	            </tr>
	            <tr>
	                <td><strong>Origin Price :</strong></td>
	                <td>{{$products->original_price}}</td>
	            </tr>
	            <tr>
	                <td><strong>Selling Price :</strong></td>
	                <td>{{$products->selling_price}}</td>
	            </tr>
	            <tr>
	                <td><strong>Short Description :</strong></td>
	                <td>{{$products->short_description}}</td>
	            </tr>
	            <tr>
	                <td><strong>Long Description :</strong></td>
	                <td>{{$products->long_description}}</td>
	            </tr>
	            <tr>
	                <td><strong>Image :</strong></td>
	                <td>
	                	<img src="{{asset($products->image)}}" class="img-fluid" width="20%">
	                </td>
	            </tr>
	            
	        </tbody>
	    </table>
	</div>
	</div>
</div>
@endsection
