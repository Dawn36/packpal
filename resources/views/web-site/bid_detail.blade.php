@extends('layouts.main_website')

@section('content_website')
<div class="third-menu border-top">
    <div class="container">
      <div class="row d-flex align-items-center justify-content-between">
        <div class="col-lg-9 left">
          <ul>
            <li class="nav-overview selected">
              <a href="#overview">Overview</a>
            </li>
            <li class="nav-description">
              <a href="#description">Description</a>
            </li>
            <li class="nav-aboutSeller">
              <a href="#aboutSeller">About The Seller</a>
            </li>
            <li class="nav-packagesTable">
              <a href="#packagesTable">Compare Packages</a>
            </li>
            <li class="nav-recommendations">
              <a href="#recommendations">Recommendations</a>
            </li>
            <!-- <li class="nav-faq"><a href="#faq">FAQ</a></li> -->
            <!-- <li class="nav-reviews"><a href="#reviews">Reviews</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="main-page py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 left">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Bid Detail
              </li>
            </ol>
          </nav>
          <h2>{{ucwords($bidDetail[0]->bids_name)}}</h2>
          <div
            id="overview"
            class="seller-overview d-flex align-items-center"
          >
            <div class="user-profile-image d-flex">
              <label class="profile-pict" for="profile_image">
                <img
                  src="{{ asset('theme/website-assets/images/user/s2.png')}}"
                  class="profile-pict-img img-fluid"
                  alt=""
                />
              </label>
              <div class="profile-name">
                <span class="user-status">
                  <a href="#" class="seller-link">{{ucwords($bidDetail[0]->first_name)}} {{ucwords($bidDetail[0]->last_name)}}</a>
                </span>
              </div>
            </div>
            <div class="user-info d-flex">
              <span class="orders-in-queue">{{ucwords($bidDetail[0]->bid_offer_count)}} Offer in Queue</span>
            </div>
          </div>
          <div class="slider mt-4">
            <div
              id="aniimated-thumbnials"
              class="slider-for slick-slider-single"
            >
              <a href="{{ asset('bid/'.$bidDetail[0]->thumbnail)}}">
                <img class="img-fluid" src="{{ asset('bid/'.$bidDetail[0]->thumbnail)}}" />
              </a>
              @for ($i = 0; $i < count($bidsImage); $i++)
              <a href="{{ asset('bid/'.$bidsImage[$i]->path)}}">
                <img class="img-fluid" src="{{ asset('bid/'.$bidsImage[$i]->path)}}" />
              </a>
              @endfor
            </div>
            <div class="slider-nav slick-slider-single">
              <div class="item-slick">
                <img class="img-fluid" src="{{ asset('bid/'.$bidDetail[0]->thumbnail)}}" alt="Alt" />
              </div>
              @for ($i = 0; $i < count($bidsImage); $i++)
              <div class="item-slick">
                <img class="img-fluid" src="{{ asset('bid/'.$bidsImage[$i]->path)}}" alt="Alt" />
              </div>
              @endfor
              
            </div>
          </div>
          <div id="description" class="description">
            <h3>About This Bid</h3>
              @php echo html_entity_decode($bidDetail[0]->description) @endphp
            
          </div>
          <h3 id="aboutSeller">About The Buyer</h3>
          <div class="profile-card">
            <div class="stats-desc">
              <ul class="user-stats">
                <li>From<strong>{{ucwords($bidDetail[0]->address)}}</strong></li>
                <li>Member since<strong>{{DATE('Y-m-d',strtotime($bidDetail[0]->created_at))}}</strong></li>
                {{-- <li>Avg. Response Time<strong>1 hour</strong></li> --}}
              </ul>
            
            </div>
            <div id="packagesTable" class="table-package">
              <h3>Compare Packages</h3>
              <table>
                <colgroup>
                  <col />
                  <col />
                  <col />
                  <col />
                </colgroup>
                <tbody>
                  <tr class="package-type">
                    <th>Package</th>
                    <td>
                      <p class="price">Rs.4000</p>
                      <b class="type">Basic</b><b class="title">per month</b>
                    </td>
                    <td>
                      <p class="price">Rs.23000</p>
                      <b class="type">Standard</b
                      ><b class="title">6 months</b>
                    </td>
                    <td>
                      <p class="price">Rs.47000</p>
                      <b class="type">Premium</b><b class="title">12 month</b>
                    </td>
                  </tr>
                  <tr class="description">
                    <th></th>
                    <td>
                      Introducing Bid System where seller will enter a bidding
                      system after paying an amount on give credentials and
                      select the package and upload payment image.
                    </td>
                    <td>
                      Introducing Bid System where seller will enter a bidding
                      system after paying an amount on give credentials and
                      select the package and upload payment image.
                    </td>
                    <td>
                      Introducing Bid System where seller will enter a bidding
                      system after paying an amount on give credentials and
                      select the package and upload payment image.
                    </td>
                  </tr>
                 
                  <tr class="select-package">
                    <th>Total</th>
                    <td>
                      <p class="price-label">Rs.4000</p>
                      @if(Auth::check())
                      @if(date('Y-m-d') > Auth::user()->expiry_date )
                      <button type="button"  {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}  onclick="subscribe('1 month')">Select</button>
                      @endif
                      @else
                      <button type="button"   onclick="subscribe('1 month')">Select</button>
                      @endif
                      {{-- <button type="button"  onclick="subscribe('1 month')">Select</button> --}}
                    </td>
                    <td>
                      <p class="price-label">Rs.23000</p>
                      @if(Auth::check())
                      @if(date('Y-m-d') > Auth::user()->expiry_date )
                      <button type="button"  {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}  onclick="subscribe('6 month')">Select</button>
                      @endif
                      @else
                      <button type="button"  onclick="subscribe('6 month')">Select</button>
                      @endif
                      {{-- <button type="button"  onclick="subscribe('6 month')">Select</button> --}}
                    </td>
                    <td>
                      <p class="price-label">Rs.47000</p>
                      @if(Auth::check())
                      @if(date('Y-m-d') > Auth::user()->expiry_date )
                      <button type="button"  {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}  onclick="subscribe('12 month')">Select</button>
                      @endif
                      @else
                      <button type="button"  onclick="subscribe('12 month')">Select</button>
                      @endif
                      {{-- <button type="button"  onclick="subscribe('12 month')">Select</button> --}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="recommendations" class="recommended">
              <h3>Recommended For You</h3>
              <div class="recommended-slider recommend">
                @for ($i = 0; $i < count($bidListing); $i++)
                <div>
                  <a href="{{route('bid_detail',$bidListing[$i]->bid_id)}}">
                    <img class="img-fluid" src="{{ asset('bid/'.$bidListing[$i]->thumbnail)}}" />
                  </a>
                  <div class="inner-slider">
                    <div class="inner-wrapper">
                      <div class="d-flex align-items-center">
                        <span class="seller-image">
                          <img
                            class="img-fluid"
                            src="{{ asset('profile/'.$bidListing[$i]->profile_picture)}}"
                            alt=""
                          />
                        </span>
                        <span class="seller-name">
                          <a href="{{route('bid_detail',$bidListing[$i]->bid_id)}}">{{ucwords($bidListing[$i]->first_name)}} {{ucwords($bidListing[$i]->last_name)}}</a>
                          <span
                            class="level"
                            style="font-weight: bold; color: #524e4e"
                          >
                            Category: {{ucwords($bidListing[$i]->category_name)}}
                          </span>
                          <span
                            class="level"
                            style="font-weight: bold; color: #524e4e"
                          >
                            Sub Category: {{ucwords($bidListing[$i]->sub_category_name)}}
                          </span>
                          <span
                            class="level"
                            style="font-weight: bold; color: #524e4e"
                          >
                            Buyer from: {{ucwords($bidListing[$i]->address)}}
                          </span>
                        </span>
                      </div>
                      <h3>
                        {{ucwords($bidListing[$i]->bids_name)}}
                      </h3>
                      <div class="content-info"></div>
                      <div class="footer">
                        Starting At: {{$bidListing[$i]->target_price}}
                        <div class="price" >
                          @if(Auth::check())
                          <button
                          {{Auth::user()->id == $bidListing[$i]->user_id ? "disabled" : '' }}
                          {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}
                            type="button"
                            class="btn btn-outline-success btn-sm" onclick="bidNNow('{{$bidListing[$i]->bid_id}}','{{$bidListing[$i]->user_id}}','{{$bidListing[$i]->cat_id}}','{{$bidListing[$i]->sub_cat_id}}')"
                          >
                            Bid Now
                          </button>
                          @else
                          <button
                            type="button"
                            class="btn btn-outline-success btn-sm" onclick="bidNNow('{{$bidListing[$i]->bid_id}}','{{$bidListing[$i]->user_id}}','{{$bidListing[$i]->cat_id}}','{{$bidListing[$i]->sub_cat_id}}')"
                          >
                            Bid Now
                          </button>
                          @endif
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                @endfor
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 right">
          <div class="sticky">
            <ul class="nav nav-tabs">
              <li>
                <a class="active" data-toggle="tab" href="#basic">Basic</a>
              </li>
              <li><a data-toggle="tab" href="#standard">Standard</a></li>
              <li><a data-toggle="tab" href="#Premium">Premium</a></li>
            </ul>
            <div class="tab-content">
              <div id="basic" class="tab-pane fade show active">
                <div class="header">
                  <h3>
                    <b class="title">per month</b
                    ><span class="price">Rs.4000</span>
                  </h3>
                  <p>
                    Introducing Bid System where seller will enter a bidding
                    system after paying an amount on give credentials and
                    select the package and upload payment image.
                  </p>
                </div>
                @if(Auth::check())
                @if(date('Y-m-d') > Auth::user()->expiry_date )
                <button type="button"  {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}  onclick="subscribe('1 month')">Continue (Rs.47000)</button>
                @endif
                @else
                <button type="button"   onclick="subscribe('1 month')">Continue (Rs.47000)</button>
                @endif
              </div>
              <div id="standard" class="tab-pane fade">
                <div class="header">
                  <h3>
                    <b class="title">6 month</b
                    ><span class="price">Rs.23000</span>
                  </h3>
                  <p>
                    Introducing Bid System where seller will enter a bidding
                    system after paying an amount on give credentials and
                    select the package and upload payment image.
                  </p>
                </div>
                @if(Auth::check())
                @if(date('Y-m-d') > Auth::user()->expiry_date )
                <button type="button"  {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}  onclick="subscribe('6 month')">Continue (Rs.47000)</button>
                @endif
                @else
                <button type="button"  onclick="subscribe('6 month')">Continue (Rs.47000)</button>
                @endif
              </div>
              <div id="Premium" class="tab-pane fade">
                <div class="header">
                  <h3>
                    <b class="title">12 month</b
                    ><span class="price">Rs.47000</span>
                  </h3>
                  <p>
                    Introducing Bid System where seller will enter a bidding
                    system after paying an amount on give credentials and
                    select the package and upload payment image.
                  </p>
                </div>
                @if(Auth::check())
                @if(date('Y-m-d') > Auth::user()->expiry_date )
                <button type="button"  {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}  onclick="subscribe('12 month')">Continue (Rs.47000)</button>
                @endif
                @else
                <button type="button"   onclick="subscribe('12 month')">Continue (Rs.47000)</button>
                @endif
              </div>
            </div>
            <div class="contact-seller-wrapper tab-content">
               @if(Auth::check())
               @if(date('Y-m-d') > Auth::user()->expiry_date )
               <a href="{{route('subscribe_page')}}" type="button" class="btn btn-outline-success btn-sm">Bid Now</a>
               @else
              <button class="fit-button"  
              {{Auth::user()->id == $bidDetail[0]->user_id ? "disabled" : '' }}
                {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }} 
                type="button" onclick="bidNNow('{{$bidDetail[0]->bid_id}}','{{$bidDetail[0]->user_id}}','{{$bidDetail[0]->cat_id}}','{{$bidDetail[0]->sub_cat_id}}')">Bid Now</button>
                @endif
                @else
                  <button
                    type="button"
                     onclick="bidNNow('{{$bidDetail[0]->bid_id}}','{{$bidDetail[0]->user_id}}','{{$bidDetail[0]->cat_id}}','{{$bidDetail[0]->sub_cat_id}}')"
                  >
                    Bid Now
                  </button>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  <script>
  function subscribe(month) {
    var value = {
           month: month,
        };
    $.ajax({
        type: 'GET',
        url: "{{ route('subscribe_modal') }}",
        data: value,
        success: function(result) {
            $('#websitemodaltitle').html('Add');
            $('#websitemodalbody').html(result);
            $('#exampleModalLong').modal('show');
        },
        error: function(jqXHR){
              if(jqXHR.status == '401')
              {
                let url = "{{ route('login') }}";
                document.location.href=url;
              }
        }
    });
}
    </script>
  @endsection('content_website')