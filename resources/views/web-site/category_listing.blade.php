@extends('layouts.main_website')

@section('content_website')

    <section class="section-padding bg-dark py-5 inner-header" style="background-image: url({{ asset('theme/assets/media/patterns/pattern-9.jpeg')}});     background-repeat: round;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3 text-white">Categories</h1>
            <div class="breadcrumbs">
              <p class="mb-0 text-white">
                <a class="text-white" style="font-weight: 900;" href="#">Home</a> /
                <span class="text-white" style="font-weight: 900;">Categories</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="services-wrapper bg-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-3"><h2>Categories</h2></div>
          <div class="col-lg-6"><h2>Sub-Categories</h2></div>
        </div>
        
        @for ($i = 0; $i < count($catAndSubCat); $i++)
        @php  
          $dataSubId=explode(",",$catAndSubCat[$i]->sub_cat_id );
          $dataSubName=explode(",",$catAndSubCat[$i]->sub_cat_name );
          @endphp 
        <div class="row" style="margin-bottom: 20px">
          <div class="col-lg-3">
            <div class="service">
              <a href="{{route('web_supplier_listing',['category_id'=>$catAndSubCat[$i]->cat_id])}}"><img src="{{ asset('category/'.$catAndSubCat[$i]->category_image)}}" /></a>
              <h3>{{ucwords($catAndSubCat[$i]->category_name)}}</h3>
            </div>
          </div>
          <div class="col-lg-9">
            @for ($j = 0; $j < count($dataSubId); $j++)
                <a href='{{route('web_supplier_listing',['category_id'=>$catAndSubCat[$i]->cat_id,'sub_category_id'=>$dataSubId[$j]])}}'
                    type="button"
                    class="btn btn-outline-success btn-sm" style="margin-bottom: 10px"
                >
                {{ucwords($dataSubName[$j])}}
          </a>
                @endfor
          </div>
          </div>
          @endfor
          
      </div>
    </div>
    @endsection('content_website')
