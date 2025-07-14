
<!DOCTYPE html>
<html>
<head>
 <title>{{ $details['subject'] }}</title>
</head>
<body>

{{-- <p>THIS IS A TEST EMAIL ONLY. PLEASE DISREGARD</p> --}}
<p>Hi {{ $details['accountHolder'] }},</p>

<p>A Letter of Autority (LOA) has been filed under your name.</p>

<p><strong>Type of LOA:</strong> {{ $details['type'] }}</p>
<p><strong>Applied Quantity:</strong> {{ $details['appliedQty'] }}</p>

<p>Please ensure that all required documents are submitted before the deadline: <strong>{{ $details['deadline'] }}</strong>.</p>
<p><strong>Required Documents:</strong></p>
<ul>
    @foreach ($details['requiredDocs'] as $doc)
        <li>{{ $doc }}</li>
    @endforeach
</ul>

<p>You can sign in to the system to view the full details and track the status of your LOA:</p>

<p><a href="{{ $details['link'] }}">Click here to sign in</a></p>

<p>Thank you!</p>

</body>
</html>
