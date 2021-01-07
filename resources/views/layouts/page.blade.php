<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <title> @yield('page_title') </title>

    <!--<link rel="stylesheet" href="/css/index.css" type="text/css">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <!-- Content here -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

@yield('inline_scripts')


</body>

</html>
