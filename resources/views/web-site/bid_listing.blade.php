@extends('layouts.main_website')

@section('content_website')
<section class="py-5 bg-dark inner-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="mt-0 mb-3 text-white">Product</h1>
          <div class="breadcrumbs">
            <p class="mb-0 text-white">
              <a class="text-white" href="#">Home</a> /
              <span class="text-success">Product</span>
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
            <form   method="GET" action="{{ route('bid_listing') }}">
            <div class="dropdown-filters d-flex">
              <select id='category_id' name="category_id"  class="form-control" required onchange="getSubCategoryAjax()">
                <option selected="">Select category</option>
                @for ($i = 0; $i < count($categories); $i++) <option value="{{$categories[$i]->id}}" {{$categoryId == $categories[$i]->id ? 'selected' :''}}>{{ucwords($categories[$i]->category_name)}}</option>
                @endfor
              </select>
              <select id="sub_category_id" name="sub_category_id" class="form-control ml-4">
                <option selected="">Select Sub category</option>
               
              </select>
              <button class="btn btn-success ml-2" type="submit">
                <i class="fa fa-search fa-sm"></i>
              </button>
            </div>
          </form>
          </div>
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
          <p class="mb-2">{{$bidListing->total()}} Services available</p>
          <div class="sorting d-flex align-items-center">
            <p>Sortby</p>
            <form  id='newold' method="GET" action="{{ route('bid_listing') }}">
            <select
              class="custom-select custom-select-sm border-0 shadow-sm ml-2" name="newold" onchange="AscDesc()"
            >
              <option value="desc" {{$orderBy == 'desc' ? 'selected' : ''}}>Newest Arrivals</option>
              <option value="asc" {{$orderBy == 'asc' ? 'selected' : ''}}>Old Arrivals</option>
            </select>
            </form>
          </div>
        </div>
        <h3>Services In Web &amp; Mobile Design</h3>
      </div>
      <div class="container">
        <div class="row">
          @for ($i = 0; $i < count($bidListing); $i++)
          <div class="col-md-3">
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
                    <button
                      type="button"
                      data-toggle="modal"
                      data-target="#exampleModalLong"
                      class="btn btn-outline-success btn-sm"
                    >
                      Bid Now
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
        {{$bidListing->links('pagination::bootstrap-4') }}
      </nav>
    </div>
    <section class="related-links"></section>
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
    </div>
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