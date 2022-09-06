<form id="" class="form" method="POST" action="{{ route('subscribe_store') }}" enctype="multipart/form-data">
    @csrf
    <input hidden name='pak_month' value="{{$month}}"/>
<div class="custom-file">
    <input type="file" class="custom-file-input" name="document[]" multiple accept="image/*"  required/>
    <label class="custom-file-label" for="customFile"
      >Choose file</label
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
 