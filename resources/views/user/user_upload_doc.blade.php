<form id="" class="form" method="POST" action="{{ route('user_upload_doc') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" id="fileinput" name="document[]" class="form-control" multiple required="">
        <span class="form-text fs-6 text-danger">
            <h5> Attachments for Verification:</h5>
            • Any Utility Bill:<br>
            • Should be on Company’s name<br>
            • Last 3 months<br>
            • Visiting Card<br>
            • NTN<br>
            • Should be on company’s name same as on utility bills.<br>
            • Letter of Authorization<br>
            • Needed in case of an employee<br>
            • Not needed in case of director or owner.<br>
            <h5> Review Verification:</h5>
            i. Through Call OR<br>
            ii. Through Physical visit<br>
            d. Verified tag and registration done.<br>
        </span>
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