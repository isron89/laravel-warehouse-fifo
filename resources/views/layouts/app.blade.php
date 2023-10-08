<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">

    <!-- Custom CSS -->
    @yield('cssTambah')

    <!-- Script -->
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @stack('scriptsAtas')

    <!-- Bootstrap -->
    @vite(['resources/js/app.js'])

    <title>@yield('title')</title>
</head>

<body id="body-pd">
    <div style="text-decoration: none">
        <header class="header" id="header" style="display: block; height: 100vh; width: 250px;">
            <div class="header_toggle" id="header-toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar" style="display: block; height: 100vh; width: 250px;">
            <nav class="nav">
                <div>
                    <a href="/home" class="nav_logo"> <i class='bx bx-home-smile nav_logo-icon'></i> <span class="nav_logo-name">Supplat Warehouse</span> </a>
                    <div class="nav_list">
                        <a href="{{route('dashboard.index')}}" class="nav_link {{ Request::is('dashboard','dashboard/*','/') ? 'active':'' }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="{{route('barang.index')}}" class="nav_link {{ Request::is('barang','barang/*') ? 'active':'' }}"> <i class='bx bx-box nav_icon'></i> <span class="nav_name">Barang</span> </a>
                        <a href="{{route('pembelian.index')}}" class="nav_link {{ Request::is('pembelian','pembelian/*') ? 'active':'' }}"> <i class='bx bxs-truck nav_icon'></i> <span class="nav_name">Pembelian</span> </a>
                        <a href="{{route('penjualan.index')}}" class="nav_link {{ Request::is('penjualan','penjualan/*') ? 'active':'' }}"> <i class='bx bx-coin-stack nav_icon'></i> <span class="nav_name">Penjualan</span> </a>
                        <!-- <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Dalam Pengerjaan</span> </a>
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dalam Pengerjaan</span> </a> -->
                        <hr>
                        <div class="dropdown pb-1" style=" width: 100%; margin-top: 10px; margin-bottom: 10px; margin-left: 20px; position: absolute; bottom: 0">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-user-circle nav_icon' style="margin-right: 10px"></i>
                                <span class="d-none d-sm-inline mx-1 nav-name"> {{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sign out</a></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--Container Main start-->
    <div class="height-200 bg-light" style="margin-top: 70px; margin-left: 200px">
        @yield('content')
    </div>
    <!--Container Main end-->

    <!-- Costum Js -->
    @yield('scriptTambah')
    @stack('scripts')

</body>

</html>