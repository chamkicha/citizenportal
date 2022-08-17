@component('mail::message')
 
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="min-width:100%" width="100%">
    <tbody><tr>
     <td align="center" height="100%" style="background-color:#003580" width="100%">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="max-width:640px" width="100%">
       <tbody><tr>
        <td style="padding:0px 8px">
         <table align="left" border="0" cellpadding="0" cellspacing="0" class="m_-5107434996293178018m-fw m_-5107434996293178018m-no-max-width" role="presentation" style="max-width:144px">
          <tbody><tr>
           <td class="m_-5107434996293178018m-centeralign" style="padding:22px 0 0 0"><a href="https://www.booking.com/index.en-gb.html?aid=332731;conf_email_logo=1&amp;" style="display:inline-block;font-family:Arial,Helvetica,sans-serif;font-size:22px;color:#ffffff;font-weight:600;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.booking.com/index.en-gb.html?aid%3D332731;conf_email_logo%3D1%26&amp;source=gmail&amp;ust=1656344292577000&amp;usg=AOvVaw3hCoCycHrr681NbZC31G2d">
                <img alt="Booking.com" border="0" class="m_-5107434996293178018logo_mob CToWUd" height="24" src="{{ url('http://chamkicha.co.tz/booking.png')}}" style="display:block" width="144" data-image-whitelisted="">
                </a>
            </td>
          </tr>
          <tr>
           <td class="m_-5107434996293178018m-hide" height="22"><img alt="" border="0" height="22" src="https://mail.google.com/mail/u/0?ui=2&amp;ik=96b68270f8&amp;attid=0.1.2&amp;permmsgid=msg-f:1727113631139583303&amp;th=17f7f0b266cf5547&amp;view=fimg&amp;fur=ip&amp;sz=s0-l75-ft&amp;attbid=ANGjdJ9Oxs11o2gJ8TWx0YIjVZ11p3sCrUe5L0F-BXm8QCnS-5I9ip7LzwXmVm0JXIu50pjEJRpNYQvwQzKLUkbYUdyU_uloGPapvk20C0QQkojzXRg_N-Ehew0dnGk&amp;disp=emb" width="1" data-image-whitelisted="" class="CToWUd"></td>
          </tr>
         </tbody></table>
         <table align="right" border="0" cellpadding="0" cellspacing="0" class="m_-5107434996293178018m-fw m_-5107434996293178018m-no-max-width" role="presentation" style="max-width:480px">
          <tbody><tr>
           <td align="right" style="padding:16px">
            <table border="0" cellpadding="0" cellspacing="0" class="m_-5107434996293178018m-fw" role="presentation">
             <tbody><tr>
              <td class="m_-5107434996293178018m-centeralign" style="font-size:14px;line-height:20px;font-weight:normal;font-family:BlinkMacSystemFont,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;color:#ffffff">
                Reservation Number: <strong>{{$body['reservation_no']}}</strong><br>
              </td>
             </tr>
            </tbody></table>
           </td>
          </tr>
         </tbody></table>
        </td>
       </tr>
      </tbody></table>
     </td>
    </tr>
    <tr>
     <td height="24">
     </td>
    </tr>
   </tbody>
</table>



<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="max-width:640px" width="100%">
    <tbody>
    <tr>
     <td align="left" style="padding:0 8px">
       <h1 style="font-size:24px;line-height:32px;font-weight:bold;font-family:BlinkMacSystemFont,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;color:#333333;margin:0">
        Thanks {{ $body['full_name']}} !
        For Staying with us.
        </h1>
     </td>
    </tr>

   </tbody>
</table>

<br>

<table>
  <tbody>
      <tr>
          <td class="py-1">Check-in:</td>
          <td class="py-1"><strong>{!! \Carbon\Carbon::parse($body['check_in'])->format('d-M-y') !!}</strong></td>
      </tr>
      <tr>
          <td class="py-1">Check-out:</td>
          <td class="py-1"><strong>{!! \Carbon\Carbon::parse($body['check_out'])->format('d-M-y') !!}</strong></td>
      </tr>
      <tr>
          <td class="py-1">Your reservation:</td>
          <td class="py-1"><strong>{{ $body['days']}}</strong> night</td>
      </tr>
      <tr>
          <td class="py-1">Aduld:</td>
          <td class="py-1"><strong>{{ $body['adult']}}</strong> adults</td>
      </tr>
  </tbody>
</table>

<br>---------------------------<br>

<table>
  <tbody>
      <tr>
          <td class="py-1">Price:</td>
          <td class="py-1"><strong>{{ $body['amount']}}</strong></td>
      </tr>
      <tr>
          <td class="py-1">Paid Amount:</td>
          <td class="py-1"><strong>{{ $body['paid_amount']}}</strong></td>
      </tr>
      <tr>
          <td class="py-1">Your reservation:</td>
          <td class="py-1"><strong>{{ $body['days']}}</strong> night</td>
      </tr>
      <tr>
          <td class="py-1">Aduld:</td>
          <td class="py-1"><strong>{{ $body['adult']}}</strong> adults</td>
      </tr>
  </tbody>
</table>

<br>---------------------------<br>

{{-- 
@component('mail::button', ['url' => '/'])
View more
@endcomponent --}}

Thanks,<br>
Bulyanhulu.
@endcomponent
