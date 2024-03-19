@extends('admin.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3  mt-3 card text-center">
    <div class="card-body">
      <h2>Promoter</h2>
      <h5 class="text-center">{{$user??0}}</h5>
    </div>
  </div>
<div class="col-md-3  mt-3 card text-center">
    <div class="card-body">
      <h2>Product</h2>
      <h5 class="text-center">{{$product??0}}</h5>
    </div>
  </div>
  <div class="col-md-3  mt-3 card text-center">
    <div class="card-body">
      <h2>Customer</h2>
      <h5 class="text-center">{{$customer??0}}</h5>
    </div>
  </div>
  <div class="col-md-3  mt-3 card text-center">
    <div class="card-body">
      <h2>Product Invoice</h2>
      <h5 class="text-center">{{$ProductInvoice??0}}</h5>
    </div>
  </div>
  <div class="col-md-4  mt-3 card text-center">
    <div class="card-body">
      <h2>Total Grant</h2>
      <h5 class="text-center">Rs{{$producttotalgrant??0}}</h5>
    </div>
  </div>
  <div class="col-md-6  mt-3 card text-center">
    <div class="card-body">
      <h2>Total Receive Payment</h2>
      <h5 class="text-center">Rs{{$paymentstatus??0}}</h5>
    </div>
  </div>
</div>  
@endsection
