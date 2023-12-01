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
                        <x-custom-nav-logo class="logo m-0 float-start" />
                        <x-custom-nav-logo-mobile class="logo m-0 float-start" />
                        <a href="{{ route('landing') }}" class="d-none d-md-block d-sm-none logo m-0 float-start">Public
                            Work Hub<span class="text-primary">.</span></a>
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
                            <li><a href="{{ route('guest.loker') }}">Loker</a></li>
                            @auth
                                <li class="d-lg-none d-inline-block"><a href="{{ route('profile.edit') }}">Profile</a></li>
                                <li class="d-lg-none d-inline-block mb-2"><a href="{{ route('users.pengaduan') }}">Pengaduan</a></li>
                                <li class="d-lg-none d-inline-block border-top border-black">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-none">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li class="d-lg-none d-inline-block">
                                    @if (Route::has('login'))
                                        <a href="{{ route('login') }}" class="text-black">Login</a>
                                    @endif
                                </li>
                            @endauth
                        </ul>
                    </div>
                    <div class="col-4 text-end">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <div class="d-none d-lg-flex flex-row-reverse justify-center align-items-center gap-5">
                            <div class="d-none d-lg-flex gap-3">
                                @auth
                                    @if (Auth::user()->role == 'user')
                                        <div class="dropdown">
                                            <button class="btn btn-none lh-1 pe-0 dropdown-toggle" type="button"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="avatar avatar-l mt-2">
                                                    @if (empty(Auth::user()->foto))
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50" viewBox="0 0 24 24" fill="none"
                                                            stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path
                                                                d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                            <circle cx="12" cy="10" r="3" />
                                                            <circle cx="12" cy="12" r="10" />
                                                        </svg>
                                                    @else
                                                        <img class="rounded-circle"
                                                            src="{{ asset('assets/users/images/' . Auth::user()->foto) }}"
                                                            alt="" />
                                                    @endif
                                                </div>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end px-2">
                                                <div class="card position-relative border-0">
                                                    <div class="card-body p-0">
                                                        <div class="text-center pt-4 pb-3">
                                                            <div class="avatar avatar-xl">
                                                                @if (empty(Auth::user()->foto))
                                                                    <div class ="rounded-circle">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="50" height="50"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="#000000" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                            <path
                                                                                d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                                            <circle cx="12" cy="10" r="3" />
                                                                            <circle cx="12" cy="12" r="10" />
                                                                        </svg>
                                                                    </div>
                                                                @else
                                                                    <img class="rounded-circle"
                                                                        src="{{ asset('assets/users/images/' . Auth::user()->foto) }}"
                                                                        alt="" />
                                                                @endif
                                                            </div>
                                                            <h6 class="mt-2 text-black">{{ Auth::user()->name }}</h6>
                                                        </div>
                                                        <div class="overflow-auto scrollbar">
                                                            <ul class="nav d-flex flex-column">
                                                                <li class="nav-item">
                                                                    <a class="nav-link px-3"
                                                                        href="{{ route('profile.edit') }}">Profile</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link px-3"
                                                                        href="{{ route('users.pengaduan') }}">Pengaduan</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <form class="bg-transparent"
                                                                        action="{{ route('logout') }}" method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-none px-3">Logout</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    @elseif (Auth::user()->role == 'admin')
                                        @if (Route::has('admin'))
                                            <a href="{{ route('admin') }}"
                                                class="text-white btn btn-outline-secondary">Dashboard</a>
                                        @endif
                                    @elseif (Auth::user()->role == 'penulis')
                                        @if (Route::has('penulis'))
                                            <a href="{{ route('penulis') }}"
                                                class="text-white btn btn-outline-secondary">Dashboard</a>
                                        @endif
                                    @elseif (Auth::user()->role == 'penyedia_loker')
                                        @if (Route::has('penyedia-loker'))
                                            <a href="{{ route('penyedia-loker') }}"
                                                class="text-white btn btn-outline-secondary">Dashboard</a>
                                        @endif
                                    @endif
                                @else
                                    @if (Route::has('login'))
                                        <a href="{{ route('login') }}"
                                            class="text-white btn btn-outline-secondary">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="text-white btn btn-outline-secondary">Register</a>
                                        @endif
                                    @endif
                                @endauth
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
