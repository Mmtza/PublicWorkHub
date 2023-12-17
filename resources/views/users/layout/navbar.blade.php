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
                    <div class="col-6 text-center">
                        {{-- <form action="#" class="search-form d-inline-block d-lg-none">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form> --}}

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto mt-3 mb-0">
                            <li class="active"><a href="{{ route('landing') }}">Home</a></li>
                            <li class="has-children">
                                <a class="dropdown-toggle" type="button" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                                <ul class="dropdown dropdown-menu">
                                    @if (empty($allCategories))
                                        <li class="px-2">No one category</li>
                                    @else
                                        @foreach ($allCategories as $k)
                                            <li class="border-bottom px-2">
                                                @if ($k->type == 'berita')                                                
                                                    <a href="{{ route('guest.berita.kategori', $k['nama_kategori']) }}">{{ $k['nama_kategori'] }}</a>
                                                @elseif ($k->type == 'loker')
                                                    <a href="{{ route('guest.loker.kategori', $k['nama_kategori']) }}">{{ $k['nama_kategori'] }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li><a href={{ route('guest.team') }}>Team</a></li>
                            <li class="mb-3"><a href="{{ route('guest.loker') }}">Loker</a></li>
                            @auth                            
                                <li class="mb-3 d-none d-lg-inline-block"><a href="{{ route('loker/chat') }}">Chat</a></li>                            
                            @endauth
                            <li class="mb-3 d-none d-lg-inline-block"><a href="{{ route('users.pengaduan') }}">Pengaduan</a></li>                            
                            <li class="mb-3 border-bottom"></li>
                            @auth
                                <li class="d-lg-none d-inline-block"><a href="{{ route('profile.edit') }}">Profile</a></li>
                                <li class="d-lg-none d-inline-block"><a href="{{ route('loker/chat') }}">Chat</a></li>
                                <li class="d-lg-none d-inline-block mb-2"><a
                                        href="{{ route('users.pengaduan') }}">Pengaduan</a></li>
                                <li class="d-lg-none d-inline-block border-top border-black">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-none">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li class="d-lg-none d-inline-block">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-black">Register</a>
                                    @endif
                                </li>
                                <li class="d-lg-none d-inline-block">
                                    @if (Route::has('login'))
                                        <a href="{{ route('login') }}" class="text-black">Login</a>
                                    @endif
                                </li>
                            @endauth
                        </ul>
                    </div>
                    <div class="col-3 text-end">
                        <div class="d-flex flex-row align-items-center justify-content-end gap-2">
                            @auth                                
                                @if (Auth::user()->role == 'user')                                            
                                    <div>
                                        <a class="nav-link d-inline-block d-lg-none" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-bs-auto-close="outside">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFFFFF" class="bi bi-bell" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                                            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                                            <div class="card position-relative border-0">
                                                <div class="card-header p-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="text-black mb-0" style="font-size: 16px;">Notifications</h5>
                                                        <form method="POST" action="{{ route('readAllNotif') }}">
                                                            @csrf
                                                            @method('post')
                        
                                                            <button class="btn btn-link p-0 fw-normal" style="font-size: 10px;" type="submit">Mark all as
                                                                read</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="scrollbar-overlay" style="height: 27rem">
                                                        <div class="border-300">
                                                            @if (count($notification) > 0)
                                                                @foreach ($notification as $notif)
                                                                    <div
                                                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative border-bottom" style="background-color: {{  $notif->status == 'read' ? '#FFFFFF' : '#E3E6ED' }}">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                                            <div class="d-flex">
                                                                                <div class="avatar avatar-m me-3">
                                                                                    @if (empty($notif->getUser->foto))
                                                                                        <div class ="rounded-circle">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="40" height="40"
                                                                                                viewBox="0 0 24 24" fill="none"
                                                                                                stroke="#000000" stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path
                                                                                                    d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                                                                <circle cx="12" cy="10" r="3" />
                                                                                                <circle cx="12" cy="12"
                                                                                                    r="10" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    @else
                                                                                        <img class="rounded-circle"
                                                                                            src="{{ asset('assets/users/images/' . $notif->getUser->foto) }}"
                                                                                            alt="" />
                                                                                    @endif
                                                                                </div>
                                                                                <div class="flex-1 me-sm-3">
                                                                                    <h4 class="text-black" style="font-size: 16px;">{{ $notif->getUser->name }}
                                                                                    </h4>
                                                                                    <p class="text-1000 mb-2 mb-sm-3 fw-normal" style="font-size: 12px;"><span
                                                                                            class="me-1 fs--2">{{ $notif->isi }}<span
                                                                                                class="ms-2 text-400 fw-bold fs--2">{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->ago() }}</span>
                                                                                    </p>
                                                                                    <p class="text-800 mb-0" style="font-size: 12px;"><span
                                                                                            class="me-1 fas fa-clock"></span><span
                                                                                            class="fw-bold">{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->locale('id')->isoFormat('hh:mm:ss') }}
                                                                                        </span>{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="font-sans-serif d-none d-sm-block">
                                                                                <button type="submit"
                                                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                                                    type="button" data-bs-toggle="dropdown"
                                                                                    data-boundary="window" aria-haspopup="true"
                                                                                    aria-expanded="false" data-bs-reference="parent">
                                                                                    <span class="fas fa-ellipsis-h fs--2 text-900"></span>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-end py-2">
                                                                                    <form action="{{ route('readNotif', $notif->id) }}" method="POST">
                                                                                        @csrf
                                                                                        @method('post')
                        
                                                                                        <button class="dropdown-item">Mark as Read</button>
                                                                                    </form>    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div
                                                                    class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-center position-relative">
                                                                        <div class="d-flex">
                                                                            <div class="flex-1 me-sm-3">
                                                                                <div class="d-flex flex-row gap-1">
                                                                                    <i class="bi bi-exclamation-circle"></i>
                                                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal">Tidak ada
                                                                                        notifikasi saat ini</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="card-footer p-0 border-top border-0">
                                                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                                            href="pages/notifications.html">Notification history</a></div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif    
                            @endauth
                            <div>                            
                                <a href="#"
                                    class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                    <span></span>
                                </a>
                                <div class="d-none d-lg-flex flex-row-reverse justify-center align-items-center gap-5">
                                    <div class="d-none d-lg-flex gap-3">
                                        @auth
                                            <div class="d-flex flex-row align-items-center">
                                                @if (Auth::user()->role == 'user')                                            
                                                    <div>
                                                        <a class="nav-link mt-2" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                            data-bs-auto-close="outside">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFFFFF" class="bi bi-bell" viewBox="0 0 16 16">
                                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                                                              </svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                                                            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                                                            <div class="card position-relative border-0">
                                                                <div class="card-header p-2">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <h5 class="text-black mb-0" style="font-size: 16px;">Notifications</h5>
                                                                        <form method="POST" action="{{ route('readAllNotif') }}">
                                                                            @csrf
                                                                            @method('post')
                                        
                                                                            <button class="btn btn-link p-0 fw-normal" style="font-size: 10px;" type="submit">Mark all as
                                                                                read</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-0">
                                                                    <div class="scrollbar-overlay" style="height: 27rem">
                                                                        <div class="border-300">
                                                                            @if (count($notification) > 0)
                                                                                @foreach ($notification as $notif)
                                                                                    <div
                                                                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative border-bottom" style="background-color: {{  $notif->status == 'read' ? '#FFFFFF' : '#E3E6ED' }}">
                                                                                        <div
                                                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                                                            <div class="d-flex">
                                                                                                <div class="avatar avatar-m me-3">
                                                                                                    @if (empty($notif->getUser->foto))
                                                                                                        <div class ="rounded-circle">
                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                width="40" height="40"
                                                                                                                viewBox="0 0 24 24" fill="none"
                                                                                                                stroke="#000000" stroke-width="2"
                                                                                                                stroke-linecap="round"
                                                                                                                stroke-linejoin="round">
                                                                                                                <path
                                                                                                                    d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                                                                                <circle cx="12" cy="10" r="3" />
                                                                                                                <circle cx="12" cy="12"
                                                                                                                    r="10" />
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    @else
                                                                                                        <img class="rounded-circle"
                                                                                                            src="{{ asset('assets/users/images/' . $notif->getUser->foto) }}"
                                                                                                            alt="" />
                                                                                                    @endif
                                                                                                </div>
                                                                                                <div class="flex-1 me-sm-3">
                                                                                                    <h4 class="text-black" style="font-size: 16px;">{{ $notif->getUser->name }}
                                                                                                    </h4>
                                                                                                    <p class="text-1000 mb-2 mb-sm-3 fw-normal" style="font-size: 12px;"><span
                                                                                                            class="me-1 fs--2">{{ $notif->isi }}<span
                                                                                                                class="ms-2 text-400 fw-bold fs--2">{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->ago() }}</span>
                                                                                                    </p>
                                                                                                    <p class="text-800 mb-0" style="font-size: 12px;"><span
                                                                                                            class="me-1 fas fa-clock"></span><span
                                                                                                            class="fw-bold">{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->locale('id')->isoFormat('hh:mm:ss') }}
                                                                                                        </span>{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="font-sans-serif d-none d-sm-block">
                                                                                                <button type="submit"
                                                                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                                                                    type="button" data-bs-toggle="dropdown"
                                                                                                    data-boundary="window" aria-haspopup="true"
                                                                                                    aria-expanded="false" data-bs-reference="parent">
                                                                                                    <span class="fas fa-ellipsis-h fs--2 text-900"></span>
                                                                                                </button>
                                                                                                <div class="dropdown-menu dropdown-menu-end py-2">
                                                                                                    <form action="{{ route('readNotif', $notif->id) }}" method="POST">
                                                                                                        @csrf
                                                                                                        @method('post')
                                        
                                                                                                        <button class="dropdown-item">Mark as Read</button>
                                                                                                    </form>    
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div
                                                                                    class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read">
                                                                                    <div
                                                                                        class="d-flex align-items-center justify-content-center position-relative">
                                                                                        <div class="d-flex">
                                                                                            <div class="flex-1 me-sm-3">
                                                                                                <div class="d-flex flex-row gap-1">
                                                                                                    <i class="bi bi-exclamation-circle"></i>
                                                                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal">Tidak ada
                                                                                                        notifikasi saat ini</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="card-footer p-0 border-top border-0">
                                                                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                                                            href="pages/notifications.html">Notification history</a></div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="dropdown">
                                                    <button class="btn btn-none lh-1 pe-0 dropdown-toggle" type="button"
                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <div class="avatar avatar-l">
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
                                                    <ul class="dropdown-menu profile-custom px-2 rounded rounded-5 border border-300 shadow">
                                                        <div class="position-relative">
                                                            <div class="p-0">
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
                                                                        @if (Auth::user()->role != 'user')                                                                
                                                                            <li class="nav-item">
                                                                                @if (Auth::user()->role == 'admin')
                                                                                    @if (Route::has('admin'))
                                                                                        <a href="{{ route('admin') }}" class="nav-link px-3">Dashboard</a>
                                                                                    @endif
                                                                                @elseif (Auth::user()->role == 'penulis')
                                                                                    @if (Route::has('penulis'))
                                                                                        <a href="{{ route('penulis') }}" class="nav-link px-3">Dashboard</a>
                                                                                    @endif
                                                                                @elseif (Auth::user()->role == 'penyedia_loker')
                                                                                    @if (Route::has('penyedia-loker'))
                                                                                        <a href="{{ route('penyedia-loker') }}" class="nav-link px-3">Dashboard</a>
                                                                                    @endif
                                                                                @endif
                                                                            </li>
                                                                        @endif
                                                                        <li class="nav-item">
                                                                            <a class="nav-link px-3"
                                                                                href="{{ route('loker/chat') }}">Chat</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link px-3"
                                                                                href="{{ route('users.pengaduan') }}">Pengaduan</a>
                                                                        </li>
                                                                        <hr>
                                                                        <li class="nav-item">
                                                                            <form class="bg-transparent"
                                                                                action="{{ route('logout') }}" method="POST">
                                                                                @csrf
                                                                                <button type="submit"
                                                                                    class="btn btn-logout w-100">Logout</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
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
                                    {{-- <form action="#" class="search-form">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="bi-search"></span>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</nav>
