@extends('layouts.main')

@section('content')
<style>
    .bg-dark.hoverable:hover {
    background-color: #cb213f!important;
}
.bg-dark {
    background-color: #870018!important;
}
    </style>
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Dashboard</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="index.php" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">Dashboards</li>
                <!--end::Item-->
                <!--begin::Item-->
                <!-- <li class="breadcrumb-item">
                                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                                </li> -->
                <!--end::Item-->
                <!--begin::Item-->
                <!-- <li class="breadcrumb-item text-white opacity-75">Multipurpose</li> -->
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        {{-- <div class="d-flex align-items-center py-3 py-md-1">
          
            <div class="me-4">
               
                <a href="#" class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                  
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    Create
                </a>

            </div>

        </div> --}}
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a href="#" class="fw-bolder fs-4 mb-2 text-hover-primary">Hi, {{ ucwords(Auth::user()->first_name) }} {{ ucwords(Auth::user()->last_name) }}</a>
                                <span class="fw-bold text-muted fs-5">{{ Auth::user()->roles->first()->display_name }}</span>
                            </div>
                            <img src="{{ asset('/profile/' . Auth::user()->profile_picture)}}" alt="" class="dashboard-welcome-card h-100px" style="width: 36% !important;border-radius: 15px !important;">
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 2-->
                </div>
            </div>
            
           
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <div class="card card-xl-stretch mb-xl-8 " style="background-color: #abffd2;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-success svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21 18.3V4H20H5C4.4 4 4 4.4 4 5V20C10.9 20 16.7 15.6 19 9.5V18.3C18.4 18.6 18 19.3 18 20C18 21.1 18.9 22 20 22C21.1 22 22 21.1 22 20C22 19.3 21.6 18.6 21 18.3Z" fill="currentColor"/>
                                    <path d="M22 4C22 2.9 21.1 2 20 2C18.9 2 18 2.9 18 4C18 4.7 18.4 5.29995 18.9 5.69995C18.1 12.6 12.6 18.2 5.70001 18.9C5.30001 18.4 4.7 18 4 18C2.9 18 2 18.9 2 20C2 21.1 2.9 22 4 22C4.8 22 5.39999 21.6 5.79999 20.9C13.8 20.1 20.1 13.7 20.9 5.80005C21.6 5.40005 22 4.8 22 4Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$offer}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1">ACTIVE OFFERS</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #d5c3ff;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-info svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$inProcess}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1">IN-PROCESS OFFERS</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #ffc4c4;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-danger svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="currentColor"/>
                                    <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$reject}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1">REJECTED OFFERS</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #f7c97b;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
                                    <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
                                    <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$reviewsGiven}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1">TOTAL REVIEWS</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <style>
                        .svg-icon.svg-icon-dangers svg [fill]:not(.permanent):not(g) {
                            transition: fill .3s ease;
                            fill: #74545c;
                        }
                    </style>
                    <!--begin::Statistics Widget 5-->
                    {{-- <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #b3b0b0; color: #676263;">
                        <div class="card-body">
                            
                            <span class="svg-icon svg-icon-dangers svg-icon-3x ms-n1" >
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="#4c353b" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M19.2 15.9C19.2 17.1 18.9 18.1 18.3 19.1C17.7 20 16.8 20.8 15.7 21.3C14.5 21.8 13.2 22.1 11.6 22.1C9.70002 22.1 8.10001 21.7 6.90001 21C6.00001 20.5 5.3 19.8 4.8 18.9C4.5 18.5 4.30002 18 4.10002 17.5C3.70002 15.7 6.00002 14.9 7.20002 16C7.70002 16.5 7.90002 17.2 8.20002 17.7C8.50002 18.1 8.90001 18.5 9.40001 18.7C9.90001 19 10.6 19.1 11.4 19.1C12.6 19.1 13.5 18.8 14.2 18.3C14.9 17.8 15.3 17.1 15.3 16.3C15.3 15.7 15.1 15.1 14.7 14.7C14.3 14.3 13.8 14 13.2 13.8C12.6 13.6 11.8 13.4 10.7 13.1C9.30002 12.8 8.10002 12.4 7.20002 12C6.30002 11.6 5.50001 11 5.00001 10.2C4.40001 9.39995 4.20002 8.50002 4.20002 7.40002C4.20002 6.30002 4.50002 5.39998 5.10002 4.59998C5.70002 3.79998 6.50002 3.09995 7.60002 2.69995C8.70002 2.29995 10 2 11.5 2C12.7 2 13.7 2.10002 14.6 2.40002C15.5 2.70002 16.2 3.09998 16.8 3.59998C17.7 4.39998 18.6 5.49995 18 6.69995C17.7 7.19995 17.2 7.60005 16.6 7.80005C16.1 7.90005 15.6 7.8 15.3 7.5C15.2 7.4 15 7.19998 14.9 7.09998C14.5 6.49998 14.2 5.90002 13.6 5.40002C13.1 5.00002 12.3 4.80005 11.2 4.80005C10.2 4.80005 9.4 5 8.8 5.5C8.2 6 7.90001 6.49998 7.90001 7.09998C7.90001 7.49998 8.00002 7.79998 8.20002 8.09998C8.40002 8.39998 8.70002 8.60005 9.10002 8.80005C9.50002 9.00005 9.80002 9.20005 10.2 9.30005C10.6 9.40005 11.2 9.60005 12.1 9.80005C13.2 10.1 14.2 10.3 15.1 10.6C16 10.9 16.7 11.3 17.4 11.7C18 12.1 18.5 12.7 18.9 13.4C19 14.1 19.2 14.9 19.2 15.9Z" fill="currentColor"/>
                                    <path d="M3 12H20" stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalBussiness}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1">TOTAL BUSINESS IN RUPEES</div>
                        </div>
                    </a> --}}
                    <!--end::Statistics Widget 5-->
                </div>
                
            </div>
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection