@php
    $footer = $layout->section('contact');
    $locations = $layout->section('locations')->visibleItems();
    $socials = $layout->section('social')->visibleItems();
@endphp
<footer  class="footer">
            <div  class="footer-bg footer__desktop">
                <div  class="footer-top">
                    <div  class="container">
                        <div  class="row">
                            <div class="col footer__col">
                                <div class="footer-address-box">
                                    <p class="address-text">{{ $footer->body }}</p>
                                    <div class="hotline-inline" style="display: inline-flex; align-items: center; gap: 8px;">
                                        <i class="fa-solid fa-headset hotline-icon"></i>
                                        <span class="hotline-number">{{ $footer->value('hotline') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 2nd Column: Locations stacked vertically -->
                            <div class="col footer__col">
                                <div class="location-vertical-list" style="display: flex; flex-direction: column; gap: 10px;">
                                    @foreach ($locations as $location)
                                    <div class="location-item" style="display: inline-flex; align-items: center; gap: 8px;">
                                        @if ($location->link_url)
                                        <a href="{{ $location->href() }}" target="__blank" >
                                            <i class="fa-solid fa-map-marker-alt"></i>
                                            <span>{{ $location->title }}</span>
                                        </a>
                                        @else
                                        <i class="fa-solid fa-map-marker-alt"></i>
                                        <span>{{ $location->title }}</span>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- 3rd Column: WhatsApp Icon and Link -->
                            <div class="col footer__col">
                                <div class="whatsapp-box" style="display: inline-flex; align-items: center; gap: 8px;">
                                    <i class="fa-brands fa-whatsapp whatsapp-icon" style="color: #25D366; font-size: 20px;"></i>
                                    <a href="{{ $footer->href() }}" target="_blank" class="whatsapp-link">{{ $footer->value('whatsapp') }}</a>
                                </div>
                            </div>

                            <!-- 4th Column: Social Icons Row -->
                            <div class="col footer__col">
                                <ul class="social-list" style="display: flex; flex-direction: row; gap: 15px; list-style: none; padding: 0; margin: 0;">
                                    @foreach ($socials as $social)
                                    <li>
                                        <a aria-label="{{ $social->title }}" href="{{ $social->href() }}" target="_blank">
                                            <i class="{{ $social->value('icon') }}" style="font-size: 38px; color: {{ $social->value('color') }};"></i>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div  class="footer-bottom">
                    <ul >
                        <li  class="copyright">
                            <p > {{ $footer->value('copyright') }}</p>
                        </li>
                        <li b-ks10nv8eex class="payment-icon">
                                        <img b-ks10nv8eex src="{{ $footer->src() }}" alt="goldsands group payment" />

                        </li>
                        <li  class="powered-by">
                            <span >Powered By</span>
                            <a  href="{{ $footer->href('powered_by_url') }}" target="_blank" aria-label="{{ $footer->value('powered_by') }}"> {{ $footer->value('powered_by') }}</a>

                        </li>
                    </ul>

                </div>
            </div>


            <div  class="footer-mobile-bg footer__mobile">

                <div  class="footer__mobile-flex">
                    <div  class="footer__mobile-wrap">
                        <div  class="footer-top__menu">
                            <div  class="container">
                                <p class="address-text">{{ $footer->body }}</p>
                                <div class="hotline-inline" style="display: inline-flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid fa-headset hotline-icon"></i>
                                    <span class="hotline-number">{{ $footer->value('hotline') }}</span>
                                </div>
                            </div>
                        </div>
                        <div  class="container">
                            <div  class="footer-top__mobile">

                                <div  class="footer-mobile__inner">
                                    <div class="col">
                                <div class="location-vertical-list" style="display: flex; flex-direction: column; gap: 10px;">
                                    @foreach ($locations as $location)
                                    <div class="location-item" style="display: inline-flex; align-items: center; gap: 8px;">
                                        @if ($location->link_url)
                                        <a href="{{ $location->href() }}" target="__blank" >
                                            <i class="fa-solid fa-map-marker-alt"></i>
                                            <span>{{ $location->title }}</span>
                                        </a>
                                        @else
                                        <i class="fa-solid fa-map-marker-alt"></i>
                                        <span>{{ $location->title }}</span>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- 3rd Column: WhatsApp Icon and Link -->
                            <div class="col">
                                <div class="whatsapp-box" style="display: inline-flex; align-items: center; gap: 8px;">
                                    <i class="fa-brands fa-whatsapp whatsapp-icon" style="color: #25D366; font-size: 20px;"></i>
                                    <a href="{{ $footer->href() }}" target="_blank" class="whatsapp-link">{{ $footer->value('whatsapp') }}</a>
                                </div>
                            </div>

                            <!-- 4th Column: Social Icons Row -->
                            <div class="col">
                                <ul class="social-list" style="display: flex; flex-direction: row; gap: 15px; list-style: none; padding: 0; margin: 0;">
                                    @foreach ($socials as $social)
                                    <li>
                                        <a aria-label="{{ $social->title }}" href="{{ $social->href() }}" target="_blank">
                                            <i class="{{ $social->value('icon') }}" style="font-size: 24px; color: {{ $social->value('color') }};"></i>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="footer-bottom__mobile">
                    <div  class="container">
                        <ul >
                            <li  class="powered-by">
                                <span >Powered By</span>
                                {{ $footer->value('powered_by') }}

                            </li>
                            <li b-ks10nv8eex class="payment-icon">
                                        <img b-ks10nv8eex src="{{ $footer->src() }}" alt="goldsands group payment" />

                        </li>

                            <li  class="copyright">
                                <p > {{ $footer->value('copyright') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
