<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Packpal - Register</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/logo-5.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
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
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('theme/assets/media/illustrations/sketchy-1/14.png')}})">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="/" class="mb-12">
                    <img alt="Logo" src="{{ asset('theme/assets/media/logos/logo-5.png')}}" class="h-70px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('register') }}" class="form w-100" id='registersss' onsubmit="return validateForm()">
                        <!--begin::Heading-->
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Create an Account</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                <a href="/login" class="link-primary fw-bolder">Sign in here</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Separator-->
                        <div class="d-flex align-items-center mb-10">
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        </div>
                        <!--end::Separator-->
                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">
                                <label class="form-label fw-bolder text-dark fs-6">Register As:</label>
                                <select id="role_id" name="role_id" class="form-control form-control-lg form-control-solid" onchange="showDiv()">
                                    <option value="2">Seller</option>
                                    <option value="3">Buyer</option>
                                    {{-- <option value="1">admin</option> --}}
                                </select>
                            </div>
                        </div>
                        
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label required fw-bolder text-dark fs-6">Company Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Please enter company name" id='company_name' name="company_name" autocomplete="off" required />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label required fw-bolder text-dark fs-6">Primary Business:</label>
                                    <select id='primary_business' name="primary_business" class="form-control form-control-lg form-control-solid" onchange="primaryBusinee()" required>
                                        <option value="manufacturer">Manufacturer</option>
                                        <option value="wholesaler">Wholesaler</option>
                                        <option value="trader">Trader</option>
                                        <option value="importer">Importer</option>
                                        <option value="agent">Agent</option>
                                        <option value="distributor">Distributor</option>
                                        <option value="reseller">Re-seller</option>
                                        <option value="direct customer">Direct Customer</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row fv-row mb-7" style="display: none;" id='specify'>
                                <div class="col-xl-12">
                                    <label class="form-label fw-bolder text-dark fs-6">Please Specify</label>
                                    <input class="form-control form-control-lg form-control-solid " type="text" placeholder="Please Specify" name="specify" autocomplete="off" />
                                </div>

                            </div>
                           
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="form-label  fw-bolder text-dark fs-6">Year of Business Establishment</label>
                                    <input type="text" id='establishment_year' name="establishment_year" class="form-control form-control-lg form-control-solid kt_datepicker_3" placeholder="Year of Business Establishment" />
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Annual Sales in PKR</label>
                                    <input class="form-control form-control-lg form-control-solid" type="number" min="0" placeholder="please enter Annual Sales" name="annual_sales" autocomplete="off" />
                                </div>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-6">
                                    <label class="fs-6 form-label required fw-bolder text-dark">Category</label>
                                    <select class="form-select form-select-solid" id='category_id' name='category' data-control="select2" data-placeholder="Choose your Main Category" data-hide-search="true" required onchange="getSubCategoryAjax()">
                                        <option value=""></option>
                                        @for ($i = 0; $i < count($categories); $i++) <option value="{{$categories[$i]->id}}" >{{ucwords($categories[$i]->category_name)}}</option>
                                        @endfor

                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <label class="fs-6 form-label  fw-bolder text-dark">Sub-Category</label>
                                    <select class="form-select form-select-solid" id='sub_category_id' name='sub_category' data-control="select2" data-placeholder="Choose your Sub-Category" data-hide-search="true">

                                    </select>
                                </div>
                            </div>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-12">
                                    <label class="fs-6 form-label required fw-bolder text-dark">Description </label>
                                    <textarea class="form-control form-control-lg form-control-solid" type="text" placeholder="Description of your Business" id="description" name="description" autocomplete="off" required></textarea>
                                </div>
                            </div>
                            <div id='seller'>
                            <div class="row fv-row mb-7">
                                <div class="col-xl-12">
                                    <label class="form-label fw-bolder text-dark fs-6">Certifications</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="ISO 9001, ISO 27001 etc" name="certifications" autocomplete="off" />
                                </div>
                              
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">
                                <label class="form-label fw-bolder text-dark fs-6">I’m a Seller of:</label>
                                <textarea class="form-control form-control-lg form-control-solid" type="text" placeholder="What you sell? Use ',' as separator for multiple selling products" id="seller_of" name="seller_of" autocomplete="off" ></textarea>
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">
                                <label class="form-label fw-bolder text-dark fs-6">I’m a Buyer of:</label>
                                <textarea class="form-control form-control-lg form-control-solid" type="text" placeholder="What you buy? Use ',' as separator for multiple buying products " id="buyer_of" name="buyer_of" autocomplete="off" ></textarea>
                            </div>
                        </div>
                        <div class="row fv-row mb-7" id='buyer'>

                        </div>
                        <div class="d-flex align-items-center mb-10">
                            <div class="border-bottom border-gray-300 mw-50 w-100" style="max-width: 36%!important;"></div>
                            <span class="fw-bold text-gray-400 fs-7 mx-2">Contact Information</span>
                            <div class="border-bottom border-gray-300 mw-50 w-100" style="max-width: 36%!important;"></div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label required fw-bolder text-dark fs-6">First Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('first_name')" placeholder="Please enter first name" name="first_name" autocomplete="off" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder  text-dark fs-6">Middle Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('middle_name')" placeholder="Please enter middle name" name="middle_name" autocomplete="off" />
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label required fw-bolder text-dark fs-6">Last Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('last_name')" placeholder="Please enter last name" name="last_name" autocomplete="off" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder required text-dark fs-6">Designation</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('designation')" placeholder="Please enter designation" name="designation" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label required fw-bolder text-dark fs-6">Department</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('department')" placeholder="Please enter department" name="department" autocomplete="off"  required/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder required text-dark fs-6">Address</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('autocomplete')" placeholder="Please enter address" onFocus="geolocate()" id='autocomplete' name="autocomplete" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label required fw-bolder required text-dark fs-6">Country</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('country')" placeholder="Please enter country" name="country" autocomplete="off" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label required fw-bolder required text-dark fs-6">City</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" :value="old('city')"  placeholder="Please enter city" name="city" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label  fw-bolder required text-dark fs-6">Zip/Postal Code</label>
                                <input class="form-control form-control-lg form-control-solid" type="number" min="0" :value="old('zip_postal_code')" placeholder="Please enter zip/postal Code" name="zip_postal_code" autocomplete="off" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder required  text-dark fs-6">Landline No</label>
                                <input class="form-control form-control-lg form-control-solid" type="number" min="0" :value="old('landline_no')" placeholder="Please enter landline no" name="landline_no" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">
                                <label class="form-label  fw-bolder required text-dark fs-6">Mobile No</label>
                                <input class="form-control form-control-lg form-control-solid" :value="old('phone_number')" type="number" min="0" placeholder="Please enter Mobile No" name="phone_number" autocomplete="off"  required/>
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-12">
                                <label class="form-label fw-bolder  text-dark fs-6">Website</label>
                                <input class="form-control form-control-lg form-control-solid" :value="old('website')"  placeholder="Please Enter Website" name="website" autocomplete="off"  />
                            </div>
                        </div>
                        
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder required text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" :value="old('email')" placeholder="Please enter email" name="email" autocomplete="off" required/>
                            @if($errors->has('email'))
                            <div class="error" style="color: red"><b>{{ $errors->first('email') }}</b></div>
                            @endif
                        </div>
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label required fw-bolder text-dark fs-6">Password</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" required />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                        </div>
                        <div class="fv-row mb-5">
                            <label class="form-label required fw-bolder text-dark fs-6">Confirm Password</label>
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" required />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "/assets/";
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_ACCESS_KEY')}}&callback=initAutocomplete&libraries=places&v=weekly" async></script>

    <script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('theme/assets/js/scripts.bundle.js')}}"></script>
    <script src="{{ asset('theme/assets/js/custom/authentication/sign-up/general.js')}}"></script>
    <script src="{{asset('theme/assets/js/location.js')}}"></script>
    <script>
        function getSubCategoryAjax() {

            var value = {
                categoryId: $('#category_id').val(),
            };
            $.ajax({
                type: 'GET',
                url: "{{ route('sub_categories') }}",
                data: value,

                success: function(result) {
                debugger;
                    if (result == 0) {
                        document.getElementById('sub_category_id').innerHTML =
                            '<option value=""> Select  sub-category  </option>';
                    } else {
                        document.getElementById('sub_category_id').innerHTML =
                            '<option value=""> Select  sub-category  </option>';
                        for (var i = 0; i < result.length; i++) {
                            var opt = document.createElement('option');
                            opt.value = result[i].id;
                            opt.innerHTML = result[i].sub_category_name;
                           
                            document.getElementById('sub_category_id').appendChild(opt);
                        }
                    }


                }
            });
            }
        showDiv();

        function showDiv() {
            let val = $("#role_id").val();
            // 2 seller
            // 3 buyer
            if (val == 2) {
                document.getElementById('seller').style.display = "block";
                document.getElementById('buyer').style.display = "none";
               // $("#company_name").attr('required', ''); //turns required oncompany_name
               // $("#primary_business").attr('required', ''); //turns required on
                
               // $("#category_id").attr('required', ''); //turns required on
                $("#description").attr('required', ''); //turns required on
              //  $("#establishment_year").attr('required', ''); //turns required on
            }
            if (val == 3) {
                document.getElementById('buyer').style.display = "block";
                document.getElementById('seller').style.display = "none";
                //$("#company_name").removeAttr('required', ''); //turns required on

               // $("#primary_business").removeAttr('required', ''); //turns required on
               // $("#category_id").removeAttr('required', ''); //turns required on
                $("#description").removeAttr('required', ''); //turns required on
              //  $("#establishment_year").removeAttr('required', ''); //turns required on
            }
            if (val == 1) {
                document.getElementById('buyer').style.display = "none";
                document.getElementById('seller').style.display = "none";
                $("#company_name").removeAttr('required', ''); //turns required on
                $("#primary_business").removeAttr('required', ''); //turns required on
                $("#category_id").removeAttr('required', ''); //turns required on
                $("#description").removeAttr('required', ''); //turns required on
                
            }
        }

        function primaryBusinee() {
            let val = $("#primary_business").val();
            if (val == 'other') {
                document.getElementById('specify').style.display = "block";
            } else {
                document.getElementById('specify').style.display = "none";
            }
        }
        $(".kt_datepicker_3").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
        });

        function validateForm() {
            let pass = $('#password').val();
            let conf = $('#confirm').val();
            if (pass != conf) {
                alert("Password not match with Confirm Password");
                return false;

            }
        }
    </script>

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>