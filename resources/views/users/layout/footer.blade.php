<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="widget">
                    <h3 class="mb-4">About</h3>
                    <p>Website untuk bertukar informasi mengenai berita, lowongan pekerjaan, dan untuk pengaduan keluhan
                        masyarakat sekitar.</p>
                </div> <!-- /.widget -->
                <div class="widget">
                    <h3>Social</h3>
                    <ul class="list-unstyled social">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        <li><a href="#"><span class="icon-dribbble"></span></a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-4 -->
            {{-- <div class="col-lg-4 ps-lg-5">
                <div class="widget">
                    <h3 class="mb-4">Company</h3>
                    <ul class="list-unstyled float-start links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Vision</a></li>
                        <li><a href="#">Mission</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                    <ul class="list-unstyled float-start links">
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Creative</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-4 --> --}}
            <div class="col-lg-6">
                <div class="widget">
                    <h3 class="mb-4">Recent Post Entry</h3>
                    <div class="post-entry-footer">
                        <ul>
                            @if (count($beritaFooterLine) > 0)
                                @foreach ($beritaFooterLine as $berita)
                                    <li>
                                        <a href="{{ route('guest.berita', $berita->slug) }}">
                                            <img src="{{ asset('assets/berita/images/' . $berita->img) }}"
                                                alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h4>{{ $berita->judul }}</h4>
                                                <div class="post-meta">
                                                    <span
                                                        class="mr-2">{{ \Carbon\Carbon::parse($berita->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>


                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-4 -->
        </div> <!-- /.row -->

        <div class="row mt-5">
            <div class="col-12 text-center">
                <!--
          **==========
          NOTE:
          Please don't remove this copyright link unless you buy the license here https://untree.co/license/
          **==========
        -->

                <p>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved. &mdash; Public Work Hub Team
                    <!-- License information: https://untree.co/license/ -->
                </p>
            </div>
        </div>
    </div> <!-- /.container -->
</footer> <!-- /.site-footer -->
