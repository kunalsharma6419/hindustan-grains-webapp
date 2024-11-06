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
              clifford: "#da373d",
            },
          },
        },
      };
    </script>
</head>
<body>
    <div class="bg-gradient-to-b hidden md:block relative p-10 from-[#42342E] to-[#664B40]">
        <div
          class="grid lg:grid-cols-2 grid-cols-1 gap-10 lg:px-20 lg:text-[16px] text-[12px] font-[400]"
        >
          <div class=" gap-5 grid xl:grid-cols-2 grid-cols-1  w-full">
            <div class="flex flex-col px gap-5">
              <img
                class="w-[70px] h-[70px] lg:w-[130px] lg:h-[130px]"
                src="{{asset('assets/grainImages/Rectangle 1.png')}}"
                alt=""
              />
              <div class="flex items-center gap-2">
                <i class="fa-solid fa-phone" style="color: #fafafa;"></i>
                <p>+00 1234567890</p>
              </div>
              <div class="flex items-center gap-2">
                <i class="fa-regular fa-envelope" style="color: #efeff1;"></i>
                <p>Hindustangrains@mail.com</p>
              </div>
            </div>
            <div class="flex flex-col gap-1">
              <p class="text-[20px]">Quick Links</p>
              <p>Home</p>
              <p>Shop</p>
              <p>About US</p>
              <p>Contact US</p>
            </div>
          </div>
          <div class="grid xl:grid-cols-2 grid-cols-1 justify-between w-full">
            <div class="flex flex-col gap-1">
              <p class="text-[20px]">Help</p>
              <p>Terms of Services</p>
              <p>Help & Support</p>
              <p>Privacy Policies</p>
              <p>My Account</p>
            </div>
            <div class="flex flex-col gap-5">
              <p class="text-[20px]">Subscribe to our newsletter</p>
              <div class="flex flex-col lg:flex-row rounded-[8px] w-fit h-fit">
                <input
                  class="p-2"
                  type="text"
                  placeholder="Enter your Email Id"
                />
                <button
                  class="bg-[#FFC857] p-2 lg:p-5 flex justify-between gap-3 lg:gap-10 items-center"
                >
                  <h1 class="text-black">Shop Now</h1>
                  <i
                    class="fa-solid fa-arrow-right"
                    style="color: #9f6b00;"
                  ></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <img
          class="lg:block hidden h-[100px] w-[100px] absolute bottom-0 right-0"
          src="{{asset('assets/grainImages/Screenshot 2024-02-22 235440.png')}}"
          alt=""
        />
      </div>
</body>
</html>