<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FOR HIDING INDEX -->
    <meta name="robots" content="noindex, nofollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Height Clearance</title>
    <link rel="icon" href="{{ asset('caap-logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,400;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;1,9..40,400;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900&family=Noto+Sans:ital,wght@0,100;0,200;0,400;0,600;0,700;0,900;1,400;1,600;1,700&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style></style>

<body>
    <div id="app">
        <!-- Sidebar -->
        @if(auth()->check() && Auth::user()->access_role == "admin")
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ url('admin/application-view') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init aria-current="true">
                        <i class="fa-solid fa-hourglass-half"></i>
                        <span>Pending Applications</span>
                    </a>
                    <a href="{{ route('registered-accounts') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init aria-current="true">
                        <i class="fa-solid fa-users"></i>
                        <span>Registered Accounts</span>
                    </a>

                </div>
            </div>
        </nav>
        @endif
        <!-- Sidebar -->
        @auth
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img style="height: auto; width: 120px; padding-right: 20px;" src="{{ asset('asset/img/caap-logo.png') }}" alt="CAAP Logo">
                <!-- <a class="navbar-brand">
                    Height Clearance Permit
                </a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Righ0t Side Of Navbar -->
                    @auth
                    @if(auth()->check() && Auth::user()->access_role == 'user') <!-- Assuming isAdmin() is a method in your User model -->
                    <a class="button-28" href="{{ url('owner-form') }}">
                        <i class='bx bxs-log-in-circle'></i>
                        Apply for a Permit
                    </a>
                    @endif
                    @endauth
                    <div style="margin-right: 20px;"></div>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                @if(auth()->check() && Auth::user()->access_role == "user")
                                <a class="item-link" href="{{ url('home') }}">
                                    <i class="fa-solid fa-house"></i>
                                    Home
                                </a>
                                @elseif(auth()->check() && Auth::user()->access_role == "adms")
                                <a class="item-link" href="{{ url('adms/queue') }}">
                                    <i class="fa-solid fa-users-line"></i>
                                    Queued Applications
                                </a>
                                @elseif(auth()->check() && Auth::user()->access_role == "adms-supervisor")
                                <a class="item-link" href="{{ route('supervisor-home') }}">
                                    <i class="fa-solid fa-house"></i>
                                    Home
                                </a>
                                @endif
                                <a class="item-link" href="{{ route('view-status') }}">
                                    <i class="fa-solid fa-chart-simple"></i>
                                    View Status
                                </a>
                            </div>
                        </div>
                        @endauth
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->rep_fname }} {{ Auth::user()->rep_lname }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class='bx bx-exit'></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endauth


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
