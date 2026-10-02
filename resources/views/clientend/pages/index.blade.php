@extends('clientend.layouts.master')
@section('title','Home')
@section('page-style')
<style>
    /* 1. The container holding all items */
        .about__brand-slider {
            display: flex;
            flex-wrap: nowrap;     /* Keeps them all in one single horizontal row */
            align-items: center;   /* Lines them up nicely in the middle vertically */
            gap: 20px;             /* Forces a strict 20px gap between each item */
            overflow-x: auto;      /* Allows scrolling if there are too many logos */
            list-style: none;      /* Removes bullet points */
            padding: 0;
            margin: 0;
        }
        
        /* 2. The list items - THIS STOPS THE OVERLAP */
        .about__brand-slider li {
            flex-shrink: 0;        /* IMPORTANT: Prevents items from squishing and overlapping */
        }
        
        /* 3. The clickable link box */
        .about__brand-slider li a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 120px;          /* Set your exact desired width */
            height: 40px;          /* Set your exact desired height */
            box-sizing: border-box;
            
        }
        
        /* 4. The actual image */
        .about__brand-slider li img {
            width: 100%;
            height: 100%;
            object-fit: contain;   /* Fits the logo perfectly inside the box without stretching */
        }


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
            .about__brand-slider {
                flex-wrap: wrap;       /* Allows logos to wrap to the next line */
                justify-content: center; /* Centers the wrapped logos on mobile */
                
            }
            /* Shrink the wrapper box for mobile viewports */
            .about__brand-slider li a {
                width: 90px;           /* Reduced from 120px */
                height: 30px;          /* Reduced from 40px */
            }
            
            /* Ensure the list item bounds adjust cleanly */
            .about__brand-slider li img{
                width: auto !important;
                height: auto !important;
            }
        }

    @media(min-width:1023px){
        .our-project-consultants {
            margin-left: -10px;
        }

        .about__description {
            display: -webkit-box;
            -webkit-line-clamp: 14; 
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5;
        }
   }

