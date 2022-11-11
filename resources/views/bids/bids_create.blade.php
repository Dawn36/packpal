<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="POST" action="{{ route('bids.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="required">Bid Thumbnail</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('theme/assets/media/svg/files/blank-image.svg')}})">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-150px h-150px"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" id="bid_thumbnail" name="bid_thumbnail" accept=".png, .jpg, .jpeg" required />
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
                <div class="text-muted fs-7">Set the Bid thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
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
                <div class="text-muted fs-7">Set the Bid status.</div>
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
                    <h2>Bid Details</h2>
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
                <div class="text-muted fs-7 mb-7">Select the Category for your Bid.</div>
            </div>
            <div class="card-body pt-0 pb-0">
                <label class="form-label required">Sub-Categories</label>
                <select class="form-control  form-control-lg form-control-solid" id='sub_category_id' name="sub_category_id" required>
                    <option value=''>Select Sub-Categories</option>

                </select>
                <div class="text-muted fs-7 mb-7">Select the Sub-Category for your Bid.</div>
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
                                <label class="required form-label">Bid Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="bids_name" class="form-control mb-2" placeholder="Bid name" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Bid name is required and recommended to be unique.</div>
                                <!--end::Description-->
                            </div>
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">FULL ADDRESS</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="location" class="form-control mb-2" placeholder="FULL ADDRESS" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">FULL ADDRESS is required for Bid posting.</div>
                                <!--end::Description-->
                            </div>
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">City/PostCode</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="city_post_code" class="form-control mb-2" placeholder="City/PostCode" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">City/ PostCode is required and recommended to be unique.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Tel No.</label>
                                <input type="number" min="0" name="contact_no" class="form-control mb-2" placeholder="Tel No." value="" required />
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
                                <div class="text-muted fs-7">Set a description to the bid for better visibility.</div>
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
                            <a href="#" class="btn btn-sm btn-icon btn-primary" style="background-color: #009ef7; margin-right: 1px;" onclick="appendDiv(this)"><span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
                                </svg></span></a>
                        </div>
                        <div class="card-body pt-0">
                            <div id='newDiv' class="row ">
                            <div class="mb-10  col-lg-11">
                                <input id='media' accept=".jpeg,.png,.jpg" type="file" name="file[]" class="form-control mb-2" required   />
                                <div class="text-muted fs-7">Attach only 5 Pictures’ in JPEG, JPG or PNG.</div>
                            </div>
                            <div class="mb-10  col-lg-1" style="display: none">
                                <a href="#" class="btn btn-sm btn-icon btn-primary" onclick="removeDiv(this)"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
                                    </svg></span></a>
                            </div>
                            </div>

                            <div id="appenddiv"></div>
                            
                        </div>
                        

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
                                <input type="number" min="0" name="target_price" class="form-control mb-2" placeholder="bid target price" value="" required />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the bid target price.</div>
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
            <button type="submit" id="" class="btn btn-primary" onclick="change()">
                <span class="indicator-label">Save Changes</span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>
<script>
    function change()
    {
        if($('#bid_thumbnail').val() == '')
        {
            alert('Please upload bid thumbnail');
        }
    }
    function removeDiv(obj)
    {
        obj.parentElement.parentElement.remove()
        i--;
    }
    var i=0;
    function appendDiv(obj)
    {
        if(i== 4)
        {
            alert('Attach only 5 Pictures’ in JPEG, JPG or PNG');
            return false;
        }
        ids=obj.parentElement.parentElement.children[1].children[0].id
        aa=$('#'+ids).clone();
        aa[0].children[1].style.display='block';
        aa[0].id='';
        aa[0].children[0].children[0].value='';
        aa.appendTo("#appenddiv");
        i++;


    }
    // function uploadFileLimit()
    // {
    //     var fileUpload = document.get('media');
    //     for (let index = 0; index < fileUpload.files.length; index++) {
    //         var  fileType = fileUpload.files[index].type;
    //         var validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
    //         if (!validImageTypes.includes(fileType)) {
    //             // invalid file type code goes here.
    //             alert("You are only allowed to upload these file extensions JPEG, JPG or PNG");
    //             fileUpload.value='';
    //         }
    //     }
       

    //     if (parseInt(fileUpload.files.length) > 5){
    //         alert("You are only allowed to upload a maximum of 5 files");
    //     fileUpload.value='';

    //     }
               
    // }

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