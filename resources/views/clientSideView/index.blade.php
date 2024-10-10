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
    <script
      src="https://kit.fontawesome.com/5c118959dd.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('css/homeStyle.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="{{asset('css/homeSwipper.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <!--FONT AWESOME-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Styles -->
  <link rel="stylesheet" href="{{asset('css/clientSideIndex.css')}}">
  </head>

  <body class="text-white m-0">
    <div class="flex flex-col">
      <header>
        <div
          class="hidden md:flex justify-between items-center gap-2 lg:px-10 p-3 bg-gradient-to-b from-[#42342E] to-[#44352F]"
        >
          <div class="flex items-center gap-2">
            <img class="w-[60px] h-[60px]"
        
                       src="{{asset('assets/grainImages/Rectangle 1.png')}}"
             alt="" />
            <h1 class="text-20px font-[600] hidden lg:block">
              Hindustan <br />Grains
            </h1>
          </div>
          <div
            class="text-[12px] lg:text-[20px] font-[400] text-[#E5E5E5] flex gap-2 lg:gap-7"
          >
            <a
              class="text-white underline decoration-[#9F7A47] font-[600] text"
              href="homeIndex.html"
              >Home</a
            >
            <a href="shopIndex.html">Shop</a>
            <a href="#about">About Us</a>
            <a href="#Contact">Contact Us</a>
          </div>
          <div class="lg:text-[24px] text-[16px] flex gap-8">
            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
            <i class="fa-solid fa-basket-shopping" style="color: #f7f7f8;"></i>
            <i class="fa-solid fa-user" style="color: #ffffff;"></i>
          </div>
        </div>
        <div class="flex justify-between mx-7 md:hidden mobile-container">
          <img class="w-[60px] h-[60px]" 
       
                    src="{{asset('assets/grainImages/Rectangle 1.png')}}"
           alt="" />
          <!-- <a href="#home" class="active">Logo</a> -->

          <div class="flex mt-5 flex-col">
            <i
              id="menu"
              onclick="myFunctionh()"
              class="myLinkshc fa-solid fa-bars text-[26px]"
              style="color: #fcfcfc;"
            ></i>

            <div class="hidden myLinksh flex-col top-0">
              <i
                onclick="mymenu()"
                class="fa-solid fa-xmark text-[26px]"
                style="color: #fcfcfc;"
              ></i>
              <div
                class="lg:text-[24px] text-white text-[16px] flex flex-col gap-3"
              >
                <div class="flex flex-col gap-2">
                  <a
                    class="underline decoration-[#9F7A47] font-[600]"
                    href="Index.html"
                    >Home</a
                  >
                  <a class="  " href="shopIndex.html">Shop</a>
                  <a href="#about">About Us</a>
                  <a href="#Contact">Contact Us</a>
                </div>
                <div class="flex gap-2">
                  <i
                    class="fa-solid fa-magnifying-glass"
                    style="color: #ffffff;"
                  ></i>
                  <i
                    class="fa-solid fa-basket-shopping"
                    style="color: #f7f7f8;"
                  ></i>
                  <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!--Hero Section-->
      <div class="wrapper">
        <div class="content">
          <div class="bg-shape">
            <img
                      src="{{asset('assets/grainImages/herobgmain.png')}}"
     
             alt="" />
          </div>

          <div class="product-img">
            <div class="product-img__item" id="img1">
              <img
                        src="{{asset('assets/grainImages/fortifiedaata.png')}}"
             
                alt="fortifiedaata"
                class="product-img__img"
                style="width: 375px; height: 450px;"
              />
            </div>

            <div class="product-img__item" id="img2">
              <img
                        src="{{asset('assets/grainImages/goldpearltea.png')}}"
                
                alt="goldpearltea"
                class="product-img__img"
                style="width: 375px; height: 450px;"
              />
            </div>

            <div class="product-img__item" id="img3">
              <img
              src="{{asset('assets/grainImages/goldpearltea.png')}}"
                alt="milkchocolate"
                class="product-img__img"
                style="width: 375px; height: 450px;"
              />
            </div>

            <div class="product-img__item" id="img4">
              <img
                        src="{{asset('assets/grainImages/pureghee.png')}}"
   
                alt="pureghee"
                class="product-img__img"
                style="width: 375px; height: 450px;"
              />
            </div>

            <div class="product-img__item" id="img5">
              <img
                                      src="{{asset('assets/grainImages/SHAMIYANA.png')}}"
      
                alt="SHAMIYANA"
                class="product-img__img"
                style="width: 375px; height: 450px;"
              />
            </div>
          </div>

          <div class="product-slider">
            <button class="prev disabled">
              <span class="icon">
                <svg class="icon icon-arrow-right">
                  <use xlink:href="#icon-arrow-left"></use>
                </svg>
              </span>
            </button>
            <button class="next">
              <span class="icon">
                <svg class="icon icon-arrow-right">
                  <use xlink:href="#icon-arrow-right"></use>
                </svg>
              </span>
            </button>

            <div class="product-slider__wrp swiper-wrapper">
                <div class="product-slider__item swiper-slide" data-target="img1">
                <div class="product-slider__card">
                  <img
                                          src="{{asset('assets/grainImages/fortifiedaatabg.png')}}"
          
                    alt="star wars"
                    class="product-slider__cover"
                  />
                  <div class="product-slider__content">
                    <h1 class="product-slider__title" align="center">
                      FORTIFIED <br />
                      ATTA
                    </h1>
                    <div class="product-ctr">
                      <div class="product-labels" align="center">
                        <p style="width: 225px;">
                          MP wheat, Sharbati atta is sweeter in taste and better
                          in texture. The grains of Sharbati atta are bigger in
                          size and has a golden sheen to it. Interestingly, Due
                          to the organic way Sharbati wheat is farmed, it holds
                          an answer to a lot of health issues that are common
                          today .
                        </p>
                      </div>

                      <span class="hr-vertical"></span>

                      <div class="product-inf">
                        <div class="product-slider__cart" style="width: 230px;">
                          <p>
                            Rotis Made From <br />Sharbati Wheat Flour
                            <br />Softer And Fluffier.
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="product-slider__bottom">
                      <button class="product-slider__cart">
                        ADD TO CART
                      </button>

                      <button class="product-slider__fav js-fav">
                        <span class="heart"></span> ADD TO WISHLIST
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-slider__item swiper-slide" data-target="img4">
                <div class="product-slider__card">
                  <img
                                          src="{{asset('assets/grainImages/gheebg.png')}}"
                    
                    alt="star wars"
                    class="product-slider__cover"
                  />
                  <div class="product-slider__content">
                    <h1 class="product-slider__title" align="center">
                      PURE <br />
                      GHEE
                    </h1>
                    <div class="product-ctr">
                      <div class="product-labels" align="center">
                        <p style="width: 225px; padding-left: 20px;">
                          Desi Ghee, a staple in traditional Indian households, is renowned for its rich flavor, golden hue, and numerous health benefits.
                           Made from the finest milk, Desi Ghee is a natural source of healthy fats and essential nutrients that promote better digestion, stronger immunity, and overall well-being. 
                        </p>
                      </div>

                      <span class="hr-vertical"></span>

                      <div class="product-inf">
                        <div class="product-slider__cart" style="width: 230px;">
                          <p>
                            Nourish Naturally with Pure Ghee
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="product-slider__bottom">
                      <button class="product-slider__cart">
                        ADD TO CART
                      </button>

                      <button class="product-slider__fav js-fav">
                        <span class="heart"></span> ADD TO WISHLIST
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              

              <div class="product-slider__item swiper-slide" data-target="img2">
                <div class="product-slider__card">
                  <img
                      src="{{asset('assets/grainImages/teabg.png')}}"
       
                    alt="star wars"
                    class="product-slider__cover"
                  />
                  <div class="product-slider__content">
                    <h1 class="product-slider__title" align="center">
                      GOLD PEARL <br />
                      TEA
                    </h1>

                    <div class="product-ctr">
                      <div class="product-labels" align="center">
                        <p style="width: 225px; padding-left: 20px;">
                            <ul>
                                <li>Prevents Heart Diseases </li>
                                <li>Helps in Weight Loss</li>
                                <li>Boosts Digestion and Immune System </li>
                                <li>Helps Fight Cancer</li>
                                <li>Give More Energy</li>
                            </ul>
                        </p>
                      </div>

                      <span class="hr-vertical"></span>

                      <div class="product-inf">
                        <div class="product-slider__cart" style="width: 230px;">
                          <p>
                             Health Benefits of Gold Pearl Tea?
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="product-slider__bottom">
                      <button class="product-slider__cart">
                        ADD TO CART
                      </button>

                      <button class="product-slider__fav js-fav">
                        <span class="heart"></span> ADD TO WISHLIST
                      </button>
                    </div>
                  </div>
                </div>
              </div>
<div class="product-slider__item swiper-slide" data-target="img5">
                <div class="product-slider__card">
                  <img
                        src="{{asset('assets/grainImages/boxbg.png')}}"
                  
                    alt="star wars"
                    class="product-slider__cover"
                  />
                  <div class="product-slider__content">
                    <h1 class="product-slider__title" align="center">
                      SHAMIYANA <br />
                      PREMIUM BOX
                    </h1>
                    <div class="product-ctr">
                      <div class="product-labels" align="center">
                        <p style="width: 225px; padding-left: 30px; text-align: center;">
                           The elaegant  mosaic  candle small vase is based on 
the distinctive design inspired by Indian Turkish designs. 
The decoration was chosen to exalt the elegance of the 
decorative candles.

                        </p>
                      </div>

                      <span class="hr-vertical"></span>

                      <div class="product-inf">
                        <div class="product-slider__cart" style="width: 230px;">
                          <p>
                            Premium Box
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="product-slider__bottom">
                      <button class="product-slider__cart">
                        ADD TO CART
                      </button>

                      <button class="product-slider__fav js-fav">
                        <span class="heart"></span> ADD TO WISHLIST
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-slider__item swiper-slide" data-target="img3">
                <div class="product-slider__card">
                  <img
                        src="{{asset('assets/grainImages/chocobg.png')}}"
                    alt="star wars"
                    class="product-slider__cover"
                  />
                  <div class="product-slider__content">
                    <h1 class="product-slider__title" align="center">
                      MILK <br />
                      CHOCOLATE
                    </h1>
                    <div class="product-ctr">
                      <div class="product-labels" align="center">
                        <p style="width: 225px; padding-left: 25px; text-align: center;">
                           Cocoa Mass, Sugar, Cocoa Butter, Butter (Milk),Hazelnuts, Fat Reduced Cocoa Powder, 
Humectant(Sorbitol), Coconut Oil, Dried Whole Milk, Glucose Syrup, Glucose-Fyutose Syrup, 
Dextrose, Emulsier(Soya Lexithin), Whole Milk.
                        </p>
                      </div>

                      <span class="hr-vertical"></span>

                      <div class="product-inf">
                        <div class="product-slider__cart" style="width: 230px;">
                          <p>
                             MAY ALSO CONTAIN: Other Nuts, Egg
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="product-slider__bottom">
                      <button class="product-slider__cart">
                        ADD TO CART
                      </button>

                      <button class="product-slider__fav js-fav">
                        <span class="heart"></span> ADD TO WISHLIST
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex flex-col gap-2 bg-gradient-to-b from-[#42342E] to-[#6A4E42]"
      >
        <img
          class="hidden lg:block w-[230px] h-[300px] absolute float-right rotate-45 grid justify-items-end"
                src="{{asset('assets/grainImages/200w.gif')}}"
         
          alt=""
        />
        <div class="mt-20 text-center">
          <h3 class="text-[48px] font-[700]">What we Offer</h3>
          <p class="lg:text-[16px] text-[12px] font-[400]">
            We connect buyers and sellers of natural, organic, environmentally
            sound products. We find the best suppliers and makers of natural and
            organic products..
          </p>
        </div>
      
        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
                @foreach($categories as $item)
                <div class="swiper-slide h-[550px]">
                  <div class="p-5 w-[280px] rounded-[8px] h-[340px] relative flex flex-col gap-5 items-center justify-center bg-[#F1F3E8]">
                  @php
                    $categoryImages = json_decode($item->category_image_path, true);
                    $imagePaths = is_array($categoryImages) && !empty($categoryImages) ? reset($categoryImages) : 'assets/noImage (2).png';
                  @endphp
                
                  <img class="w-[200px] h-[200px]" src="{{ asset($imagePaths) }}" alt=""/>

              
                    <h1 class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]">
                      {{$item->category_name }}
                    </h1>
                    <p class="text-center">
                      {{$item->short_description}} 
                    </p>
                    <button class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center">
                      <h1 class="text-black">Shop Now</h1>
                      <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
                    </button>
                  </div>
                </div>
                @endforeach
                {{-- <div class="swiper-slide h-[550px]">
                  <div
                    class="swiper-slide rounded-[8px] w-[280px] h-[340px] relative flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                            src="{{asset('assets/grainImages/Rectangle 11.png')}}"
                     
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Rice
                    </h1>
                    <p class="text-center">
                      Discover the World of Exceptional Rice.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="swiper-slide rounded-[8px] w-[280px] h-[340px] relative flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                            src="{{asset('assets/grainImages/Rectangle 13.png')}}"
                 
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Pulses
                    </h1>
                    <p class="text-center px-4">
                      Protein-Packed Goodness Straight from the Farm.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="swiper-slide rounded-[8px] w-[280px] h-[340px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                            src="{{asset('assets/grainImages/Rectangle 13 (1).png')}}"
              
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Pasta
                    </h1>
                    <p class="px-4 text-center">
                      Crafting Moments: Artisanal Pasta for the Perfect Meal.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="p-5 w-[280px] rounded-[8px] h-[340px] relative flex flex-col gap-5 items-center justify-center bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectangle 10.png')}}"
                   
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Spices
                    </h1>
                    <p class="text-center">
                      Nature's Nutrient-Rich Staples for a Healthy Lifestyle.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="swiper-slide rounded-[8px] w-[280px] h-[340px] relative flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectangle 11.png')}}"
               
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Rice
                    </h1>
                    <p class="text-center">
                      Discover the World of Exceptional Rice.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="swiper-slide rounded-[8px] w-[280px] h-[340px] relative flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectangle 13.png')}}"
                
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Pulses
                    </h1>
                    <p class="text-center px-4">
                      Protein-Packed Goodness Straight from the Farm.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="swiper-slide rounded-[8px] w-[280px] h-[340px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectangle 13 (1).png')}}"
                     
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Pasta
                    </h1>
                    <p class="px-4 text-center">
                      Crafting Moments: Artisanal Pasta for the Perfect Meal.
                    </p>
                    <button
                      class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div> --}}
              </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
          </div>
        </div>
       
        

        <div
          style="overflow: hidden;"
          class="overflow-x-hidden grid place-items-center overflow-hidden"
        >
          <p class="mt-20 text-[48px] mr-0 font-[700]">Featured Products</p>
          <img
            style="overflow-x: hidden;"
            class="hidden lg:block overflow-x-hidden mr-20 w-[230px] h-[300px] absolute right-0 -rotate-45 grid justify-items-end"
          
                               src="{{asset('assets/grainImages/200w.gif')}}"
            alt=""
          />
        </div>

        <div
          class="mt-32 flex flex-col lg:flex-row mx-auto p-2 lg:px-10 gap-24"
        >
          <div
            class="flex justify-between gap-2 item-center rounded-[8px] h-[300px] lg:h-[350px] p-2 lg:pt-10 lg:px-10 pb-5 bg-[#38302E] border border-[F1BD73]"
          >
            <div class="w-[60%] flex flex-col gap-5">
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#FFC56F]"
              >
                Masoor Dal
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
              <p class="text-[#E0E0E0] lg:text-[16px] text-[12px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex gap-2">
                <img 
               src="{{asset('assets/grainImages/Ellipse 43.png')}}"
                 alt="" />
                <img
                 src="{{asset('assets/grainImages/Ellipse 44.png')}}"
                  alt="" />
                <img 
                       src="{{asset('assets/grainImages/Ellipse 45.png')}}"
                 alt="" />
              </div>
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700] text-[#FFC56F]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[40%] flex flex-col justify-center items-center">
              <img
                class="w-[280px] h-[320px]"
                                   src="{{asset('assets/grainImages/cdRectangle 11.png')}}"
       
                alt=""
              />
              <button
                class="bg-[#FFC857] p-2 lg:p-2 lg:p-5 mb-44 flex gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>

          <div
            class="flex justify-between gap-2 item-center rounded-[8px] h-[300px] lg:h-[350px] p-2 lg:pt-10 lg:px-10 pb-5 bg-[#38302E] border border-[F1BD73]"
          >
            <div class="w-[60%] flex flex-col gap-5">
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#FFC56F]"
              >
                Masoor Dal
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
              <p class="text-[#E0E0E0] lg:text-[16px] text-[12px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex gap-2">
                <img
                   src="{{asset('assets/grainImages/Ellipse 43.png')}}"
                  alt="" />
                <img 
                          src="{{asset('assets/grainImages/Ellipse 44.png')}}"
                 alt="" />
                <img 
                          src="{{asset('assets/grainImages/Ellipse 45.png')}}"

                alt="" />
              </div>
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700] text-[#FFC56F]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[40%] flex flex-col justify-center items-center">
              <img
                class="w-[280px] h-[320px]"
                                   src="{{asset('assets/grainImages/cdRectangle 11.png')}}"
          
                alt=""
              />
              <button
                class="bg-[#FFC857] p-2 lg:p-2 lg:p-5 mb-44 flex gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
        </div>
        <div
          class="mt-32 flex flex-col lg:flex-row mx-auto p-2 lg:px-10 gap-24"
        >
          <div
            class="flex justify-between rounded-[8px] gap-2 item-center h-[300px] lg:h-[350px] p-2 lg:pt-10 lg:px-10 pb-5 bg-[#38302E] border border-[F1BD73]"
          >
            <div class="w-[60%] flex flex-col gap-5">
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#FFC56F]"
              >
                Ghee
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
              <p class="text-[#E0E0E0] lg:text-[16px] text-[12px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex gap-2">
                <img 
                   src="{{asset('assets/grainImages/Ellipse 43.png')}}"
                alt="" />
                <img
                         src="{{asset('assets/grainImages/Ellipse 44.png')}}"
                  alt="" />
                <img 
                                   src="{{asset('assets/grainImages/Ellipse 45.png')}}"
                alt="" />
              </div>
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700] text-[#FFC56F]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[40%] flex flex-col justify-center items-center">
              <img
                class="w-[280px] h-[320px]"
                 src="{{asset('assets/grainImages/Rectangle 11 (1).png')}}"
   
                alt=""
              />
              <button
                class="bg-[#FFC857] p-2 lg:p-5 mb-44 flex gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
          <div
            class="flex justify-between rounded-[8px] gap-2 item-center h-[300px] lg:h-[350px] p-2 lg:pt-10 lg:px-10 pb-5 bg-[#38302E] border border-[F1BD73]"
          >
            <div class="w-[60%] flex flex-col gap-5">
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#FFC56F]"
              >
                Fortified Atta
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
              <p class="text-[#E0E0E0] lg:text-[16px] text-[12px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex gap-2">
                <img 
                     src="{{asset('assets/grainImages/Ellipse 43.png')}}"
                alt="" />
                <img 
                          src="{{asset('assets/grainImages/Ellipse 44.png')}}"
                alt="" />
                <img 
                          src="{{asset('assets/grainImages/Ellipse 45.png')}}"
                 alt="" />
              </div>
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700] text-[#FFC56F]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[40%] flex flex-col justify-center items-center">
              <img
                class="w-[280px] h-[320px]"
                          src="{{asset('assets/grainImages/Rectangle 10 (1).png')}}"
             
                alt=""
              />
              <button
                class="bg-[#FFC857] p-2 lg:p-5 mb-44 flex gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
        </div>

        <svg class="hidden" hidden>
          <symbol id="icon-arrow-left" viewBox="0 0 32 32">
            <path
              d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"
            ></path>
          </symbol>
          <symbol id="icon-arrow-right" viewBox="0 0 32 32">
            <path
              d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"
            ></path>
          </symbol>
        </svg>
        <div class="grid place-items-center mt-20 overflow-hidden">
          <p class="mt-20 text-[48px] mr-0 font-[700]">Shop our Spices</p>
          <img
            class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
                      src="{{asset('assets/grainImages/200w.gif')}}"
         
            alt=""
          />
        </div>

        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
        
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Jeera Cumin
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                           src="{{asset('assets/grainImages/Rectangle 10 (2).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Turmeric Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                           src="{{asset('assets/grainImages/Rectangle 10 (3).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Red Chilli Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                           src="{{asset('assets/grainImages/Rectangle 10 (4).png')}}"
             
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Garam Masala
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                           src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
                  
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Jeera Cumin
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                      src="{{asset('assets/grainImages/Rectangle 10 (2).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Turmeric Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                      src="{{asset('assets/grainImages/Rectangle 10 (3).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Red Chilli Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                      src="{{asset('assets/grainImages/Rectangle 10 (4).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Garam Masala
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
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
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
          </div>
        </div>
        <div class="grid place-items-center overflow-hidden">
          <p class="mt-20 text-[48px] mr-0 font-[700]">Shop our Pulses</p>
          <img
            class="hidden lg:block mr-20 w-[230px] h-[300px] absolute right-0 -rotate-45 grid justify-items-end"
            src="{{asset('assets/grainImages/200w.gif')}}"
            alt=""
          />
        </div>

        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                            src="{{asset('assets/grainImages/Rectangle 10ca.png')}}"
                      src=""
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Toor Dal
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                            src="{{asset('assets/grainImages/Rectangcale 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Masoor Dal
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img class="w-[240px] h-[200px]" 
                          src="{{asset('assets/grainImages/ca.png')}}"
                    alt="" />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Kala Chana
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img class="w-[240px] h-[200px]" 
                        src="{{asset('assets/grainImages/scs.png')}}"
                    
                    alt="" />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Hare Mung
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                          src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Jeera Cumin
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                          src="{{asset('assets/grainImages/Rectangle 10 (2).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Turmeric Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                              src="{{asset('assets/grainImages/Rectangle 10 (3).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Red Chilli Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                              src="{{asset('assets/grainImages/Rectangle 10 (4).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Garam Masala
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
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
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
          </div>
        </div>
        <div class="grid place-items-center mt-20 overflow-hidden">
          <p class="mt-20 text-[48px] mr-0 font-[700]">Shop our Tea</p>
          <img
            class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
                                    src="{{asset('assets/grainImages/200w.gif')}}"

            alt=""
          />
        </div>

        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                        src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Caramel Spice
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                        src="{{asset('assets/grainImages/Rectangle 10 (1)cd.png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Spring Lemon
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                        src="{{asset('assets/grainImages/Rectangle 10 (2)dc.png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Pearl Gold
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                        src="{{asset('assets/grainImages/Rectangle 10cdcsd.png')}}"
           
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Drew Tulsi Detox
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                       src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Jeera Cumin
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                       src="{{asset('assets/grainImages/Rectangle 10 (2).png')}}"
                 
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Turmeric Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                              src="{{asset('assets/grainImages/Rectangle 10 (3).png')}}"
                     
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Red Chilli Powder
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                              src="{{asset('assets/grainImages/Rectangle 10 (4).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Garam Masala
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
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
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
          </div>
        </div>
        <div class="grid place-items-center mt-20 overflow-hidden">
          <p class="mt-20 text-[48px] mr-0 font-[700]">Shop our Rice</p>
          <img
            class="hidden lg:block mr-20 w-[230px] h-[300px] absolute right-0 -rotate-45 grid justify-items-end"
                    src="{{asset('assets/grainImages/200w.gif')}}"
            alt=""
          />
        </div>

        <div class="hidden mt-32 lg:flex flex-col lg:flex-row px-10 gap-10">
          <div
            class="flex w-full rounded-[8px] justify-between gap-10 h-fit lg:h-[300px] item-center p-2 lg:p-5 bg-white text-black border border-[F1BD73]"
          >
            <div class="w-[40%] flex float-left flex-col justify-between">
              <img
                class="h-[150px] w-[300px] lg:w-[280px] lg:h-[320px]"
                        src="{{asset('assets/grainImages/Rectacsngle 10.png')}}"

                alt=""
              />
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#B48629]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[60%] flex flex-col gap-5">
              <p class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700]">
                Everyday Basmati Rice
              </p>
              <p class="text-[14px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>

              <button
                class="bg-[#FFC857] px-4 py-2 lg:p-5 w-fit h-fit flex justify-between gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
          <div
            class="flex w-full rounded-[8px] justify-between gap-10 h-fit lg:h-[300px] item-center p-2 lg:p-5 bg-white text-black border border-[F1BD73]"
          >
            <div class="w-[40%] flex float-left flex-col justify-between">
              <img
                class="h-[150px] w-[300px] lg:w-[280px] lg:h-[320px]"
                        src="{{asset('assets/grainImages/csccs.png')}}"
                alt=""
              />
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#B48629]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[60%] flex flex-col gap-5">
              <p class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700]">
                Basmati Super Classic
              </p>
              <p class="text-[14px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>

              <button
                class="bg-[#FFC857] px-4 py-2 lg:p-5 w-fit h-fit flex justify-between gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
        </div>
        <div
          class="mt-40 text-black lg:ml-[100px] lg:mr-[100px] flex lg:hidden flex-col mx-auto lg:flex-row gap-32 lg:gap-5 mx-auto lg:flex-row justify-between"
        >
          <div
            class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
          >
            <img class="w-[240px] h-[200px]"
             src="{{asset('assets/grainImages/Rectacsngle 10.png')}}"
             alt="" />
            <h1 class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]">
              Everyday Basmati Rice
            </h1>
            <p class="text-center">
              Made with contains natural oils Rich flavor and provide health
              benefits
            </p>
            <div class="flex w-full justify-between items-center">
              <p class="text-[20px] font-[700] text-[#B48629]">Rs 100/-</p>
              <div class="flex gap-2 items-center">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
            </div>
            <button
              class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
            >
              <h1 class="text-black">Shop Now</h1>
              <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
            </button>
          </div>
          <div
            class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
          >
            <img class="w-[240px] h-[200px]"
             src="{{asset('assets/grainImages/csccs.png')}}"
              alt="" />
            <h1 class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]">
              Basmati Super Classic
            </h1>
            <p class="text-center">
              Made with contains natural oils Rich flavor and provide health
              benefits
            </p>
            <div class="flex w-full justify-between items-center">
              <p class="text-[20px] font-[700] text-[#B48629]">Rs 100/-</p>
              <div class="flex gap-2 items-center">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
            </div>
            <button
              class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
            >
              <h1 class="text-black">Shop Now</h1>
              <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
            </button>
          </div>
        </div>
        <div class="grid place-items-center mt-20 overflow-hidden">
          <h3 class="mt-20 text-[48px] mr-0 font-[700]">Shop our Pasta</h3>
          <img
            class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
             src="{{asset('assets/grainImages/200w.gif')}}"
            alt=""
          />
        </div>

        <div class="hidden mt-32 lg:flex flex-col lg:flex-row px-10 gap-10">
          <div
            class="flex w-full rounded-[8px] justify-between gap-10 h-fit lg:h-[300px] item-center p-2 lg:p-5 bg-white text-black border border-[F1BD73]"
          >
            <div class="w-[40%] flex float-left flex-col justify-between">
              <img
                class="h-[150px] w-[300px] lg:w-[280px] lg:h-[320px]"
                 src="{{asset('assets/grainImages/csdcdsdcd.png')}}"
                alt=""
              />
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#B48629]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[60%] flex flex-col gap-5">
              <p class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700]">
                Macaroni Pasta
              </p>
              <p class="text-[14px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>

              <button
                class="bg-[#FFC857] px-4 py-2 lg:p-5 w-fit h-fit flex justify-between gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
          <div
            class="flex w-full rounded-[8px] justify-between gap-10 h-fit lg:h-[300px] item-center p-2 lg:p-5 bg-white text-black border border-[F1BD73]"
          >
            <div class="w-[40%] flex float-left flex-col justify-between">
              <img
                class="h-[150px] w-[300px] lg:w-[280px] lg:h-[320px]"
                         src="{{asset('assets/grainImages/Rectandscdsdcgle 10 (1).png')}}"
                alt=""
              />
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#B48629]"
              >
                Rs 100/-
              </p>
            </div>
            <div class="w-[60%] flex flex-col gap-5">
              <p class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700]">
                Rotini Pasta
              </p>
              <p class="text-[14px] font-[400]">
                Made with contains natural oils Rich flavor and provide health
                benefits
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>

              <button
                class="bg-[#FFC857] px-4 py-2 lg:p-5 w-fit h-fit flex justify-between gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
              </button>
            </div>
          </div>
        </div>
        <div
          class="mt-40 text-black lg:ml-[100px] lg:mr-[100px] flex lg:hidden flex-col mx-auto lg:flex-row gap-32 lg:gap-5 mx-auto lg:flex-row justify-between"
        >
          <div
            class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
          >
            <img class="w-[240px] h-[200px]"
                     src="{{asset('assets/grainImages/csdcdsdcd.png')}}"
             src="" 
             alt="" />
            <h1 class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]">
              Macaroni Pasta
            </h1>
            <p class="text-center">
              Made with contains natural oils Rich flavor and provide health
              benefits
            </p>
            <div class="flex w-full justify-between items-center">
              <p class="text-[20px] font-[700] text-[#B48629]">Rs 100/-</p>
              <div class="flex gap-2 items-center">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
            </div>
            <button
              class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
            >
              <h1 class="text-black">Shop Now</h1>
              <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
            </button>
          </div>
          <div
            class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
          >
            <img
              class="w-[240px] h-[200px]"
                       src="{{asset('assets/grainImages/Rectandscdsdcgle 10 (1).png')}}"
   
              alt=""
            />
            <h1 class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]">
              Rotini Pasta
            </h1>
            <p class="text-center">
              Made with contains natural oils Rich flavor and provide health
              benefits
            </p>
            <div class="flex w-full justify-between items-center">
              <p class="text-[20px] font-[700] text-[#B48629]">Rs 100/-</p>
              <div class="flex gap-2 items-center">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
            </div>
            <button
              class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
            >
              <h1 class="text-black">Shop Now</h1>
              <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
            </button>
          </div>
        </div>
        <h3 class="text-center mt-20 text-[48px] font-[700]">
          Our Best Selling
        </h3>

        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                               src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Jeera Cumin
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                               src="{{asset('assets/grainImages/Rectacsngle 10.png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Basmati Rice
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                               src="{{asset('assets/grainImages/Rectangcale 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Masoor Dal
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                               src="{{asset('assets/grainImages/Rectangle 10cdcsd.png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Caramel Spice Tea
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectanglse 10 (1).png')}}"
               
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Jeera Cumin
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectacsngle 10.png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Basmati Rice
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                                         src="{{asset('assets/grainImages/Rectangcale 10 (1).png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Masoor Dal
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                    <img
                      class="w-[240px] h-[200px]"
                        src="{{asset('assets/grainImages/Rectangle 10cdcsd.png')}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                      Caramel Spice Tea
                    </h1>
                    <p class="text-center">
                      Made with contains natural oils Rich flavor and provide
                      health benefits
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs 100/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    <button
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
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
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
          </div>
        </div>

        <h3 class="text-center mt-20 text-[48px] font-[700]">
          Our Happy Customers
        </h3>
        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img 
                          src="{{asset('assets/grainImages/Ellipse 29.png')}}"
                      alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          Amy Miller
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img class=" "
                      src="{{asset('assets/grainImages/Ellipse 29sdc.png')}}" 
                       alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          John Parker
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img 
                  src="{{asset('assets/grainImages/Ellipse 29 (1).png')}}"
                       alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          Linda Smith
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img 
                         src="{{asset('assets/grainImages/Ellipse 29.png')}}"
                       alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          Amy Miller
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img class=" "
                      src="{{asset('assets/grainImages/Ellipse 29sdc.png')}}" 
                       alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          John Parker
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img 
                       src="{{asset('assets/grainImages/Ellipse 29 (1).png')}}"
                      alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          Linda Smith
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img
                        src="{{asset('assets/grainImages/Ellipse 29.png')}}"
                        alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          Amy Miller
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
                <div class="swiper-slide h-[550px]">
                  <div
                    class="rounded-[8px] relative lg:w-[349px] w-fit flex flex-col p-5 gap-5 items-center justify-center h-[300px] bg-[#F1F3E8]"
                  >
                    <div class="flex mt-2 gap-5 item-center">
                      <img class=" "
                      src="{{asset('assets/grainImages/Ellipse 29sdc.png')}}" 
                       alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px] mt-20 font-[600]"
                        >
                          John Parker
                        </p>
                        <div class="flex gap-2">
                          <i
                            class="fa-solid fa-star w-[18px] h-[18px]"
                            style="color: #ffc857;"
                          ></i>
                          <p class="text-[14px]">4.8</p>
                        </div>
                      </div>
                    </div>
                    <p
                      class="text-[#4E4E4E] mb-20 lg:text-[16px] text-[12px] font-[400]"
                    >
                      I'm absolutely blown away by the quality of the products
                      from Hindustan Grain. The grains and spices add an
                      incredible depth of flavor to my dishes. Truly a culinary
                      delight!
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
          </div>
        </div>

        <div
          class="flex flex-col items-center justify-center bgi"
          style="
            background-image: {{url(asset('assets/grainImages/Rectangle 27.png'))}};
            background-repeat: no-repeat;
            background-position-x: center;
          "
        >
          <h3 class="text-center mt-20 text-[44px] font-[700]">Who we are</h3>

          <p class="text-center text-[20px] px-20 font-[400]">
            The company procures raw material directly from the centers of
            produce to maintain uniform taste and quality. The raw material is
            rst cleaned, dried and tested with the help of special machines and
            labs . It is then carefully grounded into the finished product
            passing through various stages.
          </p>
          <img
            class="lg:w-[790px] p-2 lg:h-[452px] mx-auto"
              src="{{asset('assets/grainImages/Rectangle 28.png')}}"
            alt=""
          />
        </div>
        <div class="flex bgi lg:-[1170px] flex-col gap-14">
          <p
            class="text-center mt-[30px] lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
          >
            Discover the Finest Grains, Spices, Dry Fruits & much more!
          </p>
          {{-- <p class="text-center text-[14px] font-[400]">
            Delicious, Nutrient-Packed, and Sourced with Care.
          </p>
          <div class="container lg:mt-[200px] mt-[400px]">
            <aside class="carousel overflow-hidden">
              <div class="carousel__wrapper">
                <div class="w-[650px] h-[650px] item" id="slide-0">
                  <img
                    src="{{asset('assets/grainImages/Ellipse 10.png')}}"
                   alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-1">
                  <img
                  src="{{asset('assets/grainImages/Ellipse 18.png')}}"
                   alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-2">
                  <img 
                   src="{{asset('assets/grainImages/Ellipse 31.png')}}"
                   alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-3">
                  <img 
                      src="{{asset('assets/grainImages/Ellipse 10.png')}}"
                   alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-4">
                  <img 
                  src="{{asset('assets/grainImages/Ellipse 18.png')}}"
                  alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-5">
                  <img 
                       src="{{asset('assets/grainImages/Ellipse 31.png')}}"
                   alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-6">
                  <img 
                      src="{{asset('assets/grainImages/Ellipse 10.png')}}"
           
                  alt="" />
                </div>
              </div>
            </aside>
          </div> --}}

          {{-- <img
            class="lg:block hidden h-[400px] w-full mx-auto mt-32"
             src="{{asset('assets/grainImages/Ellipse 35.png')}}"

            alt=""
          /> --}}
        </div>
        <div class="mt-32 flex flex-col w-full mx-auto gap-5">
          <h5 class="text-center text-[48px] font-[700]">Find Us</h5>
          <div class="h-[100vh] w-full" id="chartdiv"></div>
        </div>
        <p class="text-center mt-20 text-[48px] font-[700]">Connect with us</p>
        <div class="mt-10 flex flex-col lg:flex-row mx-auto gap-5">
          <div class="hidden mt-56 relative lg:block h-[150px] w-[230px]">
            <div class="overflow-hidden absolute bottom-0 flex">
              <img
                class="hidden lg:block mr-20 w-[230px] h-[300px] absolute overflow-hidden left-0 top-44 rotate-[15deg] grid justify-items-end"
                 src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
              <img
                class="hidden lg:block mr-20 w-[230px] h-[300px] opacity-0 left-0 top-20 -rotate-45 grid justify-items-end"
                     src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
            </div>
          </div>

          {{-- <div
            class="flex bg-[url({{asset('assets/grainImages/Rectangle 7.png')}})] relative justify-between lg:w-[500px] h-[356px] item-center p-5 text-black"
            style="background-image: url({{asset('assets/grainImages/Rectangle 7.png')}})"
          > --}}
          <div
          class="flex relative justify-between lg:w-[500px] h-[356px] item-center p-5 text-black"
          style="background-image: url('{{asset('assets/grainImages/Rectangle 7.png')}}');"
        >
            <div class="w-[40%] flex float-left flex-col">
              <p class="text-[32px] font-[600]">We’re open</p>
              <p class="text-[#ED3237] text-[20px] font-[600]">
                Mon-Fri : 9am-10pm
              </p>
            </div>
            <div class="w-[40%] flex flex-col h-fit gap-5">
              <p class="text-black text-[20px] font-[600]">follow us on:</p>
              <div class="flex gap-5">
                <img class="w-[30px] h-[30px]"
                 src="{{asset('assets/grainImages/Group 913.png')}}"
                 alt="" />
                <img class="w-[30px] h-[30px]"
                  src="{{asset('assets/grainImages/ig.png')}}"
                  alt="" />
                <img class="w-[30px] h-[30px]"
                     src="{{asset('assets/grainImages/twiter.png')}}"
                  alt="" />
              </div>
            </div>
          </div>
          <div
            class="flex relative justify-between lg:w-[500px] h-[356px] item-center p-5 text-black"
            style="background-image: url('{{asset('assets/grainImages/Rectangle 6.png')}}');"
          >
            <div class="z-40 w-[40%] flex float-left flex-col">
              <p class="text-[32px] font-[600]">Contact us at</p>
              <div class="flex flex-col text-[#ED3237] text-[20px] font-[600]">
                <p class="">+00 1234567890 or</p>
                <p>hindustangrain@mail.com</p>
              </div>
            </div>
          </div>
          <div class="hidden mt-56 relative lg:block h-[150px] w-[230px]">
            <div class="overflow-hidden absolute bottom-0 flex">
              <img
                class="hidden lg:block mr-20 w-[230px] h-[300px] absolute overflow-hidden left-0 top-44 -rotate-[30deg] grid justify-items-end"
                 src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
              <img
                class="hidden lg:block mr-20 w-[230px] h-[300px] opacity-0 left-0 top-20 rotate-45 grid justify-items-end"
                src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gradient-to-b relative p-10 from-[#42342E] to-[#664B40]">
        <div
          class="flex flex-col md:flex-row gap-10 lg:px-20 lg:text-[16px] text-[12px] font-[400]"
        >
          <div class="flex gap-5 flex-col lg:flex-row justify-between w-full">
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
          <div class="flex flex-col lg:flex-row justify-between w-full">
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
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
   
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- Chart code -->
   
    <script src="{{asset('js/clientSideIndex.js')}}"></script>
  </body>
</html>
