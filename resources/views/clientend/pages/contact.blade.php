@extends('clientend.layouts.master')
@section('title','Contact Us')
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
        
    .about_branch_container{
        padding:15px 0 !important;
    }

    .about_branch_head{
        padding:0 15px !important;
    }

    #clientPhoneNumbe {
        padding-top: 6px;
        padding-bottom: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .iti--allow-dropdown, .iti--allow-dropdown input {
        width: 100% !important;
    }

    .iti--allow-dropdown input::placeholder{
        padding-left:0 !important;
    }
    .iti--separate-dial-code .iti__selected-flag {
        background-color: #fff !important;
        padding: 0 6px 0 20px !important;
        margin-left: 6px !important;
        border-radius: 50px 0 0 50px !important;
    }
    .iti__country-list{
        scrollbar-width: none;
        border-radius: 10px;
    }
    .iti__country {
        font-size: 14px !important;
        font-weight: 400 !important;
    }

    .iti--allow-dropdown input, 
    .iti--allow-dropdown input[type=text], 
    .iti--allow-dropdown input[type=tel], 
    .iti--separate-dial-code input, 
    .iti--separate-dial-code input[type=text], 
    .iti--separate-dial-code input[type=tel] {
        padding-right: 6px;
        padding-left: 0 !important; 
        margin-left: 0;
    }

    .error-placeholder::placeholder {
        color: red !important;
    }

</style>
<link rel="stylesheet" href="{{asset('assets/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css')}}" />

@endsection
@section('main')
@php
    $hero = $content->section('hero');
    $intro = $content->section('intro');
    $branches = $content->section('branches');
@endphp
<div class="hero_image_header_contact">
            <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                 data-src="{{ $hero->src() }}" width="100%" height="100%" />
            <noscript> <img alt="new" src="{{ $hero->src() }}" /> </noscript>
        </div>
        <!-- category  start -->
        <section class="category pb-0">
            <div class="container">
                <div class="inner-container_contact">
                    <div class="contact_head">
                        <h1>{{ $intro->title }}</h1>
                    <h6 style="color:black; cursor:auto;">{{ $intro->subtitle }}</h6>
                    </div>
                    @foreach ($content->section('cards')->visibleItems()->chunk(2) as $row)
                    <div class="contact_items">
                        @foreach ($row as $card)
                            <div class="call  col-md-4 col-lg-4">
                                <img src="{{ $card->src() }}" alt="loftloader">
                                <div class="call_text">
                                    <h3>{{ $card->title }}</h3>
                                    @if (str_starts_with((string) $card->link_url, 'mailto:'))
                                    <p><a href="{{ $card->href() }}" class="__cf_email__">{{ $card->subtitle }}</a></p>
                                    @else
                                    <p>{{ $card->subtitle }}</p>
                                    @endif
                                </div>
                            <a href="{{ $card->href() }}" @if (str_starts_with((string) $card->link_url, 'http')) target="_blank" @endif>{{ $card->value('button_text') }}</a>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- category  end -->

        <!--Branch Offices Start-->
        <section class="branch-section pt-0 pb-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center; margin-top:20px;">
                <div class="branch__container about_branch_container">
                <div class="branch_head about_branch_head">
                        <h2>{{ $branches->title }}</h2>
                    </div>
                <div class="branch_lists">
                    @foreach ($branches->visibleItems() as $branch)
                                <div class="branch_cols">
                                    @if ($branch->value('map_embed'))
                                    <iframe src="{{ $branch->href('map_embed') }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                                    @endif
                                    <h2>{{ $branch->title }}</h2>
                                    <div class="branch_address">
                                        <div class="col_left">Address : </div>
                                        <div class="col_right">{{ $branch->body }}</div>
                                    </div>
                                    <div class="branch_address">
                                        <div class="col_left">Email : </div>
                                        <div class="col_right">{{ $branch->value('email') }}</div>
                                    </div>
                                    <div class="branch_address">
                                        <div class="col_left">Cell : </div>
                                        <div class="col_right">{{ $branch->value('cell') }}</div>
                                    </div>
                                    <div class="branch_address">
                                        <div class="col_left">Hotline : </div>
                                        <div class="col_right">{{ $branch->value('hotline') }}</div>
                                    </div>
                                        <a href="javascript:void(0)" data-fancybox
                                        data-src="{{ $branch->href() }}" class="branch_cols_button">View Map</a>
                                </div>
                    @endforeach
                </div>

            </div>
            </div>
        </section>
        <!--Branch Offices End-->

        <!--CONTACT FORM start -->
        <section class="branch-section pb-0 pt-0">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <div class="branch__container" style="background-color: #EBF0FA; box-shadow: 0px -5px 15px 0px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                        <div class="mt-5 p-lg-4 p-3">
            <!--               main form start -->
                            <form id="contact_form" aria-label="Contact Form">
                            <div class="row">
                                <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                                    <div class="branch_head">
                                        <h2>{{ $content->section('form')->title }}</h2>
                                    </div>
                                </div>
                            </div>
                            <dl class="row text-center justify-content-center">
                                <dd class="col-sm-10"><input type="text" class="form-control" maxlength="45" id="fullName" placeholder="Full Name"></dd>

                                <dd class="col-sm-10"><input type="text" class="form-control" maxlength="45" id="clientEmali" placeholder="Email"></dd>
                                <p class="text-danger" style="display:none; font-size:12px;" id="emailValidError"> Email format is not valid </p>

                                <dd class="col-sm-10"><input type="text" class="form-control clientPhoneNumber" maxlength="20" id="clientPhoneNumber" name="clientPhoneNumber" placeholder="Phone Number"></dd>
                                    <p class="text-danger" style="display:none; font-size:12px;" id="phoneValidError"> Please enter a valid phone number. </p>

                                <dd class="col-sm-10"><input type="text" class="form-control" maxlength="150" id="clientAddress" placeholder="Address"></dd>
                                <dd class="col-sm-10">
                                        <textarea style="height: 10rem;padding: 5px 10px;    background: white; border-radius:30px; text-align: center; resize: none;" maxlength="150" id="clientMessage" placeholder="Write Your Message"></textarea>
                                </dd>
                            </dl>
                            <div class="row text-center justify-content-center">
                                <div class="col-sm-4">
                                <input type="button" class="form-control bg-info text-light font-secondary" id="ContactFormSubmit" value="Submit" >
                                </div>
                            </div>
                            </form>
                            <!-- main form end -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
  <!-- CONTACT FORM end -->


@endsection
@section('page-script')
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v833ccba57c9e4d2798f2e76cebdd09a11778172276447" integrity="sha512-57MDmcccJXYtNnH+ZiBwzC4jb2rvgVCEokYN+L/nLlmO8rfYT/gIpW2A569iJ/3b+0UEasghjuZH/ma3wIs/EQ==" data-cf-beacon='{"version":"2024.11.0","token":"f572fbb7dd234b99944a030121e5acb9","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
@endsection