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
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </header>
    </div>
    <!--Container Main start-->
    <div class="height-200 bg-light" style="margin-top: 70px">
        @yield('content')
    </div>
    <!--Container Main end-->

    <!-- Costum Js -->
    @yield('scriptTambah')
    @stack('scripts')

</body>

</html>