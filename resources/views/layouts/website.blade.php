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
    <!-- <style>
    /* Light Mode */
    body.light-mode {
        background-color: #ffffff !important;
        color: #000000 !important;
    }
    
    /* Dark Mode */
    body.dark-mode {
        background-color: #000000 !important;
        color: #ffffff !important;
    }
</style> -->
<style>.section-footer,
.section-footer * {
    background-color: #0A0A0A !important;
    color: #ffffff !important;
}

.section-footer a,
.section-footer .footer-list a,
.section-footer .contact-list a,
.section-footer .legal-link {
    color: #ffffff !important;
}</style>
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
  <!-- <script>
    // Theme Switch Functionality
console.log('Theme switcher loaded!');

document.addEventListener('DOMContentLoaded', function() {
    const themeSwitch = document.getElementById('themeSwitch');
    const themeIcon = document.getElementById('themeIcon');
    const body = document.body;
    
    // Load saved theme on page load
    const savedTheme = localStorage.getItem('theme') || 'light';
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        if (themeIcon) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }
    } else {
        body.classList.add('light-mode');
        if (themeIcon) {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    }
    
    // Theme switch click handler
    if (themeSwitch) {
        themeSwitch.addEventListener('click', function() {
            const isDark = body.classList.contains('dark-mode');
            
            if (isDark) {
                // Switch to light mode
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                localStorage.setItem('theme', 'light');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            } else {
                // Switch to dark mode
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        });
    }
});
  </script> -->

</body>
</html>
