<form id="" class="form" method="POST" action="{{ route('subscribe_store') }}" enctype="multipart/form-data">
    @csrf
    <input hidden name='pak_month' value="{{$month}}"/>
<div class="custom-file">
    <input type="file" class="custom-file-input" id="document" name="document[]" multiple accept=".JPEG, .JPG , .PDF, .PNG"  required  onchange="uploadFileLimit()"/>
    <label class="custom-file-label" for="customFile"
      >Attach Payment Slip</label
    >
  </div>
  <div class="modal-footer" style="margin-right: -19px;">
    <button
      type="button"
      class="btn btn-secondary"
      data-dismiss="modal"
    >
      Close
    </button>
    <button type="submit" class="btn btn-primary">Upload</button>
  </div>
</form>
 <script>
  function uploadFileLimit()
    {
        var fileUpload = document.getElementById('document');
        for (let index = 0; index < fileUpload.files.length; index++) {
            var  fileType = fileUpload.files[index].type;
            var validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            if (!validImageTypes.includes(fileType)) {
                // invalid file type code goes here.
                alert("You are only allowed to upload these file extensions JPEG, JPG or PNG");
                fileUpload.value='';
            }
        }
        if (parseInt(fileUpload.files.length) > 2){
            alert("You are only allowed to upload a maximum of 2 files");
        fileUpload.value='';

        }
       
               
    }
  </script>