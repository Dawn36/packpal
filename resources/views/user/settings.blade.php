@extends('layouts.main')

@section('content')
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Account Settings</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="/dashboard" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="#" class="text-white text-hover-primary">Account Settings</a>
                </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
@if ($message = Session::get('error'))
<div class="container-xxl">
    <div class="alert alert-danger show flex items-center mb-2" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="alert-octagon" data-lucide="alert-octagon" class="lucide lucide-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        {{$message}}
        </div>
    </div>
    @endif
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ asset('/profile/' . $user->profile_picture) }}" onerror="this.onerror=null; this.src='/profile/blank.png'" alt="{{ asset('/profile/blank.png') }}">
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 align-self-center">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ ucwords($user->first_name) }} {{ ucwords($user->middle_name) }} {{ ucwords($user->last_name) }}</a>
                                        @if(Auth::user()->hasRole('supplier') )
                                        @if($user->verified == 'yes')
                                        <div class="badge badge-lg badge-light-primary d-inline">Verify</div>
                                        <a href="#">
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                </svg>
                                            </span>
                                        </a>
                                        @else
                                        <div class="badge badge-lg badge-light-primary d-inline">NOT-VERIFIED</div>
                                        @endif
                                        @endif

                                    </div>
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">

                                                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                                    <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                                </svg>
                                                {{ $user->phone_number}}
                                            </span>
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
                                                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
                                                </svg>
                                                {{ $user->email }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('settings.update', $user->id) }}" enctype="multipart/form-data">
                        <!--begin::Scroll-->
                        @method("PUT")
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 fs-6 form-label fw-bolder text-dark">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('/profile/' . $user->profile_picture)}}')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('/profile/' . $user->profile_picture)}}')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="profile_picture" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>

                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="col-lg-12">
                                <!--begin::Row-->
                                <div class="row g-8">
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 form-label fw-bolder text-dark required">First name</label>
                                        <!--begin::Select-->
                                        <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value=""  required/>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 form-label fw-bolder text-dark ">Middle name</label>
                                        <!--begin::Select-->
                                        <input type="text" name="middle_name" value="{{$user->middle_name}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Middle name" value="" />
                                        <!--end::Select-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="fs-6 form-label fw-bolder text-dark required">Last name</label>
                                        <!--begin::Select-->
                                        <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Last name" value="" required/>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <div class="col-lg-12">
                                <!--begin::Row-->
                                <div class="row g-8">
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark required">Designation</label>
                                        <!--begin::Select-->
                                        <input type="text" name="designation" value="{{$user->designation}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Designation" value="" required/>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark">Department</label>
                                        <!--begin::Select-->
                                        <input type="text" name="department" value="{{$user->department}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Department" value="" />
                                        <!--end::Select-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark required">Address</label>
                                        <!--begin::Select-->
                                        <input type="text" id='autocomplete' name="autocomplete" value="{{$user->address}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Address" value="" required/>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <div class="col-lg-12">
                                <!--begin::Row-->
                                <div class="row g-8">
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark required">Country</label>
                                        <!--begin::Select-->
                                        <input type="text" name="country" value="{{$user->country}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Country" value="" required/>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark">City</label>
                                        <!--begin::Select-->
                                        <input type="text" name="city" value="{{$user->city}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="City" value="" />
                                        <!--end::Select-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark required">Zip/Postal Code</label>
                                        <!--begin::Select-->
                                        <input type="text" name="zip_postal_code" value="{{$user->zip_postal_code}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Zip/Postal Code" value="" required/>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <div class="col-lg-12">
                                <!--begin::Row-->
                                <div class="row g-8">
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6  mt-4 form-label fw-bolder text-dark required">Landline No</label>
                                        <!--begin::Select-->
                                        <input type="text" name="landline_no" value="{{$user->landline_no}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Landline No" value="" required />
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark required">Mobile No</label>
                                        <!--begin::Select-->
                                        <input type="text" name="phone_number" value="{{$user->phone_number}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Mobile No" value="" required/>
                                        <!--end::Select-->
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="fs-6 mt-4 form-label fw-bolder text-dark">Website</label>
                                        <input class="form-control form-control-lg form-control-solid" value="{{$user->website}}" type="text" placeholder="Enter website" name="website" autocomplete="off" />
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="" style="margin-top: 12px;">
                                    <!--begin::Compact form-->
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <a id="kt_horizontal_search_advanced_link" class="btn btn-link" data-bs-toggle="collapse" href="#kt_advanced_search_form">Add Supplier Info</a>
                                        </div>
                                        <!--end:Action-->
                                    </div>
                                    <!--end::Compact form-->
                                    <!--begin::Advance form-->
                                    <div class="collapse" id="kt_advanced_search_form">
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed mt-9 mb-6"></div>
                                        <!--end::Separator-->
                                        <!--begin::Row-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fs-6 form-label fw-bolder text-dark">Company Logo</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('/profile/' . $user->company_logo)}}')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('/profile/' . $user->company_logo)}}') ;  "></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="company_logo" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>

                                            <!--end::Col-->
                                        </div>
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fs-6 form-label fw-bolder text-dark">Company Banner</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('/profile/' . $user->company_banner)}}')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset('/profile/' . $user->company_banner)}}') ;  width: 332px!important;"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="company_banner" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>

                                            <!--end::Col-->
                                        </div>
                                        <div class="col-lg-12">
                                            <!--begin::Row-->
                                            <div class="row mb-6">
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Company Name</label>
                                                    <!--begin::Select-->
                                                    <input type="text" name="company_name" value="{{$user->company_name}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Company Name" value="" />
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Primary Business</label>
                                                    <select class="form-select form-select-solid" id='primary_business' name='primary_business' data-control="select2" data-placeholder="In Progress" data-hide-search="true" onchange="primaryBusinee()">
                                                        <option value="manufacturer" {{$user->primary_business == "manufacturer" ? "Selected" : ""}}>Manufacturer</option>
                                                        <option value="wholesaler" {{$user->primary_business == "wholesaler" ? "Selected" : ""}}>Wholesaler</option>
                                                        <option value="trader" {{$user->primary_business == "trader" ? "Selected" : ""}}>Trader</option>
                                                        <option value="importer" {{$user->primary_business == "importer" ? "Selected" : ""}}>Importer</option>
                                                        <option value="agent" {{$user->primary_business == "agent" ? "Selected" : ""}}>Agent</option>
                                                        <option value="distributor" {{$user->primary_business == "distributor" ? "Selected" : ""}}>Distributor</option>
                                                        <option value="reseller" {{$user->primary_business == "reseller" ? "Selected" : ""}}>Re-seller</option>
                                                        <option value="direct customer" {{$user->primary_business == "direct customer" ? "Selected" : ""}}>Direct Customer</option>
                                                        <option value="other" {{$user->primary_business == "other" ? "Selected" : ""}}>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4" style="display: none;" id='specify'>
                                                    <label class="fs-6 form-label fw-bolder text-dark">Please Specify</label>
                                                    <!--begin::Select-->
                                                    <input type="text" name="specify" value="{{$user->specify}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Please Specify" value="" />
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <div class="col-lg-12">
                                            <!--begin::Row-->
                                            <div class="row mb-6">
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Year of Business Establishment</label>
                                                    <input type="text" name="establishment_year" value="{{$user->establishment_year}}" class="form-control form-control-lg form-control-solid kt_datepicker_3" placeholder="Year of Business Establishment" />
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Annual Sales in PKR</label>
                                                    <input class="form-control form-control-lg form-control-solid" value="{{$user->annual_sales}}" type="number" placeholder="please enter Annual Sales" name="annual_sales" autocomplete="off" />

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Certifications</label>
                                                    <input class="form-control form-control-lg form-control-solid" value="{{$user->certifications}}" type="text" placeholder="ISO 9001 etc" name="certifications" autocomplete="off" />
                                                    <!--end::Select-->
                                                </div>
                                               
                                                
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <div class="col-lg-12">
                                            <!--begin::Row-->
                                            <div class="row mb-6">
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">I’m a Seller of:</label>
                                                    <input class="form-control form-control-lg form-control-solid" value="{{$user->seller_of}}" type="text" placeholder="What you sell?" name="seller_of" autocomplete="off" />
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">I’m a Buyer of:</label>
                                                    <input class="form-control form-control-lg form-control-solid" value="{{$user->buyer_of}}" type="text" placeholder="What you buy?" name="buyer_of" autocomplete="off" />

                                                </div>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <div class="col-lg-12">
                                            <!--begin::Row-->
                                            <div class="row mb-6">
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Category</label>
                                                    <select class="form-select form-select-solid" id='category_id' name='category' onchange="getSubCategoryAjax()" data-control="select2" data-placeholder="Select Main Category" data-hide-search="true">
                                                        <option value=""></option>
                                                        @for ($i = 0; $i < count($categories); $i++) 
                                                        <option value="{{$categories[$i]->id}}" {{$user->categories_id == $categories[$i]->id ? "selected" : '' }} >{{ucwords($categories[$i]->category_name)}}</option>
                                                        @endfor
                                                       

                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Sub-Category</label>
                                                    <select class="form-select form-select-solid" id='sub_category_id' name='sub_category' data-control="select2" data-placeholder="Select Sub-Category" data-hide-search="true">

                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <div class="col-lg-12">
                                            <!--begin::Row-->
                                            <div class="row mb-6">
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <label class="fs-6 form-label fw-bolder text-dark">Description</label>
                                                    <textarea class="form-control form-control-lg form-control-solid" type="text" placeholder="Description of your Business" name="description" autocomplete="off">{{$user->description}}</textarea>
                                                    <!--end::Select-->
                                                </div>

                                            </div>
                                            <!--end::Row-->
                                        </div>


                                    </div>
                                    <!--end::Advance form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Sign-in Method</h3>
                    </div>
                </div>

                <div id="kt_account_settings_signin_method" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="d-flex flex-wrap align-items-center">
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bolder mb-1">Email Address</div>
                                <div class="fw-bold text-gray-600">{{ $user->email }}</div>
                            </div>

                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <form action="{{ route('updateEmail', ['id' => $user->id]) }}" method="POST" id=" kt_signin_change_email" class="form" novalidate="novalidate">
                                    @csrf
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0">
                                                <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Enter
                                                    New Email Address</label>
                                                <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0">
                                                <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Confirm Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2 px-6">Update
                                            Email</button>
                                        <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                            </div>

                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Change Email</button>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-6"></div>
                        <div class="d-flex flex-wrap align-items-center mb-1">
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bolder mb-1">Password</div>
                                <div class="fw-bold text-gray-600">************</div>
                            </div>
                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">

                                <form method="POST" action="{{ route('updatePassword', ['id' => $user->id]) }}">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="old_password" class="form-label fs-6 fw-bolder mb-3">Current
                                                    Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="old_password" id="old_password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="password" class="form-label fs-6 fw-bolder mb-3">New
                                                    Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="password_confirmation" class="form-label fs-6 fw-bolder mb-3">Confirm New
                                                    Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" id="password_confirmation" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-text mb-5">Password must be at least 8 character and contain
                                        symbols</div>
                                    <div class="d-flex">
                                        <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!Auth::user()->hasRole('buyer') )
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Your verification document</h3>
                    </div>
                </div>
                @if(count($userDoc) > 0)
                <div class="collapse show border-top" id="kt_user_view_document_attachment" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--end::Card header-->
                        <!--begin::Card-->
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" id="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Files &amp; Folders">
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                        <!--begin::Add customer-->
                                        <button type="button" class="btn btn-primary" onclick="verifyYourSelf()">
                                            <!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black"></path>
                                                    <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="black"></path>
                                                    <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Upload Files
                                        </button>
                                        <!--end::Add customer-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-1">
                                <!--begin::Table-->
                                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="py-5">
                                            <table data-kt-filemanager-table="files" class="table align-middle table-row-dashed fs-6 gy-5 kt_datatable_example_1">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th class="min-w-125px">Name</th>
                                                        <th class="min-w-125px">For</th>
                                                        <th class="min-w-125px">Size</th>
                                                        <th class="min-w-125px">Last Modified</th>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody class="fw-bold text-gray-600">
                                                    @for ($i = 0; $i< count($userDoc); $i++) <tr>
                                                        <!--begin::Name=-->
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                                <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black" />
                                                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <a href="#" class="text-gray-800 text-hover-primary">{{$userDoc[$i]->file_name}}</a>
                                                            </div>
                                                        </td>
                                                        <!--end::Name=-->
                                                        <!--begin::Size-->
                                                        <td>{{ucwords($userDoc[$i]->status)}}</td>

                                                        <td>{{sizeFilter($userDoc[$i]->size)}}</td>
                                                        <!--end::Size-->
                                                        <!--begin::Last modified-->
                                                        <td>{{date("Y-m-d h:i A",strtotime($userDoc[$i]->created_at))}}</td>
                                                        <!--end::Last modified-->
                                                        <!--begin::Actions-->
                                                        <td class="text-left" data-kt-filemanager-table="action_dropdown">
                                                            <div class="d-flex justify-content-left">
                                                                <!--begin::More-->
                                                                <a href="{{asset($userDoc[$i]->path)}}" target="_blank" class="badge badge-lg badge-light-primary p-3 d-inline">Download</a>
                                                                <!--end::More-->
                                                            </div>
                                                        </td>
                                                        <!--end::Actions-->
                                                        </tr>
                                                        @endfor
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Card-->

                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
