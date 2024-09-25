<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png" type="image/png') }}" />
    @include('backend.layouts.partial.css')
    <title>@yield('title')</title>
    @stack('css')
</head>

<body>
    <div class="wrapper">

        @include('backend.layouts.partial.sidebar')
        @include('backend.layouts.partial.header')

        <div class="page-wrapper">
            @yield('content')
        </div>

        @include('backend.layouts.partial.footer')

    </div>

    @include('backend.layouts.partial.js')
    @stack('js')

</body>

</html>
