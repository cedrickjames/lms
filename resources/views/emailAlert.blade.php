<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>Approaching the Deadline</title>
</head>

<body>
     <div class="container mt-5">
        <div class="alert alert-success">
            {{ $message }}
         </div>
     </div>
</body>

</html>
