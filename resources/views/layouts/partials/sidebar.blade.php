<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
    <!--begin::Navbar-->
    <div class="d-flex align-items-stretch" id="kt_header_nav">
        <!--begin::Menu wrapper-->
        <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
            <!--begin::Menu-->
            <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                <a href="{{route('dashboard')}}" class="menu-item  menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Dashboard</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
               
                @if(Auth::user()->hasRole('admin'))
                <a href="{{route('chat_index')}}" class="{{ Route::currentRouteName() == 'chat_index' ? 'show here' : '' }} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Chat</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                <a href="{{ route('categories.index') }}" class="{{ Route::currentRouteName() == 'categories.index' || Route::currentRouteName() == 'categories.show' ? 'show here' : '' }} menu-item  menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Category</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="{{ Route::currentRouteName() == 'bid_approved' || Route::currentRouteName() == 'bid_pending' || Route::currentRouteName() == 'bids.show' ? 'show here' : '' }} menu-item  menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Bid</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'bid_approved'  ? 'active' : '' }}" href="{{ route('bid_approved') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="black" />
                                            <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Approved Bids</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'bid_pending'  ? 'active' : '' }}" href="{{ route('bid_pending') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="black" />
                                            <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Pending Bids</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="{{ Route::currentRouteName() == 'product_approved' || Route::currentRouteName() == 'product_pending' ? 'show here' : '' }} menu-item  menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Supplier Product</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'product_approved'  ? 'active' : '' }}" href="{{ route('product_approved') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2 svg-icon position-absolute"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z" fill="currentColor"></path>
                                            <path d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Approved Products</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'product_pending'  ? 'active' : '' }}" href="{{ route('product_pending') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2 svg-icon position-absolute"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z" fill="currentColor"></path>
                                            <path d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Pending Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="{{ Route::currentRouteName() == 'user_listing' || Route::currentRouteName() == 'user_subscription_request' || Route::currentRouteName() == 'user_verify_index' || Route::currentRouteName() == 'ads.index' ? 'show here' : '' }} menu-item  menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">User</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'user_listing' ? 'active' : ''}} " href="{{route('user_listing','supplier')}}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Supplier </span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'user_listing' ? 'active' : ''}}" href="{{route('user_listing','buyer')}}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Buyer</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="{{route('user_subscription_request')}}" class="menu-link {{ Route::currentRouteName() == 'user_subscription_request' ? 'active' : ''}}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Subscription Request</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="{{route('user_verify_index')}}" class="menu-link {{ Route::currentRouteName() == 'user_verify_index' ? 'active' : ''}}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Verification Request</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="{{route('ads.index')}}" class="menu-link {{ Route::currentRouteName() == 'ads.index' ? 'active' : ''}}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Ads Listing</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->hasRole('buyer'))
                <a href="{{ route('bid_status', ['status' => 'active']) }}" class="{{ Route::currentRouteName() == 'bid_status' || Route::currentRouteName() == 'bids.show' ? 'show here' : ''}} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Bids</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                <a href="{{ route('order_status', ['status' => 'offer']) }}" class="{{ Route::currentRouteName() == 'order_status' ? 'show here' : ''}} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Orders b</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                <a href="{{route('chat_index')}}" class="{{ Route::currentRouteName() == 'chat_index' ? 'show here' : '' }} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Chat</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                <a href="{{ route('supplier_listing') }}" class="{{ Route::currentRouteName() == 'supplier_listing' ? 'show here' : ''}} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">SUPPLIERS DIRECTORY</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                @endif
                @if(Auth::user()->hasRole('supplier'))
                <a href="{{ route('supplier_order_status', ['status' => 'offer']) }}" class="{{ Route::currentRouteName() == 'supplier_order_status' ? 'show here' : ''}} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Orders S</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                <a href="{{route('chat_index')}}" class="{{ Route::currentRouteName() == 'chat_index' ? 'show here' : '' }} menu-item menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Chat</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                
                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="{{ Route::currentRouteName() == 'supplier_listing' || Route::currentRouteName() == 'product_status' ? 'show here' : ''}} menu-item  menu-lg-down-accordion me-lg-1">
                    <span class="menu-link py-3">
                        <span class="menu-title">Supplier</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'supplier_listing' ? 'active' : ''}}" href="{{ route('supplier_listing') }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="black" />
                                            <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Supplier List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ Route::currentRouteName() == 'product_status' ? 'active' : ''}} " href="{{ route('product_status', ['status' => 'active']) }}">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M7.16973 20.95C6.26973 21.55 5.16972 20.75 5.46972 19.75L7.36973 14.05L2.46972 10.55C1.56972 9.95005 2.06973 8.55005 3.06973 8.55005H20.8697C21.9697 8.55005 22.3697 9.95005 21.4697 10.55L7.16973 20.95Z" fill="black" />
                                            <path d="M11.0697 2.75L7.46973 13.95L16.9697 20.85C17.8697 21.45 18.9697 20.65 18.6697 19.65L13.1697 2.75C12.7697 1.75 11.3697 1.75 11.0697 2.75Z" fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Supplier Product</span>
                            </a>
                        </div>
                    </div>
                </div>
              
                @endif
            
                

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::Navbar-->
    <!--begin::Toolbar wrapper-->
    <div class="topbar d-flex align-items-stretch flex-shrink-0">
        <!--begin::Search-->

        <!--end::Chat-->
        <!--begin::Quick links-->
        @if(Auth::user()->hasRole('supplier') || Auth::user()->hasRole('buyer'))
        <div class="d-flex align-items-center ms-1 ms-lg-3">
            <!--begin::Menu wrapper-->
            <div style="width: 100% !important;" class="btn btn-icon btn-active-light-primary btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                
                <form action="{{ route('user_change_role') }}" id='user_change_role' method="POST" style="display: none;">
                    @csrf
                </form>
                <a  href="{{ route('user_change_role') }}" class="menu-item menu-lg-down-accordion me-lg-1" onclick="event.preventDefault(); document.getElementById('user_change_role').submit();">
                    <span class="menu-link py-3">
                        @if(Auth::user()->hasRole('supplier'))
                        <span class="menu-title" style="color: white;">Switch to Buyer</span>
                        @endif
                        @if(Auth::user()->hasRole('buyer'))
                        <span class="menu-title" style="color: white;">Switch to Supplier</span>
                        @endif
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </a>
                
                <!--end::Svg Icon-->
            </div>


        </div>
        @endif

        <div class="d-flex align-items-center me-n3 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
            <div class="btn btn-icon btn-active-light-primary btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                <img class="h-30px w-30px rounded" src="{{ asset('/profile/' . Auth::user()->profile_picture) }}" alt="" />
            </div>
            <!--begin::User account menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img alt="Logo" src="{{ asset('/profile/' . Auth::user()->profile_picture) }}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bolder d-flex align-items-center fs-5"> {{ ucwords(Auth::user()->first_name) }} {{ucwords(Auth::user()->last_name)}}
                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ Auth::user()->roles->first()->display_name }}</span>
                            </div>
                            <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-5  active">
                    <a href="/" class="menu-link px-5">My Website</a>
                </div>
                <div class="menu-item px-5 active ">
                    <a href="{{ route('about') }}" class="menu-link px-5">About</a>
                </div>

                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                {{-- <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                    <a href="#" class="menu-link px-5">
                        <span class="menu-title position-relative">Language
                            <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                                <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('theme/assets/media/flags/united-states.svg')}}" alt="" /></span></span>
                    </a>

                </div> --}}
                <!--end::Menu item-->
                <!--begin::Menu item-->
                @if(Auth::user()->hasRole('supplier') )
                <div class="menu-item px-5 my-1 ">
                    <a type="button" class="menu-link px-5" onclick="verifyYourSelf()">Verify your self</a>
                </div>
                @endif
                <div class="menu-item px-5 my-1 ">
                    <a href="{{ route('settings.create') }}" class="menu-link px-5">Account Settings</a>
                </div>

                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-5 active">
                    <form action="{{ route('logout') }}" id='logout-form' method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign Out
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->

                <!--end::Menu item-->
            </div>
            <!--end::User account menu-->
            <!--end::Menu wrapper-->
        </div>
        <!--end::User -->
        <!--begin::Aside mobile toggle-->
        <!--end::Aside mobile toggle-->
    </div>
    <!--end::Toolbar wrapper-->
</div>
<script>
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
</script>