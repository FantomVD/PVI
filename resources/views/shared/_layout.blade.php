<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">
        @yield('styles')
    </head>
    <body class="">
        @include('partials.header')

        <div class="container-fluid pl-0 pr-0">
            @yield('content')
        </div>

        @include('partials.footer')

        <script src="/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
    </body>
</html>
