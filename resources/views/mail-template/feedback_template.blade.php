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
                        <div style="padding-bottom: 30px; font-size: 17px;">
                            <strong>Dear The PackPal Team,</strong>
                        </div>
                        <div style="padding-bottom: 30px">My name is <b>{{$data['full_name']}}</b> and my company name is <b>{{$data['company_name']}} and my phone number is <b>{{$data['phone_number']}} and my email is <b>{{$data['email']}}</b></div>
                        <div style="padding-bottom: 30px">{{$data['message']}}</div>
                        <div style="padding-bottom: 30px">Best Regards,
                            <br>{{$data['full_name']}},
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
