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
                    <a href="index.php" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>

                <li class="breadcrumb-item text-white opacity-75">
                    <a href="user_listing.php" class="text-white text-hover-primary">Buyer Detail </a>
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
                                    <div class="badge badge-lg badge-light-primary d-inline">Buyer</div>
                                </div>
                                <div class="d-flex flex-wrap flex-center fs-8">
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 text-center">
                                        <div class="fs-5 fw-bolder text-gray-700">
                                            <span class="w-75px">{{count($bids)}}</span>
                                        </div>
                                        <div class="fw-bold text-muted">Bids</div>
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
                                                <h2 class="mb-1">{{ucwords($userData->first_name)}} {{ucwords($userData->last_name)}} Bids</h2>
                                                <div class="fs-6 fw-bold text-muted">Total {{count($bids)}} Bids in system</div>
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
                                                    <table class="kt_datatable_example_1 table table-row-bordered gy-5">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-muted">
                                                                <th class="min-w-30px">ID</th>
                                                                <th>Bids Name</th>
                                                                <th>Category</th>
                                                                <th>Sub Category</th>
                                                                <th>Status</th>
                                                                <th>Creation Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($i = 0; $i < count($bids); $i++) @php $a=$i; $a++; @endphp <tr>
                                                                <td><a href="{{ route('bids.show', $bids[$i]->id) }}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{$a}}</a></td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Wrapper-->
                                                                        <div class="me-5 position-relative">
                                                                            <!--begin::Avatar-->
                                                                            <div class="symbol symbol-35px symbol-circle">
                                                                                <img alt="Pic" src="{{asset('/bid/' . $bids[$i]->thumbnail)}}" />
                                                                            </div>
                                                                            <!--end::Avatar-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                        <!--begin::Info-->
                                                                        <div class="d-flex flex-column justify-content-center">
                                                                            <a href="{{ route('bids.show', $bids[$i]->id) }}" class="fs-6 text-gray-800 text-hover-primary">{{ucwords($bids[$i]->bids_name)}}</a>
                                                                        </div>
                                                                        <!--end::Info-->
                                                                    </div>
                                                                    <!--end::User-->
                                                                </td>
                                                                <td>{{ucwords($bids[$i]->categories->category_name)}}</td>
                                                                <td>{{ucwords($bids[$i]->subCategories->sub_category_name)}}</td>

                                                                <td>
                                                                    <a href="javascript:;" class="btn btn-lg btn-light-success fw-bolder ms-2 fs-8 py-1 px-3">Active</a>
                                                                </td>

                                                                <td>{{Date("Y-m-d",strtotime($bids[$i]->created_at))}}</td>
                                                                <td>
                                                                    @if($bids[$i]->status == 'denied')
                                                                    <button type="button" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary" data-bs-original-title="Comment" onclick="rejectBids('{{$bids[$i]->id}}')">
                                                                        <span class="svg-icon svg-icon-2 svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                                                <path d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    @endif
                                                                    <button type="button" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary" data-bs-original-title="Edit Bids" onclick="editBids('{{$bids[$i]->id}}')">
                                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                        <span class="svg-icon svg-icon-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                    <form style="display: inline-block" method="POST" action="{{ route('bids.destroy', $bids[$i]->id) }}">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger" data-bs-toggle="tooltip" data-bs-original-title="Delete Bids">
                                                                            <span class="svg-icon svg-icon-1">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                                                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                                                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                </tr>
                                                                @endfor
                                                        </tbody>
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
<script>
    function editBids(id) {
        url = "{{ route('bids.edit', ':id') }}";
        url = url.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalXlHeading').html('Edit a Bids');
                $('#modalBodyXl').html(result);
                $('#myModalXl').modal('show');
            }
        });
    }
</script>
@endsection('content')