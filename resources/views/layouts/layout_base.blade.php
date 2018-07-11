<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container">

            @if (session('Msg'))
            <div id="notificacao" class="notification {{ session('notification_status') }} displayNone">
                <span class="title">{{ session('notification_status') }} </span> {{ session('Msg') }}         
            </div>       
            @endif

            <hr>
            <h1><i class="fa fa-check"></i> Tasklist</h1>
            <hr>
            @yield('content')
        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</html>



