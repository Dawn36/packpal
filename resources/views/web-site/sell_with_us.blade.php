@extends('layouts.main_website')

@section('content_website')
    <section class="py-5 bg-dark inner-header"
        style="background-image: url({{ asset('theme/assets/media/patterns/pattern-9.jpeg') }});     background-repeat: round;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mt-0 mb-3 text-white">Sell With Us</h1>
                    <div class="breadcrumbs">
                        <p class="mb-0 text-white">
                            <a class="text-white" href="#">Home</a> /
                            <span class="text-success">Sell With Us</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="pl-4 col-lg-5 col-md-5 pr-4">
                    <img class="rounded img-fluid" src="{{ asset('theme/website-assets/images/sell.jpeg') }}"
                        alt="Card image cap" />
                </div>
                <div class="col-lg-6 col-md-6 pl-5 pr-5">
                    <h2 class="mb-3">
                        <b> WE ARE OBSESSED WITH PACKAGING</b>
                    </h2>
                    <h5 class="mt-2"><b>WHY US!</b></h5>
                    <p>
                        We are providing an opportunity from small to medium to large packaging industries to showcase
                        packaging and innovations to millions of buyers in Pakistan and globally. A platform that can
                        benefit you in exploring the packaging industry from its core and experience the greatness of
                        packaging that the market have surrounding your locality to cities to nationwide and going global.
                    </p>
                    <h5 class="mt-4 mb-4"><b>The only B2B e-commerce platform for packaging and innovations in Pakistan,
                            helping
                            especially SMEs to grow</b></h5>
                    <p>
                        Connect with nationwide and global buyers through effectively designed tools. Get the pitch in
                        making your presence digital with <b>PackPal.pk</b>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection('content_website')
