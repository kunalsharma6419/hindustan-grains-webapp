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
                    <i class="mdi mdi-currency-inr"></i>
                    <p class="mb-0 text-small text-muted"><strong>{{$item->retailer_price}}</strong></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="list align-items-center pt-3">
              <div class="wrapper w-100">
                <p class="mb-0">
                  {{-- href="{{ route('shopkeeper.cart.products', $item->id) }}" --}}
                  <button onclick="addToCart('{{$item->id}}','{{$item->retailer_price}}')"  class="btn btn-primary">
                    Add To Cart <i class="mdi mdi-cart ms-2"></i>
                  </button>
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
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $(document).ready(function()
    {
      addToCart();
    });
     function addToCart(id,price)
        {
            // var quan =  $("#display").val();
            $.ajax({
                url: "{{route('shopkeeper.cart')}}",
                method: "GET",
                dataType: "json",
                data: {
                    "_token"   : "{{ csrf_token() }}",
                    proId      : id,
                    pprice     : price,   
                    // quant      : quan
                },
                success: function(response) {
                    if(response.status)
                    {
                        if(response.count > 0)
                        {
                            $("#cartCount").css("display","block");
                            $("#cartCount").html(response.count);
                           
                        }else{
                            $("#cartCount").css("display","none");
                        }
                        if(response.existedproduct)
                        {
                            Swal.fire({
                                title: 'Product Exists',
                                text: 'The product you are trying to add already exists in your cart.',
                                icon: 'info',
                                confirmButtonText: 'OK',
                          });
                        }
                        if(response.productAdded)
                        {
                            Swal.fire({
                                title: 'Product Added',
                                text: 'Product Added Successfully',
                                icon: 'info',
                                confirmButtonText: 'OK',
                          });
                        }
                    }
                },
                error: function(xhr, request, status, errorsponse) {
                   alert("Something went wrong!!");
                }
            });
        }
  </script>