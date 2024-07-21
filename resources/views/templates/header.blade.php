<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Peduli Diri</title>

    <!-- Meta -->
    <meta property="og:type" content="Website" />
    <link rel="shortcut icon" href="{{ asset('assets/mars') }}/images/user.png" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="{{ asset('assets/mars') }}/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/mars') }}/css/main.min.css" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/mars') }}/vendor/overlay-scroll/OverlayScrollbars.min.css" />

    <!-- Date Range CSS -->
    <link rel="stylesheet" href="{{ asset('assets/mars') }}/vendor/daterange/daterange.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- sweeralert2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">
        <!-- Main container start -->
        <div class="main-container">
            <!-- Sidebar wrapper start -->
            <nav id="sidebar" class="sidebar-wrapper">
                <!-- App brand starts -->
                <div class="app-brand px-3 py-2 d-flex align-items-center">
                    <a href="{{ url('dashboard') }}">
                        <p class="fw-bold fs-2 fs-lg-1 m-0">Peduli Diri</p>
                        <!-- <img src="{{ asset('assets/mars') }}/images/star.svg" class="logo" alt="Bootstrap Gallery" /> -->
                    </a>
                </div>
                <!-- App brand ends -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li class="{{ request()->is('dashboard') ? 'active current-page' : '' }} my-2">
                            <a href="{{ url('dashboard') }}">
                                <i class="bi bi-house"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('catatan') ? 'active current-page' : '' }} my-2">
                            <a href="{{ url('catatan') }}">
                                <i class="bi bi-calendar2"></i>
                                <span class="menu-text">Catatan Perjalanan</span>
                            </a>
                        </li>

                        <!-- <li class="treeview">
                <a href="#!">
                  <i class="bi bi-stickies"></i>
                  <span class="menu-text">Isi Data</span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="accordions.html">Accordions</a>
                  </li>
                  <li>
                    <a href="alerts.html">Alerts</a>
                  </li>
                </ul>
              </li> -->

                        <li class="{{ request()->is('penduduk') ? 'active current-page' : '' }} my-2">
                            <a href="{{ url('penduduk') }}">
                                <i class="bi bi-people"></i>
                                <span class="menu-text">Penduduk</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar menu ends -->
            </nav>
            <!-- Sidebar wrapper end -->

            <!-- App container starts -->
            <div class="app-container">
                <!-- App header starts -->
                <div class="app-header d-flex align-items-center">
                    <!-- Toggle buttons start -->
                    <div class="d-flex">
                        <button class="btn btn-outline-info me-2 toggle-sidebar" id="toggle-sidebar">
                            <i class="bi bi-text-indent-left fs-5"></i>
                        </button>
                        <button class="btn btn-outline-info me-2 pin-sidebar" id="pin-sidebar">
                            <i class="bi bi-text-indent-left fs-5"></i>
                        </button>
                    </div>
                    <!-- Toggle buttons end -->

                    <!-- App brand sm start -->
                    <div class="app-brand-sm d-md-none d-sm-block">
                        <a href="{{ url('dashboard') }}">
                            <h4 class="fw-bold m-0">Peduli Diri</h4>
                            <!-- <img src="{{ asset('assets/mars') }}/images/star.svg" class="logo" alt="Bootstrap Gallery" /> -->
                        </a>
                    </div>
                    <!-- App brand sm end -->

                    <!-- Breadcrumb start -->
                    <ol class="breadcrumb d-none d-lg-flex ms-3">
                        <li class="breadcrumb-item">
                            <i class="bi bi-house lh-1"></i>
                            <a href="{{ url('dashboard') }}" class="text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item text-secondary">
                            @if(request()->is('dashboard'))
                            Dashboard
                            @elseif(request()->is('catatan'))
                            Catatan Perjalanan
                            @elseif(request()->is('penduduk'))
                            Data Penduduk
                            @endif
                        </li>
                    </ol>
                    <!-- Breadcrumb end -->

                    <!-- App header actions start -->
                    <div class="header-actions">
                        <div class="dropdown ms-2">
                            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="rounded-2">
                                    <img src="{{ asset('assets/mars') }}/images/user.png" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
                                    <!-- <i class="bi bi-person h2"></i> -->
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow-sm">
                                @php
                                $nik = Auth::user()->nik;
                                @endphp
                                @foreach ($users as $user)
                                @if ($user->nik === $nik)
                                <div class="p-3 border-bottom mb-2">
                                    <h6 class="mb-1">
                                        {{ $user->nama }}
                                    </h6>
                                    <p class="m-0 small opacity-50">
                                        {{ $user->nik }}
                                    </p>
                                </div>
                                @endif
                                @endforeach
                                <div class="d-grid p-3 py-2">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- App header actions end -->
                </div>
                <!-- App header ends -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- End content -->

                @include('templates/footer')