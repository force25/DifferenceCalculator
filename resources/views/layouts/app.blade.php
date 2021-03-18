<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{config('app.name','Difference-Calculator')}}</title>
    </head>
    <body class="antialiased">
        @include('inc.navbar')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
