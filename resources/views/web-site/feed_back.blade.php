@extends('layouts.main_website')

@section('content_website')
<section class="section-padding bg-dark py-5 inner-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="mt-0 mb-3 text-white">Feed Back</h1>
          <div class="breadcrumbs">
            <p class="mb-0 text-white">
              <a class="text-white" href="#">Home</a> /
              <span class="text-success">Feed Back</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 section-title text-left mb-4">
          <h2>Feed Back</h2>
        </div>
        {{-- <form
          name="sentMessage"
          class="col-lg-12 col-md-12"
          id="contactForm"
          novalidate
        > --}}
        <form id="" class="col-lg-12 col-md-12" method="POST" action="{{ route('feed_back') }}" >
          @csrf
        <div class="form-row">
          <div class="control-group col form-group">
            <div class="controls">
              <label
                >Full Name <small class="text-danger">*</small></label
              >
              <input
                type="text"
                placeholder="Please enter full name"
                name='full_name'
                class="form-control"
                id="phone"
                required
                data-validation-required-message="Please enter your full name."
              />
            </div>
          </div>
          <div class="control-group col form-group">
            <div class="controls">
              <label
                >Company Name<small class="text-danger">*</small></label
              >
              <input
                type="text"
                placeholder="Please enter company name"
                name='company_name'
                class="form-control"
                id="email"
                required
                data-validation-required-message="Please enter your company name."
              />
            </div>
          </div>
        </div>
          
          <div class="form-row">
            <div class="control-group col form-group">
              <div class="controls">
                <label
                  >Phone Number <small class="text-danger">*</small></label
                >
                <input
                  type="number"
                  placeholder="Please enter phone number"
                  name="phone_number"
                  class="form-control"
                  id="phone"
                  required
                  data-validation-required-message="Please enter your phone number."
                />
              </div>
            </div>
            <div class="control-group col form-group">
              <div class="controls">
                <label
                  >Email Address <small class="text-danger">*</small></label
                >
                <input
                  type="email"
                  placeholder="Please enter your email"
                  nam="email"
                  class="form-control"
                  id="email"
                  required
                  data-validation-required-message="Please enter your email address."
                />
              </div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Tile <small class="text-danger">*</small></label>
              <input
                type="text"
                placeholder="Please enter title"
                name="title"
                class="form-control"
                id="name"
                required
                data-validation-required-message="Please enter your title."
              />
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message <small class="text-danger">*</small></label>
              <textarea
                placeholder="Hi there, I would like to ..."
                rows="4"
                cols="100"
                class="form-control"
                id="message"
                name="message"
                required
                data-validation-required-message="Please enter your message"
                maxlength="999"
                style="resize: none"
              ></textarea>
            </div>
          </div>
          <div id="success"></div>

          <div class="text-right">
            <button
              type="submit"
              class="btn btn-success"
              id="sendMessageButton"
            >
              Send Message
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

@endsection('content_website')