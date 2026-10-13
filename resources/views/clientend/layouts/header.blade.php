@php
    $logo = $layout->section('brand')->src();
    $projectMenu = $layout->section('project_menu')->visibleItems();
    // Keeps the ids the original markup used for the first four categories.
    $mobileMenuIds = ['HotelV', 'LandV', 'ApartmentV', 'IspV'];
@endphp
<!-- header start -->
        <header  class="header__main">
            <button  class="f-button" style="display:none" aria-label="Header Main Button" ></button>
            <div  class="header__section header__transparrent">
                <div  class="mobile__menu-header">
                    <div  class="container-fluid">
                        <div  class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                            <div  class="offcanvas__header--menu__open ">
                                <a  class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas aria-label="Menu Open">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                                         viewBox="0 0 512 512">
                                        <path  fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                              stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352">
                                        </path>
                                    </svg>
                                    <span  class="visually-hidden">Menu Open</span>
                                </a>
                            </div>
                            <div  class="main__logo">
                                <div  class="main__logo--title">
                                    <a  class="main__logo--link" href="{{url('/')}}" aria-label="Main Logo">
                                        <img  class="main__logo--img" src="{{ $logo }}" alt="logo-img" width="100%" height="100%">
                                    </a>
                                </div>
                            </div>
                            <div  class="header__search">
                                <ul  class="d-flex">
                                    <li  class="header__search--items">
                                        <form onsubmit="event.preventDefault()">
                                            <div  class="input-wrapper">
                                                <button  aria-label="Header Search Button" type="submit" class="submit--btn">
                                                    <svg  width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path  d="M15.9645 14.5855L12.2891 10.9102C13.1739 9.73217 13.6516 8.29831 13.65 6.825C13.65 3.06172 10.5883 0 6.825 0C3.06172 0 0 3.06172 0 6.825C0 10.5883 3.06172 13.65 6.825 13.65C8.29831 13.6516 9.73217 13.1739 10.9102 12.2891L14.5855 15.9645C14.7716 16.1308 15.0143 16.2195 15.2637 16.2126C15.5131 16.2056 15.7505 16.1034 15.9269 15.9269C16.1034 15.7505 16.2056 15.5131 16.2126 15.2637C16.2195 15.0143 16.1308 14.7716 15.9645 14.5855ZM1.95 6.825C1.95 5.86082 2.23591 4.91828 2.77159 4.1166C3.30726 3.31491 4.06863 2.69006 4.95942 2.32109C5.85021 1.95211 6.83041 1.85557 7.77607 2.04367C8.72172 2.23177 9.59036 2.69607 10.2721 3.37785C10.9539 4.05964 11.4182 4.92828 11.6063 5.87393C11.7944 6.81959 11.6979 7.79979 11.3289 8.69058C10.9599 9.58137 10.3351 10.3427 9.53341 10.8784C8.73172 11.4141 7.78918 11.7 6.825 11.7C5.53255 11.6984 4.29347 11.1843 3.37957 10.2704C2.46566 9.35653 1.95155 8.11745 1.95 6.825Z"
                                                              fill="black" fill-opacity="0.7" />
                                                    </svg>
                                                </button>
                                                <input  type="text" placeholder="Search " id="searchinputMob" name="search" class="searchbox-input">
                                                <a  href="javascript:void(0)" id="SearchbtnMobClose" class="close-icon" aria-label="Close Icon">
                                                    <svg  width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path  d="M2.32067 0.392699L7.78218 6.00684L13.2154 0.421788C13.3354 0.290477 13.48 0.185433 13.6404 0.112955C13.8009 0.0404768 13.974 0.00205708 14.1492 0C14.5245 0 14.8844 0.153235 15.1497 0.425996C15.4151 0.698756 15.5641 1.0687 15.5641 1.45444C15.5674 1.63276 15.5352 1.80989 15.4695 1.97496C15.4039 2.14003 15.306 2.28956 15.1821 2.41437L9.67814 7.99943L15.1821 13.6572C15.4153 13.8917 15.552 14.2093 15.5641 14.5444C15.5641 14.9302 15.4151 15.3001 15.1497 15.5729C14.8844 15.8456 14.5245 15.9989 14.1492 15.9989C13.9689 16.0065 13.789 15.9756 13.6209 15.908C13.4529 15.8404 13.3003 15.7376 13.1729 15.6062L7.78218 9.99201L2.33481 15.5916C2.21526 15.7185 2.07244 15.8199 1.91459 15.8898C1.75674 15.9597 1.58699 15.9967 1.41513 15.9989C1.03988 15.9989 0.67999 15.8456 0.414645 15.5729C0.1493 15.3001 0.000230214 14.9302 0.000230214 14.5444C-0.00306862 14.3661 0.029116 14.189 0.0948091 14.0239C0.160502 13.8588 0.258318 13.7093 0.382253 13.5845L5.88621 7.99943L0.382253 2.34165C0.149056 2.10713 0.0123129 1.78956 0.000230214 1.45444C0.000230214 1.0687 0.1493 0.698756 0.414645 0.425996C0.67999 0.153235 1.03988 0 1.41513 0C1.75471 0.00436332 2.08013 0.145444 2.32067 0.392699Z"
                                                              fill="#808C92" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </form>

                                        <button  type="button" id="btnsearchMob-toggle" class="header__search--btn" href="javascript:void()" aria-label="Header Search Button Next">

                                            <svg  width="20" height="20" viewBox="0 0 13 13" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path  d="M12.8008 11.6951L9.85372 8.74807C10.5632 7.80353 10.9463 6.65382 10.945 5.47248C10.945 2.45497 8.48999 0 5.47248 0C2.45497 0 0 2.45497 0 5.47248C0 8.48999 2.45497 10.945 5.47248 10.945C6.65382 10.9463 7.80353 10.5632 8.74807 9.85372L11.6951 12.8008C11.8443 12.9341 12.0389 13.0053 12.2389 12.9997C12.4389 12.9941 12.6292 12.9121 12.7707 12.7707C12.9121 12.6292 12.9941 12.4389 12.9997 12.2389C13.0053 12.0389 12.9341 11.8443 12.8008 11.6951ZM1.56357 5.47248C1.56357 4.69937 1.79282 3.94362 2.22234 3.3008C2.65185 2.65799 3.26234 2.15697 3.9766 1.86111C4.69086 1.56526 5.47682 1.48785 6.23507 1.63867C6.99333 1.7895 7.68983 2.16179 8.2365 2.70846C8.78317 3.25513 9.15546 3.95163 9.30629 4.70989C9.45711 5.46814 9.3797 6.2541 9.08385 6.96836C8.78799 7.68262 8.28697 8.29311 7.64416 8.72262C7.00134 9.15214 6.24559 9.38139 5.47248 9.38139C4.43615 9.38015 3.44263 8.96792 2.70983 8.23513C1.97704 7.50233 1.56481 6.50881 1.56357 5.47248Z"
                                                      fill="black" fill-opacity="0.7" />
                                            </svg>

                                        </button>
                                    </li>
                                </ul>

                            </div>
                            <div  id="divsearchresultsMob" class="divsearchresults" style="display:none;">
                                <ul  id="search-resultsMob" class="search-results" style="border-radius:10px;">
                                    <!-- Dynamically filled -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="header__bottom">
                    <div  class="container-fluid">
                        <div  class="header__bottom--inner position__relative d-none d-lg-flex justify-content-between align-items-center">
                            <div  class="main__logo">
                                <div  class="main__logo--title">
                                    <a  class="main__logo--link" href="{{url('/')}}" aria-label="Main Logo">
                                        <img  class="main__logo--img" src="{{ $logo }}" alt="logo-img">
                                    </a>
                                </div>
                            </div>
                            <div  class="header__menu">
                                <nav  aria-label="main-navigation">
                                    <ul  class="header__menu--navigation" id="header_menu_nav">
                                        <li  class="header__menu--items navActiveMenu">
                                            <a  class="header__menu--link" id="menuLinkHome" href="{{url('/')}}" aria-label="Home">Home</a>
                                        </li>
                                        <li  class="header__menu--items navActiveMenu">
                                            <a  class="header__menu--link" id="menuLinkProject" href="javascript:void(0)" aria-label="Our Projects">
                                                Our Projects
                                                <svg  class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12"
                                                     height="7.41" viewBox="0 0 12 7.41">
                                                    <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                          transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7">
                                                    </path>
                                                </svg>
                                            </a>
                                            <ul  class="header__sub--menu">
                                                @foreach ($projectMenu as $category)
                                                            <li  class="header__sub--menu__items">
                                                                <a  href="{{ $category->children->isEmpty() ? $category->href() : 'javascript:void(0)' }}"
                                                                   class="header__sub--menu__link" aria-label="Business Category">{{ $category->title }}</a>
                                                                @if ($category->children->isNotEmpty())
                                                                <ul  class="header__sub--menu_{{ $loop->iteration + 1 }}">
                                                                    @foreach ($category->children as $project)
                                                                        <li  class="header__sub--menu__items_2">
                                                                            <a  href="{{ $project->href() }}" aria-label="Project Name"
                                                                               class="header__sub--menu__link">{{ $project->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li  class="header__menu--items navActiveMenu">
                                            <a  class="header__menu--link" id="menuLinkAboutUs" href="{{url('/aboutus')}}" aria-label="About US">About US </a>
                                        </li>
                                        <li  class="header__menu--items d-none d-xl-block navActiveMenu">
                                            <a  class="header__menu--link" id="menuLinkBlogs" href="{{url('/project-detail')}}" aria-label="Brochure">
                                                Project Details
                                            </a>
                                        </li>
                                        <li  class="header__menu--items navActiveMenu">
                                            <a  class="header__menu--link" id="menuLinkCareer" href="{{url('/gallery')}}" aria-label="gallery">
                                                Gallery
                                            </a>
                                        </li>
                                        <li  class="header__menu--items navActiveMenu">
                                            <a  class="header__menu--link" id="menuLinkContactUs" href="{{url('/contact')}}" aria-label="Contact Us">
                                                Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div  class="search-user-wrapper">
                                <form onsubmit="event.preventDefault()" aria-label="Search Form">
                                    <div  class="input-wrapper">
                                        <button  type="submit" class="submit--btn" aria-label="Input Search Button">
                                            <svg  width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path  d="M15.9645 14.5855L12.2891 10.9102C13.1739 9.73217 13.6516 8.29831 13.65 6.825C13.65 3.06172 10.5883 0 6.825 0C3.06172 0 0 3.06172 0 6.825C0 10.5883 3.06172 13.65 6.825 13.65C8.29831 13.6516 9.73217 13.1739 10.9102 12.2891L14.5855 15.9645C14.7716 16.1308 15.0143 16.2195 15.2637 16.2126C15.5131 16.2056 15.7505 16.1034 15.9269 15.9269C16.1034 15.7505 16.2056 15.5131 16.2126 15.2637C16.2195 15.0143 16.1308 14.7716 15.9645 14.5855ZM1.95 6.825C1.95 5.86082 2.23591 4.91828 2.77159 4.1166C3.30726 3.31491 4.06863 2.69006 4.95942 2.32109C5.85021 1.95211 6.83041 1.85557 7.77607 2.04367C8.72172 2.23177 9.59036 2.69607 10.2721 3.37785C10.9539 4.05964 11.4182 4.92828 11.6063 5.87393C11.7944 6.81959 11.6979 7.79979 11.3289 8.69058C10.9599 9.58137 10.3351 10.3427 9.53341 10.8784C8.73172 11.4141 7.78918 11.7 6.825 11.7C5.53255 11.6984 4.29347 11.1843 3.37957 10.2704C2.46566 9.35653 1.95155 8.11745 1.95 6.825Z"
                                                      fill="black" fill-opacity="0.7" />
                                            </svg>
                                        </button>
                                        <input  type="text" placeholder="Search" autofocus="" id="searchinput" name="search" class="searchbox-input">

                                        <a  href="javascript:void(0)" class="close-icon" id="SearchbtnClose" aria-label="Close Icon">
                                            <svg  width="15" height="15" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path  d="M2.32067 0.392699L7.78218 6.00684L13.2154 0.421788C13.3354 0.290477 13.48 0.185433 13.6404 0.112955C13.8009 0.0404768 13.974 0.00205708 14.1492 0C14.5245 0 14.8844 0.153235 15.1497 0.425996C15.4151 0.698756 15.5641 1.0687 15.5641 1.45444C15.5674 1.63276 15.5352 1.80989 15.4695 1.97496C15.4039 2.14003 15.306 2.28956 15.1821 2.41437L9.67814 7.99943L15.1821 13.6572C15.4153 13.8917 15.552 14.2093 15.5641 14.5444C15.5641 14.9302 15.4151 15.3001 15.1497 15.5729C14.8844 15.8456 14.5245 15.9989 14.1492 15.9989C13.9689 16.0065 13.789 15.9756 13.6209 15.908C13.4529 15.8404 13.3003 15.7376 13.1729 15.6062L7.78218 9.99201L2.33481 15.5916C2.21526 15.7185 2.07244 15.8199 1.91459 15.8898C1.75674 15.9597 1.58699 15.9967 1.41513 15.9989C1.03988 15.9989 0.67999 15.8456 0.414645 15.5729C0.1493 15.3001 0.000230214 14.9302 0.000230214 14.5444C-0.00306862 14.3661 0.029116 14.189 0.0948091 14.0239C0.160502 13.8588 0.258318 13.7093 0.382253 13.5845L5.88621 7.99943L0.382253 2.34165C0.149056 2.10713 0.0123129 1.78956 0.000230214 1.45444C0.000230214 1.0687 0.1493 0.698756 0.414645 0.425996C0.67999 0.153235 1.03988 0 1.41513 0C1.75471 0.00436332 2.08013 0.145444 2.32067 0.392699Z"
                                                      fill="#808C92" />
                                            </svg>
                                        </a>
                                    </div>
                                </form>
                                <button  type="button" id="btnsearch-toggle" class="search-toggle" aria-label="Search Button Toggle">
                                    <svg  width="16" height="16" viewBox="0 0 17 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path  d="M15.9645 14.5855L12.2891 10.9102C13.1739 9.73217 13.6516 8.29831 13.65 6.825C13.65 3.06172 10.5883 0 6.825 0C3.06172 0 0 3.06172 0 6.825C0 10.5883 3.06172 13.65 6.825 13.65C8.29831 13.6516 9.73217 13.1739 10.9102 12.2891L14.5855 15.9645C14.7716 16.1308 15.0143 16.2195 15.2637 16.2126C15.5131 16.2056 15.7505 16.1034 15.9269 15.9269C16.1034 15.7505 16.2056 15.5131 16.2126 15.2637C16.2195 15.0143 16.1308 14.7716 15.9645 14.5855ZM1.95 6.825C1.95 5.86082 2.23591 4.91828 2.77159 4.1166C3.30726 3.31491 4.06863 2.69006 4.95942 2.32109C5.85021 1.95211 6.83041 1.85557 7.77607 2.04367C8.72172 2.23177 9.59036 2.69607 10.2721 3.37785C10.9539 4.05964 11.4182 4.92828 11.6063 5.87393C11.7944 6.81959 11.6979 7.79979 11.3289 8.69058C10.9599 9.58137 10.3351 10.3427 9.53341 10.8784C8.73172 11.4141 7.78918 11.7 6.825 11.7C5.53255 11.6984 4.29347 11.1843 3.37957 10.2704C2.46566 9.35653 1.95155 8.11745 1.95 6.825Z"
                                              fill="black" fill-opacity="0.7" />
                                    </svg>
                                    Search
                                </button>
                                <div  id="divsearchresults" class="divsearchresults" style="display:none;">
                                    <ul  id="search-results" class="search-results" style="border-radius:10px;">
                                        <!-- Dynamically filled -->
                                    </ul>
                                </div>
                                <a  href="#">
                                    <svg  width="30" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path  d="M36.25 19.9974C36.2509 17.2943 35.5774 14.6336 34.2906 12.2565C33.0038 9.87933 31.1444 7.86072 28.8806 6.38348C26.6169 4.90624 24.0204 4.01704 21.3263 3.79641C18.6322 3.57578 15.9257 4.0307 13.4518 5.11996C10.9779 6.20922 8.81476 7.89841 7.15836 10.0345C5.50196 12.1707 4.40461 14.6863 3.96567 17.3535C3.52674 20.0207 3.7601 22.7553 4.64461 25.3096C5.52913 27.8639 7.03686 30.1571 9.03125 31.9817L9.23438 32.1692C12.2051 34.7966 16.0341 36.247 20 36.247C23.9659 36.247 27.7949 34.7966 30.7656 32.1692L30.9688 31.9817C32.6346 30.4616 33.9647 28.6105 34.8741 26.5469C35.7835 24.4832 36.2522 22.2525 36.25 19.9974ZM6.25 19.9974C6.24918 17.7704 6.78928 15.5765 7.82386 13.6045C8.85844 11.6324 10.3565 9.94113 12.1893 8.6761C14.0221 7.41107 16.1347 6.61014 18.3455 6.34218C20.5563 6.07421 22.7991 6.34724 24.881 7.13778C26.963 7.92832 28.8217 9.21271 30.2975 10.8805C31.7732 12.5483 32.8218 14.5496 33.3531 16.7123C33.8843 18.875 33.8823 21.1343 33.3472 23.296C32.8121 25.4578 31.76 27.4572 30.2812 29.1224C28.8875 27.1011 26.924 25.5401 24.6406 24.638C25.8653 23.6734 26.759 22.3511 27.1974 20.855C27.6358 19.3589 27.597 17.7634 27.0866 16.2904C26.5761 14.8174 25.6194 13.54 24.3493 12.6359C23.0792 11.7319 21.559 11.2461 20 11.2461C18.441 11.2461 16.9208 11.7319 15.6507 12.6359C14.3806 13.54 13.4239 14.8174 12.9134 16.2904C12.403 17.7634 12.3642 19.3589 12.8026 20.855C13.241 22.3511 14.1347 23.6734 15.3594 24.638C13.076 25.5401 11.1125 27.1011 9.71875 29.1224C7.48026 26.6104 6.24541 23.362 6.25 19.9974ZM15 18.7474C15 17.7584 15.2932 16.7917 15.8427 15.9695C16.3921 15.1473 17.173 14.5064 18.0866 14.128C19.0002 13.7495 20.0055 13.6505 20.9755 13.8434C21.9454 14.0364 22.8363 14.5126 23.5355 15.2118C24.2348 15.9111 24.711 16.802 24.9039 17.7719C25.0969 18.7418 24.9978 19.7471 24.6194 20.6608C24.241 21.5744 23.6001 22.3553 22.7779 22.9047C21.9556 23.4541 20.9889 23.7474 20 23.7474C18.6752 23.7432 17.4058 23.2151 16.469 22.2783C15.5322 21.3415 15.0041 20.0722 15 18.7474ZM11.5781 30.8567C12.4827 29.4438 13.7282 28.2812 15.1999 27.4759C16.6717 26.6707 18.3224 26.2486 20 26.2486C21.6777 26.2486 23.3283 26.6707 24.8001 27.4759C26.2718 28.2812 27.5173 29.4438 28.4219 30.8567C26.0139 32.7294 23.0504 33.7461 20 33.7461C16.9496 33.7461 13.9861 32.7294 11.5781 30.8567Z"
                                              fill="black" fill-opacity="0.7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
   
    <!-- header end -->
    <!-- Start Offcanvas header menu -->
    <div  class="offcanvas__header">
        <div  class="offcanvas__inner">
            <div  class="offcanvas__logo">
                <a  class="offcanvas__logo_link" href="{{url('/')}}" aria-label="Main Logo">
                    <img  class="main__logo--img" src="{{ $logo }}" alt="logo-img">
                </a>
                <button  class="offcanvas__close--btn" data-offcanvas  aria-label="Close Button">close</button>
            </div>
            <nav  class="offcanvas__menu">
                <ul  class="offcanvas__menu_ul">
                    <li  class="offcanvas__menu_li">
                        <a  class="offcanvas__menu_item" onclick="set_sticky_menu_Index(0)" href="{{url('/')}}" aria-label="Home">Home</a>
                    </li>
                    <li  class="offcanvas__menu_li">
                        <a  class="offcanvas__menu_item" onclick="ProjectView()" href="javascript:void(0)" aria-label="Our Projects">Our Projects</a>
                        <ul  class="offcanvas__sub_menu" id="ProjectV">
                                @foreach ($projectMenu as $category)
                                    @php($menuId = $mobileMenuIds[$loop->index] ?? 'ProjectCategory'.$category->id.'V')
                                        <li  class="offcanvas__sub_menu_li">
                                            @if ($category->children->isEmpty())
                                            <a  href="{{ $category->href() }}" aria-label="Business Category" class="offcanvas__sub_menu_item">{{ $category->title }}</a>
                                            @else
                                            <a  href="javascript:void(0)" aria-label="Business Category" class="offcanvas__sub_menu_item" onclick="$('#{{ $menuId }}btn').trigger('click')">{{ $category->title }}</a>
                                            <ul  class="offcanvas__sub_menu" id="{{ $menuId }}">
                                                @foreach ($category->children as $project)
                                                    <li  class="offcanvas__sub_menu_li">
                                                        <a  class="offcanvas__sub_menu_item" aria-label="Project Name"
                                                           href="{{ $project->href() }}">{{ $project->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <button  class="offcanvas__sub_menu_toggle" id="{{ $menuId }}btn" aria-label="{{ $category->title }} Button"></button>
                                            @endif
                                        </li>
                                @endforeach
                        </ul>
                        <button  class="offcanvas__sub_menu_toggle" id="ProjectVbtn" aria-label="Project Button"></button>
                    </li>
                    <li  class="offcanvas__menu_li">
                        <a  class="offcanvas__menu_item" onclick="set_sticky_menu_Index(1)" href="{{url('/aboutus')}}" aria-label="News and Blogs">About Us</a>
                    </li>
                    <li  class="offcanvas__menu_li">
                        <a  class="offcanvas__menu_item" onclick="set_sticky_menu_Index(3)" href="{{url('/project-detail')}}" aria-label="Brochure">Project Details</a>
                    </li>
                    <li  class="offcanvas__menu_li">
                        <a  class="offcanvas__menu_item" href="{{url('/gallery')}}" onclick="AEView()" aria-label="Awards and Events">Gallery</a>
                        
                        <button  class="offcanvas__sub_menu_toggle" id="AEVbtn" aria-label="Average Button"></button>
                    </li>
                    <li  class="offcanvas__menu_li">
                        <a  class="offcanvas__menu_item" aria-label="About Us" onclick="set_sticky_menu_Index(2)"
                           href="{{url('/contact')}}">Contact Us</a>
                    </li>
                    
                </ul>
                <div  class="offcanvas__footer">
                    <a  class="offcanvas__account--items__btn d-flex align-items-center" href="javascript:void()">
                        <span  class="offcanvas__account--items__icon">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
                                <path  d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                      fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="32"></path>
                                <path  d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                      fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                            </svg>
                        </span>
                        <span  class="offcanvas__account--items__label">Login / Register</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <!-- End Offcanvas header menu -->