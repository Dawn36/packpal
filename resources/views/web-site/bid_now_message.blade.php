
  @if($orderData[0]->status == 'offer')
  <div class="alert alert-success" role="alert">
  <p>Thank you for submitting your BID. The Buyer will now ACCEPT OR REJECT your BID. You can use our CHAT feature for further discussion with the buyer</p>
  </div>
  
  <div class="alert alert-danger" role="alert">
  <p>Kindly Note: Packpal only connect Buyers and Sellers and are not liable legally or non-legally for any mishaps in your business transactions</p>
  </div>
    @endif
    @if($orderData[0]->status == 'inprocess')
    <div class="alert alert-danger" role="alert">
    You have already made an offer on this bid and it is in In-process
  </div>
    @endif

 