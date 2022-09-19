<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Pack Pal - Sign In</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/logo-5.png')}}" />
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->
<style>
    a {
            color: #d80026;
            text-decoration: none;
        }
        .text-hover-primary:hover {
            color: #d80026!important;
        }
        .link-primary {
    color: #d80026;
    }
            .link-primary:focus, .link-primary:hover {
                color: #940111;
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
<body id="kt_body" class="bg-body">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('theme/assets/media/illustrations/sketchy-1/14.png') }})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="#" class="mb-12">
                    <img alt="Logo" src="{{ asset('theme/assets/media/logos/logo-5.png') }}" class="h-70px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" id="kt_sign_in_form" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                        @csrf

                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to PaclPal</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="/register" class="link-primary fw-bolder">Create an Account</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark" for="email">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                            <!--end::Input-->
                        </div>
                        
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0" for="password">Password</label>
                                <!--end::Label-->
                                <!--begin::Link-->
                                <!-- <a href="#" class="link-primary fs-6 fw-bolder">Forgot Password ?</a> -->
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" id="password" type="password" name="password" :value="old('password')" required autofocus />
                            <!--end::Input-->
                        </div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <!--begin::Link-->
                            <a href="{{ route('password.request') }}" class="link-primary">Forgot Password ?</a>
                            <!--end::Link-->
                        </div>
                           
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <!-- <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">Continue</button> -->
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">Continue</button>

                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <!-- <div class="d-flex flex-center flex-column-auto p-10">
    <div class="d-flex align-items-center fw-bold fs-6">
     <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
     <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
     <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
    </div>
   </div> -->
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('theme/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>