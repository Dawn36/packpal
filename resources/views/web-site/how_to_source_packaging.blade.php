@extends('layouts.main_website')

@section('content_website')
    <section class="py-5 bg-dark inner-header"
        style="background-image: url({{ asset('theme/assets/media/patterns/pattern-9.jpeg') }});     background-repeat: round;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mt-0 mb-3 text-white">How To Source Packaging</h1>
                    <div class="breadcrumbs">
                        <p class="mb-0 text-white">
                            <a class="text-white" href="#">Home</a> /
                            <span class="text-success">How To Source Packaging</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-6 pl-5 pr-5" style="text-align: center;">
                    <h5>
                        <i><b>We at Packpal have derived two ways for sourcing of packaging</b></i>
                    </h5>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="pl-4 col-lg-12 col-md-5 pr-4">
                    <img class="rounded img-fluid" src="{{ asset('theme/website-assets/images/sourcepak.jpg') }}"
                        alt="Card image cap" />
                </div>
                {{-- <div class="col-lg-6 col-md-6 pl-5 pr-5">
                    <h2 class="mb-5">
                        <b> THE LEADING AND THE ONLY PACKAGING MARKETPLACE FOR PACKAGING INDUSTRY WHERE WE CONNECT BUYERS
                            AND SELLERS</b>
                    </h2>
                    <h5 class="mt-2">About PackPal.pk</h5>
                    <p>
                        Packpal is an e-commerce B2B platform for packaging, inaugurated in 2022, for buyers and sellers
                        specifically related to packaging industry in order to facilitate the Pakistan’s packaging industry.
                        A platform that can help buyers and sellers to showcase their products and innovations. PackPal aims
                        on enabling Small-Medium Enterprises, Large industries and individuals to do business easily.
                    </p>
                    <h5 class="mt-4">Mission of PackPal.pk</h5>
                    <p>
                        Our mission is to do business the easy way with liberty.
                        By giving Sellers and Buyers the tools to communicate directly and reach locally as well as globally
                        in an efficient manner.
                    </p>
                </div> --}}
            </div>
        </div>
    </section>
@endsection('content_website')