@media(max-width:480px){
        .our-project-consultants {
            margin-left:0;
        }

        .rest_of_sections{
            margin-top:-70px;
        }

        .hero-slider-img{
              height:375px !important;
        }
}
</style>
@endsection
@section('main')
    <!-- hero slider start -->
        <section class="hero-banner-section">

               <div class="hero-slider hero-slider-js">
                            <div class="slide-item large">
                                <div class="img-wrap">
                                        <img src="assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-View.jpg"
                                             width="1920"
                                             fetchpriority="high"
                                             class="hero-slider-img"
                                             loading="eager"
                                             alt="be83d9a7-2c42-41ee-aa27-70e4471e560f.jpg" />
                                </div>
                            </div>
                            <div class="slide-item large">
                                <div class="img-wrap">
                                        <img src="assets/ghrweb/Sites/GHRWEB/HBanner/Sunwave-front-view.jpg"
                                             width="1920"
                                             fetchpriority="high"
                                             class="hero-slider-img"
                                             loading="eager"
                                             alt="c20bd026-2250-4ce6-a369-70fac3bc97fc.jpg" />
                                </div>
                            </div>
                            <div class="slide-item large">
                                <div class="img-wrap">
                                        <img src="assets/ghrweb/Sites/GHRWEB/HBanner/couple-suite.jpg"
                                             width="1920"
                                             fetchpriority="high"
                                             class="hero-slider-img"
                                             loading="eager"
                                             alt="1cd673c3-85f0-40f7-b6b8-3a780c7f59de.jpg" />
                                </div>
                            </div>
                        </div>
               </div>
        </section>
        <!-- hero slider end -->

        <!-- category  start -->
        <section class="category_home pb-0">
            <div class="container">
                <div class="inner-container">
                    <div class="row category-slider">
                        <div class="col">
                            <a href="javascript:void()" class="cat-item text-center">
                            <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/Hotel.gif"
                                    data-sizes="auto" />
                            <noscript> <img src="assets/Hotel.gif" /> </noscript>
                                <h4 class="cat-title">Hotel</h4>
                            </a>
                        </div>
                        <div class="col">
                        <a href="javascript:void()" class="cat-item text-center">

                            <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/Building.gif"
                                    data-sizes="auto" />
                            <noscript> <img src="assets/Building.gif" /> </noscript>
                                <h4 class="cat-title">Online</h4>
                            </a>
                        </div>
                        <div class="col">
                        <a href="javascript:void()" class="cat-item text-center">
                            <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/Land.gif"
                                    data-sizes="auto" />
                            <noscript> <img src="assets/Land.gif" /> </noscript>
                                <h4 class="cat-title">Land</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category  end -->

      <div class="rest_of_sections">
        <!-- about-section start -->
        <section class="branch-section pt-0 pb-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about__box-wrap">
                                <h1 class="about__title"> Who we are ?</h1>
                                <p class="about__description">
                                    Nanova Groups is Bangladesh’s top hotel development and investment company, dedicated to quality and precision in every project. We guide our partners and investors toward consistent growth and high profits by streamlining our development processes. Our primary mission is to build world-class hotels and suites in Cox’s Bazar, the world's longest beach, and Kuakata, a scenic paradise on the Bay of Bengal. By designing projects with unique, customer-focused features, we secure valuable ventures with excellent profit-sharing for our owners. Our team of experts supports you through every single phase—from your initial investment idea to the hotel's grand opening—to guarantee an economically stable and highly successful business that boosts local tourism. 
                                </p>
                            </div>
                        </div>
                        <link />
                        <div class="col-lg-6 our-project-consultants">
                            <div class="about__card text-center">
                                <div class="about_logo_home">
                                    <img alt="new" class="lazyload" src="assets/main-logo.png" data-src="assets/main-logo.png" />
                                    <noscript> <img src="assets/main-logo.png" /> </noscript>
                                </div>
                                <ul class="about__logo-slider">
                                    <li>
                                        <a href="javascript:void()">
                                            <img alt="new" class="lazyload" src="assets/nanovashop.png" data-src="assets/nanovashop.png" width="75%" height="100%" />
                                    <noscript> <img src="assets/nanovashop.png" /> </noscript>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void()">
                                            <img alt="new" class="lazyload" src="assets/sunwave.png" data-src="assets/sunwave.png" height="100%" />
                                    <noscript> <img src="assets/sunwave.png" /> </noscript>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <img alt="new" class="lazyload" src="assets/songjozan.png" data-src="assets/songjozan.png" width="70%" height="100%" />
                                    <noscript> <img src="assets/songjozan.png" /> </noscript>
                                        </a>
                                    </li>                               


                                </ul>
                                <a href="javascript:void(0)" class="btn-small btn--secondary mb-10 " aria-label="Project Consultants"> <span id="pro_consu">We Work With</span></a>
                                <ul class="about__brand-slider">
                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/infocare.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/infocare.jpg" /> </noscript>
                                        </a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="javascript:void(0)" aria-label="brand name">-->
                                    <!--        <img alt="new" class="lazyload" src="assets/_blank.webp"-->
                                    <!--             data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/songjozan.png" data-sizes="auto" />-->
                                    <!--        <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/songjozan.png" /> </noscript>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/1.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/1.jpg" /> </noscript>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/2.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/2.jpg" /> </noscript>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/3.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/3.jpg" /> </noscript>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/4.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/4.jpg" /> </noscript>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/5.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/5.jpg" /> </noscript>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/6.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/6.jpg" /> </noscript>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/7.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/7.jpg" /> </noscript>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)" aria-label="brand name">
                                            <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                 data-src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/8.jpg" data-sizes="auto" />
                                            <noscript> <img src="assets/ghrweb/Sites/GHRWEB/ConsultantLogo/8.jpg" /> </noscript>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->
        <!-- project-overview start -->
        <section class="branch-section pb-0 pt-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container" style="background-color: rgba(235, 240, 250, 1);">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="about__title pb-0 mb-0">Our Project Overview</h2>
                        </div>
                    </div>

                    <!-- Slider for Only Small Device -->
                    <div class="swiper project_navigation__slider mt-0">
                        <!-- Slider main container -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                                <div class="project__item swiper-slide">
                                    <div class="project__wrap">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-6">
                                                <ul class="project_slide_item">
                                                    <li style="list-style:none;">
                                                        <div class="img-wrap">
                                                            <img alt="aa0ec013-aef7-476a-bc5b-50d45f978acd.jpg" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/ProjectMainImg/sun-wave.jpg" data-sizes="auto" />
                                                            <noscript> <img alt="aa0ec013-aef7-476a-bc5b-50d45f978acd.jpg" src="assets/ghrweb/Sites/GHRWEB/ProjectMainImg/sun-wave.jpg" /> </noscript>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-lg-6 project_wrap_details">
                                                <div class="project__card text-center">
                                                    <div style="min-height:250px!important">
                                                        <h3 class="btn__heading">
                                                            Sun Wave Hotel &amp; Resort
                                                        </h3>
                                                        <p class="about__description" style="margin-bottom:10px;">
                                                            Sun Wave Hotel & Resort is a promising and modern hotel-resort project in the tourism industry of Bangladesh.

