@extends('layouts.main_website')

@section('content_website')
<div class="main-page py-5">
    <div class="container">
<div class="profile-card">
<div id="packagesTable" class="table-package">
    <h3>Compare Packages</h3>
    <table>
      <colgroup>
        <col />
        <col />
        <col />
        <col />
      </colgroup>
      <tbody>
        <tr class="package-type">
          <th>Package</th>
          <td>
            <p class="price">Rs.4000</p>
            <b class="type">Basic</b><b class="title">per month</b>
          </td>
          <td>
            <p class="price">Rs.23000</p>
            <b class="type">Standard</b
            ><b class="title">6 months</b>
          </td>
          <td>
            <p class="price">Rs.47000</p>
            <b class="type">Premium</b><b class="title">12 month</b>
          </td>
        </tr>
        <tr class="description">
          <th></th>
          <td>
            Introducing Bid System where seller will enter a bidding
            system after paying an amount on give credentials and
            select the package and upload payment image.
          </td>
          <td>
            Introducing Bid System where seller will enter a bidding
            system after paying an amount on give credentials and
            select the package and upload payment image.
          </td>
          <td>
            Introducing Bid System where seller will enter a bidding
            system after paying an amount on give credentials and
            select the package and upload payment image.
          </td>
        </tr>
       
        <tr class="select-package">
          <th>Total</th>
          <td>
            <p class="price-label">Rs.4000</p>
            <button type="button"  onclick="subscribe('1 month')">Select</button>
          </td>
          <td>
            <p class="price-label">Rs.23000</p>
            <button type="button"  onclick="subscribe('6 month')">Select</button>
          </td>
          <td>
            <p class="price-label">Rs.47000</p>
            <button type="button"  onclick="subscribe('12 month')">Select</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<script>
     function subscribe(month) {
    var value = {
           month: month,
        };
    $.ajax({
        type: 'GET',
        url: "{{ route('subscribe_modal') }}",
        data: value,
        success: function(result) {
            $('#websitemodaltitle').html('Add');
            $('#websitemodalbody').html(result);
            $('#exampleModalLong').modal('show');
        },
        error: function(jqXHR){
              if(jqXHR.status == '401')
              {
                let url = "{{ route('login') }}";
                document.location.href=url;
              }
        }
    });
}
</script>
@endsection('content_website')