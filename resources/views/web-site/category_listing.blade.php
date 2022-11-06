@extends('layouts.main_website')

@section('content_website')

    <section class="section-padding bg-dark py-5 inner-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="mt-0 mb-3 text-white">Categories</h1>
            <div class="breadcrumbs">
              <p class="mb-0 text-white">
                <a class="text-white" href="#">Home</a> /
                <span class="text-success">Categories</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="services-wrapper bg-white py-5">
      <div class="container">
        <h2>List of Categories</h2>
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
