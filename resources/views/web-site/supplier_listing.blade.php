@extends('layouts.main_website')

@section('content_website')
<section class="py-5 bg-dark inner-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="mt-0 mb-3 text-white">Supplier</h1>
          <div class="breadcrumbs">
            <p class="mb-0 text-white">
              <a class="text-white" href="#">Home</a> /
              <span class="text-success">Supplier lsiting</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="third-menu filter-options py-3">
    <div class="container">
      <div class="row">
        <div
          class="col-lg-12 d-flex align-items-center justify-content-between"
        >
        <div class="left">
          <form   method="GET" action="{{ route('web_supplier_listing') }}">
          <div class="dropdown-filters d-flex">
            <select id='category_id' name="category_id"  class="form-control" required onchange="getSubCategoryAjax()">
              <option value="">Select category</option>
              @for ($i = 0; $i < count($categories); $i++) <option value="{{$categories[$i]->id}}" {{$categoryId == $categories[$i]->id ? 'selected' :''}}>{{ucwords($categories[$i]->category_name)}}</option>
              @endfor
            </select>
            <select id="sub_category_id" name="sub_category_id" class="form-control ml-4">
              <option value="">Select Sub category</option>
             
            </select>
            <button class="btn btn-success ml-2" type="submit">
              <i class="fa fa-search fa-sm"></i>
            </button>
          </div>
        </form>
        </div>
        @if(!Auth::check())
        <div class="right">
          <a href="{{route('bid_status','active')}}" class="btn btn-success ml-2" type="submit">
            Request for Bids
          </a>
          </div>
          @endif
          @if(Auth::check())
          @if(Auth::user()->hasRole('buyer'))
          <div class="right">
            <a href="{{route('bid_status','active')}}" class="btn btn-success ml-2" type="submit">
              Request for Bids
            </a>
            </div>
            @endif
            @endif
        </div>
      </div>
    </div>
  </div>
  <div class="main-page best-selling">
    <div class="view_slider recommended pt-5">
      <div class="container">
        <div
          class="sorting-div d-flex align-items-center justify-content-between"
        >
          <p class="mb-2">{{$supplier->total()}} Supplier available</p>
          <div class="sorting d-flex align-items-center">
            <p>Sortby</p>
            <form  id='newold' method="GET" action="{{ route('web_supplier_listing') }}">
              <select
                class="custom-select custom-select-sm border-0 shadow-sm ml-2" name="newold" onchange="AscDesc()"
              >
                <option value="desc" {{$orderBy == 'desc' ? 'selected' : ''}}>Newest Arrivals</option>
                <option value="asc" {{$orderBy == 'asc' ? 'selected' : ''}}>Old Arrivals</option>
              </select>
              </form>
          </div>
        </div>
        <h3>Supplier &amp; Listing</h3>
      </div>
      <div class="container">
        <div class="row">
          @for($i=0; $i < count($supplier); $i++)
              @php
              $rating=round($supplier[$i]->rating);
              @endphp
          <div class="col-md-3">
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
                      <a href="profile.html">{{ucwords($supplier[$i]->first_name)}} {{ucwords($supplier[$i]->last_name)}}</a>
                      <span
                          class="level"
                          style="font-weight: bold; color: #524e4e"
                        >
                          Company: {{charaterCountTo20($supplier[$i]->company_name)}}
                        </span>
                      <span
                          class="level"
                          style="font-weight: bold; color: #524e4e"
                        >
                          Category: {{charaterCountTo20($supplier[$i]->category_name)}}
                        </span>
                        <span
                          class="level"
                          style="font-weight: bold; color: #524e4e"
                        >
                          Sub Category: {{charaterCountTo20($supplier[$i]->sub_category_name)}}
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
    <div class="footer-pagination text-center">
      <nav aria-label="Page navigation example">
        {{$supplier->links('pagination::bootstrap-4') }}
      </nav>
    </div>
      {{-- <section class="related-links"></section>
      <div class="container">
        <section class="faqs">
          <h2>Web &amp; Mobile Design FAQs</h2>
          <ul>
            <li>
              <h3>What is web design?</h3>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book. It has
                survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged.
              </p>
            </li>
            <li>
              <h3>What kinds of projects need web design?</h3>
              <p>
                When an unknown printer took Lorem Ipsum is simply dummy text of
                the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, a galley of
                type and scrambled it to make a type specimen book. It has
                survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged.
              </p>
            </li>
            <li>
              <h3>What makes good web design?</h3>
              <p>
                It is a long established fact that a reader will be distracted
                by the readable content of a page when looking at its layout.
                The point of using Lorem Ipsum is that it has a more-or-less
                normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English. Many
                desktop publishing packages and web page editors now use Lorem
                Ipsum as their default model text, and a search for 'lorem
                ipsum' will uncover many.
              </p>
            </li>
            <li>
              <h3>How do I pick the right web designer for me?</h3>
              <p>
                Making it look like readable English It is a long established
                fact that a reader will be distracted by the readable content of
                a page when looking at its layout. The point of using Lorem
                Ipsum is that it has a more-or-less normal distribution of
                letters, as opposed to using 'Content here, content here. Many
                desktop publishing packages and web page editors now use Lorem
                Ipsum as their default model text, and a search for 'lorem
                ipsum' will uncover many.
              </p>
            </li>
          </ul>
        </section>
      </div> --}}
  </div>
  <script src="{{ asset('theme/website-assets/vendor/jquery/jquery.min.js')}}"></script>

  <script>
    $(window).on("load", function () {
      getSubCategoryAjax();

});

function getSubCategoryAjax() {

    var value = {
        categoryId: $('#category_id').val(),
    };
    $.ajax({
        type: 'GET',
        url: "{{ route('sub_categories') }}",
        data: value,

        success: function(result) {
          debugger;
            if (result == 0) {
                document.getElementById('sub_category_id').innerHTML =
                    '<option value=""> Select  sub-category  </option>';
            } else {
                document.getElementById('sub_category_id').innerHTML =
                    '<option value=""> Select  sub-category  </option>';
                for (var i = 0; i < result.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = result[i].id;
                    opt.innerHTML = result[i].sub_category_name;
                    if (result[i].id == "{{ $subCategoryId }}") opt.defaultSelected =
                        true;
                    document.getElementById('sub_category_id').appendChild(opt);
                }
            }


        }
    });
}
    function AscDesc() {
        document.getElementById('newold').submit();
    }
  </script>
  @endsection('content_website')