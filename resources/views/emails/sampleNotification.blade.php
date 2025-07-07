
<!DOCTYPE html>
<html>
<head>
<title>{{ $emailSubject }}</title>
</head>
<body>

<p>Dear {{ $loa->accountHolder }},</p>

<p>Your LOA <strong>{{ $loa->loa }}</strong> with a deadline of <strong>{{ $loa->deadlineOfCompletion }}</strong> is now overdue.</p>

@if(count($pendingRequirements))
    <p>The following requirements are still marked as <strong>Pending</strong>:</p>
    <ul>
        @foreach($pendingRequirements as $requirement)
            <li>{{ $requirement }}</li>
        @endforeach
    </ul>
@else
   
@endif

<p>Please take action as soon as possible.</p>

<p><a href="{{ $link }}">Click here to sign in</a></p>

<p>Regards,<br>LOA Monitoring System</p>

</body>
</html>
