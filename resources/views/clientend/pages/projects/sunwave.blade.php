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

        .slideshow-container {
        aspect-ratio: 16 / 9;
        background: #0f1d2b;
        }

        .mySlides {
        display: block;
        position: absolute;
        inset: 0;
        opacity: 0;
        filter: blur(14px);
        transform: scale(1.04);
        transition: opacity 0.9s ease, filter 0.9s ease, transform 0.9s ease;
        }

        .mySlides.is-active {
        opacity: 1;
        filter: blur(0);
        transform: scale(1);
        z-index: 1;
        }

        .mySlides img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        vertical-align: middle;
        cursor: zoom-in;
        }

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

        .dot-container {
        text-align: center;
        padding: 10px;
        }

        .dot {
        cursor: pointer;
        height: 10px;
        width: 10px;
        margin: 0 4px;
        border: 0;
        padding: 0;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s ease;
        }

        .dot.is-active, .dot:hover {
        background-color: #00aeef;
        }

        .places {
        position: relative;
        }

        .places__tabs {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        z-index: 3;
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        }

        .places__tab {
        border: 0;
        background: rgba(255, 255, 255, 0.88);
        color: #1b3a5c;
        font-size: 12px;
        padding: 4px 9px;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.15s ease, color 0.15s ease;
        }

        .places__tab:hover {
        background: #fff;
        }

        .places__tab.is-active {
        background: #00aeef;
        color: #fff;
        }

        .places__stage {
        position: relative;
        height: 340px;
        overflow: hidden;
        border-radius: 8px;
        background: #0f1d2b;
        }

        @media (max-width: 991px) {
        .places__stage {
            height: 300px;
        }
        }

        .places__slide {
        position: absolute;
        inset: 0;
        margin: 0;
        opacity: 0;
        transition: opacity 1.2s ease;
        }

        .places__slide.is-active {
        opacity: 1;
        z-index: 1;
        }

        .places__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }

        .places__caption {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 10px 14px;
        color: #fff;
        font-size: 15px;
        margin: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.65));
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
@php
    $intro = $content->section('intro');
    $places = $content->section('places')->visibleItems()->filter(fn ($place) => $place->children->isNotEmpty())->values();
    $ownership = $content->section('ownership');
    $photos = $content->section('photos');
    $videos = $content->section('videos');
