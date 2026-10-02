@extends('clientend.layouts.master')
@section('title','About Us')
@section('page-style')

@endsection
@section('main')
    @php
        $intro = $content->section('intro');
        $sister = $content->section('sister_concern');
        $mission = $content->section('mission');
        $vision = $content->section('vision');
        $values = $content->section('values');
        $csr = $content->section('csr');
    @endphp
    <section class="branch-section pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center; padding-top: 120px;">
            <div class="branch__container__2 p-0" style="background-color: #EBF0FA;">
                <div class="row align-items-center">
                        <div class="col-lg-5 align-items-center p-5 pb-0">
                                <h1 class="aboutus__title">{{ $intro->title }}</h1>
                            <div class="about__box-wrap p-3">
                                <p class="about__description">
                                    {{ $intro->body }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="aboutus__img text-center">
                                <img alt="{{ $intro->title }}" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                     data-src="{{ $intro->src() }}" data-sizes="auto" />
                                <noscript> <img alt="{{ $intro->title }}" src="{{ $intro->src() }}" /> </noscript>
                            </div>

                        </div>

            </div>
        </div>
    </section>

    <section class="branch-section mt-0 pt-0 pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container">
                <h2 class="aboutus__title">{{ $sister->title }}</h2>
                <div id="circle-shape-example">
                    <div class="row">
                        <div id="sis_consirn_img" class="col-lg-4 col-md-4" style="display: flex; flex-direction: column;align-items: center; justify-content: center;">
                            <img src="{{ $sister->src() }}" alt="Nanova Groups logo" class="curve" height="60%" width="60%">
                        </div>
                        <div class="col-lg-8 col-md-8">
                            @foreach ($sister->visibleItems() as $concern)
                                <div class="moto">

                                    <div class="sister__brand">
                                        <h6 class="offset-1 font-size-20  slide__right">
                                            {{ $concern->title }}
                                        </h6>
                                        <p class=" offset-1 text-black">
                                            {{ $concern->subtitle }}
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="branch-section pb-0 pt-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container" style="background-color: #EBF0FA;">
                <h2 class="aboutus__title">{{ $mission->title }}</h2>
                <div class="mission-container row pb-5">
                    <div class="mission-image col-lg-4" style="display:flex;margin:auto;padding:0;width:250px;">
                        <img src="{{ $mission->src() }}" style="width:100%;height:100%;max-width:250px;" alt="Company Goals">
                    </div>
                    <ul class="mission-list col-lg-8">
                        @foreach ($mission->visibleItems() as $point)
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="{{ $mission->src('bullet') }}" alt="Nanova Groups resort" />
                                    <div>{{ $point->title }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="branch-section pb-0 pt-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container__2 p-0 pb-2">
                <div class="row align-items-center">
                        <div class="col-lg-5 align-items-center p-5 pb-0">
                            <h2 class="aboutus__title">{{ $vision->title }}</h2>
                            <div class="about__box-wrap p-3">
                                <p class="about__description">
                                    {{ $vision->body }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="aboutus__img text-center">
                                <img alt="{{ $vision->title }}" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                     data-src="{{ $vision->src() }}" data-sizes="auto" />
                                <noscript> <img alt="{{ $vision->title }}" src="{{ $vision->src() }}" /> </noscript>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <section class="branch-section pb-0 pt-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container" style="background-color: #EBF0FA;">
                <div class="row">
                    <div class="col-lg-12 text-center p-3">
                        <h2 class="aboutus__title">{{ $values->title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="benefits__list p-5">
                            @foreach ($values->visibleItems() as $value)
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{ $value->src() }}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{ $value->src() }}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>{{ $value->title }}</h3>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SOCIAL RESPONSIBILITY about-section start -->
    <section class="branch-section pb-0 pt-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container__2 p-0 pb-2">
                <div class="row align-items-center">
                            <div class="col-lg-5 align-items-center p-5 pb-0">
                            <h2 class="aboutus__title" style="text-transform:uppercase;">{{ $csr->title }}</h2>
                                <div class="about__box-wrap p-3">
                                    <p class="about__description">
                                    {{ $csr->body }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="aboutus__img text-center">
                                <img alt="{{ $csr->title }}" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                         data-src="{{ $csr->src() }}" data-sizes="auto" />
                                <noscript> <img alt="{{ $csr->title }}" src="{{ $csr->src() }}" /> </noscript>
                                </div>

                            </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-script')

@endsection