<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard Monitoring Komisi B
    </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /**
         * Sidebar
         */
        .sidebar {

            width: 250px;
            min-height: 100vh;

            background-color: #212529;
        }

        /**
         * Link sidebar
         */
        .sidebar a {

            color: #ffffff;

            text-decoration: none;

            display: block;

            padding: 12px 20px;
        }

        /**
         * Hover menu
         */
        .sidebar a:hover {

            background-color: #343a40;
        }

        /**
         * Active menu
         */
        .sidebar .active {

            background-color: #0d6efd;
        }

        /**
         * Content kanan
         */
        .main-content {

            flex: 1;
        }

    </style>

</head>

<body>

    <div class="d-flex">

        <!-- ========================= -->
        <!-- SIDEBAR -->
        <!-- ========================= -->

        <div class="sidebar">

            <!-- Logo/Judul -->
            <div class="p-3 text-white border-bottom">

                <h4>
                    Komisi B DPRD
                </h4>

            </div>

            <!-- Menu Dashboard -->
            <a href="/dashboard"
               class="{{ request()->is('dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                Dashboard

            </a>

            @if(auth()->user()->role == 'admin')
            <!-- Menu Mitra -->
            <a href="/mitra-kerja"
               class="{{ request()->is('mitra-kerja*') ? 'active' : '' }}">

                <i class="bi bi-buildings"></i>

                Mitra Kerja

            </a>

            <!-- Menu Tahun -->
            <a href="/tahun-anggaran"
               class="{{ request()->is('tahun-anggaran*') ? 'active' : '' }}">

                <i class="bi bi-calendar-event"></i>

                Tahun Anggaran

            </a>

            <!-- Menu Status -->
            <a href="/status-capaian"
               class="{{ request()->is('status-capaian*') ? 'active' : '' }}">

                <i class="bi bi-bar-chart"></i>

                Status Capaian

            </a>

            <!-- Menu Kondisi -->
            <a href="/kondisi-lingkungan"
               class="{{ request()->is('kondisi-lingkungan*') ? 'active' : '' }}">

                <i class="bi bi-globe"></i>

                Kondisi Lingkungan

            </a>
            @endif

            <!-- Menu Pendapatan -->
            <a href="/pendapatan"
               class="{{ request()->is('pendapatan*') ? 'active' : '' }}">

                <i class="bi bi-cash-stack"></i>

                Pendapatan

            </a>

            @if(auth()->user()->role == 'admin')
            <!-- Menu Activity Log -->
            <a href="/activity-log"
            class="{{ request()->is('activity-log*') ? 'active' : '' }}">

                <i class="bi bi-clock-history"></i>

                Activity Log

            </a>

            <!-- Menu User Management -->
             <a href="/users"
            class="{{ request()->is('users*') ? 'active' : '' }}">

                <i class="bi bi-people"></i>

                User Management

            </a>

            @endif

        </div>

        <!-- ========================= -->
        <!-- CONTENT -->
        <!-- ========================= -->

        <div class="main-content">

            <!-- Navbar -->
            <nav class="navbar navbar-light bg-light border-bottom px-4">

                <div class="container-fluid">

                    <span class="navbar-brand mb-0 h5">

                        Dashboard Monitoring Pendapatan

                    </span>

                    <!-- User Login -->
                    <div class="dropdown">

                        <button class="btn btn-outline-secondary dropdown-toggle"
                                data-bs-toggle="dropdown">

                            {{ auth()->user()->name }}

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <!-- Logout -->
                            <li>

                                <form method="POST"
                                      action="{{ route('logout') }}">

                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item">

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

            <!-- Content halaman -->
            <div class="p-4">

                {{ $slot }}

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>