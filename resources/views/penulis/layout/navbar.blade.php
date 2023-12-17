<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== "transparent") {
            document.querySelector("body").classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <!-- sidebar -->
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div>
                                <span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span
                                    class="nav-link-text">Home</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                                <li class="collapsed-nav-item-title d-none">Home</li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('penulis') }}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Dashboard</span></div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-management" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-management">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div>
                                <span class="nav-link-icon"><span class="fas fa-book"></span></span><span
                                    class="nav-link-text">Management</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-management">
                                <li class="collapsed-nav-item-title d-none">Management</li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('penulis.berita') }}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Berita</span></div>
                                    </a><!-- more inner pages-->
                                    <a class="nav-link active" href="{{ route('penulis.berita.tambah') }}" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Tambah Berita</span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center">
            <span class="uil uil-left-arrow-to-left fs-0"></span><span
                class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed
                View</span>
        </button>
    </div>
</nav>
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            {{-- togler menu --}}
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
            {{-- Logo --}}
            <div class="navbar-brand me-1 me-sm-3">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <x-custom-nav-logo-dashboard class="logo m-0 float-start"/>
                        <x-custom-nav-logo-dashboard-mobile class="logo m-0 float-start"/>
                        <p class="d-none d-md-none d-sm-none d-lg-block logo m-0 float-start">Public Work Hub<span
                                class="text-primary">.</span></p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            {{-- dark theme --}}
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="moon"></span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="sun"></span></label>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3"
                    href="{{ route('loker/chat') }}"><span class="ms-1"><i class="fa-regular fa-message fa-lg"></i></span></a>
            </li>
            {{-- notification --}}
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.5rem" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    data-bs-auto-close="outside"><span data-feather="bell"
                        style="height: 20px; width: 20px"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notifications</h5>
                                <form method="POST" action="{{ route('readAllNotif') }}">
                                    @csrf
                                    @method('post')

                                    <button class="btn btn-link p-0 fs--1 fw-normal" type="submit">Mark all as
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
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative {{ $notif->status == 'read' ? 'read' : 'unread' }} border-bottom">
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
                                                            <h4 class="fs--1 text-black">{{ $notif->getUser->name }}
                                                            </h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class="me-1 fs--2">{{ $notif->isi }}<span
                                                                        class="ms-2 text-400 fw-bold fs--2">{{ \Carbon\Carbon::parse($notif->waktu_notifikasi)->ago() }}</span>
                                                            </p>
                                                            <p class="text-800 fs--1 mb-0"><span
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
            </li>

            {{-- profile --}}
            
            <li class="nav-item dropdown">
                <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l">
                        @if (empty(Auth::user()->foto))
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
                        @else
                            <img class="rounded-circle" src="{{ asset('assets/users/images/' . Auth::user()->foto) }}" alt="" />
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl">
                                    @if (empty(Auth::user()->foto))
                                        <div class ="rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
                                        </div>
                                    @else
                                        <img class="rounded-circle" src="{{ asset('assets/users/images/' . Auth::user()->foto)}}" alt="" />
                                    @endif
                                </div>
                                <h6 class="mt-2 text-black">{{ Auth::user()->name }}</h6>
                            </div>
                        <div class="overflow-auto scrollbar">
                            <ul class="nav d-flex flex-column pb-1">
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="{{ route('profile.edit') }}"><span class="ms-1 me-2 text-900"><i class="fa-regular fa-user"></i></span><span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3"
                                        href="{{ route('loker/chat') }}"><span class="ms-1 me-2 text-900"><i class="fa-regular fa-message"></i></span><span>Chat</span></a>
                                </li>
                            </ul>
                        </div>
                            <hr />
                            {{-- sign out --}}
                            <div class="px-3 mb-3 ">
                                <form class="bg-transparent" action="{{ route('logout') }}" method="POST"> 
                                    @csrf
                                    <button type="submit" class="btn btn-phoenix-secondary d-flex flex-center w-100"><span class="me-2" data-feather="log-out"></span> Logout</button>
                                </form>
                            </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>


<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
