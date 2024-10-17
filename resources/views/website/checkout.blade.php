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

    <div class="">
        <Header class=" bg-gradient-to-b from-[#42342E] to-[#44352F]">
            <div
                class=" shadow-lg hidden md:flex justify-between items-center gap-2  lg:px-28 p-3 bg-gradient-to-b from-[#42342E] to-[#44352F]">
                <img class=" w-[60px] h-[60px]" src="{{asset('assets/grainImages/Rectangle 1.png')}}" alt="">
                <div class=" text-[12px] lg:text-[20px] font-[400] text-[#E5E5E5] flex gap-2 lg:gap-5 ">
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{route('shop.index')}}" class=" text-white underline decoration-[#9F7A47] font-[600] text">Shop</a>
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
            <div class=" flex justify-between mx-14  md:hidden mobile-container">


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
        <!-- <main class="w-full  px- md:px-20 bg-gradient-to-b  from-[#42342E] to-[#6A4E42]  mx-auto px-4 py-8"> -->
        <!-- <div class="flex mt-32 flex-col lg:flex-row gap-8"></div> -->
        <main class="w-full px-4  md:px-8 bg-gradient-to-b from-[#42342E] to-[#6A4E42] mx-auto py-8">
            <div class="flex flex-col md:flex-row gap-8 mt-10  md:w-4/5 mx-auto">
                <div class="lg:w-2/3">
     
                    <div class="flex items-center mb-6 gap-2">
                        <a href="{{route('cart.items')}}"> <i class="fa-solid fa-arrow-left float-left"
                                style="color: #FFC857;"></i></a>
                        <h1 class="text-2xl text-white font-semibold">Checkout</h1>
                    </div>
                    <form action="{{route('place.order')}}" method="POST">
                        @csrf
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Shipping Address</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4"><input
                                class="flex h-10 w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Full Name" name="name" required value="{{isset($user->name) ? $user->name : ''}}"><input
                                class="flex h-10 w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Mobile Number" name="phone" pattern="[5-9]{1}[0-9]{9}"  required value="{{isset($user->phone) ? $user->phone : ''}}"><input
                                class="flex h-10 w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Email" type="email" name="email" value="{{isset($user->email) ? $user->email : ''}}"></div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4" required><input
                                class="flex h-10 w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="Pincode" name="pincode" value="" required><input
                                class="flex h-10 w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="City" name="city"  value="" required><input
                                class="flex h-10 w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                placeholder="State" name="state" value="" required></div><textarea
                            class="flex min-h-[80px] w-full rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="Address" name="address" required>{{isset($user->address) ? $user->address : ''}}</textarea>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                        <h2 class="text-xl font-semibold mb-4">Payment Method</h2>
                        {{-- <div class=" flex flex-col gap-3">
                            <button type="button" role="combobox" aria-controls="radix-:r1e:" aria-expanded="false"
                                aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                                class="flex h-10 w-full items-center justify-between rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm "
                                id="payment-upi">
                                <div class=" flex items-center gap-3">
                                    <i class="fa-solid fa-mobile-screen" style="color: #2D2D2D;"></i>
                                    <span style="pointer-events: none;">UPI</span>
                                </div>
                                <i id="p1" onclick="myfun()" class="fa-solid fa-angle-down" style="color: #000000;"></i>
                                <!-- <svg onclick="myfun()" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 opacity-50"
                                    aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg> -->

                            </button>
                            <div id="drop" class=" ml-5 mt-2 hidden flex flex-col gap-5">
                                <div class="  flex gap-3">
                                    <img class=" w-[17px] h-[17px]" src="image 74.png" alt="">
                                    <p>Google Pay</p>
                                </div>
                                <div class=" flex gap-3">
                                    <img class=" w-[17px] h-[17px]" src="image 75.png" alt="">
                                    <p>Phone pe</p>
                                </div>
                                <div class=" flex gap-3">
                                    <i class="fa-solid fa-mobile-screen" style="color: #2D2D2D;"></i>
                                    <p>Other UPI</p>
                                </div>
                            </div>

                            <button type="button" role="combobox" aria-controls="radix-:r1f:" aria-expanded="false"
                                aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                                class="flex h-10 w-full items-center justify-between rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm "
                                id="payment-card">
                                <div class=" flex items-center gap-3">
                                    <i class="fa-regular fa-credit-card" style="color: #2D2D2D;"></i>
                                    <span style="pointer-events: none;">Credit/Debit Card</span>
                                </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-4 w-4 opacity-50" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </button>
                            <button type="button" role="combobox" aria-controls="radix-:r1g:" aria-expanded="false"
                                aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                                class="flex h-10 w-full items-center justify-between rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm "
                                id="payment-netbanking">
                                <div class=" flex items-center gap-3">
                                    <i class="fa-solid fa-building-columns" style="color: #2D2D2D;"></i>
                                    <span style="pointer-events: none;">Net Banking</span>
                                </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-4 w-4 opacity-50" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </button>
                            <button type="button" role="combobox" aria-controls="radix-:r1h:" aria-expanded="false"
                                aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder=""
                                class="flex h-10 w-full items-center justify-between rounded-md border border-[#9F6B00] bg-background px-3 py-2 text-sm "
                                id="payment-cod">
                                <div class=" flex items-center gap-3">
                                    <i class="fa-solid fa-money-bill" style="color: #2D2D2D;"></i>
                                    <span style="pointer-events: none;">Cash on Delivery</span>
                                </div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-4 w-4 opacity-50" aria-hidden="true">
                                    <path d="m6 9 6 6 6-6"></path>
                                </svg>
                            </button>
                        </div> --}}
                        <div class="flex items-center mb-4">
                            <input id="default-radio-1" type="radio" value="1" name="default_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Online Payment</label>
                        </div>
                        <div class="flex items-center">
                            <input checked id="default-radio-2" type="radio" value="2" name="default_radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash on Delivery</label>
                        </div>
                    </div>
                </div>
                <button type="submit" id="hitForm" style="display: none;"></button>
            </form>
                           {{-- start --}}
                    
                           <div class="lg:w-1/3 mt-14">
                            <div class="bg-white p-6 rounded-lg shadow-md">
                               
                           
    <div class="relative overflow-x-auto" style="border-radius: 5px;">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                </tr>
            </thead>
            <tbody >
                @if(isset($cartProducts))
                @if(count($cartProducts) > 0 && Auth::check())
                @foreach($cartProducts as $cart)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @php
                    $productImag = json_decode($cart->product->product_image_path, true);
                    $imagePathss = is_array($productImag) && !empty($productImag) ? reset($productImag) : 'assets/noImage (2).png';
                    @endphp
                    <td class="px-6 py-4">
                        <img class=" w-[80px] lg:w-[50px] h-[50px]" src="{{$imagePathss}}" alt="">
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cart->product->product_name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$cart->product->selling_price}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cart->product_quantity}}
                    </td>
                </tr>
                @endforeach
                @endif
                @endif
            </tbody>
        </table>
        <br>
    </div>
  
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md mt-3">
        <h2 class="text-xl font-semibold mb-4">Order Details</h2>
        <div class="flex justify-between mb-2"><span>Subtotal</span><span>Rs {{isset($subtotal) ? $subtotal : '0' }}/-</span></div>
        <div class="flex justify-between mb-2"><span>Gst (18%):</span><span>Rs {{isset($gst) ? $gst : '0'}}/-</span></div>
        <div class="flex justify-between mb-2"><span>Plateform Fee (2%):</span><span>Rs {{isset($plateformFee) ? $plateformFee : '0'}}/-</span></div>
        <div class="flex justify-between mb-2"><span>Shipping (5%):</span><span>Rs {{isset($shipping) ? $shipping : '0'}}/-</span></div>
        <div class="flex justify-between mb-6"><span class="font-semibold">Total Payable
                Amount</span><span class="font-semibold">Rs {{isset($grandTotal) ? $grandTotal : '0' }}/-</span></div>
                @if(isset($cartProducts))
                @if(count($cartProducts) > 0 && Auth::check())
        <button onclick="submitForm()" class=" bg-[#FFC857] p-5  w-full  flex justify-between gap-10 rounded-[8px] items-center">
            <h1 class=" text-black">Place Order</h1>
            <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
        </button>
        @endif
        @endif
    </div>
    </div>
    {{-- @include('sweetalert::alert') --}}
   

            </div>
        </main>
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
    @if(session()->has('success'));
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
       <script>
            Swal.fire({
                title: 'Order Placed',
                text: 'Order Placed successfully',
                icon: 'info',
                confirmButtonText: 'OK',
            }).then((result)=>{
            if(result.isConfirmed)
            {
                window.location.href = "{{route('shop.index')}}";
            }
            });
        </script>
     @endif
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script>
        function submitForm()
        {
            $("#hitForm").click();
        }
    </script>
    <script>
        function myfun() {
            // var p1 = document.getElementById("p1").innerHTML = '<i class="fa-solid fa-angle-up" ></i>';

            var drop = document.getElementById("drop");
            drop.style.display = (drop.style.display === "none" || drop.style.display === "") ? "block" : " none";
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