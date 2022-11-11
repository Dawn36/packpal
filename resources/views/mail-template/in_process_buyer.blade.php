<style>
    html,
    body {
        padding: 0;
        margin: 0;
    }
</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7;
background-image: url('{{ asset('theme/assets/media/logos/bg5.jpg')}}');background-repeat: no-repeat;
background-attachment: fixed;  
background-size: cover;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="center" style="text-align:center; padding: 40px">
                    <a href="{{env('URL')}}" rel="noopener" target="_blank">
                        <img alt="Logo" style="width: 40%;" src="{{ asset('theme/assets/media/logos/logo-5.png')}}" />
                    </a>
                </td>
            </tr>
            <tr>
                <td align="left" valign="center">
                    <div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 43px;">
                        <!--begin:Email content-->
                        <div style="padding-bottom: 30px; font-size: 17px;">
                            <strong>Dear <b>{{ucwords($data['full_name'])}}</b>,</strong>
                        </div>
                        <div style="padding-bottom: 30px">You accepted the offer of the Supplier shared on your BID <b>{{ucwords($data['bid_name'])}}</b> You can still use our <b>CHAT</b> feature to talk to the buyer directly.</div>
                        <div style="padding-bottom: 30px">You can check the status of your BID by going in your <b>DASHBOARD</b> and clicking on <b>OFFERS</b>. Now, click on the <b>In-Process</b> section where you can still reject the accepted offer in case satisfaction is not met with the supplier. In case of this rejection the other offers received from other suppliers will be live again and you can select other supplier from the list. When the deal is closed make sure to mark it <b>COMPLETE</b> and review the supplier for other buyers to conduct business with confidence.</div>
                        <div style="padding-bottom: 30px">We wish you best sourcing experience on <b>PackPal</b>.</div>
                        <!-- <div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>
                        <div style="padding-bottom: 50px; word-wrap: break-all;">
                            <p style="margin-bottom: 10px;">Button not working? Try pasting this URL into your browser:</p>
                            <a href="https://keenthemes.com/password/reset/07579ae29b6?email=max%40kt.com" rel="noopener" target="_blank" style="text-decoration:none;color: #009EF7">https://keenthemes.com/account/password/reset/07579ae29b6?email=max%40kt.com</a>
                        </div> -->
                        <!--end:Email content-->
                        <div style="padding-bottom: 30px">Best Regards,
                            <br>The PackPal Team,
                            <!-- <tr>
                                <td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                                    <p>Floor 5, 450 Avenue of the Red Field, SF, 10050, USA.</p>
                                    <p>Copyright ©
                                        <a href="https://keenthemes.com" rel="noopener" target="_blank">Keenthemes</a>.</p>
                                </td>
                            </tr> -->
                            </br>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

{{-- <p>Dear {{ucwords($data['full_name'])}},<br>
    Your password is reset and your new password is {{$data['new_password']}}.
    </p> --}}