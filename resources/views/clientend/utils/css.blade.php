<link rel="icon" href="{{ $layout->section('brand')->src('favicon') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700;1,800&amp;family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

        <link href="{{asset('assets/Admin/assets/sweetalert/sweetalert.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/fancybox.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/custome.css')}}">
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
        
    .mission_list_wrap{
    display:flex;
    align-items:center;
    gap:20px;
    }

    .mission-list li{
    position:relative;
    max-height:45px;
    padding-left: 10px;
    height: 45px;
    }

    .mission-list li:hover::after{
    background-color: rgba(76, 200, 250, 0.25);
    }

    .mission-list li:hover img {
    transform: scale(1.1);
    z-index: 999;
    -webkit-transition: var(--transition);
    -moz-transition: var(--transition);
    -ms-transition: var(--transition);
    -o-transition: var(--transition);
    transition: var(--transition);
    }
    .mission-list li::before,
    .mission-list li::after {
    content: "";
    position: absolute;
    display: block;
    box-sizing: border-box;
    top: 0;
    left: 0;
    }

    .mission-list li::after {
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    border-radius: 0 15px 15px 0;
    }

    .mission-list li:hover::after {
    width: 100%;
    height: 100%;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    }
</style>