<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
    <h2>Mail Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('mail.settings.update') }}">
       @csrf

        @foreach(['host', 'port', 'username', 'password', 'encryption', 'from_address', 'from_name'] as $field)
            <div class="mb-3">
                <label class="form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                <input type="{{ $field === 'password' ? 'password' : 'text' }}"
                       name="{{ $field }}"
                       class="form-control"
                       value="{{ old($field, $setting->$field ?? '')}}">
        @endforeach

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>

</body>
</html>

