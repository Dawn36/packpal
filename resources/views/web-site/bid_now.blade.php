<form id="" class="form" method="POST" action="{{ route('bid_now') }}" >
    @csrf
    <input hidden name='bid_id' value="{{$bidId}}"/>
    <input hidden name='user_id' value="{{$userId}}"/>
    <input hidden name='cat_id' value="{{$catId}}"/>
    <input hidden name='sub_cat_id' value="{{$subCatId}}"/>
    <div class="form-group">
        <label for="formGroupExampleInput">Bid</label>
        <input
          type="number"
          min="0"
          class="form-control"
          id="formGroupExampleInput"
          name='offer'
          placeholder="Place your bid here"
          required
        />
      </div>
  <div class="modal-footer" style="margin-right: -19px;">
    <button
      type="button"
      class="btn btn-secondary"
      data-dismiss="modal"
    >
      Close
    </button>
    <button type="submit" class="btn btn-primary">submit</button>
  </div>
</form>
 