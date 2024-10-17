<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <script src="https://kit.fontawesome.com/5c118959dd.js" crossorigin="anonymous"></script>
</head>

<body>
    <Header class=" bg-gradient-to-b from-[#42342E] to-[#44352F]">
        <div
            class=" shadow-lg hidden md:flex justify-between items-center gap-2  lg:px-28 p-3 bg-gradient-to-b from-[#42342E] to-[#44352F]">
            <img class=" w-[60px] h-[60px]" src="{{asset('assets/grainImages/Rectangle 1.png')}}" alt="">
            <div class=" text-[12px] lg:text-[20px] font-[400] text-[#E5E5E5] flex gap-2 lg:gap-5 ">
                <a href="{{url('/')}}">Home</a>
                <a href="{{route('shop.index')}}" class=" text-white underline decoration-[#9F7A47] font-[600] text">Shop</a>
                <a>About us</a>
                <a>Contact us</a>

            </div>
            <div class=" lg:text-[24px] items-center   text-[16px] flex gap-8">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                <div class=" w-[40px] rounded-full h-[40px] bg-[#FFC857]  flex items-center justify-center">
                    <i class="fa-solid fa-basket-shopping text-[]" style="color: #000000;"></i>
                </div>

                <i class="fa-solid fa-user" style="color: #ffffff;"></i>

            </div>
        </div>
        <div class=" flex mx-14 justify-between  md:hidden mobile-container">


            <img class=" w-[60px] h-[60px] " src="Rectangle 1.png" alt="">
            <!-- <a href="#home" class="active">Logo</a> -->

            <div class=" flex mt-5     flex-col  ">

                    
                <i id="menu" onclick="myFunctionh()" class="myLinkshc  fa-solid fa-bars  text-[26px]" style="color: #fcfcfc;"></i>
                
                <div class="hidden  myLinksh  flex-col  top-0">
                    <i onclick="mymenu()" class="  fa-solid fa-xmark text-[26px]" style="color: #fcfcfc;"></i>
                    <div class=" lg:text-[24px] text-white  text-[16px] flex flex-col gap-3">
                        <div class=" flex flex-col  gap-2">

                            <a href="{{url('/')}}">Home</a>
                            <a class="  underline decoration-[#9F7A47] font-[600] text"
                                href="{{route('shop.index')}}">Shop</a>
                            <a href="#about">About Us</a>
                            <a href="#Contact">Contact Us</a>
                        </div>
                        <div class=" flex gap-2">
                            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                            <i class="fa-solid fa-basket-shopping" style="color: #f7f7f8;"></i>
                            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </Header>
    <div
        class="bg-gradient-to-b  text-white px- md:px-20 from-[#42342E] to-[#6A4E42] mx-auto  shadow-lg flex flex-col gap-5">
        <div class=" flex mt-10 gap-[30%] w-[95%] md:text-[20px] font-[700] ">
            <div class=" flex gap-2 items-center w-fit ">
                <a href="{{route('shop.index')}}"><i class="fa-solid fa-arrow-left float-left" style="color: #FFC857;"></i></a>
                <p class="inline">Shopping Cart</p>
            </div>
            <div class=" ">
                <p class=" text-center flex items-center ">Items in cart:<span class=" text-[#FFC857]">{{isset($cartImtemcount) ? $cartImtemcount : '0'}}</span></p>
            </div>

        </div>
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
                    $productImag = json_decode($cart->product->product_image_path, true);
                    $imagePathss = is_array($productImag) && !empty($productImag) ? reset($productImag) : 'assets/noImage (2).png';
                    @endphp
                    <img class=" w-[80px] lg:w-[150px] h-[150px]" src="{{$imagePathss}}" alt="">
                    <div class=" flex flex-col gap-3 ">
                        <p>{{$cart->product->product_name}}</p>
                        <div class="d-flex" style="display: flex;align-items:center">
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <div class="text-lg font-semibold">{{isset($cart->product->product_rating) ? $cart->product->product_rating : '4.5'}}</div>
                        </div>
                        <span>Pack sizes: <span>100g</span></span>
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
                        <i onclick="deleteItem('{{$cart->id}}','{{$cart->product->product_name}}')" class="fa-regular fa-trash-can" style="color: #9F6B00;"></i>
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
                <a href="{{route('checkout')}}"
                    class=" bg-[#FFC857] p-5  w-64  flex justify-between gap-10 rounded-[8px] items-center">
                    <h1 class=" text-black">Checkout</h1>
                    <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                </a>
                @endif
                @endif
            </div>

        </div>


    </div>
    <div class="bg-gradient-to-b  text-white p-10 from-[#42342E] to-[#44352F] ">
        <div class=" flex flex-col lg:flex-row  gap-10    lg:px-20  text-[16px] font-[400]">
            <div class=" flex gap-5 flex-col lg:flex-row   justify-between w-full ">
                <div class="flex flex-col px gap-5">
                    <img class=" w-[70px] h-[70px] lg:w-[130px] lg:h-[130px]" src="{{asset('assets/grainImages/Rectangle 1.png')}}" alt="">
                    <div class=" flex items-center gap-2">
                        <i class="fa-solid fa-phone" style="color: #fafafa;"></i>
                        <p>+00 1234567890</p>

                    </div>
                    <div class=" flex items-center gap-2">
                        <i class="fa-regular fa-envelope" style="color: #efeff1;"></i>
                        <p>Hindustangrains@mail.com</p>

                    </div>

                </div>
                <div class=" flex flex-col gap-1">
                    <p class=" text-[20px]">Quick Links</p>
                    <p>Home</p>
                    <p>Shop</p>
                    <p>About US</p>
                    <p>Contact US</p>
                </div>
                <div class=" flex flex-col gap-1">
                    <p class=" text-[20px]">Help</p>
                    <p>Terms of Services</p>
                    <p>Help & Support</p>
                    <p>Privacy Policies</p>
                    <p>My Account</p>
                </div>
                <div class=" flex flex-col gap-5">
                    <p class="text-[20px]">Subscribe to our newsletter</p>
                    <div class=" flex flex-col lg:flex-row  rounded-[8px] w-fit h-fit    ">
                        <input class=" p-2" type="text" placeholder="Enter your Email Id">
                        <button class=" bg-[#FFC857] p-2 lg:p-5   flex justify-between gap-3 lg:gap-10  items-center">
                            <h1 class=" text-black">Shop Now</h1>
                            <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                        </button>
                    </div>
                </div>
            </div>


        </div>

        @include('sweetalert::alert')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/cart.js')}}"></script>
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
                url      : "{{route('cartItem.delete')}}",
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
</html>