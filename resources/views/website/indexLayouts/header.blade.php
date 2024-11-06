<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <!-- remove input arrows  -->
    <style>
      /* Chrome, Safari, Edge, Opera */
      input[type="number"]::-webkit-outer-spin-button,
      input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type="number"] {
        -moz-appearance: textfield;
      }
    </style>
    <!-- <style>
      .navlinks {
        transition: left 0.3s ease;
      }
    </style> -->
  </head>
  <body>
    <header class="relative bg-[#5e463c] px-3 py-2 z-10">
      <nav class="flex w-full justify-between">
        <div class="lg: w-[100px] w-[60%] sm:w-[200px] md:w-[150px] flex justify-between items-center">
          <div class="flex gap-2  md:hidden items-center">
            <ion-icon
              name="menu"
              onclick="onMenuToggle(this)"
              class="text-[30px] cursor-pointer lg:hidden"
            ></ion-icon>
            <img
              class="w-[24px] h-[24px] hidden lg:w-[36px] lg:h-[36px]"
              src="./search_icon.png"
              alt=""
            />
          </div>
          <a href="{{url('/')}}" class=" flex">
            <img
              class="w-[74.55px] h-[72.34px]"
              src="{{asset('assets/grainImages/Rectangle 1.png')}}"
              alt="LOGO"
            />
            <!-- <h2>Hindustan Grains</h2> -->
          </a>
        </div>
        <div class="flex w-auto md:w-full lg:w-auto justify-center items-center  xl:justify-start gap-3">
          <div
            class="navLinks duration-500 absolute md:static bg-[#5e463c]  md:w-auto w-full md:h-auto h-[85vh] flex md:items-center gap-[1.5vw] top-[100%] left-[-100%] px-5 md:py-0 py-5"
          >
            <ul
              class="flex md:flex-row flex-col md:items-center md:gap-[2vw] gap-8"
            >
              <li
                class="text-[12px] w-full md:text-[8px] font-[400] xl:text-[16px] relative max-w-fit pr-3 md:pr-0 py-1 after:bg-gradient-to-r from-[#a07b47] to-[#a07b47] after:absolute after:h-1 after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300"
              >
                <a href="{{url('/')}}">Home</a>
              </li>
              <li
                class="text-[12px] w-full md:text-[8px] font-[400] xl:text-[16px] relative max-w-fit pr-3 md:pr-0 py-1 after:bg-gradient-to-r from-[#a07b47] to-[#a07b47] after:absolute after:h-1 after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300"
              >
                <a href="{{route('shop.index')}}">Shop</a>
              </li>
              <li
                class="text-[12px] w-full md:text-[8px] font-[400] xl:text-[16px] relative max-w-fit pr-3 md:pr-0 py-1 after:bg-gradient-to-r from-[#a07b47] to-[#a07b47] after:absolute after:h-1 after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300"
              >
                <a href="#">About us</a>
              </li>
              <li
                class="text-[12px] w-full md:text-[8px] font-[400] xl:text-[16px] relative max-w-fit pr-3 md:pr-0 py-1 after:bg-gradient-to-r from-[#a07b47] to-[#a07b47] after:absolute after:h-1 after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300"
              >
                <a href="#">Contact us</a>
              </li>
              
            </ul>
          </div>
        </div>
        <div
          class="flex w-[100px] sm:w-[180px] md:w-[200px] justify-end items-center gap-2 lg:gap-4"
        >
          <img
            class="w-[24px] h-[24px] lg:w-[32px] lg:h-[32px]"
            src="{{asset('assets/grainImages/search_icon.png')}}"
            alt=""
          />
          <img
            class="w-[24px] h-[24px] lg:w-[32px] lg:h-[32px]"
            src="{{asset('assets/grainImages/Cart_icon.png')}}"
            alt=""
          />
          <button id="cart-button" class="relative">
            <img
              class="w-[24px] h-[24px] lg:w-[32px] lg:h-[32px]"
              src="{{asset('assets/grainImages/Person_icon.png')}}"
              alt=""
            />
          </button>

          <!-- <ion-icon
            name="menu"
            onclick="onMenuToggle(this)"
            class="text-[30px] cursor-pointer md:hidden"
          ></ion-icon> -->
        </div>
      </nav>
    </header>
   
  </body>
  <!-- header script  -->
  <script>
    function onMenuToggle(e) {
      const navlinks = document.querySelector(".navLinks");
      e.name = e.name === "menu" ? "close" : "menu";
      navlinks.classList.toggle("left-[0%]");
    }
  </script>
  <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
  ></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
  ></script>
  <!-- header script ends  -->
  <!-- model script  -->
  <script>
    document
      .getElementById("cart-button")
      .addEventListener("click", function () {
        document.getElementById("cart-modal").classList.remove("hidden");
      });

    document
      .getElementById("close-modal")
      .addEventListener("click", function () {
        document.getElementById("cart-modal").classList.add("hidden");
      });
  </script>
  <!-- Counter script  -->
  <script>
    function increment() {
      let counter = document.getElementById("counter");
      counter.value = parseInt(counter.value) + 1;
    }
    function decrement() {
      let counter = document.getElementById("counter");
      if (parseInt(counter.value) > 1) {
        counter.value = parseInt(counter.value) - 1;
      }
    }
  </script>
</html>
