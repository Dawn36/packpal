<footer class="bg-white">
    <div class="container">
      <div class="d-flex justify-content-between">
        <div class="footer-list">
          <h2>Categories</h2>

          @for ($i = 0; $i < count($categories); $i++)
          <ul class="list">
            <li><a href="{{route('bid_listing',['category_id'=>$categories[$i]->id])}}">{{ucwords($categories[$i]->category_name)}}</li>
          </ul>
          @endfor
        </div>
        <div class="footer-list">
          <h2>About</h2>
          <ul class="list">
            <li><a href="{{route('about')}}">About Us</a></li>
            {{-- <li><a href="{{route('about')}}">Press &amp; News</a></li> --}}
            <li><a href="{{route('about')}}">Sell With Us</a></li>
            <li><a href="{{route('about')}}">How to Source Packaging</a></li>
            <li><a href="{{route('feed_back')}}">Your Feedback</a></li>
            <li><a href="{{route('about')}}">Contact Us</a></li>
            <li>
              <a href="{{route('about')}}" target="_blank">Advertise With Us</a>
            </li>
            <li>
              <a href="{{route('about')}}" target="_blank">Privacy Policy</a>
            </li>
            <li>
              <a href="{{route('about')}}" target="_blank">Terms of Use</a>
            </li>
          </ul>
        </div>
        <div class="footer-list">
          <h2>Support</h2>
          <ul class="list">
            <li><a href="{{route('feed_back')}}">Help &amp; Support</a></li>
            <li><a href="{{route('feed_back')}}">Trust &amp; Safety</a></li>
            <li><a href="{{route('feed_back')}}">Selling on Miver </a></li>
            <li><a href="{{route('feed_back')}}">Buying on Miver </a></li>
          </ul>
        </div>
        <div class="footer-list">
          <h2>Community</h2>
          <ul class="list">
            <li><a href="#">Events</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">Community Standards</a></li>
            <li><a href="#">Podcast</a></li>
            <li><a href="#">Affiliates</a></li>
            <li><a href="#">Invite a Friend</a></li>
            <li><a href="#">Become a Seller</a></li>
            <li>
              <a href="#">Miver Elevate<small>Exclusive Benefits</small></a>
            </li>
          </ul>
        </div>
        <div class="footer-list">
          <h2>More From Miver</h2>
          <ul class="list">
            <li><a href="#">Miver Pro</a></li>
            <li><a href="#">Miver Studios</a></li>
            <li><a href="#">Miver Logo Maker</a></li>
            <li><a href="#">Get Inspired</a></li>
            <li>
              <a href="#">ClearVoice<small>Content Marketing</small></a>
            </li>
            <li>
              <a href="#">AND CO<small>Invoice Software</small></a>
            </li>
            <li>
              <a href="#">Learn<small>Online Courses</small></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        <div class="logo">
          <a href="/">
            <img src="{{ asset('theme/website-assets/images/logo-5.png')}}" />
          </a>
        </div>
        <p>Contact Support at : <b style="color: #4e4d4d;">customercare@packpal.pk</b></p>
        <ul class="social">
          <li>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="#"
              ><i class="fa fa-pinterest-p" aria-hidden="true"></i
            ></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
  <script src="{{ asset('theme/website-assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('theme/website-assets/vendor/slick-master/slick/slick.js')}}"></script>

  <script src="{{ asset('theme/website-assets/js/custom.js')}}"></script>
  <script src="{{ asset('theme/website-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ asset('theme/website-assets/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{ asset('theme/website-assets/js/contact_me.js')}}"></script>
  @if(Route::currentRouteName() == 'bid_detail')
  <script src="{{ asset('theme/website-assets/vendor/lightgallery-master/dist/js/lightgallery-all.min.js')}}" ></script> 
  @endif
  <script src="{{ asset('theme/website-assets/scripts/parallax.min.js')}}"></script>
  {{-- <script src="{{ asset('theme/website-assets/vendor/select2/js/select2.min.js')}}"></script> --}}
  <script>
    $(window).on("load", function () {
      $(".msps-shapes").addClass("shapes-animation");
    });
  </script>
  <script>
    const parent = document.getElementById("scene");
    const parallax = new Parallax(parent, {
      limitX: 50,
      limitY: 50,
    });
    $(".single-item").slick({
      autoplay: true,
      autoplaySpeed: 2000,
    });
    $(".msps-slider").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 5000,
      speed: 1000,
      fade: true,
      cssEase: "linear",
    });
    function bidNNow(bidId,userId,catId,subCatId)
    {
      var value = {
        bidId: bidId,
        userId: userId,
        catId: catId,
        subCatId: subCatId,
            };
        $.ajax({
            type: 'GET',
            url: "{{ route('bid_now') }}",
            data: value,
            success: function(result) {
                $('#websitemodaltitle').html('Place your bid');
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
        //Call back function
     
    }
    function viewSupplierDetails(userId,catId)
{
  url="{{route('supplier_detail',['userId'=>':userId:','catId'=>':catId:'])}}"; 
  url = url.replace(':userId:', userId);
  url = url.replace(':catId:', catId);
  document.location.href=url;
}
  </script>

  <!-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"73c555c5ae11b764","version":"2022.8.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script> -->
</body>

<!-- Mirrored from askbootstrap.com/preview/miver/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Aug 2022 21:00:09 GMT -->
</html>
