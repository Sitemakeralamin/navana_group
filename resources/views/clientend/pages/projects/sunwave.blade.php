@extends('clientend.layouts.master')
@section('title','Sun Wave Hotel &amp; Resort')
@section('page-style')
<style>
@media screen and (max-width: 991px) {
            .widget-visible iframe:first-child {
          all: unset;
          bottom: 76px !important;
      }
      .widget-visible iframe:nth-child(2) {
          all: unset;
          bottom: 145px !important;
      }
      .widget-visible iframe:nth-child(4) {
          all: unset;
          bottom: 85px !important;
      }

        .error-placeholder::placeholder {
            color: red !important;
        }
    }

        .truncate-text {
            width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media(max-width:520px){
            .truncate-text{
                width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                font-size:14px;
                text-align:left;
            }
        }
                .slideshow-container {
        max-width: 100%;
        position: relative;
        margin: auto;
        overflow: hidden;
        border-radius: 8px;
        }

        .mySlides {
        display: none;
        }

        /* Standardized image size */
        .mySlides img {
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 9;
        object-fit: cover;
        vertical-align: middle;
        cursor: zoom-in; /* Shows the user the image is clickable */
        }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        background-color: rgba(0, 0, 0, 0.3);
        user-select: none;
        z-index: 2;
        }

        .next {
        right: 0;
        }

        .prev:hover, .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .slide-text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.5);
        }

        /* Dots */
        .dot-container {
        text-align: center;
        padding: 10px;
        }

        .dot {
        cursor: pointer;
        height: 12px;
        width: 12px;
        margin: 0 4px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fade animation */
        .fade {
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        /* ==========================================================================
        LIGHTBOX BOX STYLES (NEW)
        ========================================================================== */
        .lightbox {
        display: none; 
        position: fixed; 
        z-index: 9999; /* Sits on top of everything else */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9); /* Black background with transparency */
        }

        /* The popup image */
        .lightbox-content {
        margin: auto;
        display: block;
        max-width: 85%;
        max-height: 80%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: zoomIn 0.3s ease-out;
        }

        /* Lightbox caption text */
        #lightboxCaption {
        position: absolute;
        bottom: 5%;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 20px;
        text-align: center;
        }

        /* Close button */
        .close-lightbox {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        }

        @keyframes zoomIn {
        from {transform: translate(-50%, -50%) scale(0.7); opacity: 0;}
        to {transform: translate(-50%, -50%) scale(1); opacity: 1;}
        }
