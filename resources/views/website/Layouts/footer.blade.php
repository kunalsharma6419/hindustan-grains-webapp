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