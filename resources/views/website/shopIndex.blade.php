<!DOCTYPE html>
<html>

<head>
    <style>

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- <link rel="stylesheet" href="toggle.css"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
</head>

<body class="text-white ">
    <div class="flex flex-col">
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
                <div class=" lg:text-[24px]   text-[16px] flex gap-8">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                    <i class="fa-solid fa-basket-shopping" style="color: #f7f7f8;"></i>
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>

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
        <div class="bg-gradient-to-b from-[#42342E] to-[#6A4E42] shadow-lg flex flex-col gap-5">
            <div class=" m-2 lg:m-10 flex lg:flex-row flex-col gap-5">
                <p onclick="myFunction()" id="fil"
                    class="ml-10 text-white underline decoration-[#9F7A47] text-[16px] font-[700]">Filters</p>
                <div id="panel" class="hidden gap-5  ">
                    <div class=" flex  gap-5 ">
                        <div class="flex relative">
                            <div class="flex ml-10 items-center w-full gap-14 justify-between">
                                {{-- <p>Category</p> --}}
                                {{-- <i onclick="myFun()" class="fa-solid fa-angle-down" style="color: #ffffff;"></i> --}}
                                <form action="{{url('shop-index')}}" method="POST" >
                                    @csrf
                                <select name="category_id" id="category_id" style="color: #ffffff; background-color: #43332d;cursor:pointer;">
                                    <option value="">Select Category</option>
                                    @if(count($categories) > 0)
                                    @foreach($categories as $cate)
                                    <option  value="{{$cate->id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                         
                        </div>
                        <div class=" relative flex">
                            <div class="flex  items-center ml-10 gap-14">
                                <select name="sort" id="sort" style="color: #ffffff; background-color: #43332d;cursor:pointer" onchange="getFileterd(this)">
                                    <option value="">Sort By</option>
                                    <option value="low" style="cursor:pointer;">Price low to high</option>
                                    <option value="high" style="cursor: pointer;">Price high to low</option>
                                </select>
                                {{-- <p>Sort by</p>
                                <i onclick="myFuns()" class="fa-solid fa-angle-down" style="color: #ffffff;"></i> --}}
                            </div>
                            
                            <button id="hitForm" type="submit"></button>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
            <div class=" mt-10 text-black lg:ml-[70px] lg:mr-[70px]  flex flex-col mx-auto lg:flex-row gap-32 lg:gap-5 mx-auto lg:flex-row justify-between" style="flex-wrap: wrap !important;">
                @if(count($products) > 0)
                @foreach($products as $pro)
                <div
                    class=" px-5 py-2 rounded-[8px]  h-[360px] relative mx-auto w-[250px] md: mx-auto w-[250px] md:w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]" style="margin-top: 6rem;">
                    @php
                    $productImages = json_decode($pro->product_image_path, true);
                    $imagePathss = is_array($productImages) && !empty($productImages) ? reset($productImages) : 'assets/noImage (2).png';
                  @endphp
                    <img class="  w-[240px] h-[200px]" src="{{asset($imagePathss)}}" alt="">
                    <h1 class=" lg:text-[24px]  lg:text-[16px] text-[12px]font-[700]">{{$pro->product_name}}</h1>
                    <p class=" text-center">
                        {{$pro->short_description}}
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
                @endforeach
                @endif
                {{-- {!! $products->links() !!} --}}
            </div>
            
            <div class=" mx-auto my-5 flex flex-col gap-2">
                <div class="  flex gap-5">
                    <div class=" bg-[#FFF1DC] rounded-full  w-[50px] h-[50px] flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left" style="color: #9F6B00;"></i>

                    </div>
                    <div class="bg-[#FFF1DC] rounded-full  w-[50px] h-[50px] flex items-center justify-center">
                        <i class="fa-solid fa-arrow-right" style="color: #9F6B00;"></i>

                    </div>
                </div>
                <span class=" text-[14px] text-center font-[700]">1<span class=" text-[#E9E9E9]">/5</span></span>

            </div>
        </div>
        <div class="bg-gradient-to-b  p-10 from-[#42342E] to-[#44352F] ">
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
                            <button
                                class=" bg-[#FFC857] p-2 lg:p-5   flex justify-between gap-3 lg:gap-10  items-center">
                                <h1 class=" text-black">Shop Now</h1>
                                <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                            </button>
                        </div>
                    </div>
                </div>
               

            </div>


        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script>
        function getFileterd(sortValue)
        {
            $("#hitForm").click();
        }
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <script src="scripts.js"></script>
    <script>
        function myFunction() {
            var panel = document.getElementById("panel");



            panel.style.display = (panel.style.display === "none" || panel.style.display === "") ? "flex" : "none";
            // document.getElementById("fil").onclick = function(){
            //     document.getElementById("fil").style.color='yellow';
            // }

        }
        function myFun() {
            var cat = document.getElementById("cat");
            cat.style.display = (cat.style.display === "none" || cat.style.display === "") ? "flex" : "none";
        }
        function myFuns() {
            var sort = document.getElementById("sort");
            sort.style.display = (sort.style.display === "none" || sort.style.display === "") ? "flex" : "none";
        }
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