@extends('users.layout.template')

@section('title', 'PWH | Home')

@section('content')
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @php
                    $originalString = htmlspecialchars_decode($berita->isi);
                    $maxCharacters = 25;
                    $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                @endphp
                <div class="col-md-9">
                    <div class="text-start mb-5">
                        <a href="{{ route('landing') }}" class="btn btn-warning">Back to Berita</a>
                    </div>
                    <h1 class="text-dark mb-5 text-center">{{ ucfirst($berita->judul) }}</h1>
                    @if ($berita->img)
                        <figure class="text-center mb-4">
                            <img src="{{ asset('assets/berita/images/' . $berita->img) }}" alt="Gambar" style="width: 50%">
                        </figure>
                    @endif
                    <div class="text-center">
                        <span>Ditulis oleh {{ $publisherName }}</span>
                    </div>
                    <div class="text-center mb-2">
                        <span
                            class="date">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                    </div>
                    <div class="p-5 border-3 rounded-3 border-secondary shadow-lg" style="border-style: outset">
                        {!! $berita->isi !!}

                    </div>
                    {{-- Like, Comment, and Share --}}
                    <div class="row mt-2 ms-2">
                        <div class="ul d-flex gap-4 fs-4">
                            <!-- Add an ID to the link for easy selection -->
                            @if ($likeByUser === true)
                                <a id="likeButton" data-liked="true" style="cursor: pointer">
                                    <i id="icon" class="fa-solid fa-heart text-danger"></i>
                                </a>
                            @else
                                <a id="likeButton" data-liked="false" style="cursor: pointer">
                                    <i id="icon" class="fa-regular fa-heart text-danger"></i>
                                </a>
                            @endif
                            {{-- <button id="likeButton">
                                <i class="fa-regular fa-heart text-danger"></i>
                            </button> --}}
                            <span id="likeCount" class="text-primary">{{ $likeCount }}</span>

                            @auth
                                <script>
                                    // Your JavaScript file or inline script
                                    document.getElementById('likeButton').addEventListener('click', function() {
                                        var likeButton = document.getElementById('likeButton');
                                        var isLiked = likeButton.getAttribute('data-liked');
                                        // Get the element by ID
                                        var iElement = document.getElementById('icon');

                                        axios.post("{{ route('all.berita.like.toggle', $berita->id) }}")
                                            .then(function(response) {
                                                if (response.data.success) {
                                                    // Assuming you have an element with id 'likeCount' to display the like count
                                                    var likeCountElement = document.getElementById('likeCount');
                                                    likeCountElement.innerText = response.data.likeCount;

                                                    // Change the button text and data-liked attribute based on the current state
                                                    if (isLiked === 'true') {
                                                        // Set the class (replace existing classes)
                                                        iElement.className = 'fa-regular fa-heart text-danger';
                                                        likeButton.setAttribute('data-liked', 'false');
                                                    } else {
                                                        iElement.className = 'fa-solid fa-heart text-danger';
                                                        likeButton.setAttribute('data-liked', 'true');
                                                    }
                                                }
                                            })
                                            .catch(function(error) {
                                                // Handle error
                                                console.error('Error toggling like:', error);
                                            });
                                    });
                                </script>
                            @endauth

                            {{-- Komentar --}}
                            <label for="isi_komentar" style="cursor: pointer">
                                <i class="fa-regular fa-comment text-primary"></i> <span
                                    class="text-primary">{{ $komentarCount }}</span>
                            </label>
                            <span style="cursor: pointer" class="text-primary" id="shareButton">
                                <i class="fa-regular fa-share-from-square"></i>
                            </span>

                            <!-- Modal Container -->
                            <div id="shareModal" class="modal-container">
                                <!-- Modal Content -->
                                <div class="modal-content shadow-lg border mx-auto">
                                    <div class="d-flex flex-row">
                                        <span class="close" onclick="closeModal()">&times;</span> <span
                                            class="text-primary mx-auto">Share</span>
                                    </div>

                                    <div class="d-flex flex-row justify-content-center gap-5 fs-1`1">
                                        <span id="iconShare" onclick="shareOnFacebook()"><i class="fa-brands fa-facebook"
                                                style="color: #3b5998"></i></span>
                                        <span id="iconShare" onclick="shareOnTwitter()"><i
                                                class="fa-brands fa-square-x-twitter" style="color: #14171A"></i></span>
                                        <span id="iconShare" onclick="shareOnWhatsApp()"><i class="fa-brands fa-whatsapp"
                                                style="color: #25D366"></i></span>
                                        <span id="iconShare" onclick="copyLink()"><i class="fa-regular fa-copy"
                                                id="copyLink"></i></span>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // Tampilkan modal saat tombol diklik
                                document.getElementById('shareButton').addEventListener('click', function() {
                                    document.getElementById('shareModal').style.display = 'block';
                                });

                                // Sembunyikan modal saat menekan ikon close
                                function closeModal() {
                                    document.getElementById('shareModal').style.display = 'none';
                                }

                                var shareUrl = '{{ $currentUrl }}';
                                var shareText = '{{ $berita->judul }} - {{ $truncatedString }}';

                                // Fungsi untuk berbagi ke Facebook
                                function shareOnFacebook() {
                                    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(shareUrl) + '&text=' +
                                        encodeURIComponent(shareText), '_blank');
                                }

                                // Fungsi untuk berbagi ke Twitter
                                function shareOnTwitter() {
                                    window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(shareUrl) + '&text=' +
                                        encodeURIComponent(shareText), '_blank');
                                }

                                // Fungsi untuk berbagi ke WhatsApp
                                function shareOnWhatsApp() {
                                    window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(shareUrl) + '&text=' +
                                        encodeURIComponent(shareText), '_blank');
                                }

                                // fungsi untuk copy link
                                // function copyLink() {
                                //     var linkToCopy = shareUrl;

                                //     // Buat elemen input untuk menempatkan tautan ke dalamnya
                                //     var inputElement = document.createElement('input');
                                //     inputElement.value = linkToCopy;
                                //     document.body.appendChild(inputElement);

                                //     // Pilih teks di dalam input
                                //     inputElement.select();
                                //     inputElement.setSelectionRange(0, 99999); // Untuk mendukung peramban yang berbeda

                                //     // Salin teks ke clipboard
                                //     document.execCommand('copy');

                                //     // Hapus elemen input
                                //     document.body.removeChild(inputElement);

                                //     // Tambahkan logika atau pemberitahuan bahwa tautan telah disalin
                                //     // alert('hehe')
                                //     Swal.fire({
                                //         icon: 'success',
                                //         title: 'Link copied to clipboard!',
                                //         showConfirmButton: false,
                                //     });

                                // }

                                document.getElementById("copyLink").addEventListener('click', function(e) {
                                    e.preventDefault();

                                    var linkToCopy = shareUrl;

                                    // Buat elemen input untuk menempatkan tautan ke dalamnya
                                    var inputElement = document.createElement('input');
                                    inputElement.value = linkToCopy;
                                    document.body.appendChild(inputElement);

                                    // Pilih teks di dalam input
                                    inputElement.select();
                                    inputElement.setSelectionRange(0, 99999); // Untuk mendukung peramban yang berbeda

                                    // Salin teks ke clipboard
                                    document.execCommand('copy');

                                    // Hapus elemen input
                                    document.body.removeChild(inputElement);

                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Link copied to clipboard!',
                                        showConfirmButton: true,
                                    });
                                });
                            </script>

                            {{-- <script>
                                document.getElementById('shareButton').addEventListener('click', function() {
                                    // Gantilah URL dan teks yang sesuai dengan konten yang ingin Anda bagikan
                                    var shareUrl = '{{ $currentUrl }}';
                                    var shareText = '{{ $berita->judul }} - {{ $truncatedString }}';

                                    // Facebook
                                    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(shareUrl), '_blank');

                                    // Twitter
                                    window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(shareUrl) + '&text=' +
                                        encodeURIComponent(shareText), '_blank');

                                    // LinkedIn
                                    window.open('https://www.linkedin.com/shareArticle?url=' + encodeURIComponent(shareUrl) + '&title=' +
                                        encodeURIComponent(shareText), '_blank');

                                    // Pinterest
                                    window.open('https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(shareUrl), '_blank');
                                });
                            </script> --}}
                        </div>
                    </div>
                    <div class="row mt-4 d-flex">
                        <form action="{{ route('users.comment', $berita->id) }}" method="POST" id="formKomentar">
                            @csrf
                            @method('post')
                            <div class="form-floating">
                                <textarea class="form-control border border-primary" id="isi_komentar" rows="4" name="isi_komentar"
                                    style="height: 100px"></textarea>
                                <label for="isi_komentar" class="text-dark">Comments</label>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">Kirim</button>
                        </form>
                        <ul class="list-unstyled">
                            @foreach ($komentar as $comment)
                                <li class="mb-2 p-2 border border-top-1 rounded">
                                    <div class="d-flex gap-2 text-dark">
                                        <img width="90px" height="90px" class="p-2"
                                            src="{{ asset('users/themes') }}/images/user_default.png" alt="">
                                        <div class="w-16" style="width: 100%;">
                                            <div class="mt-2">
                                                <h6 class="">{{ $comment->getUser->name }}</h6>
                                                <span>{{ $comment->isi_komentar }}</span>
                                                <p class="text-secondary mt-2">{{ $comment->waktu_komentar }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="col-md-3">
                    <h5 class="text-dark mt-3 ms-4">Berita Lainnya</h5>
                    @foreach ($berita_side as $row)
                        @php
                            $originalString = htmlspecialchars_decode($row->isi);
                            $maxCharacters = 25;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp
                        <ul>
                            <a href="{{ route('guest.berita', $row->slug) }}" class="h-entry mb-30 v-height gradient">
                                @php
                                    if ($row->img) {
                                        echo "<div class='featured-img'
                            style='background-image: url(" .
                                            asset('assets/berita/images/' . $row->img) .
                                            ")';>
                        </div>";
                                    }
                                @endphp
                                {{-- <img src="{{ asset('assets/berita/images/' . $row->img) }}" alt=""> --}}

                                <div class="text">
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($row->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                    <h2 class="text-white">{{ ucfirst($row->judul) }}</h2>
                                    {{-- <span>
                                        @php
                                            echo $truncatedString;
                                        @endphp
                                    </span> --}}
                                </div>

                            </a>
                        </ul>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    <!-- End retroy layout blog posts -->
@endsection
