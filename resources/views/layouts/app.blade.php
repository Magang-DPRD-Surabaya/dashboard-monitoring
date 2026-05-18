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

        body {

            background-color: #f4f7fb;

            font-family: 'Segoe UI', sans-serif;
        }

        /**
         * Sidebar
         */
        .sidebar {

            width: 260px;

            min-height: 100vh;

            background: linear-gradient(
                180deg,
                #0d1b2a,
                #1b263b
            );

            position: fixed;

            left: 0;

            top: 0;

            overflow-y: auto;

            z-index: 1000;
        }

        /**
         * Logo sidebar
         */
        .sidebar-brand {

            padding: 24px 20px;

            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand h4 {

            color: white;

            font-weight: 700;

            margin-bottom: 0;
        }

        .sidebar-brand p {

            color: rgba(255,255,255,0.7);

            font-size: 14px;

            margin-bottom: 0;
        }

        /**
         * Menu sidebar
         */
        .sidebar-menu {

            padding: 20px 12px;
        }

        .sidebar-menu a {

            color: rgba(255,255,255,0.85);

            text-decoration: none;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 12px 16px;

            margin-bottom: 8px;

            border-radius: 12px;

            transition: all 0.3s ease;

            font-size: 15px;

            font-weight: 500;
        }

        /**
         * Hover menu
         */
        .sidebar-menu a:hover {

            background-color: rgba(255,255,255,0.08);

            color: white;

            transform: translateX(4px);
        }

        /**
         * Active menu
         */
        .sidebar-menu .active {

            background: linear-gradient(
                135deg,
                #0d6efd,
                #3b82f6
            );

            color: white;

            box-shadow: 0 4px 12px rgba(13,110,253,0.3);
        }

        /**
         * Icon
         */
        .sidebar-menu i {

            font-size: 18px;
        }

        /**
         * Main content
         */
        .main-content {

            margin-left: 260px;

            min-height: 100vh;
        }

        /**
         * Navbar
         */
        .top-navbar {

            background-color: white;

            padding: 16px 24px;

            border-bottom: 1px solid #e9ecef;

            position: sticky;

            top: 0;

            z-index: 999;
        }

        .navbar-title {

            font-size: 20px;

            font-weight: 700;

            color: #1b263b;
        }

        /**
         * User button
         */
        .user-btn {

            border-radius: 12px;

            padding: 8px 16px;

            font-weight: 500;
        }

        /**
         * Content
         */
        .page-content {

            padding: 24px;
        }

        /**
         * Responsive
         */
        @media (max-width: 991px) {

            .sidebar {

                width: 100%;

                min-height: auto;

                position: relative;
            }

            .main-content {

                margin-left: 0;
            }
        }

    </style>

</head>

<body>

    <div class="sidebar">

        <!-- Brand -->
        <div class="sidebar-brand">

            <h4>
                Komisi B DPRD
            </h4>

            <p>
                Dashboard Monitoring
            </p>

        </div>

        <!-- Menu -->
        <div class="sidebar-menu">

            <!-- Dashboard -->
            <a href="/dashboard"
               class="{{ request()->is('dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                <span>
                    Dashboard
                </span>

            </a>

            @if(auth()->user()->role == 'admin')

            <!-- Mitra Kerja -->
            <a href="/mitra-kerja"
               class="{{ request()->is('mitra-kerja*') ? 'active' : '' }}">

                <i class="bi bi-buildings"></i>

                <span>
                    Mitra Kerja
                </span>

            </a>

            <!-- Tahun Anggaran -->
            <a href="/tahun-anggaran"
               class="{{ request()->is('tahun-anggaran*') ? 'active' : '' }}">

                <i class="bi bi-calendar-event"></i>

                <span>
                    Tahun Anggaran
                </span>

            </a>

            <!-- Status -->
            <a href="/status-capaian"
               class="{{ request()->is('status-capaian*') ? 'active' : '' }}">

                <i class="bi bi-bar-chart"></i>

                <span>
                    Status Capaian
                </span>

            </a>

            <!-- Kondisi -->
            <a href="/kondisi-lingkungan"
               class="{{ request()->is('kondisi-lingkungan*') ? 'active' : '' }}">

                <i class="bi bi-globe"></i>

                <span>
                    Kondisi Lingkungan
                </span>

            </a>

            @endif

            <!-- Pendapatan -->
            <a href="/pendapatan"
               class="{{ request()->is('pendapatan*') ? 'active' : '' }}">

                <i class="bi bi-cash-stack"></i>

                <span>
                    Pendapatan
                </span>

            </a>

            @if(auth()->user()->role == 'admin')

            <!-- Activity Log -->
            <a href="/activity-log"
               class="{{ request()->is('activity-log*') ? 'active' : '' }}">

                <i class="bi bi-clock-history"></i>

                <span>
                    Activity Log
                </span>

            </a>

            <!-- User -->
            <a href="/users"
               class="{{ request()->is('users*') ? 'active' : '' }}">

                <i class="bi bi-people"></i>

                <span>
                    User Management
                </span>

            </a>

            @endif

        </div>

    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Navbar -->
        <div class="top-navbar d-flex justify-content-between align-items-center">

            <div class="navbar-title">

                Dashboard Monitoring Pendapatan

            </div>

            <!-- User -->
            <div class="dropdown">

                <button class="btn btn-light border user-btn dropdown-toggle"
                        data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle me-1"></i>

                    {{ auth()->user()->name }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                    <li>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                    class="dropdown-item">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

        <!-- Content -->
        <div class="page-content">

            {{ $slot }}

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>