@endphp
<div class="hero_image_header_bayHills" >
        <img class="w-100" src="{{ $content->section('banner')->src() }}" alt="Sun Wave" />
    </div>


    <!-- about-section start -->
    <section class="branch-section pt-0 pb-0 mt-30 mb-30">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container__2">
                <div class="row align-items-center">
                    <div class="col-lg-5 p-5 pb-0 pt-0">
                        <h1 class="aboutus__title">{{ $intro->title }}</h1>
                        <p class="about__description">{{ $intro->body }}</p>
                        <div class="mt-30 project__nfo">
                            <ul class="d-flex project__info__links">
                                <li>
                                    <a class="hov__button" href="javascript:void(0)" data-fancybox data-src="{{ $intro->href() }}">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/map.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new" src="{{asset('assets/map.gif')}}" /> </noscript>
                                        <span class="hov__text">View Map</span>
                                    </a>

                                </li>
                                <li>
                                    <a class="hov__button" href="{{ $intro->src('brochure') }}">
                                        <img alt="new" class="lazyload map__hov" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/download.gif')}}" data-sizes="auto" />
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
                                            <h4 class="aboutus__title">{{ $intro->value('popup_title') }}</h4>
                                            <p class="about__description">{{ $intro->value('popup_body') }}</p>
                                        </div>
                                        <div class="pt-0" style="display: flex; flex-direction: column; align-items: center;">
                                            <div class="about_logo_project" style="height:50%;">
                                                <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                                     data-src="{{ $intro->src('popup_image') }}" data-sizes="auto" />
                                                <noscript> <img alt="new" src="{{ $intro->src('popup_image') }}" /> </noscript>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7">
                        @if ($places->isEmpty())
                        <div class="aboutus__img text-center">
                            <img alt="{{ $intro->title }}" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                 data-src="{{ $intro->src() }}" data-sizes="60%" width="200" />
                            <noscript> <img alt="{{ $intro->title }}" src="{{ $intro->src() }}" width="200" /> </noscript>
                        </div>
                        @else
                        <div class="places" id="places">
                            <div class="places__tabs">
                                @foreach ($places as $place)
                                    <button type="button" class="places__tab{{ $loop->first ? ' is-active' : '' }}" data-place="{{ $loop->index }}">{{ $place->title }}</button>
                                @endforeach
                            </div>
                            <div class="places__stage">
                                @foreach ($places as $place)
                                    @foreach ($place->children as $photo)
                                        <div class="places__slide{{ $loop->parent->first && $loop->first ? ' is-active' : '' }}" data-place="{{ $loop->parent->index }}">
                                            <img src="{{ $photo->src() }}" alt="{{ $photo->title ?: $place->title }}" loading="lazy">
                                            <p class="places__caption">{{ $photo->title ?: $place->title }}</p>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        @endif
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
                        <h2 class="section__header primary-color">{{ $ownership->title }}</h2>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <div class="video-wrapper text-center">
                            <a data-fancybox="gallery" href="{{ $ownership->src('full_image') }}">
                                <div class="poster-img-wrap">
                                    <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                         data-src="{{ $ownership->src() }}" data-sizes="auto" />
                                    <noscript> <img src="{{ $ownership->src('full_image') }}" /> </noscript>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 align-items-center">
                        <div class="ownership__suite div_grow row">

                            @foreach ($ownership->visibleItems() as $suite)
                                <div class="col-md-3 col-lg-3 col-sm-12 suite__box mb-3">
                                    {{ $suite->title }}
                                    <div class="suitebox_down">{{ $suite->subtitle }}</div>
                                </div>
                            @endforeach

                            <div class="col-md-6 col-lg-6 col-sm-12 suite__box p-3">
                                {{ $ownership->subtitle }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    @foreach (['objectives', 'comparison', 'difference'] as $key)
        @php($block = $content->section($key))
        <section class="branch-section mt-0  pt-0 pb-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container__2" style="background-color: rgba(235, 240, 250, 1);" style="height:auto;">
                    <div class="row align-items-center justify-content-center">
                        <div class="about__title_bw ">
                            <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                 data-src="{{ $block->src() }}" data-sizes="auto" />
                            <noscript> <img src="{{ $block->src() }}" /> </noscript>
                        </div>
                    </div>
                    @unless ($loop->last)
                    <div class="row align-items-center">
                    @endunless
                        <div class="col-lg-12">
                            <div class="about__box-wrap pt-0 pb-0">
                                <div class="about__subhead">
                                    <p class="subhead__p">
                                        {{ $block->title }}
                                    </p>
                                </div>

                                <p class="about__description">
                                    <ul>
                                        @foreach ($block->visibleItems() as $point)
                                        <li>{{ $point->title }}</li>
                                        @endforeach
                                    </ul>

                                </p>

                            </div>
                        </div>
                    @unless ($loop->last)
                    </div>
                    @endunless
                </div>
            </div>
        </section>
    @endforeach
    <!--Photo Gallary start-->
    <section class="branch-section mt-0 pt-0 pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container" style="background-color:#EBF0FA; overflow:hidden;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section__header">{{ $photos->title }}</h2>
                    </div>
                </div>
                <div class="slideshow-container">

                @foreach ($photos->visibleItems() as $photo)
                <div class="mySlides{{ $loop->first ? ' is-active' : '' }}">
                    <img src="{{ $photo->src() }}" alt="{{ $photo->title }}" onclick="openLightbox(this)" @unless ($loop->first) loading="lazy" @endunless>
                    @if ($photo->subtitle)
                    <div class="slide-text">{{ $photo->subtitle }}</div>
                    @endif
                </div>
                @endforeach

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <div class="dot-container">
                @foreach ($photos->visibleItems() as $photo)
                <button type="button" class="dot{{ $loop->first ? ' is-active' : '' }}" onclick="currentSlide({{ $loop->iteration }})" aria-label="Photo {{ $loop->iteration }}"></button>
                @endforeach
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
    <!-- video-gallery-section start -->

    <section class="branch-section mt-0 pt-0 pb-0 d-flex align-items-center">
                <div class="container" style="height: auto;display: flex;align-items: center;justify-content: center;">
                    <div class="branch__container pb-0" style="background-color: rgba(235, 240, 250, 1);">
                        <div class="row">
                            <div class="col-lg-12 text-center mb-20">
                                <h4 class="section__header primary-color">{{ $videos->title }}</h4>
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
                                        <iframe width="560" height="315" src="{{ $videos->href() }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


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
        const SLIDE_INTERVAL = 2500;
        let slideIndex = 1;
        let slideTimer;

        showSlides(slideIndex);
        startAutoPlay();

        function startAutoPlay() {
        slideTimer = setInterval(() => plusSlides(1), SLIDE_INTERVAL);
        }

        // Restart the timer after a manual change so the next slide does not follow too soon.
        function resetAutoPlay() {
        clearInterval(slideTimer);
        startAutoPlay();
        }

        function plusSlides(n) {
        showSlides(slideIndex += n);
        resetAutoPlay();
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        resetAutoPlay();
        }

        function showSlides(n) {
        const slides = document.getElementsByClassName("mySlides");
        const dots = document.querySelectorAll(".dot-container .dot");
        if (!slides.length) return;

        if (n > slides.length) slideIndex = 1;
        if (n < 1) slideIndex = slides.length;

        Array.from(slides).forEach((slide, i) => slide.classList.toggle("is-active", i === slideIndex - 1));
        dots.forEach((dot, i) => dot.classList.toggle("is-active", i === slideIndex - 1));
        }

        (function () {
        const places = document.getElementById("places");
        if (!places) return;

        const tabs = places.querySelectorAll(".places__tab");
        const slides = places.querySelectorAll(".places__slide");
        let current = [];
        let position = 0;
        let timer;

        function show(index) {
            slides.forEach(slide => slide.classList.remove("is-active"));
            position = (index + current.length) % current.length;
            current[position].classList.add("is-active");
        }

        function selectPlace(place) {
            tabs.forEach(tab => tab.classList.toggle("is-active", tab.dataset.place === place));
            current = Array.from(slides).filter(slide => slide.dataset.place === place);
            show(0);
            clearInterval(timer);
            if (current.length > 1) {
                timer = setInterval(() => show(position + 1), 3500);
            }
        }

        tabs.forEach(tab => tab.addEventListener("click", () => selectPlace(tab.dataset.place)));
        selectPlace(tabs[0].dataset.place);
        })();

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