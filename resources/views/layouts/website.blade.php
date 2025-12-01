<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Stradigtech')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <!-- Header / Navbar -->
    @include('user.share.header')

    <!--search overlay-->
    @include('user.share.search-form')


    <!-- Sidebar -->
    @include('user.share.sidebar')



    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('user.share.footer')

    <!-- JS -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
