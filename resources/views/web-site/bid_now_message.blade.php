<div class="alert alert-danger" role="alert">
  @if($orderData[0]->status == 'offer')
    You have already made an offer on this bid
    @endif
    @if($orderData[0]->status == 'inprocess')
    You have already made an offer on this bid and it is in In-process
    @endif
  </div>

 