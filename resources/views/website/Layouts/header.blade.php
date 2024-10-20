<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopDetails</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('css/homeSwipper.css')}}">
    <style>
        .cart-count {
    position: absolute;
    top: 23px; 
    right: 152px;
    background-color: red;
    color: white;
    border-radius: 50%;
    width: 20px; 
    height: 20px; 
    display: flex  !important;
    justify-content: center;
    align-items: center;
    font-size: 14px;
}
.quanti{
    margin-right:320px;
}
    </style>
</head>
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
        <div class=" lg:text-[24px]   text-[16px] flex gap-8 items-center">
            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
            <a href="{{route('cart.items')}}">
                <i class="fa-solid fa-basket-shopping" 
                style="color: #f7f7f8;"></i>
                @php
                $user = Auth::check();
                @endphp
                @if($user)
                <span class="cart-count" id="cartCount">{{isset($count) ? $count : '0'}}</span>
                @endif
            </a>
            <a href="{{url('/login')}}"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a>

        </div>
    </div>
    <div class="  flex justify-between mx-14 md:hidden mobile-container">


        <img class=" w-[60px] h-[60px] " src="Rectangle 1.png" alt="">
        <!-- <a href="#home" class="active">Logo</a> -->

        <div class=" flex mt-5     flex-col  ">

                
            <i id="menu" onclick="myFunctionh()" class="myLinkshc  fa-solid fa-bars  text-[26px]" style="color: #fcfcfc;"></i>
            
            <div class="hidden  myLinksh  flex-col  top-0">
                <i onclick="mymenu()" class="  fa-solid fa-xmark text-[26px]" style="color: #fcfcfc;"></i>
                <div class=" lg:text-[24px] text-white  text-[16px] flex flex-col gap-3">
                    <div class=" flex flex-col  gap-2">

                        <a href="Index.html">Home</a>
                        <a class="  underline decoration-[#9F7A47] font-[600] text"
                            href="shopIndex.html">Shop</a>
                        <a href="#about">About Us</a>
                        <a href="#Contact">Contact Us</a>
                    </div>
                    <div class=" flex gap-2 items-center">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        <i class="fa-solid fa-basket-shopping" style="color: #f7f7f8;"></i>
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</Header>