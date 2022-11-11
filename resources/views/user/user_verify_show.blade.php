@extends('layouts.main')

@section('content')
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">User</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="#" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>

                <li class="breadcrumb-item text-white opacity-75">
                    <a href="#" class="text-white text-hover-primary">User Document Detail </a>
                </li>
            </ul>
        </div>

    </div>
</div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->
                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset('profile/'.$userData->profile_picture) }}" alt="image" />
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-5">{{ucwords($userData->first_name)}} {{ucwords($userData->last_name)}}</a>
                                    @if($userData->verified == 'yes')
                                    <!-- <a href="#" style="margin-top: 1px;">
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                                <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                            </svg>
                                        </span>
                                    </a> -->
                                    @endif
                                </div>
                                <div class="mb-9">
                                    <div class="badge badge-lg badge-light-primary d-inline">Supplier</div>
                                </div>
                                <div class="d-flex flex-wrap flex-center fs-8">
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-75px">{{count($userDoc)}}</span>
                                        </div>
                                        <div class="fw-bold text-muted">Document</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-75px">{{Date("Y-m-d",strtotime($userData->created_at))}}</span>
                                        </div>
                                        <div class="fw-bold text-muted">Created On</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">


                                    <div class="fw-bolder mt-5">Name</div>
                                    <div class="text-gray-600">{{ucwords($userData->first_name)}} {{ucwords($userData->last_name)}}</div>

                                    <div class="fw-bolder mt-5">Email</div>
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$userData->email}}</a>
                                    <div class="fw-bolder mt-5">Address</div>
                                    <div class="text-gray-600">{{ucwords($userData->address)}}</div>

                                    <div class="fw-bolder mt-5">Country</div>
                                    <div class="text-gray-600">{{ucwords($userData->country)}}</div>

                                    <div class="fw-bolder mt-5">City</div>
                                    <div class="text-gray-600">{{ucwords($userData->city)}}</div>

                                    <div class="fw-bolder mt-5">Landline no</div>
                                    <div class="text-gray-600">{{$userData->landline_no}}</div>

                                    <div class="fw-bolder mt-5">Phone Number</div>
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$userData->phone_number}}</a>
                                    <div class="fw-bolder mt-5">Buyer of</div>
                                    <div class="text-gray-600">{{$userData->buyer_of}}</div>
                                    <div class="fw-bolder mt-5">Description</div>
                                    <div class="text-gray-600">{{$userData->description}}</div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-8">
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-pane fade show active" id="kt_user_view_ads_tab" role="tabpanel">
                                    <!--begin::Notes-->
                                    <div class="card card-flush mb-6 mb-xl-9">
                                        <!--begin::Card header-->
                                        <div class="card-header mt-6">
                                            <!--begin::Card title-->
                                            <div class="card-title flex-column">
                                                <h2 class="mb-1">{{ucwords($userData->first_name)}} {{ucwords($userData->last_name)}} has {{count($userDoc)}} document</h2>
                                                <!-- <div class="fs-6 fw-bold text-muted">Total Bids in system</div> -->
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card header-->
                                        <div class="card-header border-0">
                                            <!--begin::Card title-->
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
                                                    <input type="text" id="search" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search">
                                                </div>
                                                <!--end::Search-->
                                            </div>
                                            <!--begin::Card title-->
                                            <!--begin::Card toolbar-->
                                            <!-- <div class="card-toolbar">
                                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_ads">
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.5" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="black"></path>
                                                                <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        Add Gigs
                                                    </button>
                                                </div>
                                            </div> -->
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-column">
                                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="table-responsive">
                                                    <table data-kt-filemanager-table="files" class="table align-middle table-row-dashed fs-6 gy-5 kt_datatable_example_1">
                                                        <!--begin::Table head-->
                                                        <thead>
                                                            <!--begin::Table row-->
                                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                                <th class="min-w-125px">Name</th>
                                                                <th class="min-w-125px">For</th>
                                                                <th class="min-w-10px">Size</th>
                                                                <th class="min-w-125px">Last Modified</th>
                                                                <th class="w-125px"></th>
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
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Tasks-->
                                </div>
                            </div>
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
</div>

@endsection('content')