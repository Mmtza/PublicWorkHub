<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords"
        content="publicworkhub, berita, loker, lowongan kerja, pengaduan masyarakat, pengaduan, situs berita, loker, masyarakat" />
    <link rel="icon" href="{{ asset('users/themes') }}/images/pwhlogo3.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('users/themes') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/tiny-slider.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/glightbox.min.css">
    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/style.css">

    <link rel="stylesheet" href="{{ asset('users/themes') }}/css/flatpickr.min.css">

    {{-- Axios CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>

    <title>Public Work Hub</title>
</head>

<body>
    @include('sweetalert::alert')
    {{-- header --}}
    @include('users.layout.navbar')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('users.layout.footer')


    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- laravel pwa --}}
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
