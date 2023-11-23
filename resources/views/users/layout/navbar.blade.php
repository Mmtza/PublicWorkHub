<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-3 d-flex align-items-center">
                            <x-custom-nav-logo class="logo m-0 float-start"/>
                            <x-custom-nav-logo-mobile class="logo m-0 float-start"/>
                            <a href="{{ route('landing') }}" class="d-none d-md-block d-sm-none logo m-0 float-start">Public Work Hub<span
                                class="text-primary">.</span></a>
                    </div>
                    <div class="col-5 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="active"><a href="/">Home</a></li>
                            <li class="has-children">
                                <a href="category.html">kategori</a>
                                <ul class="dropdown">
                                    <li><a href="search-result.html">Search Result</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/category">Category</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="#">Menu One</a></li>
                                    <li><a href="#">Menu Two</a></li>
                                    <li class="has-children">
                                        <a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Sub Menu One</a></li>
                                            <li><a href="#">Sub Menu Two</a></li>
                                            <li><a href="#">Sub Menu Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="category.html">Team</a></li>
                            <li><a href="/pengaduan-masyarakat">Komplain</a></li>
                            <li class="d-lg-none d-inline-block">
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="text-black">Login</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="col-4 text-end">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <div class="d-none d-lg-flex flex-row-reverse justify-center align-items-center gap-5">
                            <div class="d-none d-lg-flex gap-3">
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}"
                                        class="text-white btn btn-outline-secondary">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="text-white btn btn-outline-secondary">Register</a>
                                    @endif
                                @endif
                            </div>
                            <form action="#" class="search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bi-search"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</nav>
