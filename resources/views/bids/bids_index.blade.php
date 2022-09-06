@extends('layouts.main')

@section('content')

<style>
    .nav-custom .nav-link.active {
        opacity: 1;
        border-bottom: 2px solid #0189ab !important;
    }
</style>
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Bids</h1>
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
                    <a href="#" class="text-white text-hover-primary">{{$title}} Bids</a>
                </li>

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
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Create a Bids
                </button>

            </div>

        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body ">

                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 position-relative {{$active}}" href="{{ route('bid_status', ['status' => 'active']) }}">Active Bids<span class="position-absolute top-100 start-100 translate-middle  badge badge-circle badge-success">{{$bidSatatusCount[0]->active_bids == null ? '0' : $bidSatatusCount[0]->active_bids}}</span></a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 position-relative {{$inactive}}" href="{{ route('bid_status', ['status' => 'inactive']) }}"><span class="position-absolute top-100 start-100 translate-middle  badge badge-circle badge-danger">{{$bidSatatusCount[0]->active_bids == null ? '0' : $bidSatatusCount[0]->inactive_bids}}</span>In-active Bids</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 position-relative {{$pending}}" href="{{ route('bid_status', ['status' => 'pending']) }}"><span class="position-absolute top-100 start-100 translate-middle  badge badge-circle badge-warning">{{$bidSatatusCount[0]->active_bids == null ? '0' : $bidSatatusCount[0]->pending_bids}}</span>Pending for approval</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary py-5 me-6 position-relative {{$denied}}" href="{{ route('bid_status', ['status' => 'denied']) }}"><span class="position-absolute top-100 start-100 translate-middle  badge badge-circle badge-danger">{{$bidSatatusCount[0]->active_bids == null ? '0' : $bidSatatusCount[0]->denid_bids}}</span>Denied</a>
                        </li>

                    </ul>
                </div>

            </div>
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <!--begin::Card-->
                    <div class="card card-docs mb-2">
                        <div class="p-10">
                            <!--begin::Heading-->
                            <h1 class="anchor fw-bolder mb-5" id="zero-configuration">
                                <a href="javascript:;"></a>Active Bids List
                            </h1>
                            <!--begin::Notice-->
                            <div class="d-flex align-items-center rounded py-5 px-4 bg-light-{{$color}}">
                                <!--begin::Icon-->
                                <div class="d-flex h-80px w-80px flex-shrink-0 flex-center position-relative ms-3 me-6">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs051.svg-->
                                    <span class="svg-icon svg-icon-{{$color}} position-absolute opacity-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none" class="w-80px h-80px">
                                            <path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-{{$color}} position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="black" />
                                            <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Description-->
                                <div class="text-gray-700 fw-bold fs-6 lh-lg">Here we have a list of all of the Bids that are saved in the Database and Posted by the Customers.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Notice-->
                            <!--end::Heading-->
                        </div>
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" id="search" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                </div>
                                <!--end::Search-->
                            </div>

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card Body-->
                        <div class="card-body fs-6 py-lg-5 text-gray-700">
                            <!--begin::Block-->
                            <div class="py-5">
                                <table class="kt_datatable_example_1 table table-row-bordered gy-5">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th class="min-w-30px">ID</th>
                                            <th>Bids Name</th>
                                            <th>Category</th>
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

                                            <td>
                                                <a href="javascript:;" class="btn btn-lg btn-light-{{$color}} fw-bolder ms-2 fs-8 py-1 px-3">{{$title}}</a>
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
                        <!--end::Card Body-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<script>
    function addBids() {
        $.ajax({
            type: 'GET',
            url: "{{ route('bids.create') }}",

            success: function(result) {
                $('#myModalXlHeading').html('Add a Bids');
                $('#modalBodyXl').html(result);
                $('#myModalXl').modal('show');
            }
        });
    }

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

    function rejectBids(bidId) {
        var value = {
            bidId: bidId,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('bid_comment') }}",
            data: value,
            success: function(result) {
                $('#myModalLgHeading').html('Reject Bid');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>
@endsection('content')