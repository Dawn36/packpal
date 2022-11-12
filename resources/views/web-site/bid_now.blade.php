<form id="bid_form" class="form" method="POST" action="{{ route('bid_now') }}" >
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
    <button type="button" onclick="bidNowSubmit()" class="btn btn-primary">submit</button>
  </div>
</form>
 <script>
      function bidNowSubmit() {
        
        $.ajax({
                url: $("#bid_form").attr('action'),
                method: 'POST',
                data: $('#bid_form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
            success: function(result) {
              $('#websitemodaltitle').html('Thank You! your BID has been placed');
                $('#websitemodalbody').html('<div class="alert alert-success" role="alert"><p>Thank you! for submitting your BID. The Buyer will now ACCEPT OR REJECT your BID. You can use our CHAT feature for further discussion with the buyer</p></div><div class="alert alert-danger" role="alert"><p>Kindly Note: Packpal only connect Buyers and Sellers and are not liable legally or non-legally for any mishaps in your business transactions</p></div>');
                $('#exampleModalLong').modal('show');
            }
        });
    }
  </script>