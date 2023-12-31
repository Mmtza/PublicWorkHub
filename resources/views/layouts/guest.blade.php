<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Public Work Hub</title>
    <meta name="description" content="" />
    <meta name="keywords"
        content="publicworkhub, berita, loker, lowongan kerja, pengaduan masyarakat, pengaduan, situs berita, loker, masyarakat" />

    {{-- Icon web --}}
    <meta name="theme-color" content="#ffffff" />
    <link rel="icon" href="{{ asset('users/themes') }}/images/pwhlogo3.png" />
    <link rel="apple-touch-icon" href="{{ asset('users/themes') }}/images/pwhlogo3.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- laravel pwa manifest --}}
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('users/themes') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/tiny-slider.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/glightbox.min.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/style.css">

    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/flatpickr.min.css">
</head>

<body class="font-sans text-gray-900 antialiased">
    @include('layouts.guestnavbar')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
            <!-- Preloader -->
            <div id="overlayer"></div>
            <div class="loader">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <!-- Session Status -->
        </div>
    </div>

    <script src="{{ asset('users/themes') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('users/themes') }}/js/tiny-slider.js"></script>

    <script src="{{ asset('users/themes') }}/js/flatpickr.min.js"></script>


    <script src="{{ asset('users/themes') }}/js/aos.js"></script>
    <script src="{{ asset('users/themes') }}/js/glightbox.min.js"></script>
    <script src="{{ asset('users/themes') }}/js/navbar.js"></script>
    <script src="{{ asset('users/themes') }}/js/counter.js"></script>
    <script src="{{ asset('users/themes') }}/js/custom.js"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
</body>

</html>
