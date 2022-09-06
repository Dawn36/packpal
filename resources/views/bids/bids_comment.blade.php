<div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
    <div class="d-flex align-items-center flex-wrap gap-2">
        <!--begin::Heading-->
        <h2 class="fw-bold me-3 my-1">Reject by admin</h2>
        <!--begin::Heading-->
        <!--begin::Badges-->
        <span class="badge badge-light-danger my-1 me-2">reject</span>
        <!--end::Badges-->
    </div>

</div>
<div style="overflow: auto;height: 300px ;" id='aaaaaa'>
    @for ($i = 0; $i < count($comment); $i++) <!--end::Message accordion-->
        <div class="separator my-6"></div>
        <!--begin::Message accordion-->
        <div data-kt-inbox-message="message_wrapper">
            <!--begin::Message header-->
            <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                <!--begin::Author-->
                <div class="d-flex align-items-center">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50 me-4">
                        <span class="symbol-label" style="background-image:url({{asset('profile/'.$comment[$i]->user->profile_picture)}})"></span>
                    </div>
                    <!--end::Avatar-->
                    <div class="pe-5">
                        <!--begin::Author details-->
                        <div class="d-flex align-items-center flex-wrap gap-1">
                            <a href="#" class="fw-bolder text-dark text-hover-primary">{{ucwords($comment[$i]->user->first_name)}} {{ucwords($comment[$i]->user->last_name)}}</a>
                        </div>
                        <!--end::Author details-->
                        <!--begin::Message details-->
                        <div class="d-none" data-kt-inbox-message="details">

                        </div>
                        <!--end::Message details-->
                        <!--begin::Preview message-->
                        <div class="text-muted fw-bold mw-450px" data-kt-inbox-message="preview">{{substr(ucwords($comment[$i]->comment),0,40)}} ...</div>
                        <!--end::Preview message-->
                    </div>
                </div>
                <!--end::Author-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <!--begin::Date-->
                    <span class="fw-bold text-muted text-end me-3">{{DATE('Y-m-d h:i A',strtotime($comment[$i]->created_at))}}
                    </span>
                    <!--end::Date-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Message header-->
            <!--begin::Message content-->
            <div class="collapse fade" data-kt-inbox-message="message">
                <div class="py-5">
                    <p>{{ucwords($comment[$i]->comment)}}</p>
                </div>
            </div>
            <!--end::Message content-->
        </div>
        @endfor
</div>
<!--end::Message accordion-->
<div class="separator my-6"></div>
<!--begin::Form-->
@if(Auth::user()->hasRole('admin'))
<form id="kt_inbox_reply_form" class="rounded border mt-10" method="POST" action="{{ route('bid_comment_submit', $bidId) }}">
    @csrf

    <textarea name="comment" cols="30" rows="5" class="form-control form-control-solid" placeholder="Please share your text which you want to send" required></textarea>
    <div class="modal-footer flex-center">
        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">Send</button>
    </div>
</form>
@endif
<script>
    // window.scrollBy(100, 10000000000000);
    function updateScroll() {
        var element = document.getElementById("aaaaaa");
        element.scrollTop = element.scrollHeight;
        clearInterval(myInterval);
    }
    var myInterval = setInterval(updateScroll, 1000);
</script>
<script src="{{ asset('theme/assets/js/custom/apps/inbox/reply.js') }}" defer></script>