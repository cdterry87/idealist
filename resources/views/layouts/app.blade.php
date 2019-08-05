<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Idealist - Where great ideas come to light!</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @if (Auth::user() and Auth::user()->dark)
        <link href="{{ mix('css/dark.css') }}" rel="stylesheet">
    @endif
</head>
<body>
    @yield('content')

    <script src="{{ mix('js/bootstrap.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
