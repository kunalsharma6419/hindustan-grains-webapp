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
    <div class="flex flex-col h-full  gap-2 bg-gradient-to-b from-[#42342E] to-[#6A4E42]">
        <div class=" w-full mx-auto px-4 sm:px-6 lg:px-8">

            <!-- 1st card  -->
            <div class=" mt-10  flex flex-col lg:flex-row bg-white md:p-10 p-2 rounded--[8px]  gap-8">
                <div class=" flex   gap-10">
                    <div class="flex flex-col">
                    @php
                    $productImages = json_decode($product->product_image_path, true);
                    $imagePathss = is_array($productImages) && !empty($productImages) ? $productImages : ['assets/noImage (2).png'];
                    @endphp
                    @if(count($imagePathss) > 0)
                    @foreach($imagePathss as $img)
                        <img src="{{$img}}" alt="Product Image" class=" w-[100px] h-[100px]">
                    @endforeach
                    @else
                    <img src="{{asset('assets/noImage (2).png')}}" alt="No image" class=" w-[100px] h-[100px]">
                    @endif
                </div>
                    <div class=" flex flex-col justify-between">
                     @php
                    $productImages = json_decode($product->product_image_path, true);
                    $imagePaths = is_array($productImages) && !empty($productImages) ? reset($productImages) : 'assets/noImage (2).png';
                  @endphp
                        <img src="{{asset($imagePaths)}}" alt="{{$product->product_name}}" class="w-[360px] h-[360px]" width="256"
                            height="256" style="aspect-ratio: 256 / 256; object-fit: cover;" />
                       
                    
                    </div>

                </div>
                <div class="space-y-6">
                    <h1 class="text-2xl font-bold">{{$product->product_name}}</h1>
                    <div class="flex items-center space-x-2">

                        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                        <div class="text-lg font-semibold">{{isset($product->product_rating) ? $product->product_rating : '4.5'}}</div>
                    </div>
                    <p class="text-sm">{{$product->short_description}}</p>

                    @php
                    $qualityImages = json_decode($product->quality_image_path, true);
                    $imagePathsss = is_array($qualityImages) && !empty($qualityImages) ? $qualityImages : ['assets/noImage (2).png'];
                  @endphp
                    <div class=" flex gap-2">
                           
                  @if(count($imagePathsss) > 0)
                  @foreach($imagePathsss as $img)
                        <img src="{{asset($img)}}" alt="">
                    @endforeach
                    @endif
                    </div>
                    <div>
                        <div class="text-lg text-[#9F6B00] font-semibold">Rs {{$product->selling_price}}/-</div>
                        <div class="text-sm">Inclusive taxes</div>
                    </div>
                    <div class="flex gap-3 justify-center items-center quanti" >
                        <p class="text-[#4E4E4E]"> Quantity </p>
                       
                        <div class="flex items-center gap-2">
                            <i id="btn" class="fa-solid hover:cursor-pointer fa-caret-left" style="color: #9F6B00;"></i>
                            <input id="display" type="number" value="1" min="1" style="width: 50px; text-align: center;">
                            <i class="fa-solid hover:cursor-pointer fa-caret-right" id="btnp" style="color: #9F6B00;"></i>
                        </div>
                        
                    </div>
                 
                    @php
                    $user = Auth::check();
                    @endphp
                    @if($user)
                     <input type="hidden" id="logged" value="true" />
                    <button onclick="addToCart('{{$product->id}}','{{$product->selling_price}}')"
                        class=" bg-[#FFC857] p-5 w-full  md:w-64 mb-28 flex justify-between gap-10 rounded-[8px] items-center">
                        <h1 class=" text-black">Add to cart</h1>
                        <a href="cart.html"><i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i></a>
                    </button>
                    @else
                    <input type="hidden" id="logged" value="true" />
                    <button onclick="showAlert()"
                        class=" bg-[#FFC857] p-5 w-full  md:w-64 mb-28 flex justify-between gap-10 rounded-[8px] items-center">
                        <h1 class=" text-black">Add to cart</h1>
                        <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                </button>
                    @endif
                </div>

            </div>
            <div class=" mt-20">
                <strong><p class=" text-white text-center text-[20px]">Product Description</p></strong>
                <div class=" flex flex-col md:flex-row gap-10 mt-16 rounded-md ">
                    <div class="lg:w-[25%] md:w-[30%] w-full">
                        <div class=" p-5  bg-white flex  flex-col gap-3">
                            <div class=" flex gap-3 ">
                                <img class=" w-[150px] h-[150px]" src="{{asset($imagePaths)}}" alt="{{$product->product_name}}">
                                <div class=" flex mt-16  items-start flex-col gap-4">
                                    <div class=" flex gap-1 items-center">
                                        <i class="fa-solid fa-star  text-[16px]" style="color: #FFD43B;"></i>
                                        <p class=" text-[#EEA50F] text-[20px]">{{isset($product->product_rating) ? $product->product_rating : 'NA'}}/5</p>

                                    </div>
                                    <div class=" items-center flex gap-2 ">
                                        <i class="fa-solid fa-message text-[12px]" style="color: #989898;"></i>
                                        <p>37 Reviews</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-col gap-4">
                                <div class=" flex gap-3">
                                    <i class="fa-solid fa-star  text-[16px]" style="color: #FFD43B;"></i>
                                    <p>5</p>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                        <div class="bg-[#00A341] text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                            style="width: 45%">3021</div>
                                    </div>
                                </div>
                                <div class=" flex gap-3">
                                    <i class="fa-solid fa-star  text-[16px]" style="color: #FFD43B;"></i>
                                    <p>4</p>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                        <div class="bg-[#00A341] text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                            style="width: 65%">5392</div>
                                    </div>
                                </div>
                                <div class=" flex gap-3">
                                    <i class="fa-solid fa-star  text-[16px]" style="color: #FFD43B;"></i>
                                    <p>3</p>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                        <div class="bg-[#FFD600] text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                            style="width: 40%">1002</div>
                                    </div>
                                </div>
                                <div class=" flex gap-3">
                                    <i class="fa-solid fa-star  text-[16px]" style="color: #FFD43B;"></i>
                                    <p>2</p>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                        <div class="bg-[#FF9900] text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                            style="width: 30%">422</div>
                                    </div>
                                </div>
                                <div class=" flex gap-3">
                                    <i class="fa-solid fa-star  text-[16px]" style="color: #FFD43B;"></i>
                                    <p>1</p>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                        <div class="bg-[#FF3D00] text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                            style="width: 20%">88</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class=" lg:w-[75%] md:w-[70%] w-full">
                        <div class="col-span-2">
                            <div class=" bg-white space-y-4">
                                <div class=" p-4 rounded-md">
                                    {!! $product->long_description !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <p class=" text-[24px] text-center mt-32 font-[700] text-white">Shop our {{$product->category->category_name}}</p>
            <div class="boy mb-20 mt-32 ">
                <div class="swiper-container   text-black">
                    <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%] ">
                        <div class="swiper-wrapper ">
                            @if(count($similarProducts) > 0)
                            @foreach($similarProducts as $pro)
                            <div class="swiper-slide h-[550px] ">
                                <div
                                @php
                                $productImages = json_decode($pro->product_image_path, true);
                                $proImagePaths = is_array($productImages) && !empty($productImages) ? reset($productImages) : 'assets/noImage (2).png';
                              @endphp
                                    class=" px-5 py-2 rounded-[8px]  h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]">
                                    <img class="  w-[240px] h-[200px]" src="{{asset($proImagePaths)}}" alt="">
                                    <h1 class=" lg:text-[24px]  lg:text-[16px] text-[12px]font-[700]">{{$pro->product_name}}</h1>
                                    <p class=" text-center">{{$pro->short_description}}

                                    </p>
                                    <div class=" flex w-full justify-between items-center">
                                        <p class=" text-[20px] font-[700] text-[#B48629]">Rs {{$pro->selling_price}}/-</p>
                                        <div class="flex gap-2 items-center">
                                            <i class="fa-solid fa-star w-[18px] h-[18px]" style="color: #FFC857"></i>
                                            <p class="text-[10px]">{{isset($product->product_rating) ? $product->product_rating : '4.5'}}</p>
                                        </div>
                                    </div>
                                    @php
                                    $id = $pro->id;
                                    $encodedId = base64_encode($id)
                                    @endphp
                                    <a href="{{ route('shop.webProduct', $encodedId) }}"
                                        class=" bg-[#FFC857] lg:p-5 p-2  w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center">
                                        <h1 class=" text-black">Shop Now</h1>
                                        <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="  swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>

            </div>
        </div>
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
            @include('sweetalert::alert')
        </div>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <script>
         const display = document.getElementById('display');
        const btnDecrease = document.getElementById('btn');
        const btnIncrease = document.getElementById('btnp');

        btnDecrease.addEventListener('click', () => {
            let value = parseInt(display.value);
            if (value > 1) {
                display.value = value - 1;
            }
        });
        btnIncrease.addEventListener('click', () => {
            let value = parseInt(display.value);
            display.value = value + 1;
        });

        display.addEventListener('blur', () => {
            if (parseInt(display.value) < 1) {
                display.value = 1;
            }
        });
     </script>
     <script>
        function showAlert()
        {
            Swal.fire({
                        title: 'Login',
                        text: 'Hey User Please make Login',
                        icon: 'info',
                        confirmButtonText: 'OK',
                    }).then((result)=>{
                    if(result.isConfirmed)
                    {
                    window.location.href = "{{route('login')}}";
                    }
                    });
        }
     </script>
    <script>   
       $(document).ready(function(){
        var value = $("#logged").val();
        if(value == "true")
            {
                addToCart();
            }  
       });
        function addToCart(id,price)
        {
            var quan =  $("#display").val();
            $.ajax({
                url: "{{route('product.cart')}}",
                method: "GET",
                dataType: "json",
                data: {
                    "_token"   : "{{ csrf_token() }}",
                    proId      : id,
                    pprice     : price,   
                    quant      : quan
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
                   
                }
            });
        }
    </script>
   
    <!-- for swipper  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
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
        var swiper = new Swiper('.mySwiper', {
            slidesPerView: 3,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    </script>


</body>


</html>