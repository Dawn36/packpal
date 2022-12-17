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
        <div class="d-flex align-items-center py-3 py-md-1">
            <!--begin::Wrapper-->
            <div class="me-4">
                <!--begin::Menu-->
                <button type="button" class="btn btn-custom btn-active-white btn-flex btn-color-white btn-active-color-primary fw-bolder" data-bs-original-title="Create a new Bid" onclick="addBids()">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    {{-- <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span> --}}
                    <!--end::Svg Icon-->CREATE A BID
                </button>

            </div>

        </div>
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
                    <a href="#" class="card card-xl-stretch mb-xl-8" >
                        <!--begin::Body-->
                        <style>
                            .svg-icon.svg-icon-dangerss svg [fill]:not(.permanent):not(g) {
                                transition: fill .3s ease;
                                fill: #2669f9b5;
                            }
                        </style>
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-dangerss svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M18 22C19.7 22 21 20.7 21 19C21 18.5 20.9 18.1 20.7 17.7L15.3 6.30005C15.1 5.90005 15 5.5 15 5C15 3.3 16.3 2 18 2H6C4.3 2 3 3.3 3 5C3 5.5 3.1 5.90005 3.3 6.30005L8.7 17.7C8.9 18.1 9 18.5 9 19C9 20.7 7.7 22 6 22H18Z" fill="currentColor"/>
                                    <path d="M18 2C19.7 2 21 3.3 21 5H9C9 3.3 7.7 2 6 2H18Z" fill="currentColor"/>
                                    <path d="M9 19C9 20.7 7.7 22 6 22C4.3 22 3 20.7 3 19H9Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$mainCategory[0]->main_category}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1" style="text-transform: uppercase;">Main Categories for Bid Requests</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #abffd2;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-success svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M14.1 15.013C14.6 16.313 14.5 17.813 13.7 19.113C12.3 21.513 9.29999 22.313 6.89999 20.913C5.29999 20.013 4.39999 18.313 4.39999 16.613C5.09999 17.013 5.99999 17.313 6.89999 17.313C8.39999 17.313 9.69998 16.613 10.7 15.613C11.1 15.713 11.5 15.813 11.9 15.813C12.7 15.813 13.5 15.513 14.1 15.013ZM8.5 12.913C8.5 12.713 8.39999 12.513 8.39999 12.313C8.39999 11.213 8.89998 10.213 9.69998 9.613C9.19998 8.313 9.30001 6.813 10.1 5.513C10.6 4.713 11.2 4.11299 11.9 3.71299C10.4 2.81299 8.49999 2.71299 6.89999 3.71299C4.49999 5.11299 3.70001 8.113 5.10001 10.513C5.80001 11.813 7.1 12.613 8.5 12.913ZM16.9 7.313C15.4 7.313 14.1 8.013 13.1 9.013C14.3 9.413 15.1 10.513 15.3 11.713C16.7 12.013 17.9 12.813 18.7 14.113C19.2 14.913 19.3 15.713 19.3 16.613C20.8 15.713 21.8 14.113 21.8 12.313C21.9 9.513 19.7 7.313 16.9 7.313Z" fill="currentColor"/>
                                    <path d="M9.69998 9.61307C9.19998 8.31307 9.30001 6.81306 10.1 5.51306C11.5 3.11306 14.5 2.31306 16.9 3.71306C18.5 4.61306 19.4 6.31306 19.4 8.01306C18.7 7.61306 17.8 7.31306 16.9 7.31306C15.4 7.31306 14.1 8.01306 13.1 9.01306C12.7 8.91306 12.3 8.81306 11.9 8.81306C11.1 8.81306 10.3 9.11307 9.69998 9.61307ZM8.5 12.9131C7.1 12.6131 5.90001 11.8131 5.10001 10.5131C4.60001 9.71306 4.5 8.91306 4.5 8.01306C3 8.91306 2 10.5131 2 12.3131C2 15.1131 4.2 17.3131 7 17.3131C8.5 17.3131 9.79999 16.6131 10.8 15.6131C9.49999 15.1131 8.7 14.1131 8.5 12.9131ZM18.7 14.1131C17.9 12.8131 16.7 12.0131 15.3 11.7131C15.3 11.9131 15.4 12.1131 15.4 12.3131C15.4 13.4131 14.9 14.4131 14.1 15.0131C14.6 16.3131 14.5 17.8131 13.7 19.1131C13.2 19.9131 12.6 20.5131 11.9 20.9131C13.4 21.8131 15.3 21.9131 16.9 20.9131C19.3 19.6131 20.1 16.5131 18.7 14.1131Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$activeRequests}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1" style="text-transform: uppercase;">Active Bid Requests</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #d5c3ff;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-info svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$approved}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1" style="text-transform: uppercase;">Approved Bid Requests</div>
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
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                            <span class="svg-icon svg-icon-danger svg-icon-3x ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="currentColor"/>
                                    <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="currentColor"/>
                                    </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$denied}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1" style="text-transform: uppercase;">Rejected Bid Requests</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    {{-- <a href="#" class="card card-xl-stretch mb-xl-8" style="background-color: #b3b0b0; color: #676263;">
                        <div class="card-body">
                            <style>
                                .svg-icon.svg-icon-dangers svg [fill]:not(.permanent):not(g) {
                                    transition: fill .3s ease;
                                    fill: #74545c;
                                }
                            </style>
                            
                            <span class="svg-icon svg-icon-dangers svg-icon-3hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M19.2 15.9C19.2 17.1 18.9 18.1 18.3 19.1C17.7 20 16.8 20.8 15.7 21.3C14.5 21.8 13.2 22.1 11.6 22.1C9.70002 22.1 8.10001 21.7 6.90001 21C6.00001 20.5 5.3 19.8 4.8 18.9C4.5 18.5 4.30002 18 4.10002 17.5C3.70002 15.7 6.00002 14.9 7.20002 16C7.70002 16.5 7.90002 17.2 8.20002 17.7C8.50002 18.1 8.90001 18.5 9.40001 18.7C9.90001 19 10.6 19.1 11.4 19.1C12.6 19.1 13.5 18.8 14.2 18.3C14.9 17.8 15.3 17.1 15.3 16.3C15.3 15.7 15.1 15.1 14.7 14.7C14.3 14.3 13.8 14 13.2 13.8C12.6 13.6 11.8 13.4 10.7 13.1C9.30002 12.8 8.10002 12.4 7.20002 12C6.30002 11.6 5.50001 11 5.00001 10.2C4.40001 9.39995 4.20002 8.50002 4.20002 7.40002C4.20002 6.30002 4.50002 5.39998 5.10002 4.59998C5.70002 3.79998 6.50002 3.09995 7.60002 2.69995C8.70002 2.29995 10 2 11.5 2C12.7 2 13.7 2.10002 14.6 2.40002C15.5 2.70002 16.2 3.09998 16.8 3.59998C17.7 4.39998 18.6 5.49995 18 6.69995C17.7 7.19995 17.2 7.60005 16.6 7.80005C16.1 7.90005 15.6 7.8 15.3 7.5C15.2 7.4 15 7.19998 14.9 7.09998C14.5 6.49998 14.2 5.90002 13.6 5.40002C13.1 5.00002 12.3 4.80005 11.2 4.80005C10.2 4.80005 9.4 5 8.8 5.5C8.2 6 7.90001 6.49998 7.90001 7.09998C7.90001 7.49998 8.00002 7.79998 8.20002 8.09998C8.40002 8.39998 8.70002 8.60005 9.10002 8.80005C9.50002 9.00005 9.80002 9.20005 10.2 9.30005C10.6 9.40005 11.2 9.60005 12.1 9.80005C13.2 10.1 14.2 10.3 15.1 10.6C16 10.9 16.7 11.3 17.4 11.7C18 12.1 18.5 12.7 18.9 13.4C19 14.1 19.2 14.9 19.2 15.9Z" fill="currentColor"/>
                                <path d="M3 12H20" stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalBussiness}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1" style="text-transform: uppercase;">Total Business in Rupees</div>
                        </div>
                    </a> --}}
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
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$reviewsPost}}</div>
                            <div class="fw-bolder text-gray-800 text-hover-primary mb-1" style="text-transform: uppercase;">Total Reviews Posted</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
               
            </div>
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection