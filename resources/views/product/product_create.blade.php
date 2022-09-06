<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Product Thumbnail</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/svg/files/blank-image.svg)">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-150px h-150px"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="product_thumbnail" accept=".png, .jpg, .jpeg" required />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                <!--end::Description-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->
        <!--begin::Status-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Status</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <div class="rounded-circle bg-success w-15px h-15px kt_ecommerce_add_product_status1" id=""></div>
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Select2-->
                <select name='status' id="" class="form-select mb-2 kt_ecommerce_add_product_status_select1" onchange="statusChange()" data-control="select2" data-hide-search="true" data-placeholder="Select an option" required>
                    <option value="active" selected="selected">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the product status.</div>
                <!--end::Description-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Status-->
        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>product Details</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0 pb-0">
                <label class="form-label required">Categories</label>
                <select class="form-control required form-control-lg form-control-solid" id='category_id' name="category_id" required onchange="getSubCategoryAjax()">
                    <option value="">Select category name</option>
                    @for ($i = 0; $i < count($categories); $i++) <option value="{{$categories[$i]->id}}">{{ucwords($categories[$i]->category_name)}}</option>
                        @endfor
                </select>
                <div class="text-muted fs-7 mb-7">Select the Category for your product.</div>
            </div>
            <div class="card-body pt-0 pb-0">
                <label class="form-label required">Sub-Categories</label>
                <select class="form-control  form-control-lg form-control-solid" id='sub_category_id' name="sub_category_id" required>
                    <option value=''>Select Sub-Categories</option>

                </select>
                <div class="text-muted fs-7 mb-7">Select the Sub-Category for your product.</div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category & tags-->
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">
                    <h2>General</h2>
                </a>
            </li>
            <!--end:::Tab item-->
        </ul>
        <!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">product Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="product_name" class="form-control mb-2" placeholder="product name" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Product name is required and recommended to be unique.</div>
                                <!--end::Description-->
                            </div>
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Location</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="location" class="form-control mb-2" placeholder="Location" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Location is required for product posting.</div>
                                <!--end::Description-->
                            </div>
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">City/ PostCode</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="city_post_code" class="form-control mb-2" placeholder="City/ PostCode" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">City/ PostCode is required and recommended to be unique.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Tel No.</label>
                                <input type="number" name="contact_no" class="form-control mb-2" placeholder="Tel No." value="" required />
                                <div class="text-muted fs-7">Tel No. is required and recommended to be unique.</div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="required form-label">Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea name='description' id='description' hidden></textarea>
                                <div name="kt_ecommerce_add_product_description" class="min-h-200px mb-2 kt_docs_quill_basic"></div>
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the product for better visibility.</div>
                                <!--end::Description-->
                            </div>

                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Media-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="required">Media</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row">
                                <input type="file" name="file[]" class="form-control mb-2" required multiple />
                            </div>
                        </div>

                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <!-- <div class="card-body pt-0">
                                <div class="fv-row mb-2">
                                    <div class="dropzone kt_ecommerce_add_product_media1" id="previewsContainer">
                                        <div class="dz-message needsclick">
                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                            <div class="ms-4">
                                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">
                                                    Drop files here or click to upload.</h3>
                                                <span class="fs-7 fw-bold text-gray-400">Upload
                                                    up to 10 files</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-muted fs-7">Set the product media gallery.
                                </div>
                            </div> -->
                    </div>
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Pricing</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Target Price</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="target_price" class="form-control mb-2" placeholder="product target price" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the product target price.</div>
                                <!--end::Description-->
                            </div>

                        </div>
                        <!--end::Card header-->
                    </div>

                </div>
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
            <!-- <a href="#" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a> -->
            <button type="submit" id="" class="btn btn-primary">
                <span class="indicator-label">Save Changes</span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>
<script>
    function getSubCategoryAjax() {

        var value = {
            categoryId: $('#category_id').val(),
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('sub_categories') }}",
            data: value,

            success: function(result) {
                if (result == 0) {
                    document.getElementById('sub_category_id').innerHTML =
                        '<option value=""> Select  sub-category  </option>';
                } else {
                    document.getElementById('sub_category_id').innerHTML =
                        '<option value=""> Select  sub-category  </option>';
                    for (var i = 0; i < result.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = result[i].id;
                        opt.innerHTML = result[i].sub_category_name;
                        document.getElementById('sub_category_id').appendChild(opt);
                    }
                }


            }
        });
    }
    var quill = new Quill('.kt_docs_quill_basic', {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Type your text here...',
        theme: 'snow' // or 'bubble'
    });
    quill.on('text-change', function() {
        document.getElementById("description").value = quill.root.innerHTML;
    });


    function statusChange() {
        if ($('.kt_ecommerce_add_product_status_select1').val() == 'active') {
            $('.kt_ecommerce_add_product_status1').addClass("bg-success");
        } else {
            $('.kt_ecommerce_add_product_status1').removeClass("bg-success");
        }
        if ($('.kt_ecommerce_add_product_status_select1').val() == 'inactive') {
            $('.kt_ecommerce_add_product_status1').addClass("bg-danger");
        } else {
            $('.kt_ecommerce_add_product_status1').removeClass("bg-danger");
        }

    }



    var KTImageInput = function(e, t) {
        var n = this;
        if (null != e) {
            var i = {},
                r = function() {
                    (n.options = KTUtil.deepExtend({}, i, t)),
                    (n.uid = KTUtil.getUniqueId("image-input")),
                    (n.element = e),
                    (n.inputElement = KTUtil.find(e, 'input[type="file"]')),
                    (n.wrapperElement = KTUtil.find(e, ".image-input-wrapper")),
                    (n.cancelElement = KTUtil.find(
                        e,
                        '[data-kt-image-input-action="cancel"]'
                    )),
                    (n.removeElement = KTUtil.find(
                        e,
                        '[data-kt-image-input-action="remove"]'
                    )),
                    (n.hiddenElement = KTUtil.find(e, 'input[type="hidden"]')),
                    (n.src = KTUtil.css(n.wrapperElement, "backgroundImage")),
                    n.element.setAttribute("data-kt-image-input", "true"),
                        o(),
                        KTUtil.data(n.element).set("image-input", n);
                },
                o = function() {
                    KTUtil.addEvent(n.inputElement, "change", a),
                        KTUtil.addEvent(n.cancelElement, "click", l),
                        KTUtil.addEvent(n.removeElement, "click", s);
                },
                a = function(e) {
                    if (
                        (e.preventDefault(),
                            null !== n.inputElement &&
                            n.inputElement.files &&
                            n.inputElement.files[0])
                    ) {
                        if (
                            !1 ===
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.change",
                                n
                            )
                        )
                            return;
                        var t = new FileReader();
                        (t.onload = function(e) {
                            KTUtil.css(
                                n.wrapperElement,
                                "background-image",
                                "url(" + e.target.result + ")"
                            );
                        }),
                        t.readAsDataURL(n.inputElement.files[0]),
                            n.element.classList.add("image-input-changed"),
                            n.element.classList.remove("image-input-empty"),
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.changed",
                                n
                            );
                    }
                },
                l = function(e) {
                    e.preventDefault(),
                        !1 !==
                        KTEventHandler.trigger(
                            n.element,
                            "kt.imageinput.cancel",
                            n
                        ) &&
                        (n.element.classList.remove("image-input-changed"),
                            n.element.classList.remove("image-input-empty"),
                            "none" === n.src ?
                            (KTUtil.css(
                                    n.wrapperElement,
                                    "background-image",
                                    ""
                                ),
                                n.element.classList.add("image-input-empty")) :
                            KTUtil.css(
                                n.wrapperElement,
                                "background-image",
                                n.src
                            ),
                            (n.inputElement.value = ""),
                            null !== n.hiddenElement &&
                            (n.hiddenElement.value = "0"),
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.canceled",
                                n
                            ));
                },
                s = function(e) {
                    e.preventDefault(),
                        !1 !==
                        KTEventHandler.trigger(
                            n.element,
                            "kt.imageinput.remove",
                            n
                        ) &&
                        (n.element.classList.remove("image-input-changed"),
                            n.element.classList.add("image-input-empty"),
                            KTUtil.css(
                                n.wrapperElement,
                                "background-image",
                                "none"
                            ),
                            (n.inputElement.value = ""),
                            null !== n.hiddenElement &&
                            (n.hiddenElement.value = "1"),
                            KTEventHandler.trigger(
                                n.element,
                                "kt.imageinput.removed",
                                n
                            ));
                };
            !0 === KTUtil.data(e).has("image-input") ?
                (n = KTUtil.data(e).get("image-input")) :
                r(),
                (n.getInputElement = function() {
                    return n.inputElement;
                }),
                (n.goElement = function() {
                    return n.element;
                }),
                (n.destroy = function() {
                    KTUtil.data(n.element).remove("image-input");
                }),
                (n.on = function(e, t) {
                    return KTEventHandler.on(n.element, e, t);
                }),
                (n.one = function(e, t) {
                    return KTEventHandler.one(n.element, e, t);
                }),
                (n.off = function(e) {
                    return KTEventHandler.off(n.element, e);
                }),
                (n.trigger = function(e, t) {
                    return KTEventHandler.trigger(n.element, e, t, n, t);
                });
        }
    };
    (KTImageInput.getInstance = function(e) {
        return null !== e && KTUtil.data(e).has("image-input") ?
            KTUtil.data(e).get("image-input") :
            null;
    }),
    (KTImageInput.createInstances = function(e = "[data-kt-image-input]") {
        var t = document.querySelectorAll(e);
        if (t && t.length > 0)
            for (var n = 0, i = t.length; n < i; n++) new KTImageInput(t[n]);
    }),
    (KTImageInput.init = function() {
        KTImageInput.createInstances();
    }),
    "loading" === document.readyState ?
        document.addEventListener("DOMContentLoaded", KTImageInput.init) :
        KTImageInput.init(),
        "undefined" != typeof module &&
        void 0 !== module.exports &&
        (module.exports = KTImageInput);
    document.getElementsByClassName('ql-image')[0].parentElement.remove();
</script>