.photo-gallery-header {
        display: flex;
        justify-content: center;
    }

    h4 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .image-container {
        top: -10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .categories {
        display: flex;
        flex-direction: column;
        margin: 35px;
        gap: 0;
    }

    .category {
        cursor: pointer;
        border: 2px solid transparent;
        padding: 10px;
        border-radius: 30px;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        width: 100px;
        background: #00000012;
    }

        .category img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: block;
            border: 4px solid #2360a257;
        }

        .category p {
            font-size: medium;
            font-weight: bold;
        }

        .category.active img {
            border: 4px solid #000000a3;
            border-radius: 50px;
        }

    .slider-wrapper {
        position: relative;
        right: -50px;
        width: 70%;
        max-width: 700px;
        overflow: hidden;
        border-radius: 15px;
    }

    .slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

        .slider img {
            width: 100%;
            display: none;
            right: 50px;
        }

            .slider img.active {
                display: block;
            }

    button.prev, button.next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 18px;
        border-radius: 5px;
    }

    button.prev {
        left: 10px;
    }

    button.next {
        right: 10px;
    }

    .thumbnails {
        position: fixed;
        display: flex;
        gap: 30px;
        margin-top: 20px;
        bottom: 20px;
        /* overflow: hidden; */
        justify-content: center;
        width: 70%;
        left: 20%;
        transform: translateX(-50%);
    }

        .thumbnails .thumb {
            width: 70px;
            height: 80px;
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.2s;
            border: 3px solid transparent;
        }

    .carousel-container {
        position: relative;
        display: flex;
        align-items: center;
        align-self: center;
        justify-self: center;
        width: 1000px;
        height: 520px;
        perspective: 1000px;
        box-shadow: none;
    }

    .carousel {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 280px;
        height: 180px;
        margin: auto;
    }

    .card {
        position: absolute;
        width: 750px;
        height: 550px;
        transition: transform 0.5s ease, z-index 0.3s, filter 0.5s ease;
        cursor: pointer;
        transform-style: preserve-3d;
        left: auto;
        filter: blur(5px);
    }

        .card.active {
            filter: blur(0);
        }

        .card .front,
        .card .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 30px;
            background-size: cover;
            background-position: center;
        }

        .card .back {
            transform: rotateY(180deg);
        }

    .flipped {
        transform: rotateY(180deg);
    }

    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #00000000;
        border: none;
        cursor: pointer;
        font-size: 24px;
        font-weight: 600;
        padding: 5px;
        user-select: none;
        z-index: 100;
        color: white;
    }

    .arrow-left {
        left: 8%;
        font-size: 24px;
        background: #6bd8ff;
        padding: 5PX 14px;
        border-radius: 50%;
        color: white;
        opacity: 100%
    }

    .arrow-right {
        right: 19%;
        font-size: 24px;
        background: #6bd8ff;
        padding: 5PX 14px;
        border-radius: 50%;
        color: white;
        opacity: 100%
    }

    .carousel-indicator {
        position: absolute;
        bottom: -14px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 5px;
    }

    .indicator {
        width: 10px;
        height: 10px;
        background: white;
        border-radius: 50%;
        opacity: 0.5;
        cursor: pointer;
    }

    .active {
        opacity: 1;
        color: white
    }

    .thumbnails .thumb.active-thumb {
        border: 3px solid rgb(0, 174, 243);
        z-index: 100;
        width: 70px;
        height: 80px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .thumbnails div {
        transition: transform 0.5s ease-in-out;
    }



    @media (max-width: 1025px ) {
        .image-container {
            display: grid;
            grid-template-columns: 1fr;
            bottom: 20px;
        }

        .categories {
            display: flex;
            justify-content: center;
            flex-direction: row;
            align-items: center;
        }

        .card {
            width: 450px;
            height: 300px !important; /* Adjust default height */
        }

        .carousel-section .image-container div .carousel-container {
            margin: auto;
            align-items: center;
            right: 0;
            left: 0;
            margin-left: 550px;
        }

        section {
            margin-left: 0;
        }

        .arrow-right {
            right: 35%;
        }

        .arrow-left {
            left: 21%
        }

        .thumbnails {
            position: fixed;
            display: flex;
            gap: 30px;
            margin-top: 20px;
            bottom: 50%;
            justify-content: center;
            width: 70%;
            left: 20%;
            transform: translateX(-50%);
        }

        .carousel-container {
            height: 335px;
        }
    }


    @media (max-width: 768px ) {
        .image-container {
            display: grid;
            grid-template-columns: 1fr;
            bottom: 20px;
        }

        .categories {
            display: flex;
            justify-content: center;
            flex-direction: row;
            align-items: center;
        }

        .card {
            width: 450px;
            height: 300px !important; /* Adjust default height */
        }

        .carousel-section .image-container div .carousel-container {
            margin: auto;
            align-items: center;
            right: 0;
            left: 0;
            margin-left: 550px;
        }

        .thumbnails {
            position: fixed;
            display: flex;
            gap: 30px;
            margin-top: 20px;
            bottom: 40%;
            /* overflow: hidden; */
            justify-content: center;
            width: 70%;
            left: 20%;
            transform: translateX(-50%);
        }

        .carousel-container {
            height: 335px;
        }
    }


    @media (max-width: 480px) {

        .thumbnails {
            position: fixed;
            display: flex;
            gap: 30px;
            margin-top: 20px;
            bottom: 40%;
            /* overflow: hidden; */
            justify-content: center;
            width: 70%;
            left: 20%;
            transform: translateX(-50%);
        }

        .categories {
            margin-top: 150px;
        }

        .card .front,
        .card .back {
            position: absolute;
            width: 80%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 30px;
            background-size: cover;
            background-position: center;
            margin-left: 114px;
        }

        .section__header{
            font-size:20px;
        }

        .category{
            width:85px !important;
        }
    }

    @media(max-width:375px){
        .card .front,
        .card .back {
            position: absolute;
            width: 61%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 30px;
            background-size: cover;
            background-position: center;
            margin-left: 158px;
        }
    }

    @media(max-width: 768px) {
        .arrow-left {
            display: none
        }

        .arrow-right {
            display: none;
        }

        .carousel-container {
            height: 335px;
        }

        .categories {
            margin-top: 150px;
        }
    }
</style>
@endsection
@section('main')
<div class="hero_image_header_bayHills" >
        <img class="w-100" src="{{asset('assets/ghrweb/Sites/GHRWEB/ProjectBanner/2eace455-2f4f-4199-8712-500fc21d0dca.jpg')}}" alt="Sun Wave" />
    </div>


    <!-- about-section start -->
    <section class="branch-section pt-0 pb-0 mt-30 mb-30">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container__2">
                <div class="row align-items-center">
                    <div class="col-lg-5 p-5 pb-0 pt-0">
                        <h1 class="aboutus__title">Sun Wave Hotel and Resort</h1>
                        <p class="about__description">Kuakata is a highly promising tourist destination in the southern region of Bangladesh, located in Patuakhali District. It is becoming increasingly popular among local and international tourists due to its sea beach and natural beauty.

After Cox’s Bazar, Kuakata is known as one of the most attractive sea beaches in Bangladesh. It offers the rare opportunity to enjoy both sunrise and sunset from the same location, which gives Kuakata a unique position on the tourism map of the country.

Considering this potential, Sun Wave Hotel & Resort has taken the initiative to develop a modern, attractive, and international-standard hotel-resort project in Kuakata.

Our main objective is to ensure safe, comfortable, and enjoyable accommodation facilities for tourists, while also creating a profitable and reliable investment opportunity for investors.</p>
                        <div class="mt-30 project__nfo">
                            <ul class="d-flex project__info__links">
                                <li>
                                    <a class="hov__button" href="javascript:void(0)" data-fancybox data-src="https://www.google.com/maps/place/SUN+WAVE+Hotel+%2526+Resort/@21.819933,90.1134957,88m/data">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/map.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new" src="{{asset('assets/map.gif')}}" /> </noscript>
                                        <span class="hov__text">View Map</span>
                                    </a>

                                </li>
                                <li>
                                    <a class="hov__button" href="{{asset('assets/Home/GROUND FLOOR PLAN.pdf')}}">
                                        <img alt="new" class="lazyload map__hov" src="{{asset('assets/_blank.webp')}}"
                                             data-src="assets/download.gif" data-sizes="auto" />
                                        <noscript> <img alt="new" src="{{asset('assets/download.gif')}}" /> </noscript>
                                        <span class="hov__text">Download Brochure</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="hov__button" id="showPopup" href="javascript:void(0)" data-fancybox data-src="#popup1">
                                        <img alt="new" class="lazyload map__hov" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/LearnMore.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new" src="{{asset('assets/LearnMore.gif')}}" /> </noscript>
                                        <span class="hov__text">Learn More</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="popup1" >
                            <div >
                                <div class="content">
                                    <div class="row align-items-center">
                                        <div class="pb-0">
                                            <h4 class="aboutus__title">Sun Wave Hotel &amp; Resort</h4>
                                            <p class="about__description">Sun Wave Hotel and Resort, Kuakata is the iconic flagship 4-star property by Nanova Group. Located in scenic Kuakata, this upscale hotel is a masterpiece of modern architecture, elegant decor, and luxury amenities. Guests can look forward to world-class, professional service that makes every leisure moment unforgettable. Nestled perfectly between the hills and the sea, the hotel offers a uniquely breathtaking view of the Bay of Bengal, panoramic mountain waterfalls, and lush greenery.</p>
                                        </div>
                                        <div class="pt-0" style="display: flex; flex-direction: column; align-items: center;">
                                            <div class="about_logo_project" style="height:50%;">
                                                <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                                     data-src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-front-view.jpg')}}" data-sizes="auto" />
                                                <noscript> <img alt="new" src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-front-view.jpg')}}" /> </noscript>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7">
                        <div class="aboutus__img text-center">
                            <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                 data-src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-front-view.jpg')}}" data-sizes="60%" width="200" />
                            <noscript> <img alt="new" src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-front-view.jpg')}}" width="200" /> </noscript>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--CATEGORY OF OWNERSHIP start-->
    <section class="branch-section mt-0 pb-0 pt-30">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container__2" style="background-color: rgba(235, 240, 250, 1);">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section__header primary-color">CATEGORY OF OWNERSHIP</h2>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <div class="video-wrapper text-center">
                            <a data-fancybox="gallery" href="assets/ExecutiveSuite.webp">
                                <div class="poster-img-wrap">
                                    <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                         data-src="{{asset('assets/ghrweb/Sites/GHRWEB/HBanner/couple-suite.jpg')}}" data-sizes="auto" />
                                    <noscript> <img src="{{asset('assets/ExecutiveSuite.webp')}}" /> </noscript>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 align-items-center">
                        <div class="ownership__suite div_grow row">

                                <div class="col-md-3 col-lg-3 col-sm-12 suite__box mb-3">
                                    Standard Suite
                                    <div class="suitebox_down">630-720 sft.</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12 suite__box mb-3">
                                    Executive Suite
                                    <div class="suitebox_down">750-780 sft.</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12 suite__box mb-3">
                                    Presidential Suite
                                    <div class="suitebox_down">1950 sft.</div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12 suite__box mb-3">
                                    Family Suite
                                    <div class="suitebox_down">2280 sft.</div>
                                </div>

                            <div class="col-md-6 col-lg-6 col-sm-12 suite__box p-3">
                                Single &amp;
                                Multiple Ownership
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



        <section class="branch-section mt-0  pt-0 pb-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container__2" style="background-color: rgba(235, 240, 250, 1);" style="height:auto;">
                    <div class="row align-items-center justify-content-center">
                        <div class="about__title_bw ">
                            <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                 data-src="{{asset('assets/bestWestern.webp')}}" data-sizes="auto" />
                            <noscript> <img src="{{asset('assets/bestWestern.webp')}}" /> </noscript>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="about__box-wrap pt-0 pb-0">
                                <div class="about__subhead">
                                    <p class="subhead__p">
                                        Sun Wave Hotel &amp; Resort Objectives
                                    </p>
                                </div>

                                <p class="about__description">
                                    <ul>
                                        <li>The main goal of Sun Wave Hotel & Resort is to utilize the tourism potential of Kuakata and build a modern, safe, and high-quality hotel-resort project.</li>

                                        <li>We are committed to ensuring comfortable accommodation, improved services, and enjoyable travel experiences for our respected guests.</li>

                                        <li>At the same time, one of our key objectives is to create a transparent, secure, and profitable investment opportunity for investors.</li>

                                        <li>Through this project, we expect to play a positive role in the development of Kuakata’s tourism industry, employment generation, and the economic progress of the country.</li>
                                    </ul>
                                    
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="branch-section mt-0  pt-0 pb-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container__2" style="background-color: rgba(235, 240, 250, 1);" style="height:auto;">
                    <div class="row align-items-center justify-content-center">
                        <div class="about__title_bw ">
                            <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                 data-src="{{asset('assets/bestWestern.webp')}}" data-sizes="auto" />
                            <noscript> <img src="{{asset('assets/bestWestern.webp')}}" /> </noscript>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="about__box-wrap pt-0 pb-0">
                                <div class="about__subhead">
                                    <p class="subhead__p">
                                        Comparative Discussion
                                    </p>
                                </div>
                                <p class="about__description">
                                    <ul>
                                        <li>Most hotel shares are sold in large numbers, usually ranging from 8,000 to 15,000 small shares. However, the total number of hotel rooms is usually not more than 200 to 250.</li>
                                        <li>When the share value is very low, ensuring profit according to that share becomes difficult and unrealistic.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="branch-section mt-0  pt-0 pb-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container__2" style="background-color: rgba(235, 240, 250, 1);" style="height:auto;">
                    <div class="row align-items-center justify-content-center">
                        <div class="about__title_bw ">
                            <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                 data-src="{{asset('assets/bestWestern.webp')}}" data-sizes="auto" />
                            <noscript> <img src="{{asset('assets/bestWestern.webp')}}" /> </noscript>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="about__box-wrap pt-0 pb-0">
                            <div class="about__subhead">
                                <p class="subhead__p">
                                    Difference
                                </p>
                            </div>
                            <p class="about__description">
                                <ul>
                                    <li>In our project, room-based shares will be provided. The room owners will remain connected with the hotel management system.</li>
                                    <li>As a result, they will be able to know which room was rented, for how many days, and at what rate.</li>
                                    <li>At the end of the year, your specific profit share will be sent to your account.</li>
                                    <li>We have divided each room into a maximum of five shares.</li>
                                    <li>If any customer wants to take a loan, arrangements will be made for that as well.
</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- project-video--start -->
    <!-- project-video--end -->
    <!-- about-section start -->
    <!-- about-section end -->
    <!--Photo Gallary start-->
    <section class="branch-section mt-0 pt-0 pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container" style="background-color:#EBF0FA; overflow:hidden;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section__header">Photo Gallery</h2>
                    </div>
                </div>
                <div class="slideshow-container">

                <!-- Slide 1 -->
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/sun-wave.jpg')}}" alt="Sun View Hotel and Resort" onclick="openLightbox(this)">
                    <div class="slide-text">Sun Wave Hotel &amp; Resort</div>
                </div>

                <!-- Slide 2 -->
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/sunwave-view.jpg')}}" alt="Sun View Hotel and Resort" onclick="openLightbox(this)">
                    <div class="slide-text">Sun View</div>
                </div>

                <!-- Slide 3 -->
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/8.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <!-- Slide 4 -->
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/9.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <!-- Slide 5 -->
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/11.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/12.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/13.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/14.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/15.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/16.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/17.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/18.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/26.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>
                <div class="mySlides fade">
                    <img src="{{asset('assets/gallery/sunwave/28.jpg')}}" alt="Couple Room" onclick="openLightbox(this)">
                    <!-- <div class="slide-text">Forest Path</div> -->
                </div>

                <!-- Arrow Navigation -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <!-- Dot Navigation -->
                <div class="dot-container">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                <!-- The Lightbox Modal (Stays hidden until an image is clicked) -->
                <div id="customLightbox" class="lightbox" onclick="closeLightbox()">
                <span class="close-lightbox">&times;</span>
                <img class="lightbox-content" id="lightboxImg">
                <div id="lightboxCaption"></div>
                </div>
            </div>


        </div>



    </section>


    <!--Photo Gallary end-->
    <!-- --video gallery start-- -->
    <!-- video-gallery-section start -->

    <section class="branch-section mt-0 pt-0 pb-0 d-flex align-items-center">
                <div class="container" style="height: auto;display: flex;align-items: center;justify-content: center;">
                    <div class="branch__container pb-0" style="background-color: rgba(235, 240, 250, 1);">
                        <div class="row">
                            <div class="col-lg-12 text-center mb-20">
                                <h4 class="section__header primary-color">Video Gallery Now</h4>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center justify-content-center mb-0">
                            <div class="btn-default-parent" id="btn-default-parent">
                                        <button class="filter-div-button mt-0" aria-label="Filter Div Button" id="btnUpdate-4" data-filter="hdpe" onclick="getVideoList(4);">Recent Videos</button>
                                        <button class="filter-div-button mt-0" aria-label="Filter Div Button" id="btnUpdate-5" data-filter="hdpe" onclick="getVideoList(5);">3D Videos</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="gallery_product col-lg-12 filter hdpe">
                                <div class="video_container">
                                    <div class="main-video-container">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/APCsrnYlGUs?si=x7NWaqEza1kkBLM-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                                    </div>
                                    <div class="video-list-container" id="videosList">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <input type="hidden" id="hdnProjectId" value="1" />
    </section>
@endsection
@section('page-script')
<script>
        let slideIndex = 1;
        let slideTimer;

        // Start the slideshow
        showSlides(slideIndex);
        startAutoPlay();

        function startAutoPlay() {
        // Automatically click "next" every 4 seconds
        slideTimer = setInterval(() => {
            plusSlides(1);
        }, 4000);
        }

        function resetAutoPlay() {
        // Clear and restart timer so user interaction doesn't cause fast skipping
        clearInterval(slideTimer);
        startAutoPlay();
        }

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        resetAutoPlay();
        }

        // Dot controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        resetAutoPlay();
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        
        if (slides[slideIndex-1]) {
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
        }

        // ==========================================================================
        // LIGHTBOX LOGIC (NEW)
        // ==========================================================================
        function openLightbox(element) {
        const lightbox = document.getElementById("customLightbox");
        const lightboxImg = document.getElementById("lightboxImg");
        const lightboxCaption = document.getElementById("lightboxCaption");

        lightbox.style.display = "block";
        lightboxImg.src = element.src; // Copy the clicked image URL
        lightboxCaption.innerHTML = element.alt; // Copy the image description text
        }

        function closeLightbox() {
        document.getElementById("customLightbox").style.display = "none";
        }


    </script>

@endsection