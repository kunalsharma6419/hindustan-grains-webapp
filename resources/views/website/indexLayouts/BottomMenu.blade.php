<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </head>
  <body>
    <!-- bottom menu bar -->
    <div
      class="bg-[#5e463c] z-30 shadow-2xl h-[80px] fixed md:hidden bottom-0 w-full"
    >
      <div class="h-full w-[85%] mx-auto flex justify-between items-center">
        <div class="flex flex-col items-center justify-center gap-1">
          <a href="../Home.html">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
            >
              <path
                d="M12 3l9 9-1.5 1.5L12 6l-7.5 7.5L3 12l9-9zm0 4.5L5.5 12 6 13.5 12 8.5l6-6L18.5 12 12 7.5z"
              />
              <path d="M5 20h14v-7h-2v5H7v-5H5v7z" />
            </svg>
          </a>
          <p class="font-semibold text-xs sm:text-sm text-white">Home</p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
          <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 3h7v7H3zM14 3h7v7h-7zM14 14h7v7h-7zM3 14h7v7H3z"
              />
            </svg>
          </a>
          <p class="font-semibold text-xs sm:text-sm text-white">
            Category
          </p>
        </div>

        <div class="flex flex-col items-center justify-center gap-1">
          <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12h6M9 16h6M9 8h6M4 4h16v16H4z"
              />
            </svg>
          </a>
          <p class="font-semibold text-xs sm:text-sm text-white">Orders</p>
        </div>
        <div class="flex flex-col items-center justify-center gap-1">
          <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M7 8h10M7 12h6m-6 4h8m5 0a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2h3l3 3 3-3h5z"
              />
            </svg>
          </a>
          <p class="font-semibold text-xs sm:text-sm text-white">Support</p>
        </div>
      </div>

      <!-- <div
        class="absolute left-1/2 top-[-80%] translate-y-1/2 -translate-x-1/2 w-[80px] h-[80px] bg-[#FFFFFF] flex items-center justify-center rounded-[4rem]"
      >
        <div class="flex flex-col items-center justify-center gap-1">
          <img
            class="w-7 h-7 sm:h-8 sm:w-8 cursor-pointer"
            src="./assets/bottomNavbar/earning.png"
            alt=""
          />
          <p class="font-semibold text-xs sm:text-sm text-[#DA9000] hidden">
            Featured Advisor
          </p>
        </div>
      </div> -->
    </div>
  </body>
</html>
