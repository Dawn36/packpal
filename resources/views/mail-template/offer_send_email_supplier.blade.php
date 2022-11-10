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
                            <strong>Dear {{ucwords($data['full_name'])}},</strong>
                        </div>
                        <div style="padding-bottom: 30px">You offer against the BID {{ucwords($data['bid_name'])}} has been sent to the buyer. You may CHAT with the buyer directly as well for any further concerns regarding the BID posted by clicking on the right side corner of the row.</div>
                        <div style="padding-bottom: 30px">You can check if the offer against the BID has been accepted or rejected by the buyer by going in your DASHBOARD and clicking on OFFERS. Use the search bar to search for the offer posted against a specific BID. Once an offer is accepted by the buyer, the BID will be moved to the In-Process section where you can still negotiate and send a re-offer BID to the buyer in our CHAT feature. When the deal is closed make sure to mark it COMPLETE and ask review from the buyer for other buyers to conduct business with confidence with you.</div>
                        <div style="padding-bottom: 30px">Make sure to check your emails and OFFERS section in your DASHBOARD for updates regarding your offers on posted BIDS.</div>
                        <div style="padding-bottom: 30px">We wish you best sourcing experience on PackPal.</div>
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