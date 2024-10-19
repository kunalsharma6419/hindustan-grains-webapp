<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <p>Home</p>
                <p class=" text-white underline decoration-[#9F7A47] font-[600] text">Shop</p>
                <p>About us</p>
                <p>Contact us</p>

            </div>
            <div class=" lg:text-[24px] items-center   text-[16px] flex gap-8">
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                <div class=" w-[40px] rounded-full h-[40px] bg-[#FFC857]  flex items-center justify-center">
                    <i class="fa-solid fa-basket-shopping text-[]" style="color: #000000;"></i>
                </div>

                <i class="fa-solid fa-user" style="color: #ffffff;"></i>

            </div>
        </div>
        <div class=" flex justify-between mx-14 md:hidden mobile-container">


            <img class=" w-[60px] h-[60px] " src="Rectangle 1.png" alt="">
            <!-- <a href="#home" class="active">Logo</a> -->

            <div class=" flex mt-5     flex-col  ">

                    
                <i id="menu" onclick="myFunctionh()" class="myLinkshc  fa-solid fa-bars  text-[26px]" style="color: #fcfcfc;"></i>
                
                <div class="hidden  myLinksh  flex-col  top-0">
                    <i onclick="mymenu()" class="  fa-solid fa-xmark text-[26px]" style="color: #fcfcfc;"></i>
                    <div class=" lg:text-[24px] text-white  text-[16px] flex flex-col gap-3">
                        <div class=" flex flex-col  gap-2">

                            <a href="{{'/'}}">Home</a>
                            <a class=" underline decoration-[#9F7A47] font-[600] text"
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
        class="bg-gradient-to-b text-white px- md:px-20 from-[#42342E] to-[#6A4E42] mx-auto  shadow-lg flex flex-col gap-5">
        <div class=" flex mt-10 gap-[40%] md:text-[20px] font-[700] ">
            <div class=" flex gap-2 items-center w-fit ">
                <a href="{{route('shop.index')}}"><i class="fa-solid fa-arrow-left float-left" style="color: #FFC857;"></i></a>

            </div>
            <div class=" flex gap-2 items-center text-[20px]">
                <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i>
                <p class=" text-center flex items-center ">Order Placed</p>
            </div>
        </div>
        <div class="flex lg:flex-row flex-col gap-6 mt-6 mx-auto text-black">
            <div class=" lg:w-[624px] bg-white rounded-lg lg:p-5 p-2">
                @if(Auth::check() && isset($products))
                @if(count($products) > 0)
                @foreach($products as $prod)
                <div class="flex space-x-4 items-start">
                    @php
                    $productImages = json_decode($prod->product->product_image_path, true);
                    $imagePathss = is_array($productImages) && !empty($productImages) ? reset($productImages) : 'assets/noImage (2).png';
                  @endphp
                    <img class=" w-[80px] lg:w-[150px] h-[150px]" src="{{asset($imagePathss)}}" alt="">
                    <div class="flex flex-col justify-between">
                        <h3 class="text-lg font-medium">{{$prod->product->product_name}}</h3>
                        <p>Quantity: {{$prod->product_quantity}}</p>
                        {{-- <p>Pack size: 100g</p> --}}
                        <p>Delivery by: 10 Feb, 2024</p>
                        <p>Price: Rs {{$prod->product_price}}/-</p>
                    </div>
                </div>
                @endforeach
                @endif
                @endif
                {{-- <div class="flex space-x-4 items-start">
                    <img class=" w-[80px] lg:w-[150px] h-[150px]" src="Rectangle 10 (5).png" alt="">
                    <div class="flex flex-col justify-between">
                        <h3 class="text-lg font-medium">Jeera Cumin</h3>
                        <p>Quantity: 1</p>
                        <p>Pack size: 100g</p>
                        <p>Delivery by: 10 Feb, 2024</p>
                        <p>Price: Rs 100/-</p>
                    </div>
                </div> --}}
                <div class="flex justify-between items-center border-t pt-4">
                    <p class=" text-[16px] font-[400]">Mode of payment:<span class="font-[500]">
                        @if(isset($orders) && $orders->payment_mode == 2)
                            Cash on Delivery
                        @else
                        Online-Upi payment
                        @endif
                        </span> </p>
                    <div class=" flex flex-col gap-2 space-x-2">
                        <p class=" text-[16px] font-[400]">Total Amount:<span class="font-[600]">Rs {{isset($orders) ? $orders->total_price : '0'}}/-</span> </p>
                        <div class=" flex items-center gap-2">
                            <div class=" flex items-center justify-center w-[22px] h-[22px] rounded-full shadow-lg">
                                <i class="fa-solid fa-check text-[16px]" style="color: #1c9f29;"></i>
                            </div>
                            @if(isset($orders) && $orders->payment_mode == 2)
                            <p class=" text-[16px] font-[400]">Cash on Delivery</p> 
                            @else
                            <p class=" text-[16px] font-[400]">Paid</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:w-[554px] h-fit bg-white p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-2">Shipping address</h3>
                <p>{{isset($orders) ? $orders->name : 'NA'}}</p>
                <p>{{isset($orders) ? $orders->address : 'NA'}} - {{isset($orders) ? $orders->pincode : 'NA'}}</p>
                <p>{{isset($orders) ? $orders->phone : 'NA'}}</p>
                <p>{{isset($orders) ? $orders->email : 'NA'}}</p>
            </div>
        </div>
        <a class=" border bg-white text-black mb-14 border-[#9F6B00] flex gap-3 items-center justify-center rounded-md  w-[240px] h-[60px]"
            href="s{{route('shop.index')}}">
            <i class="fa-solid fa-arrow-left" style="color: #9F6B00;"></i>
            <p>Continue Shopping</p>
        </a>
    </div>

    
    
    <div class="bg-gradient-to-b  text-white p-10 from-[#42342E] to-[#44352F] ">
        <div class=" flex flex-col md:flex-row  gap-10    lg:px-20  text-[16px] font-[400]">
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


    </div>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
       <script>
        $(document).ready(function(){
            Swal.fire({
                title: 'Order Placed',
                text: 'Order Placed successfully',
                icon: 'info',
                confirmButtonText: 'OK',
            }).then((result)=>{
            if(result.isConfirmed)
            {
                
            }
            });
        })  
        </script>

    <script>
        function myFunctionh() {
            var myLinksh = document.querySelector(".myLinksh");
            myLinksh.style.display = (myLinksh.style.display === "none" || myLinksh.style.display === "") ? "flex" : "none";
            var myLinkshc = document.querySelector(".myLinkshc");
            myLinkshc.style.display = (myLinkshc.style.display === "block" || myLinkshc.style.display === "") ? "none" : "block";
            
        }
        function mymenu(){
            var menu = document.getElementById("menu");
            menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
            var myLinksh = document.querySelector(".myLinksh");
            myLinksh.style.display = (myLinksh.style.display === "none" || myLinksh.style.display === "") ? "flex" : "none";
        }
    </script>
</body>

</html>