@extends('clientend.layouts.master')
@section('title','About Us')
@section('page-style')
<style>
    .sister-logo {
        display: flex;
        justify-content: center;
        padding: 16px;
    }

    .sister-logo img {
        width: 100%;
        max-width: 180px;
        height: auto;
    }

    .sister-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px 32px;
        padding: 16px 0;
    }

    .sister-item {
        border-left: 3px solid #00aeef;
        padding-left: 16px;
    }

    .sister-item__name {
        font-size: 18px;
        font-weight: 700;
        color: #1b3a5c;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .sister-item__details {
        display: grid;
        grid-template-columns: max-content 1fr;
        gap: 4px 12px;
        margin: 0;
        font-size: 15px;
    }

    .sister-item__details dt {
        font-weight: 600;
        color: #555;
    }

    .sister-item__details dd {
        margin: 0;
        color: #222;
        word-break: break-word;
    }

    .sister-item__details a {
        color: inherit;
    }

    .sister-item__details a:hover {
        color: #00aeef;
    }

    @media (max-width: 767px) {
        .sister-list {
            grid-template-columns: 1fr;
        }

        .sister-logo img {
            max-width: 120px;
        }
    }
</style>
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
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 sister-logo">
                        <img src="{{ $sister->src() }}" alt="Nanova Commercial logo">
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="sister-list">
                            @foreach ($sister->visibleItems() as $concern)
                                <div class="sister-item">
                                    <h3 class="sister-item__name">{{ $concern->title }}</h3>
                                    <dl class="sister-item__details">
                                        @foreach (['phone' => 'Phone', 'email' => 'Email', 'website' => 'Website', 'address' => 'Address'] as $field => $label)
                                            @if ($value = $concern->value($field))
                                                <dt>{{ $label }}</dt>
                                                <dd>
                                                    @if ($field === 'phone')
                                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $value) }}">{{ $value }}</a>
                                                    @elseif ($field === 'email')
                                                        <a href="mailto:{{ $value }}">{{ $value }}</a>
                                                    @elseif ($field === 'website')
                                                        <a href="{{ str_starts_with($value, 'http') ? $value : 'https://'.$value }}" target="_blank" rel="noopener">{{ $value }}</a>
                                                    @else
                                                        {{ $value }}
                                                    @endif
                                                </dd>
                                            @endif
                                        @endforeach
                                    </dl>
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
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="{{ $mission->src('bullet') }}" alt="Nanova Commercial resort" />
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