@extends('clientend.layouts.master')
@section('title','About Us')
@section('page-style')

@endsection
@section('main')
    <section class="branch-section pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center; padding-top: 120px;">
            <div class="branch__container__2 p-0" style="background-color: #EBF0FA;">
                <div class="row align-items-center">
                        <div class="col-lg-5 align-items-center p-5 pb-0">
                                <h1 class="aboutus__title">We Are Nanova Groups</h1>
                            <div class="about__box-wrap p-3">
                                <p class="about__description">
                                    Nanova Groups is Bangladesh&#x2019;s number one hotel developer and investment company, shaping the future of hospitality, tourism, and real estate since 2015. Alongside premium hotel projects like Best Western Plus Bay Hills Himchhari, Bay Sands, Bay Marina, and Bay Breeze, we have also developed landmark residential projects, including Amin City Purbachol and Gold City Mawa. Driven by quality, innovation, and long-term vision, we create profitable investment opportunities that combine luxury, trust, and sustainable growth. Through legally secured ownership, we make premium property and hotel investments accessible for everyday Bangladeshis &#x2014; creating a trusted path toward long-term asset value.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="aboutus__img text-center">
                                <img alt="e8a1b74d-3dac-4c67-b29a-dc0d6914b479.jpg" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                     data-src="{{asset('assets/ghrweb/Sites/GHRWEB/AboutPageImg/e8a1b74d-3dac-4c67-b29a-dc0d6914b479.jpg')}}" data-sizes="auto" />
                                <noscript> <img alt="e8a1b74d-3dac-4c67-b29a-dc0d6914b479.jpg" src="{{asset('assets/ghrweb/Sites/GHRWEB/AboutPageImg/e8a1b74d-3dac-4c67-b29a-dc0d6914b479.jpg')}}" /> </noscript>
                            </div>
                            
                        </div>

            </div>
        </div>
    </section>

    <section class="branch-section mt-0 pt-0 pb-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container">
                <h2 class="aboutus__title">Nanova Groups SISTER CONCERN</h2>
                <div id="circle-shape-example">
                    <div class="row">
                        <div id="sis_consirn_img" class="col-lg-4 col-md-4" style="display: flex; flex-direction: column;align-items: center; justify-content: center;">
                            <img src="{{asset('assets/main-logo.png')}}" alt="Nanova Groups logo" class="curve" height="60%" width="60%">
                        </div>
                        <div class="col-lg-8 col-md-8">
                                <div class="moto">
                                    
                                    <div class="sister__brand">
                                        <h6 class="offset-1 font-size-20  slide__right">
                                            Sun Wave Hotel &amp; Resort
                                        </h6>
                                        <p class=" offset-1 text-black">
                                            A Trusted Destination for memorable moments
                                        </p>
                                    </div>

                                </div>
                                <div class="moto">
                                    
                                    <div class="sister__brand">
                                        <h6 class="offset-1 font-size-20  slide__right">
                                            Nanova Project management
                                        </h6>
                                        <p class=" offset-1 text-black">
                                            Nanova Project Management specializes in comprehensive and efficient project execution&#xD;&#xA;Pioneering
                                        </p>
                                    </div>

                                </div>
                                <div class="moto">
                                    
                                    <div class="sister__brand">
                                        <h6 class="offset-1 font-size-20  slide__right">
                                            Nanova Shop
                                        </h6>
                                        <p class=" offset-1 text-black">
                                            Nanova Shop introduces a Huge amount of Products store in Dhaka
                                        </p>
                                    </div>

                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="branch-section pb-0 pt-0">
        <div class="container" style="display: flex; align-items: center; justify-content: center;">
            <div class="branch__container" style="background-color: #EBF0FA;">
                <h2 class="aboutus__title">OUR MISSION</h2>
                <div class="mission-container row pb-5">
                    <div class="mission-image col-lg-4" style="display:flex;margin:auto;padding:0;width:250px;">
                        <img src="{{asset('assets/ArrowAndGoal.webp')}}" style="width:100%;height:100%;max-width:250px;" alt="Company Goals">
                    </div>
                    <ul class="mission-list col-lg-8">
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="assets/reshot-icon-list.svg" alt="Nanova Groups resort" />
                                    <div>To Ensure High Quality Product With Most Modern &amp; Innovation Concept</div>
                                </div> 
                            </li>
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="assets/reshot-icon-list.svg" alt="Nanova Groups resort" />
                                    <div>To Grow the Economy by Reducing Poverty &amp; Unemployment.</div>
                                </div> 
                            </li>
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="assets/reshot-icon-list.svg" alt="Nanova Groups resort" />
                                    <div>To Create Tension Free Source of Income by Providing the Opportunities of Guaranteed &amp; Safe Investment Return.</div>
                                </div> 
                            </li>
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="assets/reshot-icon-list.svg" alt="Nanova Groups resort" />
                                    <div>To Give Most Priority and Ensure Best Service to our Clients.</div>
                                </div> 
                            </li>
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="assets/reshot-icon-list.svg" alt="Nanova Groups resort" />
                                    <div>To make Bangladesh as one of the top Tourism Country in the World.</div>
                                </div> 
                            </li>
                            <li>
                                <div class="mission_list_wrap">
                                    <img style="width:30px;height:30px;padding:5px;background:#fff;border-radius:5px;" src="assets/reshot-icon-list.svg" alt="Nanova Groups resort" />
                                    <div>To Make the Nation Prestigious &amp; Wealthy.</div>
                                </div> 
                            </li>
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
                            <h2 class="aboutus__title">OUR  VISION</h2>
                            <div class="about__box-wrap p-3">
                                <p class="about__description">
                                    Join us on this journey as we redefine real estate standards, transform spaces into homes, source of halal income  and create environments that inspire progress. Together, we are architects of dreams, shaping a future where Nanova Groups is synonymous with excellence, compassion, and the realization of aspirations. Welcome to a world where your real estate goals become our shared vision for a brighter tomorrow. Nanova Groups stands as a symbol of trust, innovation, and integrity. We aspire to be the go-to real estate partner, recognized for our unwavering commitment to understanding and meeting the unique needs of our clients.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="aboutus__img text-center">
                                <img alt="f05a06f0-f7b6-426b-b196-98405a96b28c.jpg" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                     data-src="{{asset('assets/ghrweb/Sites/GHRWEB/AboutPageImg/f05a06f0-f7b6-426b-b196-98405a96b28c.jpg')}}" data-sizes="auto" />
                                <noscript> <img alt="f05a06f0-f7b6-426b-b196-98405a96b28c.jpg" src="{{asset('assets/ghrweb/Sites/GHRWEB/AboutPageImg/f05a06f0-f7b6-426b-b196-98405a96b28c.jpg')}}" /> </noscript>
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
                        <h2 class="aboutus__title">VALUES</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="benefits__list p-5">
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Always Customer first-Customer Priority-Customer Focused</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Sharing both happiness &amp; sadness</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Respect &amp; Responsibility</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Honesty, Caring &amp; Trust</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Passion, Dedicated, Professional &amp; Commitment</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Courageous, Embrace Change &amp; Innovate</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Positive Mind never give-up &amp; believe in growth.</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Work for Success</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Self Discipline, Focused, Hard Working, Achieve Goals</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>We believe in our people, Develop &amp; Empower them</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Compliance, legal authority &amp; Environment</h3>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefit__box-wrap paste-color">
                                        <img alt="new" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                             data-src="{{asset('assets/social-care.gif')}}" data-sizes="auto" />
                                        <noscript> <img alt="new"  src="{{asset('assets/social-care.gif')}}" /></noscript>
                                        <div class="benefit-text">
                                            <h3>Positive Mind never give-up &amp; believe in growth</h3>
                                        </div>
                                    </div>
                                </li>
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
                            <h2 class="aboutus__title" style="text-transform:uppercase;">Social Responsibility</h2>
                                <div class="about__box-wrap p-3">
                                    <p class="about__description">
                                    As an integral aspect of our Corporate Social Responsibility, Nanova Groups actively participates in various charitable initiatives, community volunteering endeavors, and implements corporate policies that contribute to environmental well-being through diverse programs. Here at Nanova, we give great importance to Corporate Social Responsibility (CSR). Nanova undertakes business activities which benefit not only our company and our clients, but also the economy, the society that we live in and our surrounding environment simultaneously. The idea behind Corporate Social Responsibility is to create a framework that encourages responsible behavior by businesses, and Nanova Hotels &amp; Resorts Ltd. intends to adhere to this ideology. We strive to keep social progress, protection of the environment and careful use of natural resources at the forefront when determining our business objectives, so that a superior standard of living is ensured for present and future generations.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="aboutus__img text-center">
                                <img alt="5b47407a-3f3d-47b4-ae8d-51e382821fca.jpg" class="lazyload" src="{{asset('assets/_blank.webp')}}"
                                         data-src="{{asset('assets/ghrweb/Sites/GHRWEB/CSRPageImg/5b47407a-3f3d-47b4-ae8d-51e382821fca.jpg')}}" data-sizes="auto" />
                                <noscript> <img alt="5b47407a-3f3d-47b4-ae8d-51e382821fca.jpg" src="{{asset('assets/ghrweb/Sites/GHRWEB/CSRPageImg/5b47407a-3f3d-47b4-ae8d-51e382821fca.jpg')}}" /> </noscript>
                                </div>

                            </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-script')

@endsection