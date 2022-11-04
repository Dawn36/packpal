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
                <div class="d-flex flex-center w-lg-50 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-550px">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('rest_password') }}" >
                                @csrf
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
									<!--end::Title-->
									<!--begin::Link-->
									<div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
									<!--end::Link-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8 fv-plugins-icon-container">
									<!--begin::Email-->
									<input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" required>
                                    @if($errors->has('email'))
                                    <div class="error" style="color: red"><b>{{ $errors->first('email') }}</b></div>
                                    @endif
                                    
								<div class="fv-plugins-message-container invalid-feedback"></div></div>
								<!--begin::Actions-->
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit"  class="btn btn-primary me-4">
										Submit
									</button>
									<a href="{{route('login')}}" class="btn btn-light">Cancel</a>
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
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
    <script>
        toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "linear",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    
    // toastr.success("New order has been placed!");
        @if(Session::has('message'))
           var type="{{Session::get('alert-type','error')}}"
        
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                   toastr.error("{{ Session::get('message') }}");
                   break;
            }
        @endif
    </script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>