Hello {{$email_data['name']}}
<br><br>
Welcome to our Website!
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="{{\URL::to('/')}}/api/coachs/verify?code={{$email_data['verification_code']}}">Click Here!</a>
<br><br>
Thank you!
<br>
KSA Boxing Federation
