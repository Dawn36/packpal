<!DOCTYPE html>
<html>
  <!-- Mirrored from askbootstrap.com/preview/miver/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Aug 2022 20:59:41 GMT -->
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Gurdeep singh osahan" />
    <meta name="author" content="Gurdeep singh osahan" />
    <title>
      Pack Pal
    </title>
    @if(Route::currentRouteName() == '')
        <link rel="stylesheet" href="{{ asset('theme/website-assets/css/style2.css')}}" />
        <link rel="stylesheet" href="{{ asset('theme/website-assets/css/main-color2.css')}}" id="colors" />
    @endif
    <link rel="icon" type="image/png" href="{{ asset('theme/website-assets/images/logo-5.png')}}" />

    <link href="{{ asset('theme/website-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <link href="{{ asset('theme/website-assets/vendor/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet" />

    <link
      href="{{ asset('theme/website-assets/vendor/icons/css/materialdesignicons.min.css')}}"
      media="all"
      rel="stylesheet"
      type="text/css"
    />

    <link
      href="{{ asset('theme/website-assets/vendor/slick-master/slick/slick.css')}}"
      rel="stylesheet"
      type="text/css"
    />

    <link
      href="{{ asset('theme/website-assets/vendor/lightgallery-master/dist/css/lightgallery.min.css')}}"
      rel="stylesheet"
    />

    <link href="{{ asset('theme/website-assets/vendor/select2/css/select2-bootstrap.css')}}" />
    <link href="{{ asset('theme/website-assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet')}}" />

    <link href="{{ asset('theme/website-assets/css/style.css')}}" rel="stylesheet" />
    
  </head>
  <style>
    .daterangepicker td.active.end-date.in-range.available, .qtyTotal, .mm-menu em.mm-counter, .option-set li a.selected, .category-small-box:hover, .pricing-list-container h4:after, #backtotop a, .chosen-container-multi .chosen-choices li.search-choice, .select-options li:hover, button.panel-apply, .layout-switcher a:hover, .listing-features.checkboxes li:before, .comment-by a.reply:hover, .add-review-photos:hover, .office-address h3:after, .post-img:before, button.button, input[type="button"], input[type="submit"], a.button, a.button.border:hover, table.basic-table th, .plan.featured .plan-price, mark.color, .style-4 .tabs-nav li.active a, .style-5 .tabs-nav li.active a, .dashboard-list-box .button.gray:hover, .change-photo-btn:hover, .dashboard-list-box a.rate-review:hover, input:checked + .slider, .add-pricing-submenu.button:hover, .add-pricing-list-item.button:hover, .custom-zoom-in:hover, .custom-zoom-out:hover, #geoLocation:hover, #streetView:hover, #scrollEnabling:hover, #scrollEnabling.enabled, #mapnav-buttons a:hover, #sign-in-dialog .mfp-close:hover, #small-dialog .mfp-close:hover {
    background-color: #d80026;
}
    .btn.focus, .btn:focus {
      box-shadow: 0 0 0 0.2rem rgb(232 0 0 / 25%);
    }
    .dropdown-item.active, .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: #d80026;
    }
    a {
        color: #d80026;
    }
    .seller-card .user-online-indicator {
        border: 1px solid #d80026;
        color: #d80026;
    }
  .btn-outline-success {
        color: #d80026;
        border-color: #d80026;
    }
    .btn-outline-success.disabled, .btn-outline-success:disabled {
        color: #d80026;
        background-color: transparent;
    }
    .third-menu .left ul li.selected:after {
        background: #d80026;
    }
    .main-page .right .nav-tabs li a.active {
        color: #d80026;
        border-bottom: 3px solid #d80026;
    }
    .main-page .right .tab-content button {
    background: -webkit-linear-gradient( legacy-direction(to right), #863044 0%, #ff010b 100% );
    background: -webkit-gradient( linear, left top, right top, from(#863044), to(#ff010b) );
    background: -webkit-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: -o-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
}
.btn-success {
    background: #863044;
    background: -webkit-linear-gradient( legacy-direction(to right), #863044 0%, #ff010b 100% );
    background: -webkit-gradient( linear, left top, right top, from(#863044), to(#ff010b) );
    background: -webkit-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: -o-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
    border-color: #863044;
}
    .btn-outline-success:hover {
    background: #161616;
    background: -webkit-linear-gradient( legacy-direction(to right), #863044 0%, #ff010b 100% );
    background: -webkit-gradient( linear, left top, right top, from(#863044), to(#ff010b) );
    background: -webkit-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: -o-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
    border-color: #d80026;
}
.table-package table tr.select-package td button {
    background: #d80026;
    background: -webkit-linear-gradient( legacy-direction(to right), #863044 0%, #ff010b 100% );
    background: -webkit-gradient( linear, left top, right top, from(#863044), to(#ff010b) );
    background: -webkit-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: -o-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
   
}
.table-package table tr.select-package td button:hover {
    background: #d80026;
    background: -webkit-linear-gradient( legacy-direction(to right), #863044 0%, #ff010b 100% );
    background: -webkit-gradient( linear, left top, right top, from(#863044), to(#ff010b) );
    background: -webkit-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: -o-linear-gradient(left, #863044 0%, #ff010b 100%);
    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #007bff;
    border-color: #d80026;
}
.page-item.active .page-link {
    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
}
.page-link:focus {
    z-index: 3;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(205 37 44);
}
ul.pagination li a:hover {

    background: linear-gradient(to right, #863044 0%, #ff010b 100%);
}
.btn-light {
    color: #d80026;
    background-color: #ffd5db;
    border-color: #d80026;
}
.contact-seller-wrapper a {
    border: 1px solid #d80026;
    color: #d80026;
}

.btn-outline-success:not(:disabled):not(.disabled).active, .btn-outline-success:not(:disabled):not(.disabled):active, .show > .btn-outline-success.dropdown-toggle {
    background-color: #d80026;
    border-color: #d80026;
}
.btn-outline-success:not(:disabled):not(.disabled).active:focus, .btn-outline-success:not(:disabled):not(.disabled):active:focus, .show>.btn-outline-success.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgb(255 0 0 / 50%);
}
a:hover {
    color: #d80026;
}
.btn-light:hover {
    background-color: #d80026;
    border-color: #d80026;
}
.contact-seller-wrapper a:hover {
    background: #ffd5db;
}
    .dropdown-item:focus, .dropdown-item:hover {
          color: #16181b;
          text-decoration: none;
          background-color: #ffd5db;
      }
    .imgbanner {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }
    ::-webkit-scrollbar {
      width: 6px;
    }

    .navbar-collapse::-webkit-scrollbar {
      height: 6px;
      overflow-y: scroll;
    }

    .navbar-collapse::-webkit-scrollbar-track {
      background-color: #e4e4e4;
      border-radius: 100px;
    }

    .scroll-color::-webkit-scrollbar-thumb {
      background-color: #b71b20;
      border-radius: 100px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
  <body class="scroll-color">
    <nav
      class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0 "
    >
      <div class="container">
        <a class="navbar-brand" href="/"
          ><img src="{{ asset('theme/website-assets/images/logo-5.png')}}" alt=""
        /></a>
        <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{route('search_home')}}">
          <div class="input-group">
            <div class="location-dropdown">
              <select class="form-control border-0 shadow-sm" name='product_supplier' style="    font-size: 17px !important;">
                  <option value="product">Bids</option>
                  <option value="supplier">Supplier</option>
              </select>
            </div>
          <input type="text" class="form-control bg-white small" name="search" placeholder="Search Your" aria-label="Search" aria-describedby="basic-addon2" style="height: 40px  !important">
          <div class="input-group-append">
          <button class="btn btn-success" type="submit">
          <i class="fa fa-search fa-sm"></i>
          </button>
          </div>
          </div>
          </form>
        <ul class="navbar-nav align-items-center ml-auto">
          <li
            class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications d-sm-none"
          >
            <a
              class="btn btn-icon btn-transparent-dark dropdown-toggle"
              href="#"
              id="searchDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fa fa-search fa-fw"></i>
            </a>

            <div
              class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in"
              aria-labelledby="searchDropdown"
            >
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control bg-light border-0 small"
                    placeholder="Find Services..."
                    aria-label="Search"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          @if(!Auth::check())
          <li
            class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications"
          >
            <a
            href="{{route('login')}}"
              type="button"
              class="btn btn-light"
              style="/* border: 37px; */ border-radius: 25px"
            >
              Sign in
        </a>
          </li>
          <li
            class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications"
          >
            <a
            href="{{route('register')}}"
              type="button"
              class="btn btn-light"
              style="/* border: 37px; */ border-radius: 25px"
            >
              Sign up
        </a>
          </li>
          @endif
          @if(Auth::check())
          <li class="nav-item dropdown no-arrow no-caret dropdown-user">
            <a
              class="btn btn-icon btn-transparent-dark dropdown-toggle"
              id="navbarDropdownUserImage"
              href="javascript:void(0);"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              ><img class="img-fluid" src="{{ asset('/profile/' . Auth::user()->profile_picture) }}"
            /></a>
            <div
              class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
              aria-labelledby="navbarDropdownUserImage"
            >
              <h6 class="dropdown-header d-flex align-items-center">
                <img class="dropdown-user-img" src="{{ asset('/profile/' . Auth::user()->profile_picture) }}" style="margin-left: -17px;"/>
                <div class="dropdown-user-details">
                  <div class="dropdown-user-details-name">{{ ucwords(Auth::user()->first_name) }} {{ucwords(Auth::user()->last_name)}}</div>
                  <div class="dropdown-user-details-email">
                    <a
                      href="#"
                      class="__cf_email__"
                      data-cfemail=""
                      >{{ Auth::user()->email }}</a
                    >
                  </div>
                </div>
              </h6>
              <div class="dropdown-divider"></div>
              
              <a class="dropdown-item" href="{{route('dashboard')}}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 20 20"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                  </svg>
                </div>
                Dashbord
              </a>
              <a class="dropdown-item" href="{{route('chat_index')}}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 20 20"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M17.659,3.681H8.468c-0.211,0-0.383,0.172-0.383,0.383v2.681H2.341c-0.21,0-0.383,0.172-0.383,0.383v6.126c0,0.211,0.172,0.383,0.383,0.383h1.532v2.298c0,0.566,0.554,0.368,0.653,0.27l2.569-2.567h4.437c0.21,0,0.383-0.172,0.383-0.383v-2.681h1.013l2.546,2.567c0.242,0.249,0.652,0.065,0.652-0.27v-2.298h1.533c0.211,0,0.383-0.172,0.383-0.382V4.063C18.042,3.853,17.87,3.681,17.659,3.681 M11.148,12.87H6.937c-0.102,0-0.199,0.04-0.27,0.113l-2.028,2.025v-1.756c0-0.211-0.172-0.383-0.383-0.383H2.724V7.51h5.361v2.68c0,0.21,0.172,0.382,0.383,0.382h2.68V12.87z M17.276,9.807h-1.533c-0.211,0-0.383,0.172-0.383,0.383v1.755L13.356,9.92c-0.07-0.073-0.169-0.113-0.27-0.113H8.851v-5.36h8.425V9.807z"></path>
                  </svg>
                </div>
                Message
              </a>
              @if(Auth::user()->hasRole('admin'))
              <a class="dropdown-item" href="{{ route('categories.index') }}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 20 20"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M18.092,5.137l-3.977-1.466h-0.006c0.084,0.042-0.123-0.08-0.283,0H13.82L10,5.079L6.178,3.671H6.172c0.076,0.038-0.114-0.076-0.285,0H5.884L1.908,5.137c-0.151,0.062-0.25,0.207-0.25,0.369v10.451c0,0.691,0.879,0.244,0.545,0.369l3.829-1.406l3.821,1.406c0.186,0.062,0.385-0.029,0.294,0l3.822-1.406l3.83,1.406c0.26,0.1,0.543-0.08,0.543-0.369V5.506C18.342,5.344,18.242,5.199,18.092,5.137 M5.633,14.221l-3.181,1.15V5.776l3.181-1.15V14.221z M9.602,15.371l-3.173-1.15V4.626l3.173,1.15V15.371z M13.57,14.221l-3.173,1.15V5.776l3.173-1.15V14.221z M17.547,15.371l-3.182-1.15V4.626l3.182,1.15V15.371z"></path>
                  </svg>
                </div>
                Categories
              </a>
              @endif
              @if(Auth::user()->hasRole('buyer'))
              <a class="dropdown-item" href="{{ route('bid_status', ['status' => 'active']) }}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                      d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
                    ></path>
                  </svg>
                </div>
                Bid
              </a>
              <a class="dropdown-item" href="{{ route('order_status', ['status' => 'offer']) }}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                      d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
                    ></path>
                  </svg>
                </div>
                Order
              </a>
              @endif
              @if(Auth::user()->hasRole('supplier'))
              <a class="dropdown-item" href="{{ route('supplier_order_status', ['status' => 'offer']) }}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                      d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
                    ></path>
                  </svg>
                </div>
                Order
              </a>
              
              @endif
              <a class="dropdown-item" href="{{ route('settings.create') }}">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-settings"
                  >
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                      d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"
                    ></path>
                  </svg>
                </div>
                Account Setting
              </a>
              <form action="{{ route('logout') }}" id='logout-form' method="POST" style="display: none;">
                @csrf
            </form>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="dropdown-item-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-log-out"
                  >
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                  </svg>
                </div>
                Logout
              </a>
            </div>
          </li>
          @endif
        </ul>
      </div>
    </nav>
    <div
      class="modal fade"
      id="exampleModalLong"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLongTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="websitemodaltitle">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="websitemodalbody">...</div>
          
        </div>
      </div>
    </div>