@extends('layouts.main_website')

@section('content_website')
    <section class="py-5 bg-dark inner-header"
        style="background-image: url({{ asset('theme/assets/media/patterns/pattern-9.jpeg') }});     background-repeat: round;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mt-0 mb-3 text-white">Contact Us</h1>
                    <div class="breadcrumbs">
                        <p class="mb-0 text-white">
                            <a class="text-white" href="#">Home</a> /
                            <span class="text-success">Contact Us</span>
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
                    <img class="rounded img-fluid" src="{{ asset('theme/website-assets/images/contact_us.jpeg') }}"
                        alt="Card image cap" />
                </div>
                <div class="col-lg-6 col-md-6 pl-5 pr-5">
                    <div class="row">
                        <form id="" class="col-lg-12 col-md-12" method="POST" action="{{ route('feed_back') }}">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col form-group">
                                    <div class="controls">
                                        <label>Title<small class="text-danger">*</small></label>
                                        <select class="form-control border-0 shadow-sm" name='title'>
                                            <option value="Mr">Mr</option>
                                            <option value="Ms">Ms</option>
                                            <option value="Ms">Mrs</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group col form-group">
                                    <div class="controls">
                                        <label>Full Name <small class="text-danger">*</small></label>
                                        <input type="text" placeholder="Please enter full name" name='full_name'
                                            class="form-control" id="phone" required
                                            data-validation-required-message="Please enter your full name." />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col form-group">
                                    <div class="controls">
                                        <label>Company Name <small class="text-danger">*</small></label>
                                        <input type="text" placeholder="Please enter company name" name="company_name"
                                            class="form-control" id="phone" required
                                            data-validation-required-message="Please enter your company name." />
                                    </div>
                                </div>
                                <div class="control-group col form-group">
                                    <div class="controls">
                                        <label>Phone Number <small class="text-danger">*</small></label>
                                        <input type="number" placeholder="Please enter phone number" name="phone_number"
                                            class="form-control" id="phone" required
                                            data-validation-required-message="Please enter your phone number." />
                                    </div>
                                </div>

                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Email Address <small class="text-danger">*</small></label>
                                    <input type="email" placeholder="Please enter your email" name="email"
                                        class="form-control" id="email" required
                                        data-validation-required-message="Please enter your email address." />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Message <small class="text-danger">*</small></label>
                                    <textarea placeholder="Hi there, I would like to ..." rows="4" cols="100" class="form-control" id="message"
                                        name="message" required data-validation-required-message="Please enter your message" maxlength="999"
                                        style="resize: none"></textarea>
                                </div>
                            </div>
                            <div id="success"></div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success" id="sendMessageButton">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content_website')
