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
     src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
     integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
     crossorigin="anonymous"
     referrerpolicy="no-referrer"
   ></script>
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
  <link rel="stylesheet" href="{{asset('css/clientSideIndex.css')}}">

    <!-- Styles -->
    <style>
      #chartdiv {
        width: 100%;
        height: 550px;
      }
      @import url("https://fonts.googleapis.com/css?family=Dosis:400,600,700,800");
      @font-face {
        font-family: "Uni Sans";
        src: url("https://res.cloudinary.com/muhammederdem/raw/upload/v1536168547/unisans-font/UniSansHeavyCAPS.woff2")
            format("woff2"),
          url("https://res.cloudinary.com/muhammederdem/raw/upload/v1536168547/unisans-font/UniSansHeavyCAPS.woff")
            format("woff"),
          url("https://res.cloudinary.com/muhammederdem/raw/upload/v1536168548/unisans-font/UniSansHeavyCAPS.ttf")
            format("truetype");
        font-weight: 900;
        font-style: normal;
      }
      @font-face {
        font-family: "Uni Sans";
        src: url("https://res.cloudinary.com/muhammederdem/raw/upload/v1536168545/unisans-font/UniSansThinCAPS.woff2")
            format("woff2"),
          url("https://res.cloudinary.com/muhammederdem/raw/upload/v1536168545/unisans-font/UniSansThinCAPS.woff")
            format("woff"),
          url("https://res.cloudinary.com/muhammederdem/raw/upload/v1536168548/unisans-font/UniSansThinCAPS.ttf")
            format("truetype");
        font-weight: 500;
        font-style: normal;
      }

      @import url("https://fonts.googleapis.com/css2?family=Antipasto+Pro:wght@600&display=swap");

      img {
        max-width: 100%;
      }

      a {
        text-decoration: none;
      }

      .icon {
        display: inline-block;
        width: 1em;
        height: 1em;
        stroke-width: 0;
        stroke: currentColor;
        fill: currentColor;
      }

      .wrapper {
        width: 100%;
        height: 100vh;
        min-height: 750px;
        background: url(https://th.bing.com/th/id/OIP.o5Bh5nkwFnNXmHREQXPbfwHaFj?w=232&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7) center no-repeat;
        background-size: cover;
        position: relative;
        overflow: hidden;
        display: flex;
      }

      @media screen and (max-width: 992px) {
        .wrapper {
          height: auto;
          min-height: 100vh;
        }
      }

      .content {
        height: 600px;
        margin: auto;
        width: 100%;
        max-width: 1050px;
        display: flex;
        align-items: center;
        position: relative;
      }
      @media screen and (max-width: 1200px) {
        .content {
          max-width: 920px;
        }
      }
      @media screen and (max-width: 992px) {
        .content {
          max-width: 920px;
          margin-top: 100px;
          height: auto;
          min-height: 100vh;
        }
      }
      @media screen and (max-width: 767px) {
        .content {
          margin-top: 20px;
        }
      }
      @media screen and (max-width: 576px) {
        .content {
          margin-top: 20px;
          margin-bottom: 20px;
        }
      }

      .bg-shape {
        height: 100%;
        background-image: linear-gradient(-45deg, #f9bb41 0%, #533f37 100%);
        box-shadow: 0px 30px 139px 0px rgba(10, 22, 31, 0.26);
        border-radius: 30px;
        border-color: #533f37;
        padding: 45px 40px;
        width: 50%;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
      }
      @media screen and (max-width: 1200px) {
        .bg-shape {
          width: 45%;
        }
      }
      @media screen and (max-width: 992px) {
        .bg-shape {
          width: 90%;
          height: 290px;
          align-items: flex-start;
          padding: 50px;
          left: 50%;
          transform: translateX(-50%);
        }
      }
      @media screen and (max-width: 767px) {
        .bg-shape {
          padding: 30px;
          width: 95%;
          border-radius: 20px;
        }
      }
      @media screen and (max-width: 576px) {
        .bg-shape {
          height: 200px;
          padding: 30px;
        }
      }
      .bg-shape img {
        object-fit: contain;
        width: 510px;
        display: block;
        object-position: left center;
        opacity: 0.2;
        transform: rotate(-90deg) translateY(-50%);
        max-width: inherit;
        left: 10px;
        position: absolute;
      }
      @media screen and (max-width: 1200px) {
        .bg-shape img {
          width: 430px;
          left: 10px;
        }
      }
      @media screen and (max-width: 992px) {
        .bg-shape img {
          transform: none;
          width: 100%;
          position: relative;
          left: auto;
          margin-left: auto;
          margin-right: auto;
          object-fit: contain;
          height: 100%;
          object-position: top center;
        }
      }

      .next,
      .prev {
        z-index: 22;
        display: inline-flex;
        border: none;
        width: 61px;
        height: 61px;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        font-size: 25px;
        position: absolute;
        top: 50%;
        outline: none;
        cursor: pointer;
      }
      .next.disabled,
      .prev.disabled {
        cursor: not-allowed;
      }
      .next:focus,
      .prev:focus {
        outline: none;
      }
      @media screen and (max-width: 992px) {
        .next,
        .prev {
          top: 170px;
        }
      }

      .prev {
        left: -30%;
        transform: translate(-100%, -50%);
      }
      @media screen and (max-width: 1200px) {
        .prev {
          left: -21%;
        }
      }
      @media screen and (max-width: 992px) {
        .prev {
          left: 0;
          transform: translate(-50%, -50%);
        }
      }
      @media screen and (max-width: 576px) {
        .prev {
          transform: translate(20%, -50%);
        }
      }

      .next {
        right: 0;
        transform: translate(50%, -50%);
      }
      @media screen and (max-width: 576px) {
        .next {
          transform: translate(-20%, -50%);
        }
      }

      .product-slider {
        width: 75%;
        height: 85%;
        border-radius: 30px;
        box-shadow: 0 28px 79px 0 rgba(10, 22, 31, 0.35);
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
      }
      @media screen and (max-width: 1200px) {
        .product-slider {
          width: 80%;
        }
      }
      @media screen and (max-width: 992px) {
        .product-slider {
          width: 80%;
          left: 50%;
          transform: translateX(-50%);
          height: auto;
          position: relative;
          top: 0;
          margin-top: 170px;
          margin-bottom: 100px;
        }
        .product-slider br {
          display: none;
        }
      }
      @media screen and (max-width: 767px) {
        .product-slider {
          border-radius: 20px;
        }
      }
      @media screen and (max-width: 576px) {
        .product-slider {
          width: 99%;
          margin-top: 130px;
        }
      }
      .product-slider__wrp {
        height: 100%;
      }
      .product-slider__item {
        position: relative;
        height: 100%;
        width: 100%;
      }
      @media screen and (max-width: 992px) {
        .product-slider__item {
          height: auto;
        }
      }
      .product-slider__item.swiper-slide-active .product-slider__content > * {
        opacity: 1;
        transform: none;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(1) {
        transition-delay: 0s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(2) {
        transition-delay: 0.2s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(3) {
        transition-delay: 0.4s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(4) {
        transition-delay: 0.6s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(5) {
        transition-delay: 0.8s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(6) {
        transition-delay: 1s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(7) {
        transition-delay: 1.2s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(8) {
        transition-delay: 1.4s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(9) {
        transition-delay: 1.6s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(10) {
        transition-delay: 1.8s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(11) {
        transition-delay: 2s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(12) {
        transition-delay: 2.2s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(13) {
        transition-delay: 2.4s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(14) {
        transition-delay: 2.6s;
      }
      .product-slider__item.swiper-slide-active
        .product-slider__content
        > *:nth-child(15) {
        transition-delay: 2.8s;
      }
      .product-slider__item.swiper-slide-active circle {
        animation: progress 1s ease-out forwards;
        animation-delay: 0.5s;
        opacity: 0.75;
      }
      .product-slider__card {
        height: 100%;
        display: flex;
        align-items: center;
        width: 100%;
        transition: all 0.5s;
        overflow: hidden;
        position: relative;
        border-radius: 30px;
      }
      @media screen and (max-width: 992px) {
        .product-slider__card {
          align-items: flex-start;
        }
      }
      @media screen and (max-width: 767px) {
        .product-slider__card {
          border-radius: 20px;
        }
      }
      .product-slider__cover {
        border-radius: 30px;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
      }
      @media screen and (max-width: 767px) {
        .product-slider__cover {
          border-radius: 20px;
        }
      }
      .product-slider__content {
        color: #fff;
        padding-top: 1px;
        position: relative;
        z-index: 2;
        width: 100%;
        padding-left: 250px;
        padding-right: 80px;
      }
      @media screen and (max-width: 1200px) {
        .product-slider__content {
          padding-left: 220px;
        }
      }
      @media screen and (max-width: 992px) {
        .product-slider__content {
          padding: 20px 60px 100px;
          padding-top: 280px;
          text-align: center;
        }
      }
      @media screen and (max-width: 767px) {
        .product-slider__content {
          padding: 20px 30px 50px;
          padding-top: 300px;
        }
      }
      @media screen and (max-width: 576px) {
        .product-slider__content {
          padding-top: 220px;
          padding-left: 15px;
          padding-right: 15px;
        }
      }
      .product-slider__title {
        margin: 0;
        margin-bottom: 10px;
        font-family: "Antipasto Pro", sans-serif; /* Apply the Antipasto Pro font */
        font-size: 41px;
        letter-spacing: 2px;
        line-height: 1.2em;
        color: #c69c6d; /* Base color for fallback */
        background: linear-gradient(
          90deg,
          #c69c6d,
          #e2ac80
        ); /* Gradient color */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        opacity: 0;
        transform: translateY(55px);
        transition: all 0.5s;
      }
      @media screen and (max-width: 1200px) {
        .product-slider__title {
          font-size: 34px;
        }
      }
      @media screen and (max-width: 576px) {
        .product-slider__title {
          font-size: 24px;
          margin-top: 20px;
        }
      }
      .product-slider__price {
        display: block;
        font-size: 42px;
        opacity: 0;
        transform: translateY(55px);
        transition: all 0.5s;
      }
      @media screen and (max-width: 1200px) {
        .product-slider__price {
          font-size: 36px;
        }
      }
      @media screen and (max-width: 576px) {
        .product-slider__price {
          font-size: 30px;
        }
      }
      .product-slider__price sup {
        top: -20px;
        font-size: 65%;
      }
      .product-slider__cart {
        box-shadow: 0 7px 99px 0 #ffc857;
        background-image: linear-gradient(-45deg, #ffc857 0%, #e0a736 100%);
        border: none;
        color: #fff;
        padding: 10px 30px;
        border-radius: 50px;
        min-height: 50px;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 2px;
        margin-right: 40px;
        cursor: pointer;
      }
      @media screen and (max-width: 768px) {
        .product-slider__cart {
          margin-right: 30px;
        }
      }
      @media screen and (max-width: 576px) {
        .product-slider__cart {
          width: 100%;
          max-width: 300px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 50px;
        }
      }
      .product-slider__fav {
        color: #e5ecf4;
        background: none;
        border: none;
        position: relative;
        padding-left: 25px;
        outline: none;
        cursor: pointer;
      }
      .product-slider__fav:focus {
        outline: none;
      }
      .product-slider__fav .heart {
        display: block;
        position: absolute;
        left: 0;
        transform: translate(-50%, -50%) scale(0.7);
        top: 50%;
        pointer-events: none;
        width: 100px;
        height: 100px;
        background: url("https://res.cloudinary.com/muhammederdem/image/upload/v1536405215/starwars/heart.png")
          no-repeat;
        background-position: 0 0;
        cursor: pointer;
        transition: background-position 1s steps(28);
        transition-duration: 0s;
      }
      .product-slider__fav .heart.is-active {
        transition-duration: 1s;
        background-position: -2800px 0;
      }
      .product-slider__bottom {
        margin-top: 20px;
        opacity: 0;
        transform: translateY(55px);
        transition: all 0.5s;
      }
      .product-ctr {
        display: flex;
        align-items: center;
        min-height: 150px;
        margin-top: 40px;
        opacity: 0;
        transform: translateY(55px);
        transition: all 0.5s;
      }
      @media screen and (max-width: 992px) {
        .product-ctr {
          justify-content: center;
        }
      }
      .product-ctr .hr-vertical {
        width: 1px;
        background: #9fa3a7;
        align-self: stretch;
        margin: 0 35px;
        flex-shrink: 0;
        opacity: 0.5;
      }
      @media screen and (max-width: 767px) {
        .product-ctr {
          justify-content: center;
          flex-wrap: wrap;
          margin-bottom: 40px;
        }
        .product-ctr .hr-vertical {
          width: 100%;
          margin: 35px 0;
          height: 1px;
        }
      }
      @media screen and (max-width: 767px) {
        .product-labels {
          width: 100%;
        }
      }
      .product-labels__checkbox {
        display: none;
      }
      .product-labels__checkbox:checked + .product-labels__txt {
        border-color: #cc3743;
        padding: 10px 13px;
      }
      .product-labels__title {
        font-family: "Dosis", sans-serif;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 16px;
        margin-bottom: 10px;
      }
      .product-labels__group {
        display: flex;
        margin-bottom: 15px;
      }
      @media screen and (max-width: 992px) {
        .product-labels__group {
          justify-content: center;
        }
      }
      .product-labels__group:last-child {
        margin-bottom: 0;
      }
      .product-labels__item {
        margin: 5px;
        cursor: pointer;
      }
      .product-labels__item:first-child {
        margin-left: 0;
      }
      .product-labels__txt {
        display: block;
        border: 2px solid transparent;
        font-size: 14px;
        padding: 10px 20px;
        padding-left: 0;
        border-radius: 50px;
        transition: all 0.3s;
        letter-spacing: 2px;
      }
      @keyframes progress {
        0% {
          stroke-dasharray: 0 100;
        }
      }
      .product-inf {
        text-align: center;
      }
      @media screen and (max-width: 767px) {
        .product-inf {
          width: 100%;
        }
      }
      .product-inf__percent {
        font-weight: 700;
        font-size: 22px;
        letter-spacing: 1px;
        margin-bottom: 12px;
        font-family: "Dosis", sans-serif;
        position: relative;
      }
      .product-inf__percent circle {
        transform: rotate(180deg) scaleY(-1);
        transform-origin: 50%;
      }
      .product-inf__percent-txt {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .product-inf__title {
        font-family: "Dosis", sans-serif;
        font-weight: 700;
        letter-spacing: 2px;
        font-size: 18px;
      }
      .product-img {
        position: absolute;
        z-index: 2;
        width: 500px;
        left: 25%;
        transform: translateX(-45%);
        max-height: 500px;
        height: 100%;
        pointer-events: none;
      }
      @media screen and (max-width: 1200px) {
        .product-img {
          width: 430px;
          left: 20%;
        }
      }
      @media screen and (max-width: 992px) {
        .product-img {
          width: 430px;
          left: 50%;
          transform: translateX(-50%);
          top: 0;
          height: 350px;
        }
      }
      @media screen and (max-width: 767px) {
        .product-img {
          width: 100%;
          max-width: 400px;
          top: 30px;
          height: 390px;
        }
      }
      @media screen and (max-width: 576px) {
        .product-img {
          max-width: 250px;
          height: 300px;
        }
      }
      .product-img__item {
        display: flex;
        align-items: center;
        position: absolute;
        pointer-events: none;
        user-select: none;
        top: 50%;
        right: 0;
        transform: translateY(-50%) translateX(-130px);
        opacity: 0;
        transition: all 0.3s;
      }
      .product-img__item.active {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
        transition-delay: 0.3s;
      }
      .product-img__item img {
        object-fit: contain;
        object-position: center right;
        filter:drop-shadow(0px 0px 10px #ffc857);
      }

      .social {
        position: absolute;
        bottom: 10px;
        right: 0;
        width: 100%;
        display: flex;
        padding: 20px 55px;
        justify-content: space-between;
      }
      @media screen and (max-width: 576px) {
        .social {
          flex-direction: column;
          bottom: 0;
        }
      }
      .social__item {
        color: rgba(255, 255, 255, 0.75);
        font-family: "Dosis", sans-serif;
        font-weight: 700;
        letter-spacing: 2px;
        line-height: 1em;
        display: flex;
        align-items: center;
        transition: all 0.3s;
      }
      .social__item:hover {
        color: #fff;
      }
      @media screen and (max-width: 576px) {
        .social__item {
          margin-bottom: 10px;
        }
      }
      .social__img {
        width: 24px;
        margin-right: 15px;
      }
    </style>
  </head>

  <body class="text-white m-0 overflow-x-hidden">
    <div class="flex flex-col">
      <div id="head_content">
        @include('website.indexLayouts.header')
      </div>


      <!--Hero Section-->
      <div class="wrapper">
        <div class="content">
          <div class="bg-shape">
            <img src="{{asset('assets/grainImages/herobgmain.png')}}" alt="" />
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
                src="{{asset('assets/grainImages/chocolate.png')}}"
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
                        <p style="width: 225px;text-align: center;" class=" ml-0 lg:ml-[30px]  ">The elegant mosaic candle small vase is based on the distinctive design inspired by Indian Turkish designs. The decoration was chosen to exalt the elegance of the decorative 
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
          class=" w-[230px] h-[300px] xl:block hidden absolute float-right rotate-45 grid justify-items-end"
       src="{{asset('assets/grainImages/200w.gif')}}"
          alt=""
        />
        <div class=" mt-5 lg:mt-20 text-center">
          <h3 class= "md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] font-[700] text-center">What we Offer</h3>
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
                    @php
                    $id = $item->id;
                    $encodedId = base64_encode($id)
                    @endphp
                    <a href="{{ route('category-detail', $encodedId) }}" class="bg-[#FFC857] p-5 mb-28 flex gap-10 rounded-[8px] items-center">
                      <h1 class="text-black">Shop Now</h1>
                      <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
                    </a>
                  </div>
                </div>
                @endforeach
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
          class="overflow-x-hidden grid place-items-centers px-[20px]  overflow-hidden"
        >
          <p class=" mt-5 lg:mb-20 md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] mr-0 font-[700] lg:text-center text-left">Featured Products</p>
          <img
            style="overflow-x: hidden;"
            class=" overflow-x-hidden mr-0 lg:mr-20 md:w-[150px] md:h-[150px] xl:w-[230px] xl:h-[300px] w-[100px]  h-[100px] absolute right-[32px] -rotate-45 grid justify-items-end"
               src="{{asset('assets/grainImages/200w.gif')}}"
            alt=""
          />
        </div>

        <div class="mt-32 flex flex-col lg:flex-row mx-auto p-2 lg:px-10 gap-24" style="flex-wrap: wrap;width:100%">
          
          {{-- start --}}
      
          @if(count($featured) > 0)
          @foreach(collect($featured)->take(4) as $fet)
          <div class="flex justify-between gap-2 item-center rounded-[8px] h-[300px] lg:h-[350px] p-2 lg:pt-10 lg:px-10 pb-5 bg-[#38302E] border border-[F1BD73]" style="width: 46%;">
            <div class="w-[60%] flex flex-col gap-5">
              <p class="lg:text-[24px] lg:text-[16px] text-[12px] font-[700] text-[#FFC56F]">
                {{$fet->product_name}}
              </p>
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-star w-[18px] h-[18px]"
                  style="color: #ffc857;"
                ></i>
                <p class="text-[10px]">4.5</p>
              </div>
              <p class="text-[#E0E0E0] lg:text-[16px] text-[12px] font-[400]">
              {{$fet->short_description}}
              </p>
              <div class="flex gap-2">
                @php
                $qualityImagessss = json_decode($fet->quality_image_path, true);
                $qImagePathssss = is_array($qualityImagessss) && !empty($qualityImagessss) ? $qualityImagessss : ['assets/noImage (2).png'];
              @endphp
              @if(count($qImagePathssss) > 0)
              @foreach($qImagePathssss as $qI)
                <img 
                     src="{{asset($qI)}}"
                 alt="" />
                 @endforeach
                 @endif
                
              </div>
              <p
                class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700] text-[#FFC56F]"
              >
                Rs {{$fet->selling_price}}/-
              </p>
            </div>
            <div class="w-[40%] flex flex-col justify-center items-center">
              @php
              $productImagessss = json_decode($fet->product_image_path, true);
              $imagePathssss = is_array($productImagessss) && !empty($productImagessss) ? reset($productImagessss) : 'assets/noImage (2).png';
            @endphp
              <img
                class="w-[280px] h-[320px]"
                                   src="{{asset($imagePathssss)}}"
       
                alt=""
              />
              @php
              $id = $fet->id;
              $encodedId = base64_encode($id)
              @endphp
              <a href="{{ route('shop.webProduct', $encodedId) }}"
                class="bg-[#FFC857] p-2 lg:p-2 lg:p-5 mb-44 flex gap-10 rounded-[8px] items-center"
              >
                <h1 class="text-black">Shop Now</h1>
                <i class="fa-solid fa-arrow-right" style="color: #9f6b00;"></i>
            </a>
            </div>
          </div>
            @endforeach
            @endif

          {{-- end --}}

        </div>
        <div class="mt-32 flex flex-col lg:flex-row mx-auto p-2 lg:px-10 gap-24">
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
        {{-- <div class="overflow-x-hidden grid place-items-centers px-[20px]  overflow-hidden">
          <p class=" mt-5 lg:mt-20 md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] mr-0 font-[700] lg:text-center text-left">Shop our Spices</p>
          <!-- <div class=" overflow-x-hidden mr-0 lg:mr-20 md:w-[150px] md:h-[150px] xl:w-[230px] xl:h-[300px] w-[100px]  h-[100px] absolute right-[32px] -rotate-45 grid justify-items-end" ><iframe src="https://giphy.com/embed/Gfaf7zURYaiNuB6qxa"  frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/stickers/chilli-sillychillies-chilliguy-Gfaf7zURYaiNuB6qxa">via GIPHY</a></p> -->
          <img
            class=" overflow-x-hidden mr-0 lg:mr-20 md:w-[150px] md:h-[150px] xl:w-[230px] xl:h-[300px] w-[100px]  h-[100px] absolute lg:left-[32px] right-[32px]  -rotate -45 grid justify-items-end"
            src="{{asset('assets/grainImages/Chille.webp')}}"
            alt=""
          />
        </div> --}}

 {{-- start --}}
 @if(count($products) > 0)
 @foreach($products as $key => $pros)

 <div class="grid place-items-center mt-20 overflow-hidden">
   <p class="mt-20 text-[48px] mr-0 font-[700]">Shop our {{$key}}</p>
   @if($loop->iteration == 4)
   <img
     class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
               {{-- src="{{asset('assets/grainImages/200w.gif')}}" --}}
              src="{{asset('assets/grainImages/Chille.webp')}}"  
     alt=""
   />
   @elseif($loop->iteration == 1)
   <img
     class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
               src="{{asset('assets/grainImages/200w.gif')}}"
     alt=""
   />
   @elseif($loop->iteration == 5)
   <img
     class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
               src="{{asset('assets/grainImages/Tea_cup_1.gif')}}"
     alt=""
   />
   @elseif($loop->iteration == 3)
   <img
     class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
               src="{{asset('assets/grainImages/Pasta.webp')}}"
     alt=""
   />
   @elseif($loop->iteration == 2)
   <img
     class="hidden lg:block mr-20 w-[230px] h-[300px] absolute left-0 rotate-45 grid justify-items-end"
               src="{{asset('assets/grainImages/rice_1.gif')}}"
     alt=""
   />
   @endif
 </div>

 <div class="boy">
   <div class="swiper-container text-black">
     <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
       <div class="swiper-wrapper">
         @foreach($pros as $pro)
         <div class="swiper-slide h-[550px]">
           <div
             class="px-5 py-2 rounded-[8px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
           >
           @php
           $productImages = json_decode($pro->product_image_path, true);
           $imagePaths = is_array($productImages) && !empty($productImages) ? reset($productImages) : 'assets/noImage (2).png';
         @endphp
             <img
               class="w-[240px] h-[200px]"
                         src="{{asset($imagePaths)}}"
 
               alt=""
             />
             <h1
               class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
             >
               {{$pro->product_name}}
             </h1>
             <p class="text-center">
              {{$pro->short_description}}
             </p>
             <div class="flex w-full justify-between items-center">
               <p class="text-[20px] font-[700] text-[#B48629]">
                Rs{{$pro->selling_price}}/-
               </p>
               <div class="flex gap-2 items-center">
                 <i
                   class="fa-solid fa-star w-[18px] h-[18px]"
                   style="color: #ffc857;"
                 ></i>
                 <p class="text-[10px]">{{isset($pro->product_rating)? $pro->product_rating : '4.5'}}</p>
               </div>
             </div>
             @php
             $id = $pro->id;
             $encodedId = base64_encode($id)
             @endphp
             <a href="{{ route('shop.webProduct', $encodedId) }}"
               class="bg-[#FFC857] lg:p-5 p-2 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
             >

               <h1 class="text-black">Shop Now</h1>
               <i
                 class="fa-solid fa-arrow-right"
                 style="color: #9f6b00;"
               ></i>
           </a>
           </div>
         </div>
         @endforeach
         
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

 @endforeach
 @endif





        <h3 class="text-center  mt-5 lg:mt-20 md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] font-[700]">
          Our Best Selling
        </h3>

        <div class="boy">
          <div class="swiper-container text-black">
            <div class="swiper mySwiper flex items-center w-[85%] md:w-[90%]">
              <div class="swiper-wrapper">
             
                @if(count($featured) > 0)
                @foreach($featured as $fet)
                <div class="swiper-slide h-[550px]">

                  <div
                    class="px-5 py-2 rounded-[8px] w-[200px] h-[360px] relative w-[349px] flex flex-col gap-5 items-center justify-center h-[270px] bg-[#F1F3E8]"
                  >
                  @php
                  $productImagessssh = json_decode($fet->product_image_path, true);
                  $imagePathssssh = is_array($productImagessssh) && !empty($productImagessssh) ? reset($productImagessssh) : 'assets/noImage (2).png';
                @endphp
                    <img
                      class="w-[240px] h-[200px]"
                               src="{{asset($imagePathssssh)}}"
                      alt=""
                    />
                    <h1
                      class="lg:text-[24px] lg:text-[16px] text-[12px]font-[700]"
                    >
                    {{$fet->product_name}}
                    </h1>
                    <p class="text-center">
                      {{$fet->short_description}}
                    </p>
                    <div class="flex w-full justify-between items-center">
                      <p class="text-[20px] font-[700] text-[#B48629]">
                        Rs {{$fet->selling_price}}/-
                      </p>
                      <div class="flex gap-2 items-center">
                        <i
                          class="fa-solid fa-star w-[18px] h-[18px]"
                          style="color: #ffc857;"
                        ></i>
                        <p class="text-[10px]">4.5</p>
                      </div>
                    </div>
                    @php
                    $id = $fet->id;
                    $encodedId = base64_encode($id)
                    @endphp
                    <a href="{{ route('shop.webProduct', $encodedId) }}"
                      class="bg-[#FFC857] p-5 w-full mb-28 flex justify-between gap-10 rounded-[8px] items-center"
                    >
                      <h1 class="text-black">Shop Now</h1>
                      <i
                        class="fa-solid fa-arrow-right"
                        style="color: #9f6b00;"
                      ></i>
                  </a>
                  </div>
                </div>
                @endforeach
                @endif
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

        <h3 class="text-center  mt-5 lg:mt-20 md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] text-center font-[700]">
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
                      <img  src="{{asset('assets/grainImages/Ellipse 29.png')}}" alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px]  mt-5 lg:mt-20 font-[600]"
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
                      <img class=" "  src="{{asset('assets/grainImages/Ellipse 29sdc.png')}}"  alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px]  mt-5 lg:mt-20 font-[600]"
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
                      <img          src="{{asset('assets/grainImages/Ellipse 29 (1).png')}}" alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px]  mt-5 lg:mt-20 font-[600]"
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
                      <img src="{{asset('assets/grainImages/Ellipse 29.png')}}" alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px]  mt-5 lg:mt-20 font-[600]"
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
                      <img class=" "  src="{{asset('assets/grainImages/Ellipse 29sdc.png')}}" alt="" />
                      <div class="flex flex-col item-center gap-2">
                        <p
                          class="lg:text-[24px] lg:text-[16px] text-[12px]  mt-5 lg:mt-20 font-[600]"
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
          <h3 class="text-center  mt-5 lg:mt-20 text-[44px] font-[700] text-center">Who we are</h3>

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
          <p class="text-center text-[14px] font-[400]">
            Delicious, Nutrient-Packed, and Sourced with Care.
          </p>
          <div class="container hidden lg:mt-[200px] mt-[400px]">
            <aside class="carousel overflow-hidden">
              <div class="carousel__wrapper">
                <div class="w-[650px] h-[650px] item" id="slide-0">
                  <img src="Ellipse 10.png" alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-1">
                  <img src="Ellipse 18.png" alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-2">
                  <img src="Ellipse 31.png" alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-3">
                  <img src="Ellipse 10.png" alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-4">
                  <img src="Ellipse 18.png" alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-5">
                  <img src="Ellipse 31.png" alt="" />
                </div>
                <div class="item w-[650px] h-[650px]" id="slide-6">
                  <img src="Ellipse 10.png" alt="" />
                </div>
              </div>
            </aside>
          </div>

          <img
            class=" hidden h-[400px] w-full mx-auto mt-20 lg:mt-32"
            src="Ellipse 35.png"
            alt=""
          />
        </div>
        <div class="mt-20 lg:mt-32 flex flex-col w-full mx-auto gap-5">
          <h5 class="text-center md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] font-[700]">Find Us</h5>
          <div class="h-[100vh] w-full" id="chartdiv"></div>
        </div>
        <p class="text-center  mt-5 lg:mt-20 md:text-[32px] sm:text-[24px] text-[28px] lg:text-[48px] font-[700] ">Connect with us</p>
        <div class="mt-10 flex flex-col xl:flex-row mx-auto gap-5">
          <div class="hidden mt-56 relative min-[1540px]:block h-[150px] w-[230px]">
            <div class="overflow-hidden absolute bottom-0 flex">
              <img
                class=" mr-20 w-[230px] h-[300px] absolute overflow-hidden left-0 top-44 rotate-[15deg] grid justify-items-end"
                src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
              <img
                class=" mr-20 w-[230px] h-[300px] opacity-0 left-0 top-20 -rotate-45 grid justify-items-end"
                src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
            </div>
          </div>
          <div
            class="flex bg-[url('Rectangle 7.png')] relative justify-between lg:w-[500px] h-[356px] item-center p-5 text-black"
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
                <img class="w-[30px] h-[30px]" src="{{asset('assets/grainImages/Group 913.png')}}" alt="" />
                <img class="w-[30px] h-[30px]" src="{{asset('assets/grainImages/ig.png')}}" alt="" />
                <img class="w-[30px] h-[30px]" src="{{asset('assets/grainImages/twiter.png')}}" alt="" />
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
          <div class="hidden mt-56 relative  min-[1540px]:block h-[150px] w-[230px]">
            <div class="overflow-hidden absolute bottom-0 flex">
              <img
                class=" mr-20 w-[230px] h-[300px] absolute overflow-hidden left-0 top-44 -rotate-[30deg] grid justify-items-end"
                src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
              <img
                class=" mr-20 w-[230px] h-[300px] opacity-0 left-0 top-20 rotate-45 grid justify-items-end"
                src="{{asset('assets/grainImages/200w.gif')}}"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
     <!-- Footer -->
     <div id="foot_content">
      @include('website.indexLayouts.footer')
     </div>
     <!-- bottom menu bar -->
     <div id="bottom_menu">
      @include('website.indexLayouts.BottomMenu')
     </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
      function myFunction() {
        var myLinks = document.getElementById("myLinks");
        myLinks.style.display =
          myLinks.style.display === "none" || myLinks.style.display === ""
            ? "flex"
            : "none";
      }
      function myFunctionh() {
        var myLinksh = document.querySelector(".myLinksh");
        myLinksh.style.display =
          myLinksh.style.display === "none" || myLinksh.style.display === ""
            ? "flex"
            : "none";
        var myLinkshc = document.querySelector(".myLinkshc");
        myLinkshc.style.display =
          myLinkshc.style.display === "block" || myLinkshc.style.display === ""
            ? "none"
            : "block";
      }
      function mymenu() {
        var menu = document.getElementById("menu");
        menu.style.display =
          menu.style.display === "none" || menu.style.display === ""
            ? "block"
            : "none";
        var myLinksh = document.querySelector(".myLinksh");
        myLinksh.style.display =
          myLinksh.style.display === "none" || myLinksh.style.display === ""
            ? "flex"
            : "none";
      }
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
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
            slidesPerView: 2,
            spaceBetween: 20,
          },
          1220:{
            slidesPerView: 3,
            spaceBetween: 20,
          }
        },
      });
    </script>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- Chart code -->
    <!-- <script>
      am5.ready(function () {
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([am5themes_Animated.new(root)]);

        // Create the map chart
        // https://www.amcharts.com/docs/v5/charts/map-chart/
        var chart = root.container.children.push(
          am5map.MapChart.new(root, {
            panX: "rotateX",
            panY: "translateY",
            projection: am5map.geoMercator(),
            homeGeoPoint: { latitude: 2, longitude: 2 },
          })
        );

        var cont = chart.children.push(
          am5.Container.new(root, {
            layout: root.horizontalLayout,
            x: 20,
            y: 40,
          })
        );

        // Add labels and controls
        cont.children.push(
          am5.Label.new(root, {
            centerY: am5.p50,
            text: "Map",
          })
        );

        var switchButton = cont.children.push(
          am5.Button.new(root, {
            themeTags: ["switch"],
            centerY: am5.p50,
            icon: am5.Circle.new(root, {
              themeTags: ["icon"],
            }),
          })
        );

        switchButton.on("active", function () {
          if (!switchButton.get("active")) {
            chart.set("projection", am5map.geoMercator());
            chart.set("panY", "translateY");
            chart.set("rotationY", 0);
            backgroundSeries.mapPolygons.template.set("fillOpacity", 0);
          } else {
            chart.set("projection", am5map.geoOrthographic());
            chart.set("panY", "rotateY");

            backgroundSeries.mapPolygons.template.set("fillOpacity", 0.1);
          }
        });

        cont.children.push(
          am5.Label.new(root, {
            centerY: am5.p50,
            text: "Globe",
          })
        );

        // Create series for background fill
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
        var backgroundSeries = chart.series.push(
          am5map.MapPolygonSeries.new(root, {})
        );
        backgroundSeries.mapPolygons.template.setAll({
          fill: root.interfaceColors.get("alternativeBackground"),
          fillOpacity: 0,
          strokeOpacity: 0,
        });

        // Add background polygon
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
        backgroundSeries.data.push({
          geometry: am5map.getGeoRectangle(90, 180, -90, -180),
        });

        // Create main polygon series for countries
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
        var polygonSeries = chart.series.push(
          am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_worldLow,
          })
        );

        // Create line series for trajectory lines
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-line-series/
        var lineSeries = chart.series.push(am5map.MapLineSeries.new(root, {}));
        lineSeries.mapLines.template.setAll({
          stroke: root.interfaceColors.get("alternativeBackground"),
          strokeOpacity: 0.3,
        });

        // Create point series for markers
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-point-series/
        var pointSeries = chart.series.push(
          am5map.MapPointSeries.new(root, {})
        );

        pointSeries.bullets.push(function () {
          var circle = am5.Circle.new(root, {
            radius: 7,
            tooltipText: "Drag me!",
            cursorOverStyle: "pointer",
            tooltipY: 0,
            fill: am5.color(0xffba00),
            stroke: root.interfaceColors.get("background"),
            strokeWidth: 2,
            draggable: true,
          });

          circle.events.on("dragged", function (event) {
            var dataItem = event.target.dataItem;
            var projection = chart.get("projection");
            var geoPoint = chart.invert({ x: circle.x(), y: circle.y() });

            dataItem.setAll({
              longitude: geoPoint.longitude,
              latitude: geoPoint.latitude,
            });
          });

          return am5.Bullet.new(root, {
            sprite: circle,
          });
        });

        var paris = addCity({ latitude: 48.8567, longitude: 2.351 }, "Paris");
        var toronto = addCity(
          { latitude: 43.8163, longitude: -79.4287 },
          "Toronto"
        );
        var la = addCity({ latitude: 34.3, longitude: -118.15 }, "Los Angeles");
        var havana = addCity({ latitude: 23, longitude: -82 }, "Havana");

        var lineDataItem = lineSeries.pushDataItem({
          pointsToConnect: [paris, toronto, la, havana],
        });

        var planeSeries = chart.series.push(
          am5map.MapPointSeries.new(root, {})
        );

        var plane = am5.Graphics.new(root, {
          svgPath:
            "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47",
          scale: 0.06,
          centerY: am5.p50,
          centerX: am5.p50,
          fill: am5.color(0x000000),
        });

        planeSeries.bullets.push(function () {
          var container = am5.Container.new(root, {});
          container.children.push(plane);
          return am5.Bullet.new(root, { sprite: container });
        });

        var planeDataItem = planeSeries.pushDataItem({
          lineDataItem: lineDataItem,
          positionOnLine: 0,
          autoRotate: true,
        });
        planeDataItem.dataContext = {};

        planeDataItem.animate({
          key: "positionOnLine",
          to: 1,
          duration: 10000,
          loops: Infinity,
          easing: am5.ease.yoyo(am5.ease.linear),
        });

        planeDataItem.on("positionOnLine", (value) => {
          if (planeDataItem.dataContext.prevPosition < value) {
            plane.set("rotation", 0);
          }

          if (planeDataItem.dataContext.prevPosition > value) {
            plane.set("rotation", -180);
          }
          planeDataItem.dataContext.prevPosition = value;
        });

        function addCity(coords, title) {
          return pointSeries.pushDataItem({
            latitude: coords.latitude,
            longitude: coords.longitude,
          });
        }

        // Make stuff animate on load
        chart.appear(1000, 100);
      }); // end am5.ready()
    </script> -->

    <script>
      am5.ready(function () {
        // Create root element
        var root = am5.Root.new("chartdiv");
    
        // Set themes
        root.setThemes([am5themes_Animated.new(root)]);
    
        // Remove amCharts watermark
        root._logo.dispose();
    
        // Create the map chart with the globe (Orthographic) as default
        var chart = root.container.children.push(
          am5map.MapChart.new(root, {
            panX: "rotateX",
            panY: "rotateY",
            projection: am5map.geoOrthographic(),
            homeGeoPoint: { latitude: 2, longitude: 2 },
            wheelable: false, // Disable zoom functionality
          })
        );
    
        // Create series for background fill
        var backgroundSeries = chart.series.push(
          am5map.MapPolygonSeries.new(root, {})
        );
        backgroundSeries.mapPolygons.template.setAll({
          fill: am5.color(0x6794dc), // Globe background color
          fillOpacity: 1,
          strokeOpacity: 0,
        });
    
        // Add background polygon
        backgroundSeries.data.push({
          geometry: am5map.getGeoRectangle(90, 180, -90, -180),
        });
    
        // Create main polygon series for countries
        var polygonSeries = chart.series.push(
          am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_worldLow,
          })
        );
        polygonSeries.mapPolygons.template.setAll({
          fill: am5.color(0x267c29), // Map color set to golden
          stroke: am5.color(0x267c29),
          strokeWidth: 0.5
        });
    
        // Create line series for trajectory lines
        var lineSeries = chart.series.push(am5map.MapLineSeries.new(root, {}));
        lineSeries.mapLines.template.setAll({
          stroke: root.interfaceColors.get("alternativeBackground"),
          strokeOpacity: 0.3,
        });
    
        // Create point series for markers
        var pointSeries = chart.series.push(
          am5map.MapPointSeries.new(root, {})
        );
    
        pointSeries.bullets.push(function () {
          var circle = am5.Circle.new(root, {
            radius: 7,
            tooltipText: "Drag me!",
            cursorOverStyle: "pointer",
            tooltipY: 0,
            fill: am5.color(0xffba00),
            stroke: root.interfaceColors.get("background"),
            strokeWidth: 2,
            draggable: true,
          });
    
          circle.events.on("dragged", function (event) {
            var dataItem = event.target.dataItem;
            var projection = chart.get("projection");
            var geoPoint = chart.invert({ x: circle.x(), y: circle.y() });
    
            dataItem.setAll({
              longitude: geoPoint.longitude,
              latitude: geoPoint.latitude,
            });
          });
    
          return am5.Bullet.new(root, {
            sprite: circle,
          });
        });
    
        var paris = addCity({ latitude: 48.8567, longitude: 2.351 }, "Paris");
        var toronto = addCity(
          { latitude: 43.8163, longitude: -79.4287 },
          "Toronto"
        );
        var la = addCity({ latitude: 34.3, longitude: -118.15 }, "Los Angeles");
        var havana = addCity({ latitude: 23, longitude: -82 }, "Havana");
    
        var lineDataItem = lineSeries.pushDataItem({
          pointsToConnect: [paris, toronto, la, havana],
        });
    
        var planeSeries = chart.series.push(
          am5map.MapPointSeries.new(root, {})
        );
    
        var plane = am5.Graphics.new(root, {
          svgPath:
            "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47",
          scale: 0.06,
          centerY: am5.p50,
          centerX: am5.p50,
          fill: am5.color(0x000000),
        });
    
        planeSeries.bullets.push(function () {
          var container = am5.Container.new(root, {});
          container.children.push(plane);
          return am5.Bullet.new(root, { sprite: container });
        });
    
        var planeDataItem = planeSeries.pushDataItem({
          lineDataItem: lineDataItem,
          positionOnLine: 0,
          autoRotate: true,
        });
        planeDataItem.dataContext = {};
    
        planeDataItem.animate({
          key: "positionOnLine",
          to: 1,
          duration: 10000,
          loops: Infinity,
          easing: am5.ease.yoyo(am5.ease.linear),
        });
    
        planeDataItem.on("positionOnLine", (value) => {
          if (planeDataItem.dataContext.prevPosition < value) {
            plane.set("rotation", 0);
          }
    
          if (planeDataItem.dataContext.prevPosition > value) {
            plane.set("rotation", -180);
          }
          planeDataItem.dataContext.prevPosition = value;
        });
    
        function addCity(coords, title) {
          return pointSeries.pushDataItem({
            latitude: coords.latitude,
            longitude: coords.longitude,
          });
        }
    
        // Make stuff animate on load
        chart.appear(1000, 100);
      }); // end am5.ready()
    </script>
    

    
    <script>
      var swiper = new Swiper(".product-slider", {
        spaceBetween: 30,
        effect: "fade",
        // initialSlide: 2,
        loop: true,
        autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
        navigation: {
          nextEl: ".next",
          prevEl: ".prev",
        },
        // mousewheel: {
        //     // invert: false
        // },
        on: {
          init: function () {
            var index = this.activeIndex;

            var target = $(".product-slider__item").eq(index).data("target");

            console.log(target);

            $(".product-img__item").removeClass("active");
            $(".product-img__item#" + target).addClass("active");
          },
        },
      });

      swiper.on("slideChange", function () {
        var index = this.activeIndex;

        var target = $(".product-slider__item").eq(index).data("target");

        console.log(target);

        $(".product-img__item").removeClass("active");
        $(".product-img__item#" + target).addClass("active");

        if (swiper.isEnd) {
          $(".prev").removeClass("disabled");
          $(".next").addClass("disabled");
        } else {
          $(".next").removeClass("disabled");
        }

        if (swiper.isBeginning) {
          $(".prev").addClass("disabled");
        } else {
          $(".prev").removeClass("disabled");
        }
      });

      $(".js-fav").on("click", function () {
        $(this).find(".heart").toggleClass("is-active");
      });
    </script>
     </script>
     <!-- header , footer ,bottom  -->
     {{-- <script>
       $("#bottom_menu").load("{{ asset('resources/views/website/indexLayouts/BottomMenu') }}");
       $("#head_content").load("{{ asset('resources/views/website/indexLayouts/header') }}");
       $("#foot_content").load("{{ asset('resources/views/website/indexLayouts/footer') }}");
     </script> --}}
  </body>
</html>