Our journey began with the aim of ensuring comfortable accommodation, quality service, and safe hospitality for tourists. We believe that a hotel is not just a place to stay; it is a part of joy, comfort, and memorable experiences for travelers.

Our goal is to develop world-class hotel and resort facilities in an important tourist destination like Kuakata. Ensuring improved accommodation, a clean environment, modern facilities, and sincere service for guests is our main commitment.

With the dream of contributing to the development of the tourism industry, creating employment opportunities, and supporting the economic progress of the country, Sun Wave Hotel & Resort is moving forward. We expect that this project will become a trusted name among local and international tourists in the future.
                                                        </p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between project__nfo">
                                                        <a href="sunwave.html" class="btn-small btn-outline--secondary"><span>Learn More</span></a>
                                                        <ul class="project__info-links">
                                                            <li>
                                                                <a href="Home/GROUND FLOOR PLAN.pdf" aria-label="download file">
                                                                    <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                         data-src="assets/download.gif" data-sizes="auto" />
                                                                    <noscript> <img src="assets/download.gif" /> </noscript>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" data-fancybox aria-label="photo gallery"
                                                                   data-src="https://www.google.com/maps/place/SUN+WAVE+Hotel+%2526+Resort/@21.819933,90.1134957,88m">
                                                                    <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                         data-src="assets/map.gif" data-sizes="auto" />
                                                                    <noscript> <img src="assets/map.gif" /> </noscript>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" data-fancybox aria-label="Project Video"
                                                                   data-src="https://www.youtube.com/watch?v=APCsrnYlGUs">
                                                                    <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                         data-src="assets/video.gif" data-sizes="auto" />
                                                                    <noscript> <img src="assets/video.gif" /> </noscript>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                            <a data-fancybox="gallery" aria-label="photo gallery"
                                                                               href="assets/ghrweb/Sites/GHRWEB/ProjectImg/29052f41-acab-4c09-ae4d-93ae090cf612.jpg">
                                                                                <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                                     data-src="assets/gallery.gif" data-sizes="auto" />
                                                                                <noscript> <img src="assets/gallery.gif" /> </noscript>
                                                                            </a>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="project__item swiper-slide">
                                    <div class="project__wrap">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-6">
                                                <ul class="project_slide_item">
                                                    <li style="list-style:none;">
                                                        <div class="img-wrap">
                                                            <img alt="d724d8d1-6420-4414-8ed6-98aaa8b4c916.jpg" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/ProjectMainImg/d724d8d1-6420-4414-8ed6-98aaa8b4c916.jpg" data-sizes="auto" />
                                                            <noscript> <img alt="d724d8d1-6420-4414-8ed6-98aaa8b4c916.jpg" src="assets/ghrweb/Sites/GHRWEB/ProjectMainImg/d724d8d1-6420-4414-8ed6-98aaa8b4c916.jpg" /> </noscript>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-lg-6 project_wrap_details">
                                                <div class="project__card text-center">
                                                    <div style="min-height:250px!important">
                                                        <h3 class="btn__heading">
                                                            Bay Marina
                                                        </h3>
                                                        <p class="about__description" style="margin-bottom:10px;">
                                                            We are developing exclusive beachfront five-star hotels and resorts in Bay Marina in charming atmospheres and great locations at Cox~s Bazar inani. This resort is made entirely of glass architecturally. The resort has an attractive interior design, a swimming pool, and charming gardens. There are also playing zones, gymnasiums, party centers, juice bars, spa centers, and all civic amenities for all travel-loving tourists. Our prime locations offer unparalleled beauty and scarcity.                                                                                                                   
                                                        </p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between project__nfo">
                                                        <a href="Projects/Hoteldd8d.html?ProjectTitle=Bay-Marina" class="btn-small btn-outline--secondary"><span>Learn More</span></a>
                                                        <ul class="project__info-links">
                                                            <li>
                                                                <a href="Home/DownloadFileb507.html?FileName=Bay%20Marina%2019-05-2026202606041109.pdf" aria-label="download file">
                                                                    <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                         data-src="/assets/download.gif" data-sizes="auto" />
                                                                    <noscript> <img src="assets/download.gif" /> </noscript>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" data-fancybox aria-label="photo gallery"
                                                                   data-src="https://www.google.com/maps/place/Bay&#x2B;Marina&#x2B;-&#x2B;Inani/@21.2482809,92.0459224,17z">
                                                                    <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                         data-src="/assets/map.gif" data-sizes="auto" />
                                                                    <noscript> <img src="assets/map.gif" /> </noscript>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" data-fancybox aria-label="Project Video"
                                                                   data-src="https://www.youtube.com/embed/8oJwNqp8DKQ?si=BhLkLsEhvmW-L06q">
                                                                    <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                         data-src="/assets/video.gif" data-sizes="auto" />
                                                                    <noscript> <img src="assets/video.gif" /> </noscript>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                            <a data-fancybox="gallery" aria-label="photo gallery"
                                                                               href="assets/ghrweb/Sites/GHRWEB/ProjectImg/29052f41-acab-4c09-ae4d-93ae090cf612.jpg">
                                                                                <img alt="new" class="lazyload" src="assets/_blank.webp"
                                                                                     data-src="/assets/gallery.gif" data-sizes="auto" />
                                                                                <noscript> <img src="assets/gallery.gif" /> </noscript>
                                                                            </a>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- project-overview end -->
        <section class="branch-section pb-0 pt-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container">
                    <div class="row align-items-top">
                        <div class="col-lg-6">
                            <div class="about__box-wrap">
                                <h2 class="about__title">Why Should You Invest in Nanova Groups ?</h2>
                                <p class="about__description">
                                    <ul>
                                        <li>Kuakata is one of the most promising tourist destinations in Bangladesh, where the number of local and international tourists is increasing every year.</li>

                                        <li>Keeping this growing tourism potential in mind, Sun Wave Hotel & Resort is creating an attractive opportunity for investors as a modern, quality-focused, and well-planned hotel-resort project.</li>

                                        <li>By investing in this project, investors will get the opportunity to become part of a promising initiative in the tourism sector.</li>

                                        <li>With a prime location, modern infrastructure, professional management, and a transparent ownership policy, the project has the potential to become a valuable long-term asset.</li>

                                        <li>We give the highest importance to investor confidence, project quality, and sustainable development.</li>

                                        <li>With the growth of Kuakata’s tourism industry, we expect this project to be established in the future as a prestigious and promising investment opportunity.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="video-wrapper">
                                <a class="video-link" aria-label="video play" id="whyInvestYTL" href="javascript:void(0)" data-fancybox data-src="https://www.youtube.com/watch?v=APCsrnYlGUs">
                                    <div class="single-popup-wrap poster-img-wrap">
                                        <img class="lazyload" alt="new" src="assets/ghrweb/Sites/GHRWEB/assets/7bf67fc3-1cc8-42cd-8bc2-aecca177107f.jpg" data-src="" style="margin:0;" data-sizes="auto">
                                        <noscript> <img src="assets/ghrweb/Sites/GHRWEB/assets/7bf67fc3-1cc8-42cd-8bc2-aecca177107f.jpg" /> </noscript>
                                        <div class="ht-popup-video video-button">
                                            <div class="video-mark">
                                                <div class="wave-pulse wave-pulse-1"></div>
                                                <div class="wave-pulse wave-pulse-2"></div>
                                            </div>
                                            <div class="video-button__two">
                                                <div class="video-play">
                                                    <span class="video-play-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- benefits start -->
        <section class="branch-section  pt-0 pb-0 mb-30">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container" style="background-color: rgba(235, 240, 250, 1);">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="about__title mb-0">Ownership Benefits</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="benefits__list">
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-4.png" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-4.png" /></noscript>
                                                <div class="benefit-text"><h3>Facility for registered sub-deed ownership of the hotel unit including land.</h3></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-1.png" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-1.png" /></noscript>
                                                <div class="benefit-text"><h3>Ownership will be saleable and transferable, ensuring that your investment remains secure and future-oriented.</h3></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-5.png" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-5.png" /></noscript>
                                                <div class="benefit-text"><h3>Special privilege to spend holidays with family in your own hotel.</h3></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-2.png" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-2.png" /></noscript>
                                                <div class="benefit-text"><h3>Priority room usage facility along with potential income opportunities.</h3></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-6.png" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-6.png" /></noscript>
                                                <div class="benefit-text"><h3>An opportunity to own a prestigious asset in the tourist city of Kuakata.</h3></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-3.png" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/icon-3.png" /></noscript>
                                                <div class="benefit-text"><h3>Possibility to enhance social status and establish yourself as an entrepreneur in the tourism sector.</h3></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/ffb0e29a-f355-4204-a13f-5687f3e4ec09.jpg" data-sizes="auto" />
                                                <noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/ffb0e29a-f355-4204-a13f-5687f3e4ec09.jpg" /></noscript>
                                                <div class="benefit-text"><h3>A modern investment opportunity that offers long-term assets, regular income potential, and family security.</h3></div>
                                            </div>
                                        </li>
                                        <!--<li>-->
                                            <!--<div class="benefit__box-wrap paste-color">-->
                                                <!--<img alt="new" class="lazyload" src="assets/_blank.webp" data-src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/c15988a6-d1f3-4b66-8f5a-0b2badcf382e.jpg" data-sizes="auto" />-->
                                                <!--<noscript> <img src="assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/c15988a6-d1f3-4b66-8f5a-0b2badcf382e.jpg" /></noscript>-->
                                                <!--<div class="benefit-text"><h3>OWNERS ENJOY EQUAL DISTRIBUTION OF HOTEL PROFITS, GUARANTEEING LIFETIME RETURNS</h3></div>-->
                                            <!--</div>-->
                                        <!--</li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- benefits end -->
        
        <section class="testimonial pb-0 mb-0 mt-30">
            <div class="container">
                <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="about__title mb-0">Our Team</h2>
                        </div>
                    </div>
                <div class="row">
                    
                    <div class="col-12">
                        <ul class="testimonial-slider">
                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">
                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                            data-src="assets/md.jpg" width="110" height="109.927" />
                                        <noscript> <img src="assets/md.jpg"  width="110" height="109.927" /></noscript>
                                        <h3 class="author__name">MD. Ziaul Khan</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Managing Director (MD)
                                            </p>

                                            

                                        </div>
                                    </div>
                                    
                                </div>
                            </li>

                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                             data-src="assets/akbor.png" width="110" height="109.927" />
                                        <noscript> <img src="assets/akbor.png" width="110" height="109.927" /></noscript>

                                        <h3 class="author__name">Akbor Hossen</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Head of Marketing
                                            </p>

                                            

                                        </div>
                                    </div>


                                </div>
                            </li>


                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                            data-src="assets/technical-engineer.jpg" data-sizes="auto" />
                                        <noscript> <img src="assets/technical-engineer.jpg" /></noscript>

                                        <h3 class="author__name">Anisur Rahman</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Chief Engineer
                                            </p>

                                           

                                        </div>
                                    </div>

                                    

                                </div>
                            </li>


                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                            data-src="assets/romana.jpg" data-sizes="auto" />
                                        <noscript> <img src="assets/romana.jpg" /></noscript>

                                        <h3 class="author__name">Romana Prodhan</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                HR Admin
                                            </p>

                                            

                                        </div>
                                    </div>

                                    

                                </div>
                            </li>

                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <!--<img alt="new" class="lazyload" src="assets/_blank.webp"-->
                                        <!--     data-src="" data-sizes="auto" />-->
                                        <!--<noscript> <img src="" /></noscript>-->

                                        <h3 class="author__name">Aowal Hossan</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Senior Technical Expert
                                            </p>
                                        </div>
                                    </div>

                                    

                                </div>
                            </li>
                            
                            
                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                             data-src="assets/limon.png" width="110" height="109.927"  />
                                        <noscript> <img src="assets/limon.png" width="110" height="109.927" /></noscript>

                                        <h3 class="author__name">Limon Hasan</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Senior Technical Expert
                                            </p>
                                        </div>
                                    </div>

                                    

                                </div>
                            </li>
                            
                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                            data-src="assets/rahat.jpg" width="110" height="109.927" />
                                        <noscript> <img src="assets/rahat.jpg" width="110" height="109.927" /></noscript>

                                        <h3 class="author__name">Md. Rahat Hossain</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Assistant Marketing
                                            </p>
                                        </div>
                                    </div>

                                    

                                </div>
                            </li>
                            
                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                             data-src="assets/shihab.jpeg"  width="110" height="109.927" style="object-fit: cover; object-position: center top;" />
                                        <noscript> <img src="assets/shihab.jpeg" width="110" height="109.927" style="object-fit: cover; object-position: center top;" /></noscript>

                                        <h3 class="author__name">Md. Shihab</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Technical Assistant
                                            </p>
                                        </div>
                                    </div>

                                    

                                </div>
                            </li>
                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                             data-src="assets/khorshed_Alom.jpg"  width="110" height="109.927" style="object-fit: cover; object-position: center top;" />
                                        <noscript> <img src="assets/Khorshed_Alom.jpg" width="110" height="109.927" style="object-fit: cover; object-position: center top;" /></noscript>

                                        <h3 class="author__name">Khorshed Alom</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Sales Executive
                                            </p>
                                        </div>
                                    </div>

                                    

                                </div>
                            </li>
                            <li class="test__item">
                                <div class="testimonial-wrap">
                                    <div class="author-box">


                                        <img alt="new" class="lazyload" src="assets/_blank.webp"
                                             data-src="assets/mahfijur.jpg"  width="110" height="109.927" style="object-fit: cover; object-position: center top;" />
                                        <noscript> <img src="assets/mahfijur.jpg" width="110" height="109.927" style="object-fit: cover; object-position: center top;" /></noscript>

                                        <h3 class="author__name">Mahfijur Rahman Jewel</h3>
                                        <div class="autho__nfo">
                                            <p>
                                                Sales Executive
                                            </p>
                                        </div>
                                    </div>

                                    

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
      </div>
@endsection
@section('page-script')

@endsection