<script src="{{asset('theme/assets/js/location.js')}}"></script>

<script>
    getSubCategoryAjax()
    function getSubCategoryAjax() {

var value = {
    categoryId: $('#category_id').val(),
};
$.ajax({
    type: 'GET',
    url: "{{ route('sub_categories') }}",
    data: value,

    success: function(result) {
        if (result == 0) {
            document.getElementById('sub_category_id').innerHTML =
                '<option value="">Select Sub-Category</option>';
        } else {
            document.getElementById('sub_category_id').innerHTML =
                '<option value="">Select Sub-Category</option>';
            for (var i = 0; i < result.length; i++) {
                var opt = document.createElement('option');
                opt.value = result[i].id;
                opt.innerHTML = result[i].sub_category_name;
                if (result[i].id == "{{ $user->sub_categories_id }}") opt.defaultSelected =
                            true;
                document.getElementById('sub_category_id').appendChild(opt);
            }
        }


    }
});
}
    function verifyYourSelf() {

        $.ajax({
            type: 'GET',
            url: "{{ route('user_upload_doc') }}",
            success: function(result) {
                console.log('aa', result);
                $('#myModalLgHeading').html('Attachments for Verification');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }

    primaryBusinee();

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
    // function changeStatus(ele) {
    //     let element = ele.parentElement;
    //     if (ele.checked == true) {
    //         element.removeAttribute('checked')
    //         element.children[0].value = 'on';
    //         element.parentElement.parentElement.querySelectorAll('input')[1].removeAttribute("readonly");
    //         element.parentElement.parentElement.querySelectorAll('input')[2].removeAttribute("readonly");
    //     } else {
    //         element.children[0].value = 'off';
    //         element.checked = true;
    //         element.parentElement.parentElement.querySelectorAll('input')[1].readonly = true;
    //         element.parentElement.parentElement.querySelectorAll('input')[2].readonly = true;
    //     }
    // }
</script>
@endsection('content')