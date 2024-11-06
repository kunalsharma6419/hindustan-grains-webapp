@extends('shopkeeper.layouts.app')
@section('content')
<div class="row flex-grow">
  @if(count($products) > 0 && !empty($products) && Auth::check() && isset($products))
@foreach($products as $item)
    <div class="col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body card-rounded">
            <h4 class="card-title  card-title-dash"><strong>{{$item->name}}</strong></h4>
            <div class="list align-items-center border-bottom py-2">
                <div class="wrapper w-100">
                    @php
                    $imagePath = isset($item->image) ? asset($item->image) : asset('assets/noImage (2).png');
                    $imageExists = isset($item->image) && File::exists(public_path($item->image));
                @endphp
                 <img src="{{$imageExists ? $imagePath: asset('assets/noImage (2).png')}}" alt="">
                </div>
              </div>
            <div class="list align-items-center border-bottom py-2">
              <div class="wrapper w-100">
                <h4 class="mb-2 font-weight-medium" style="font-family: Arial, Helvetica, sans-serif;">
                   
                    <strong> Product Detail</strong>
                </h4>
              </div>
            </div>
            <div class="list align-items-center border-bottom py-2">
              <div class="wrapper w-100">
                <p class="mb-2 font-weight-medium" style="font-family: Arial, Helvetica, sans-serif;">
         <strong>{{$item->short_description}}</strong>
                </p> 
              </div>
            </div>
            <div class="list align-items-center border-bottom py-2">
              <div class="wrapper w-100">
                <p class="mb-2 font-weight-medium" style="font-family: Arial, Helvetica, sans-serif;">
             <strong>{{$item->long_description}}</strong> 
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="mdi mdi-cash text-muted me-1"></i>
                    <p class="mb-0 text-small text-muted"><strong>{{$item->retailer_price}}</strong></p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="list align-items-center pt-3">
              <div class="wrapper w-100">
                <p class="mb-0">
                  <a href="{{route('shopkeeper.cart.products',$item->id)}}" class="fw-bold text-primary">Add To Cart <i class="mdi mdi-cart ms-2"></i></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
  @endif
  </div>
  @endsection