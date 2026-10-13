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

    .project-gallery {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        margin: 24px 0;
    }

    .project-gallery__item {
        display: block;
        aspect-ratio: 4 / 3;
        overflow: hidden;
    }

    .project-gallery__item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.18s ease;
    }

    .project-gallery__item:hover img,
    .project-gallery__item:focus-visible img {
        transform: scale(1.04);
    }

    .project-gallery__item:first-child {
        grid-column: span 2;
        grid-row: span 2;
        aspect-ratio: auto;
    }

    @media (max-width: 767px) {
        .project-gallery {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
    }
</style>
@endsection
@section('main')
    @php
        $about = $content->section('about');
        $projects = $content->section('projects');
        $whyInvest = $content->section('why_invest');
        $benefits = $content->section('benefits');
        $projectGallery = $content->section('project_gallery');
        $galleryPhotos = $gallery->visibleItems()->take(9);
    @endphp
    <!-- hero slider start -->
        <section class="hero-banner-section">

               <div class="hero-slider hero-slider-js">
                        @foreach ($content->section('hero')->visibleItems() as $slide)
                            <div class="slide-item large">
                                <div class="img-wrap">
                                        <img src="{{ $slide->src() }}"
                                             width="1920"
                                             fetchpriority="high"
                                             class="hero-slider-img"
                                             loading="eager"
                                             alt="{{ $slide->title }}" />
                                </div>
                            </div>
                        @endforeach
                        </div>
               </div>
        </section>
        <!-- hero slider end -->

        <!-- category  start -->
        <section class="category_home pb-0">
            <div class="container">
                <div class="inner-container">
                    <div class="row category-slider">
                        @foreach ($content->section('categories')->visibleItems() as $category)
                        <div class="col">
                            <a href="javascript:void()" class="cat-item text-center">
                            <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}" data-src="{{ $category->src() }}"
                                    data-sizes="auto" />
                            <noscript> <img src="{{ $category->src() }}" /> </noscript>
                                <h4 class="cat-title">{{ $category->title }}</h4>
                            </a>
                        </div>
                        @endforeach
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
                                <h1 class="about__title"> {{ $about->title }}</h1>
                                <p class="about__description">
                                    {{ $about->body }}
                                </p>
                            </div>
                        </div>
                        <link />
                        <div class="col-lg-6 our-project-consultants">
                            <div class="about__card text-center">
                                <div class="about_logo_home">
                                    <img alt="new" class="lazyload" src="{{ $about->src() }}" data-src="{{ $about->src() }}" />
                                    <noscript> <img src="{{ $about->src() }}" /> </noscript>
                                </div>
                                <ul class="about__logo-slider">
                                    @foreach ($content->section('concerns')->visibleItems() as $concern)
                                    <li>
                                        <a href="{{ $concern->href() }}">
                                            <img alt="new" class="lazyload" src="{{ $concern->src() }}" data-src="{{ $concern->src() }}" @if ($concern->value('width')) width="{{ $concern->value('width') }}" @endif height="100%" />
                                    <noscript> <img src="{{ $concern->src() }}" /> </noscript>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <a href="javascript:void(0)" class="btn-small btn--secondary mb-10 " aria-label="Project Consultants"> <span id="pro_consu">{{ $about->value('button_text') }}</span></a>
                                <ul class="about__brand-slider">
                                    @foreach ($content->section('partners')->visibleItems() as $partner)
                                    <li>
                                        <a href="javascript:void(0)" aria-label="{{ $partner->title }}">
                                            <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}"
                                                 data-src="{{ $partner->src() }}" data-sizes="auto" />
                                            <noscript> <img src="{{ $partner->src() }}" /> </noscript>
                                        </a>
                                    </li>
                                    @endforeach
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
                            <h2 class="about__title pb-0 mb-0">{{ $projects->title }}</h2>
                        </div>
                    </div>

                    <!-- Slider for Only Small Device -->
                    <div class="swiper project_navigation__slider mt-0">
                        <!-- Slider main container -->
                        <div class="swiper-wrapper">
                            @foreach ($projects->visibleItems() as $project)
                                <div class="project__item swiper-slide">
                                    <div class="project__wrap">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-6">
                                                <ul class="project_slide_item">
                                                    <li style="list-style:none;">
                                                        <div class="img-wrap">
                                                            <img alt="{{ $project->title }}" class="lazyload" src="{{ asset('assets/_blank.webp') }}" data-src="{{ $project->src() }}" data-sizes="auto" />
                                                            <noscript> <img alt="{{ $project->title }}" src="{{ $project->src() }}" /> </noscript>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-lg-6 project_wrap_details">
                                                <div class="project__card text-center">
                                                    <div style="min-height:250px!important">
                                                        <h3 class="btn__heading">
                                                            {{ $project->title }}
                                                        </h3>
                                                        <p class="about__description" style="margin-bottom:10px;">
                                                            {{ $project->body }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between project__nfo">
                                                        <a href="{{ $project->href() }}" class="btn-small btn-outline--secondary"><span>Learn More</span></a>
                                                        <ul class="project__info-links">
                                                            @if ($project->value('brochure'))
                                                            <li>
                                                                <a href="{{ $project->src('brochure') }}" aria-label="download file">
                                                                    <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}"
                                                                         data-src="{{ asset('assets/download.gif') }}" data-sizes="auto" />
                                                                    <noscript> <img src="{{ asset('assets/download.gif') }}" /> </noscript>
                                                                </a>
                                                            </li>
                                                            @endif
                                                            @if ($project->value('map_url'))
                                                            <li>
                                                                <a href="javascript:void(0)" data-fancybox aria-label="photo gallery"
                                                                   data-src="{{ $project->href('map_url') }}">
                                                                    <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}"
                                                                         data-src="{{ asset('assets/map.gif') }}" data-sizes="auto" />
                                                                    <noscript> <img src="{{ asset('assets/map.gif') }}" /> </noscript>
                                                                </a>
                                                            </li>
                                                            @endif
                                                            @if ($project->value('video_url'))
                                                            <li>
                                                                <a href="javascript:void(0)" data-fancybox aria-label="Project Video"
                                                                   data-src="{{ $project->href('video_url') }}">
                                                                    <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}"
                                                                         data-src="{{ asset('assets/video.gif') }}" data-sizes="auto" />
                                                                    <noscript> <img src="{{ asset('assets/video.gif') }}" /> </noscript>
                                                                </a>
                                                            </li>
                                                            @endif
                                                            @if ($project->value('gallery_image'))
                                                            <li>
                                                                            <a data-fancybox="gallery" aria-label="photo gallery"
                                                                               href="{{ $project->src('gallery_image') }}">
                                                                                <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}"
                                                                                     data-src="{{ asset('assets/gallery.gif') }}" data-sizes="auto" />
                                                                                <noscript> <img src="{{ asset('assets/gallery.gif') }}" /> </noscript>
                                                                            </a>

                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                <h2 class="about__title">{{ $whyInvest->title }}</h2>
                                <p class="about__description">
                                    <ul>
                                        @foreach ($whyInvest->visibleItems() as $point)
                                        <li>{{ $point->title }}</li>

                                        @endforeach
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="video-wrapper">
                                <a class="video-link" aria-label="video play" id="whyInvestYTL" href="javascript:void(0)" data-fancybox data-src="{{ $whyInvest->href() }}">
                                    <div class="single-popup-wrap poster-img-wrap">
                                        <img class="lazyload" alt="new" src="{{ $whyInvest->src() }}" data-src="" style="margin:0;" data-sizes="auto">
                                        <noscript> <img src="{{ $whyInvest->src() }}" /> </noscript>
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
                            <h2 class="about__title mb-0">{{ $benefits->title }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="benefits__list">
                                    @foreach ($benefits->visibleItems() as $benefit)
                                        <li>
                                            <div class="benefit__box-wrap paste-color">
                                                <img alt="new" class="lazyload" src="{{ asset('assets/_blank.webp') }}" data-src="{{ $benefit->src() }}" data-sizes="auto" />
                                                <noscript> <img src="{{ $benefit->src() }}" /></noscript>
                                                <div class="benefit-text"><h3>{{ $benefit->title }}</h3></div>
                                            </div>
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- benefits end -->

        <section class="branch-section pt-0 pb-0 mb-30">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container">
                    <h2 class="about__title text-center mb-0">{{ $projectGallery->title }}</h2>
                    <div class="project-gallery">
                        @foreach ($galleryPhotos as $photo)
                            <a class="project-gallery__item" data-fancybox="project-gallery" href="{{ $photo->src() }}" data-caption="{{ $photo->title }}">
                                <img class="lazyload" src="{{ asset('assets/_blank.webp') }}" data-src="{{ $photo->src() }}" alt="{{ $photo->title }}" />
                                <noscript><img src="{{ $photo->src() }}" alt="{{ $photo->title }}" /></noscript>
                            </a>
                        @endforeach
                    </div>
                    @if ($projectGallery->value('button_text'))
                        <div class="text-center">
                            <a href="{{ url('/gallery') }}" class="btn-small btn-outline--secondary"><span>{{ $projectGallery->value('button_text') }}</span></a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
      </div>
@endsection
@section('page-script')

@endsection