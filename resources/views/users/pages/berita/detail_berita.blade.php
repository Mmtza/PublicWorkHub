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
                            <a href="javascript:void(0);" class="like-toggle" id="likeToggle">
                                @php
                                    $like = false;
                                @endphp
                                <i class="fa-regular fa-heart text-danger"></i> 100k
                            </a>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var likeToggle = document.getElementById('likeToggle');
                                    var like = @json($like); // Convert PHP boolean to JavaScript boolean

                                    likeToggle.addEventListener('click', function() {
                                        like = !like; // Toggle the value when clicked

                                        // Update the UI based on the new like status
                                        if (like) {
                                            // like
                                            likeToggle.innerHTML = '<i class="fa-solid fa-heart text-danger"></i> 100k';
                                        } else {
                                            // unlike
                                            likeToggle.innerHTML = '<i class="fa-regular fa-heart text-danger"></i> 100k';
                                        }

                                        // You can also send an AJAX request to update the like status in the database
                                        // Here, you would typically make an AJAX request to a server endpoint to update the like status.
                                        // The server would then update the database accordingly.

                                        // Example AJAX request (you may need to customize this based on your actual implementation):
                                        // fetch('/update-like-status', {
                                        //     method: 'POST',
                                        //     headers: {
                                        //         'Content-Type': 'application/json',
                                        //         'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        //     },
                                        //     body: JSON.stringify({ like: like }),
                                        // })
                                        // .then(response => response.json())
                                        // .then(data => {
                                        //     // Handle the response if needed
                                        // })
                                        // .catch(error => console.error('Error:', error));
                                    });
                                });
                            </script>

                            {{-- Komentar --}}
                            @php
                                // Array of sample comments
                                $comments = ['Great article!', 'I learned a lot from this.', 'Amazing content!', 'This is so helpful.', 'Nice job!', 'Keep up the good work.', 'I enjoyed reading this.', 'Interesting perspective.', 'Well written!', 'Thanks for sharing.'];

                                // Generate a random number of comments (between 5 and 15)
                                $numComments = rand(5, 15);

                                // Shuffle the comments array to get random comments
                                shuffle($comments);

                                // Take a slice of the array to get the desired number of comments
                                $randomComments = array_slice($comments, 0, $numComments);
                            @endphp
                            <label for="komentar">
                                <i class="fa-regular fa-comment text-primary"></i> <span class="text-primary">50</span>
                            </label>
                            <a href="">
                                <i class="fa-regular fa-share-from-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex">
                        <form action="" method="POST" id="formKomentar">
                            @csrf
                            @method('post')
                            <div class="form-floating">
                                <textarea class="form-control border border-primary" id="komentar" rows="4" name="komentar"
                                    style="height: 100px"></textarea>
                                <label for="komentar" class="text-dark">Comments</label>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">Kirim</button>
                        </form>
                        <ul class="list-unstyled">
                            @foreach ($randomComments as $comment)
                                <li class="mb-2 p-2 border border-top-1 rounded">
                                    <a href="" class="text-decoration-none ">
                                        <div class="d-flex gap-2">
                                            <img width="90px" height="90px" class="p-2"
                                                src="{{ asset('users/themes') }}/images/user_default.png" alt="">
                                            <div class="w-16" style="width: 18rem;">
                                                <div class="mt-4">
                                                    <h6 class="">Nama User</h6>
                                                    <p>{{ $comment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
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
                                    <span>
                                        @php
                                            echo $truncatedString;
                                        @endphp
                                    </span>
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
