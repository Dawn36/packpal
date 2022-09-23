@extends('layouts.main_website')

@section('content_website')
<div class="main-search-container plain-color">
    <div class="main-search-inner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="main-search-headlines" >
              <h2 style="font-size: 35px; font-weight: 1000;">
                A B2B PLATFORM for PACKAGING
                <!-- Typed words can be configured in script settings at the bottom of this HTML file -->
                <span class="typed-words"></span>
              </h2>
              <h4 style="font-size: 23px;">Connecting Buyers & Sellers </h4>
            </div>
            <form  id='search_from' method="GET" action="{{route('search_home')}}">
            <div class="main-search-input" style="margin-top: 19px;">
              <div class="main-search-input-item">
                <select
                  data-placeholder="All Categories"
                  class="chosen-select"
                  name='product_supplier'
                >
                  <option value="product">All Product</option>
                  <option value="supplier">Supplier</option>
                </select>
              </div>
              <div class="main-search-input-item">
                <input
                name='search'
                  type="text"
                  placeholder="Search your Packaging"
                  value=""
                />
              </div>

              <button
                class="button"
                type="submit"
              >
                Search
              </button>
            </div>
            </form>
          </div>
        </div>
        <!-- Features Categories -->
        <div class="row">
          <div class="col-md-12">
            <h5 class="highlighted-categories-headline">
              Or browse featured categories:
            </h5>

            <div class="highlighted-categories">
              <!-- Box -->
              <a
                href="listings-list-with-sidebar.html"
                class="highlighted-category"
              >
                <i class="im im-icon-Home"></i>
                <h4>Apartments</h4>
              </a>

              <!-- Box -->
              <a
                href="listings-list-full-width.html"
                class="highlighted-category"
              >
                <i class="im im-icon-Hamburger"></i>
                <h4>Eat &amp; Drink</h4>
              </a>

              <!-- Box -->
              <a
                href="listings-half-screen-map-list.html"
                class="highlighted-category"
              >
                <i class="im im-icon-Electric-Guitar"></i>
                <h4>Events</h4>
              </a>

              <!-- Box -->
              <a
                href="listings-half-screen-map-list.html"
                class="highlighted-category"
              >
                <i class="im im-icon-Dumbbell"></i>
                <h4>Fitness</h4>
              </a>
            </div>
          </div>
        </div>
        <!-- Featured Categories - End -->
      </div>
    </div>

    <!-- Main Search Photo Slider -->
    <div class="container msps-container">
      <div class="main-search-photo-slider">
        <div class="msps-slider-container">
          <div class="msps-slider">
            @for ($i = 0; $i < count($adsTop); $i++)
            
            <div class="item">
              <img src="{{ asset($adsTop[$i]->path)}}" class="item" title="{{ asset($adsTop[$i]->path)}}" />
            </div>
            @endfor
          </div>
        </div>
      </div>

      <div class="msps-shapes" id="scene" style="height: height: 509px">
        <div class="layer" data-depth="0.2">
          <svg height="40" width="40" class="shape-a">
            <circle
              cx="20"
              cy="20"
              r="17"
              stroke-width="4"
              fill="transparent"
              stroke="#C400FF"
            />
          </svg>
        </div>

        <div class="layer" data-depth="0.5">
          <svg width="90" height="90" viewBox="0 0 500 800" class="shape-b">
            <g transform="translate(281,319)">
              <path
                fill="transparent"
                style="transform: rotate(25deg)"
                stroke-width="35"
                stroke="#F56C83"
                fill
                d="M260.162831,132.205081
                  A18,18 0 0,1 262.574374,141.205081
                  A18,18 0 0,1 244.574374,159.205081H-244.574374
                  A18,18 0 0,1 -262.574374,141.205081
                  A18,18 0 0,1 -260.162831,132.205081L-15.588457,-291.410162
                  A18,18 0 0,1 0,-300.410162
                  A18,18 0 0,1 15.588457,-291.410162Z"
              />
            </g>
          </svg>
        </div>

        <div
          class="layer"
          data-depth="0.2"
          data-invert-x="false"
          data-invert-y="false"
          style="z-index: -10"
        >
          <svg height="200" width="200" viewbox="0 0 250 250" class="shape-c">
            <path
              d="
                      M 0, 30
                      C 0, 23.400000000000002 23.400000000000002, 0 30, 0
                      S 60, 23.400000000000002 60, 30
                          36.599999999999994, 60 30, 60
                          0, 36.599999999999994 0, 30
                  "
              fill="#FADB5F"
              transform="rotate(
                      -25,
                      100,
                      100
                  ) translate(
                      0
                      0
                  ) scale(3.5)"
            ></path>
          </svg>
        </div>

        <div class="layer" data-depth="0.6" style="z-index: -10">
          <svg height="120" width="120" class="shape-d">
            <circle cx="60" cy="60" r="60" fill="#222" />
          </svg>
        </div>

        <div class="layer" data-depth="0.2">
          <svg height="70" width="70" viewBox="0 0 200 200" class="shape-e">
            <path
              fill="#FF0066"
              d="M68.5,-24.5C75.5,-0.8,58.7,28.5,33.5,46.9C8.4,65.4,-25.2,73.1,-42.2,60.2C-59.2,47.4,-59.6,13.9,-49.8,-13.7C-40,-41.3,-20,-63.1,5.4,-64.8C30.7,-66.6,61.5,-48.3,68.5,-24.5Z"
              transform="translate(100 100)"
            />
          </svg>
        </div>
      </div>
    </div>
  </div>

  <nav
    class="navbar navbar-expand-lg navbar-light bg-white osahan-nav-mid px-0 border-top shadow-sm"
  >
    <div class="container">
      <button
        class="navbar-toggler navbar-toggler-right"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div
        class="collapse navbar-collapse scroll-color"
        id="navbarResponsive"
      >
        <ul class="navbar-nav">
          @for ($i = 0; $i < count($catAndSubCat); $i++)
          @php  
          $dataSubId=explode(",",$catAndSubCat[$i]->sub_cat_id );
          $dataSubName=explode(",",$catAndSubCat[$i]->sub_cat_name );
          @endphp 
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownPortfolio{{$i}}"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
            {{-- <div class="service"> --}}
             <img src="{{ asset('category/'.$catAndSubCat[$i]->category_image)}}" style="    border-radius: 50%;
             height: 50px;
             width: 50px;" />
             {{ucwords($catAndSubCat[$i]->category_name)}}
             {{-- <h3> {{ucwords($catAndSubCat[$i]->category_name)}}</h3> --}}
            {{-- </div> --}}
            </a>
            <div
            class="dropdown-menu"
            aria-labelledby="navbarDropdownPortfolio{{$i}}"
            >
            @for ($j = 0; $j < count($dataSubId); $j++)
              <a class="dropdown-item" href="{{route('web_supplier_listing',['category_id'=>$catAndSubCat[$i]->cat_id,'sub_category_id'=>$dataSubId[$j]])}}" >{{ucwords($dataSubName[$j])}}</a>
              @endfor
              
            </div>
           
          </li>
          @endfor
          <button onclick="viewAllCategory()"  type="button" class="btn btn-outline-success btn-sm" tabindex="0">
            View All <br> Category
            </button>
        </ul>
      </div>
    </div>
  </nav>
  <div class="freelance-projects bg-white py-5">
    <div class="container">
      <div class="row single-item">
        @for ($i = 0; $i < count($adsMiddle); $i++)
        <div class="col">
          <div class="freelancer">
            <img class="imgbanner" src="{{ asset($adsMiddle[$i]->path)}}" />
          </div>
        </div>
        @endfor
       
      </div>
    </div>
  </div>

  <div class="freelance-projects py-5">
    <div class="view_slider recommended">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3><a href="{{route('web_supplier_listing')}}">PACKAGING SUPPLIERS</a></h3>
            <div class="view recent-slider recommended-slider"> 
              @for($i=0; $i < count($supplier); $i++)
              @php
                        $rating=round($supplier[$i]->rating);
                        @endphp
              <div>
                <a href="{{route('supplier_detail',['userId'=>$supplier[$i]->user_id,'catId'=>$supplier[$i]->cat_id])}}">
                  <img class="img-fluid" src="{{asset('/profile/' . $supplier[0]->company_banner)}}" />
                </a>
                <div class="inner-slider">
                  <div class="inner-wrapper">
                    <div class="d-flex align-items-center">
                      <span class="seller-image">
                        <img
                          class="img-fluid"
                          src="{{asset('/profile/' . $supplier[$i]->company_logo)}}"
                          alt=""
                        />
                      </span>
                      <span class="seller-name">
                        <a href="{{route('supplier_detail',['userId'=>$supplier[$i]->user_id,'catId'=>$supplier[$i]->cat_id])}}">{{ucwords($supplier[$i]->first_name)}} {{ucwords($supplier[$i]->last_name)}}</a>
                        <span
                            class="level"
                            style="font-weight: bold; color: #524e4e"
                          >
                            Company: {{ucwords($supplier[$i]->company_name)}}
                          </span>
                        <span
                            class="level"
                            style="font-weight: bold; color: #524e4e"
                          >
                            Category: {{ucwords($supplier[$i]->category_name)}}
                          </span>
                          <span
                            class="level"
                            style="font-weight: bold; color: #524e4e"
                          >
                            Sub Category: {{ucwords($supplier[$i]->sub_category_name)}}
                          </span>
                            <div class="seller-card">
                              <div>
                                <div
                                  class="user-online-indicator is-online"
                                  data-user-id="1152855" style="margin-top: 12px;"
                                >
                                @if($supplier[$i]->verified == 'yes')
                                  <i style="margin-right: 4px;">&#10004;</i>Verified
                                  @else
                                  <i style="margin-right: 4px;">&#10004;</i>Not verified
                                  @endif
                                </div>
                              </div>
                            </div>
                      </span>
                    </div>
                    <div class="content-info">
                      <div class="rating-wrapper">
                        <span class="gig-rating text-body-2">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 1792 1792"
                            width="15"
                            height="15"
                          >
                            <path
                              fill="currentColor"
                              d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"
                            ></path>
                          </svg>
                          {{$rating}}
                          <span>({{$supplier[$i]->rating_count}})</span>
                        </span>
                      </div>
                    </div>
                    <div class="footer">
                      <div class="seller-card">
                        <div>
                        </div>
                      </div>
                      <div class="price" >
                        
                        <button
                      onclick="viewSupplierDetails('{{$supplier[$i]->user_id}}' , '{{$supplier[$i]->cat_id}}')"
                          type="button"
                          class="btn btn-outline-success btn-sm" 
                        >
                        View Supplier
                        </button>
                       

                     
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
    </div>
  </div>

  <section class="freelance-projects bg-white py-5">
    <div class="view_slider recommended">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3><a href="{{route('bid_listing')}}"> Recent Request for Bids of Buyers</a></h3>
            <div class="view recent-slider recommended-slider">
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
                          Buyer from: {{ucwords($bidListing[$i]->city)}}
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
                        @if(date('Y-m-d') > Auth::user()->expiry_date && Auth::user()->hasRole('supplier'))
                        <a href="{{route('subscribe_page')}}" type="button" class="btn btn-outline-success btn-sm">Bid Now</a>
                        @else
                        <button
                        {{Auth::user()->id == $bidListing[$i]->user_id ? "disabled" : '' }}
                        {{!Auth::user()->hasRole('supplier') ? "disabled" : '' }}
                          type="button"
                          class="btn btn-outline-success btn-sm" onclick="bidNNow('{{$bidListing[$i]->bid_id}}','{{$bidListing[$i]->user_id}}','{{$bidListing[$i]->cat_id}}','{{$bidListing[$i]->sub_cat_id}}')"
                        >
                          Bid Now
                        </button>
                        @endif
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
    </div>
  </section>

  <div class="services-wrapper py-5">
    <div class="container view_slider recommended">
      <h2>Popular Professional Services</h2>
      <div class="row service-slider">
        @for ($i = 0; $i < count($catAndSubCat); $i++)
        <div class="col">
          <div class="service">
            <a href="{{route('bid_listing',['category_id'=>$catAndSubCat[$i]->cat_id])}}" >
            
            <img src="{{ asset('category/'.$catAndSubCat[$i]->category_image)}}" alt="{{$catAndSubCat[$i]->category_name}}"  />
             <h3>{{ucwords($catAndSubCat[$i]->category_name)}}</h3>
            </a>
          </div>
        </div>
        @endfor
      </div>
    </div>
  </div>
  <div class="freelance-projects bg-white py-5">
    <div class="container view_slider recommended">
      <div class="row">
        <div class="col-lg-12">
          <h3>Innovations</h3>
          <div class="row single-item">
            @for ($i = 0; $i < count($adsMiddle); $i++)
            <div class="col">
              <div class="freelancer">
                <img class="imgbanner" src="{{ asset($adsMiddle[$i]->path)}}" />
              </div>
            </div>
            @endfor
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex" style="margin-bottom: 50px">
    <div class="col-md-6">
      <div class="testi-wrap pt-5 view_slider recommended">
        <div class="container">
          <h3>Trade Shows</h3>
          <div class="testimonial single-item">
            <div class="text-content">
              <p>
                "Being a small but growing brand, we have to definitely do a
                lot more with less. And when you want to create a business
                bigger than yourself, you’re going to need help. And that’s
                what Miver does"
              </p>
              <span>Tim and Dan Joo, Co-founders</span>
            </div>
            <div class="text-content">
              <p>
                "Being a small but growing brand, we have to definitely do a
                lot more with less. And when you want to create a business
                bigger than yourself, you’re going to need help. And that’s
                what Miver does"
              </p>
              <span>Tim and Dan Joo, Co-founders</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="testi-wrap pt-5 view_slider recommended">
        <div class="container">
          <h3>Newsroom</h3>
          <div class="testimonial single-item">
            <div class="text-content">
              <p>
                "Being a small but growing brand, we have to definitely do a
                lot more with less. And when you want to create a business
                bigger than yourself, you’re going to need help. And that’s
                what Miver does"
              </p>
              <span>Tim and Dan Joo, Co-founders</span>
            </div>
            <div class="text-content">
              <p>
                "Being a small but growing brand, we have to definitely do a
                lot more with less. And when you want to create a business
                bigger than yourself, you’re going to need help. And that’s
                what Miver does"
              </p>
              <span>Tim and Dan Joo, Co-founders</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function viewAllCategory()
    {
      var url = "{{ route('category_listing') }}";
	location.href = url;
    }
  function search() {
    document.getElementById('search').submit();
}


</script>
  @endsection('content_website')