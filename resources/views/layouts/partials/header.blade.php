<!DOCTYPE html>
<html lang="en">


<head>
    @php
    if (request()->segment(1) == 'dashboard')
    $title="Dashboard";
    @endphp
    <base href="">
    <title>PackPal</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/logo-demo2-sticky.png') }}" /> -->
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/logo-5.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/website-assets/vendor/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" media="screen, print" href="{{ asset('theme/assets/css/jqvmap/jqvmap.bundle.css')}}">


    <script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js') }}"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"> -->
    <!-- <script src="https://use.fontawesome.com/792974b28a.js"></script> -->
     <style>
        .btn-check:active+.btn.btn-primary, .btn-check:checked+.btn.btn-primary, .btn.btn-primary.active, .btn.btn-primary.show, .btn.btn-primary:active:not(.btn-active), .btn.btn-primary:focus:not(.btn-active), .btn.btn-primary:hover:not(.btn-active), .show>.btn.btn-primary {
    color: #fff;
    border-color: #d80026;
    background-color: #d80026!important;
}
.badge-light-primary {
    color: #d80026;
    background-color: #ffe2e2;
}
.btn.btn-light-primary {
    color: #d80026;
    border-color: #d80026;
    background-color: #ffe2e2;
}
.bg-light-info {
    /* background-color: #ffb0bb!important; */
}
.btn-check:active+.btn.btn-light-primary, .btn-check:checked+.btn.btn-light-primary, .btn.btn-light-primary.active, .btn.btn-light-primary.show, .btn.btn-light-primary:active:not(.btn-active), .btn.btn-light-primary:focus:not(.btn-active), .btn.btn-light-primary:hover:not(.btn-active), .show>.btn.btn-light-primary {
    color: #fff;
    border-color: #d80026;
    background-color: #d80026!important;
}
.nav-line-tabs .nav-item .nav-link.active, .nav-line-tabs .nav-item .nav-link:hover:not(.disabled), .nav-line-tabs .nav-item.show .nav-link {
    border-bottom: 1px solid #d80026;
}
.text-active-primary.active {
    color: #d80026!important;
}
       a {
            color: #d80026;
            text-decoration: none;
        }
        .text-hover-primary:hover {
            color: #d80026!important;
        }
        .btn.btn-primary {
            color: #fff;
            border-color: #d80026;
            background-color: #d80026;
        }
        .btn-check:active+.btn.btn-active-light-primary i, .btn-check:checked+.btn.btn-active-light-primary i, .btn.btn-active-light-primary.active i, .btn.btn-active-light-primary.show i, .btn.btn-active-light-primary:active:not(.btn-active) i, .btn.btn-active-light-primary:focus:not(.btn-active) i, .btn.btn-active-light-primary:hover:not(.btn-active) i, .show>.btn.btn-active-light-primary i {
            color: #d80026;
        }
        .btn-check:active+.btn.btn-active-light-primary, .btn-check:checked+.btn.btn-active-light-primary, .btn.btn-active-light-primary.active, .btn.btn-active-light-primary.show, .btn.btn-active-light-primary:active:not(.btn-active), .btn.btn-active-light-primary:focus:not(.btn-active), .btn.btn-active-light-primary:hover:not(.btn-active), .show>.btn.btn-active-light-primary {
            color: #d6d6d6;
            border-color: #ffb0bb;
            background-color: #ffb0bb!important;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #d80026;
            border-color: transparent;
        }
        .text-primary {
            color: #d80026!important;
        }
        .text-hover-primary:hover .svg-icon svg [fill]:not(.permanent):not(g) {
            fill: #d80026;
        }
        .svg-icon.svg-icon-primary svg [fill]:not(.permanent):not(g) {
            fill: #d80026;
        }
        .menu-state-primary .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here), .menu-state-primary .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) {
            color: #d80026;
        }
        .menu-state-bg .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here), .menu-state-bg .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) {
            background-color: #fdeaed;
        }
        .badge-light-success {
            color: #cd5060;
            background-color: #fdeaed;
        }
        btn.btn-primary:focus:not(.btn-active), .btn.btn-primary:hover:not(.btn-active), .show>.btn.btn-primary {
            color: #fff;
            border-color: #940111;
            background-color: #940111!important;
        }
        
    </style> 
</head>

<body id="kt_body" style="background-image: url({{ asset('theme/assets/media/patterns/header-bg.jpg')}})" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container-xxl d-flex align-items-center">
                        <!--begin::Heaeder menu toggle-->
                        <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
                            <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Heaeder menu toggle-->
                        <!--begin::Header Logo-->
                        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
                            <a href="#">
                                <img alt="Logo" src="{{  asset('theme/assets/media/logos/logo-5.png')}}" class="logo-default h-25px" />
                                <img alt="Logo" src="{{  asset('theme/assets/media/logos/logo-5.png')}}" class="logo-sticky h-25px" />
                            </a>
                        </div>
                        <!--end::Header Logo-->
                        <!--begin::Wrapper-->
                        @include('layouts.partials.sidebar')
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <div class="modal fade" id="myModalLg" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <h2 class="fw-bolder modal-title" id="myModalLgHeading"></h2>
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <span class="svg-icon svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body scroll-y mx-10 my-7" id="modalBodyLarge">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModalXl" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <h2 class="fw-bolder" id="myModalXlHeading"></h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body scroll-y p-12" id="modalBodyXl" style="background-color: #f5f8fa;">
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->