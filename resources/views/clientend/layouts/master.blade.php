<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title') | One Hotel Developer Company in Bangladesh</title>
        @include('clientend.utils.head')
        @include('clientend.utils.css')
        @yield('page-style')
    </head>
    <body>
        @include('clientend.layouts.header')
    




<main class="main-wrap">
    @yield('main')
    
</main>
<!-- footer start -->
    @include('clientend.layouts.footer')
        <!-- ----------schedule meeting-------- -->
        <div class="side_envelope moving-border">
            <div class="side_back"></div>
            <div class="side_letter" data-fancybox data-src="#schedule_container">
                <!--<div class="side_text"> <a class="schedule_button" href="javascript:void(0)" aria-label="Take Appointment">Take<span style="color:#fff;">_</span>an<span style="color:#fff;">_</span>Appoinment</a> </div>-->
            </div>
        </div>
        <!-- ---------schedule form---------- -->

        <!-- --------------whats app and pdf---------- -->
        <div class="side_envelope1 moving-border1">
            <div class="side_back1"></div>
            <div class="side_letter1">
                <div class="side_text1">
                    <a href="{{ $layout->section('contact')->href() }}" target="_blank" aria-label="Click to Contact Whatsapp">
                        <img src="{{asset('assets/whatsapp.webp')}}" alt="Nanova-commercial-whatsapp">
                    </a>
                </div>
            </div>
        </div>

        <div id="overlay"></div>

        <!-- -----------scroll-top start ---------- -->
        <button type="button" class="scroll-top" aria-label="Scroll Top"><img style="width:35px" src="{{asset('assets/scrolltopicon.webp')}}" alt="scroll top icon"></button>
        <!-- -----------scroll-top end---------- -->
        <!-- ------------fair timing---------- -->
        <!-- _-----side button end----_ -->
        

        @include('clientend.utils.js')
       
    
        @yield('page-script')
</body>
</html>
