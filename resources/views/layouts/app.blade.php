<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Public Work Hub') }}</title>
    <meta name="description" content="" />
    <meta name="keywords"
        content="publicworkhub, berita, loker, lowongan kerja, pengaduan masyarakat, pengaduan, situs berita, loker, masyarakat" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="apple-touch-icon" href="{{ asset('users/themes') }}/images/pwhlogo3.png">

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('users/themes') }}/images/pwhlogo3.png" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- laravel pwa manifest --}}
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const quilldeskripsidiri = new Quill('#quill_deskripsi_diri', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Color and background color
                    ['link'],
                    ['clean']
                ]
            },
        });

        quilldeskripsidiri.clipboard.dangerouslyPasteHTML(document.getElementById('deskripsi_diri_content').value);

        function sendDataDeskripsiDiri() {
            document.getElementById('deskripsi_diri_content').value = quilldeskripsidiri.root.innerHTML;
        }
    </script>
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
