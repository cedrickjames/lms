
<!DOCTYPE html>
<html>
<head>
<title>{{ $emailSubject }}</title>
</head>
<body>

<p>Dear {{ $loa->accountHolder }},</p>

<p>Reminder: Your LOA '<strong>{{ $loa->loa }}</strong>' has incomplete requirements. Please begin completing them to ensure smooth processing before the deadline of <strong>{{ $loa->deadlineOfCompletion }}</strong>.</p>

@if(count($pendingRequirements))
    <p>The following requirements are still marked as <strong>Pending</strong>:</p>
    <ul>
        @foreach($pendingRequirements as $requirement)
            <li>{{ $requirement }}</li>
        @endforeach
    </ul>
@else
    
@endif


<p><a href="{{ $link }}">Click here to sign in</a></p>

<p>Regards,<br>LOA Monitoring System</p>

</body>
</html>
