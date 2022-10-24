<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1"><img src="{{ asset('theme/website-assets/images/logo-5.png')}}" style="width: 60px;" /></span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Contact Support at : <b style="color: #4e4d4d;">customercare@packpal.pk</b></a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->

<!--end::Drawers-->
<!--end::Main-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>

<script>
    var hostUrl = "assets/";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_ACCESS_KEY')}}&callback=initAutocomplete&libraries=places&v=weekly" async></script>

<script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js') }}"></script>
<!-- <script src="{{ asset('theme/assets/js/custom/apps/inbox/reply.js') }}"></script> -->
<!-- <script src="{{ asset('theme/assets/js/custom/apps/chat/chat.js') }}"></script> -->
<!--begin::Page Custom Javascript(used by this page)-->

<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/documentation.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/search.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/select2.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/general/fullcalendar/basic.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/editors/quill/basic.js') }}"></script>
<script src="{{ asset('theme/assets/custom/customjs.js') }}"></script>
<script src="{{ asset('theme/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<!-- <script src="{{ asset('theme/assets/js/custom/apps/inbox/reply.js') }}"></script> -->
<!-- <script src="{{ asset('theme/assets/js/custom/apps/chat/chat.js') }}"></script> -->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('theme/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/signin-methods.js') }}"></script>

<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/documentation.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/search.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom/select2.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_ACCESS_KEY')}}&callback=myMap"></script>

<script src="{{ asset('theme/assets/js/custom/documentation/editors/quill/basic.js') }}"></script>
{{-- <!-- <script src="{{ asset('theme/assets/custom/customjs.js"></script> --> --}}
<!--end::Page Custom Javascript-->

<script>
    function addBids() {
        $.ajax({
            type: 'GET',
            url: "{{ route('bids.create') }}",

            success: function(result) {
                $('#myModalXlHeading').html('Add a Bids');
                $('#modalBodyXl').html(result);
                $('#myModalXl').modal('show');
            }
        });
    }
    // $("#kt_datatable_example_1").DataTable();
    $(document).ready(function() {
        // 
        var table = $('.kt_datatable_example_1').DataTable();
        $('#search').on('keyup', function() {
            table.search(this.value).draw();
        });

        $(".kt_datepicker_2").flatpickr();


        $(".kt_datepicker_3").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d ",
        });
        $(".kt_datepicker_8").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        });
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    });
</script>

</body>
<!--end::Body-->

</html>