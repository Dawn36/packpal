<form id="" class="form" method="POST" action="{{ route('sub_categories.update', $subCategories->id) }}">
    <!--begin::Scroll-->
    @method("PUT")
    @csrf
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row mb-7">
            <div class="col">
                <label class="required fw-bold fs-6 mb-2">Sub Category Name</label>
                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$subCategories->sub_category_name}}" name="sub_category_name" placeholder="Please Enter your Hand Name here.">
            </div>
        </div>
    </div>
    <div class="modal-footer flex-center">
        <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">Discard</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    <!--end::Scroll-->
</form>