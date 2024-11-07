
@extends('shopkeeper.layouts.app')
@section('content')
    <div
        class="bg-gradient-to-b  text-white px- md:px-20 from-[#42342E] to-[#6A4E42] mx-auto  shadow-lg flex flex-col gap-5">
       
        <div class="bg-white text-black  mb-32 w-full rounded-[8px] p-1 lg:p-5">
            <div class=" text-[#44352F] text-[16px] font-[600] flex justify-between">
                <p>Product</p>
                <p class="ml-36 lg:ml-44"> Quantity</p>
                <p>Total Price</p>

            </div>
            <div class=" w-[98%] mx-auto border border-[#F6F1E5] mt-5">

            </div>
            @if(isset($cartProducts))
            @if(count($cartProducts) > 0 && Auth::check())
            @foreach($cartProducts as $index => $cart)
            <div class=" mt-5   flex justify-between ">
                <div class=" flex gap-1 lg:gap-3 ">
                    @php
                    $imagePathss = isset($cart->product->image)  ? $cart->product->image : 'assets/noImage (2).png';
                    @endphp
                    <img class=" w-[80px] lg:w-[150px] h-[150px]" src="{{$imagePathss}}" alt="">
                    <div class=" flex flex-col gap-3 ">
                        <p>{{$cart->name}}</p>
                        <div class="d-flex" style="display: flex;align-items:center">
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <div class="text-lg font-semibold">{{isset($cart->product->product_rating) ? $cart->product->product_rating : '4.5'}}</div>
                        </div>
                        {{-- <span>Pack sizes: <span>100g</span></span> --}}
                    </div>
                </div>
                <div>
                    
                    <div class="flex items-center gap-2" id="cart-item-{{ $index }}" data-item-id="{{ $cart->id }}">
                        <i class="fa-solid hover:cursor-pointer fa-caret-left decrease-btn" style="color: #9F6B00;" data-index="{{ $index }}"></i>
                        <input type="number" id="quantity-input-{{ $index }}" value="{{ $cart->product_quantity }}" min="1" style="width: 50px; text-align: center;">
                        <i class="fa-solid hover:cursor-pointer fa-caret-right increase-btn" style="color: #9F6B00;" data-index="{{ $index }}"></i>
                    </div>
                </div>
                <div class=" flex  items-start gap-1 lg:gap-8">
                    <p class="mt-2" id="total-price">{{$cart->total_price}}/-</p>
                    <div class=" bg-white flex  items-center justify-center shadow-lg w-[46px] h-[46px] rounded-full">
                        <i onclick="deleteItem('{{$cart->id}}','{{$cart->product->name}}')" class="mdi mdi-trash-can" style="color: #9F6B00;"></i>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center mt-3">Your cart is Empty</p>
            @endif
            @else
            <p class="text-center mt-3">Your cart is Empty</p>
            @endif
            <div class=" w-[98%] mx-auto border border-[#F6F1E5] mt-5">

            </div>
            @if(isset($cartProducts))
                @if(count($cartProducts) > 0 && Auth::check())
            <div class="  flex float-right flex-col gap-3">
                <div class=" flex float-right flex-col gap-3">
                    <div class=" text-[#44352F] text-[16px] flex gap-5">
                        <p class=" font-[400]">Subtotal:</p>
                        <p class=" font-[700]">Rs {{isset($subtotal) ? $subtotal : '' }}/-</p>
                    </div>
                    <div class=" text-[#44352F] text-[16px] flex gap-5">
                        <p class=" font-[400]">Gst (18%):</p>
                        <p class=" font-[700]">Rs {{isset($gst) ? $gst : ''}}/-</p>
                    </div>
                    <div class=" text-[#44352F] text-[16px] flex gap-5">
                        <p class=" font-[400]">Plateform Fee (2%):</p>
                        <p class=" font-[700]">Rs {{isset($plateformFee) ? $plateformFee : ''}}/-</p>
                    </div>
                    <div class=" text-[#44352F] text-[16px] flex gap-5">
                        <p class=" font-[400]">Shipping (5%):</p>
                        <p class=" font-[700]">Rs {{isset($shipping) ? $shipping : ''}}/-</p>
                    </div>
                    <div class=" text-[#44352F] text-[16px] flex gap-5">
                        <p class=" font-[400]">Total Price :</p>
                        <p class=" font-[700]">Rs {{isset($grandTotal) ? $grandTotal : '' }}/-</p>
                    </div>
                </div>
            </div>
            @endif
            @endif

            <div class=" flex md:flex-row gap-5 flex-col mt-60   items-center justify-between">
                <a class=" border border-[#9F6B00] flex gap-3 items-center justify-center rounded-md  w-[240px] h-[60px]"
                href="{{route('shop.index')}}">
                    <i class="fa-solid fa-arrow-left" style="color: #9F6B00;"></i>
                    <p>Continue Shopping</p>
                </a>
                @if(isset($cartProducts))
                @if(count($cartProducts) > 0 && Auth::check())
                <a href=""
                    class=" bg-[#FFC857] p-5  w-64  flex justify-between gap-10 rounded-[8px] items-center">
                    <h1 class=" text-black">Create Invoice</h1>
                    <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                </a>
                @endif
                @endif
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
    @endsection
   

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/shopkeeperCart.js')}}"></script>
<script>
    function deleteItem(proId,pName) {
        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to remove this product from the cart?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url      : "{{route('shopkeeper.cartItem.delete')}}",
                method   : "GET",
                dataType : "json",
                data     : {
                    "_token"   : "{{ csrf_token() }}",
                    prodId      : proId,
                        },
                success: function(response) {
                    if(response.status)
                    {
                      
                        Swal.fire({
                                title: 'Product Deleted',
                                text: 'Product Deleted Successfully',
                                icon: 'info',
                                confirmButtonText: 'OK',
                          }).then((result)=>{
                            if(result.isConfirmed)
                          {
                            window.location.href = response.route;
                          }
                          });
                    }else{
                            Swal.fire({
                                title: 'Not Found',
                                text: 'Item Not Found',
                                icon: 'error',
                                confirmButtonText: 'OK',
                          });
                }
            },
                error: function(xhr, request, status, errorsponse) {
                   console.log(xhr);
                }
            });
                // window.location.href = `/delete-route/${proId}`; 
            } else if (result.isDismissed) {
                Swal.fire({
                    title: 'Product Safe',
                    text: `Your ${pName} is safe in the cart.`,
                    icon: 'info',
                    confirmButtonText: 'Okay'
                });
            }
        });
    }
</script>
