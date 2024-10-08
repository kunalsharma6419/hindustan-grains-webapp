<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

<body>

    <div class="h-full bg-white flex flex-col lg:flex-row">
        <div
            class="bg-gradient-to-b from-[#42342E] to-[#6A4E42] w-full lg:w-1/2 p-6 md:p-20 text-white lg:flex flex-col justify-center items-center md:items-start">
            <h1 class="text-4xl mb-3 text-center md:text-left">Welcome to</h1>
            <img class="w-full h-[300px] object-cover" src="{{asset('assets\grainImages\Rectangle 33.png')}}" alt="">
        </div>
        <div class=" flex flex-col flex justify-center items-center">
            <div class="w-[94%] mx-auto w-full lg:w-1/2 ">
                <div class="w-full lg:max-w-lg mx-auto">
                    <div class="flex gap-2 items-center justify-between mt-20">
                        <div class="flex justify-center rounded-full bg-[#fcc67b] text-[#f6b00] items-center p-2 w-12 h-12">
                          <a href="Index.html"><i  class="fa-solid fa-arrow-left"></i></a>
                        </div>
                        <p class="text-2xl font-semibold text-[#9F6B00]  ">Welcome Back</p>

                      </div>
                    <div class="bg-white border border-[#B48629] p-6 md:p-8 mt-10 rounded-lg shadow-lg">
                        <h2 class="text-lg font-semibold mb-4">Login</h2>
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm" style="color:red;font-weight:600;" >
                            {{ session('status') }}
                        </div>
                    @endif
               
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4 px-4 py-4 w-full bg-[#F5F5F5] rounded-[8px] ">
                            <input class="w-full  bg-[#F5F5F5]" style="outline-color: #F5F5F5;" id="email"
                                type="email" name="email" :value="old('email')" placeholder="Enter Email"
                                required autofocus />
                        </div>

                        <div
                            class="mb-4 px-4 py-4 items-center w-full flex justify-between bg-[#F5F5F5] rounded-[8px] ">
                            <input class="input-field w-full  bg-[#F5F5F5]" style="outline-color: #F5F5F5;"
                                id="password" type="password" name="password" placeholder="Enter Password" required
                                autocomplete="current-password" />
                                <span class="pass-icon" id="showw"><i class="fa fa-eye-slash" aria-hidden="true" onclick="showPassword()"></i></span>
                                <span class="pass-icon" style="display: none;" id="hide"><i class="fa fa-eye" aria-hidden="true" onclick="hidePassword()"></i></span>

                        </div>
                        <button
                            class=" bg-[#FFC857] p-5  w-full  flex justify-between gap-10 rounded-[8px] items-center">
                            <h1 class=" text-black">Login</h1>
                            <a href="#"><i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i></a>
                        </button>
                    </form>
                        <!-- <button class="login-button">
                        <span class="text-black">Login</span>
                        <i class="fa-solid fa-arrow-right" style="color: #9F6B00"></i>
                    </button> -->
                        <div class=" flex justify-center  separator my-4">
                            <span class="bg-gray-300 h-px flex-grow"></span>
                            <span class="px-2 text-sm text-gray-400">or</span>
                            <span class="bg-gray-300 h-px flex-grow"></span>
                        </div>
                        <div class="flex justify-center items-center space-x-4">
                            <img class="social-icon" src="{{asset('assets\grainImages\Google - png 0.png')}}" alt="">
                            <img class="social-icon" src="{{asset('assets\grainImages\Google - png 2.png')}}" alt="">
                         
                        </div>
                        <p class="mt-4 text-center text-sm">
                            Don’t have an account? <a class="text-[#B48629]" href="{{ route('register') }}">Sign up</a>
                        </p>
                    </div>
                </div>

            </div>
            <img class=" mt-   " src="{{asset('assets\grainImages\Rectangle 591.png')}}" alt="">
        </div>

    </div>

</body>


     <script>
        function showPassword()
        {
            // alert("running");
            var element = document.getElementById('password');
            if(element.type == "password")
            {
                element.type = "text";
                var showElement = document.getElementById('showw');
                showElement.style.display = "none";
                var hideElement = document.getElementById('hide');
                hideElement.style.display = "block";
            }
          
        }
        function hidePassword()
        {

            var element = document.getElementById('password');
            if(element.type == "text")
            {
                element.type = "password";
                var showElement = document.getElementById('hide');
                showElement.style.display = "none";
                var hideElement = document.getElementById('showw');
                hideElement.style.display = "block";
            }
         
        }
    </script>


</html>