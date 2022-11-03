<form id="" class="form " method="POST" action="{{ route('order_update',$orderId) }}">
    @csrf
    <!--begin::Scroll-->
    <input hidden name='s_user_id' value="{{$sUserId}}"/>
    <input hidden name='b_user_id' value="{{$bUserId}}"/>
    <div class="row mb-7">
        <div class="col">
            <label class="required fw-bold fs-6 mb-2">Offer Price</label>
            <div class="input-group input-group-solid mb-5">
                <span class="input-group-text">PKR</span>
                <input type="number" min="0" name="offer_price" class="form-control" placeholder="Please Enter your Offer price here." required />
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
    <div class="modal-footer flex-center">
        <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">Discard</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!--end::Scroll-->
</form>