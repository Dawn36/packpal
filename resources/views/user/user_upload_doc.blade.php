<form id="" class="form" method="POST" action="{{ route('user_upload_doc') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="required fw-bold fs-6 mb-2">Any Utiltity Bill</label>
        <input type="file" id="utiltity_bill" name="utiltity_bill" class="form-control"  required="">
        <span class="form-text fs-6 text-danger">
            • Should be on the name of your company<br>
            • Should be not older then 3 months<br>
        </span>
    </div>
    <div class="form-group mt-3">
        <label class=" fw-bold fs-6 mb-2">Letter of Authorization</label>
        <input type="file" id="letter_of_authorization" name="letter_of_authorization" class="form-control"  >
        <span class="form-text fs-6 text-danger">
            • Needed in case of an Employee.<br>
            • Not needed in case of Director or Owner.<br>
        </span>
    </div>
    <div class="form-group mt-3">
        <label class=" fw-bold fs-6 mb-2">Visiting Card</label>
        <input type="file" id="visiting" name="visiting_card" class="form-control"  >
    </div>
    <div class="form-group mt-3">
        <label class=" fw-bold fs-6 mb-2">NTN Certificate</label>
        <input type="file" id="ntn_certificate" name="ntn_certificate" class="form-control"  >
    </div>
    
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Submit</button>
    </div>
</form>
<script>
    // document.getElementById("fileinput").addEventListener("change", function(evt) {
    //     //Retrieve the first (and only!) File from the FileList object
    //     var f = evt.target.files[0];
    //     if (f) {
    //         var r = new FileReader();
    //         r.onload = function(e) {
    //             var contents = e.target.result;
    //             alert("Got the file\n" +
    //                 "name: " + f.name + "\n" +
    //                 //"type: " + f.type + "\n" +
    //                 "size: " + f.size + " bytes\n"
    //                 //"starts with: " + contents.substr(1, contents.indexOf("\n"))
    //             );
    //             if (f.size > 5242880) {
    //                 alert('File size Greater then 5MB!');
    //                 document.getElementById("fileinput").value = '';
    //             }
    //         }
    //         r.readAsText(f);
    //     } else {
    //         alert("Failed to load file");
    //     }
    // })
</script>