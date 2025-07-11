
<!DOCTYPE html>
<html>
<head>
 <title>{{ $details['subject'] }}</title>
</head>
<body>

{{-- <p>THIS IS A TEST EMAIL ONLY. PLEASE DISREGARD</p> --}}
<p>Hi {{$details['recepient']}},</p>

<p>{{ $details['body'] }}</p>



<p>You can sign in to the system to view the full details and track the status of LOA</p>

<p><a href="{{ $details['link'] }}">Click here to sign in</a></p>

<p>Thank you!</p>

</body>
</html>
