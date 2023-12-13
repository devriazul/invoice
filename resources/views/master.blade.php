<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @notifyCss
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{asset('/css/app.css')}}" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <title>Invoice</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <div class="container">
            @yield('content')
        </div>

        <x:notify-messages />
        @notifyJs
        @include('footer.footer')

        @stack('scripts')
    </body>
</html>
