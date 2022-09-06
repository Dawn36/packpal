$(document).ready(function() {
    // Datatables
    var table = $('.kt_datatable_example_1').DataTable();
    $('#search').on('keyup', function() {
        table.search(this.value).draw();
    });

    // With Export buttons
    // var table = $('.kt_datatable_example_1').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
    // $('#search').on('keyup', function() {
    //     table.search(this.value).draw();
    // });

    // Quill Summernote
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
    var quill = new Quill('.kt_docs_quill_basic1', {
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

    // Active and Inactive status
    $('.kt_ecommerce_add_product_status_select').change(function() {
        if ($('.kt_ecommerce_add_product_status_select').val() == 'active') {
            $('.kt_ecommerce_add_product_status').addClass("bg-success");
        } else {
            $('.kt_ecommerce_add_product_status').removeClass("bg-success");
        }
        if ($('.kt_ecommerce_add_product_status_select').val() == 'inactive') {
            $('.kt_ecommerce_add_product_status').addClass("bg-danger");
        } else {
            $('.kt_ecommerce_add_product_status').removeClass("bg-danger");
        }
    });
    $('.kt_ecommerce_add_product_status_select1').change(function() {
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
    });

    // DropZone
    new Dropzone(".kt_ecommerce_add_product_media", {
        url: "https://keenthemes.com/scripts/void.php",
        paramName: "file",
        maxFiles: 10,
        maxFilesize: 10,
        addRemoveLinks: !0,
    });
    new Dropzone(".kt_ecommerce_add_product_media1", {
        url: "https://keenthemes.com/scripts/void.php",
        paramName: "file",
        maxFiles: 10,
        maxFilesize: 10,
        addRemoveLinks: !0,
    });

    // Date and Time Picker
    // -- Date Picker
    $(".kt_datepicker_2").flatpickr();

    // -- Date & Time Picker
    $(".kt_datepicker_3").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    // -- Time Picker
    $(".kt_datepicker_8").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });

    // Select2
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    // Scripts
    // $('#payment_method').change(function() {
    //     if ($('#payment_method').val() == 'Cash') {
    //         $('#cash_box').show('slow');
    //     } else {
    //         $('#cash_box').hide('slow');
    //     }
    //     if ($('#payment_method').val() == 'Credit Card') {
    //         $('#credit_card_box').show('slow');
    //     } else {
    //         $('#credit_card_box').hide('slow');
    //     }
    //     if ($('#payment_method').val() == 'Cheque') {
    //         $('#cheque_box').show('slow');
    //     } else {
    //         $('#cheque_box').hide('slow');
    //     }
    // });
});