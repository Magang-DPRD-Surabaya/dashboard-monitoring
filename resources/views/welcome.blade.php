<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard Monitoring Komisi B DPRD
    </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {

            background: linear-gradient(
                135deg,
                #0d6efd,
                #0a58ca
            );

            min-height: 100vh;

            color: white;
        }

        /**
         * Hero section
         */
        .hero {

            min-height: 100vh;

            display: flex;

            align-items: center;
        }

        /**
         * Card fitur
         */
        .feature-card {

            border: none;

            border-radius: 15px;

            transition: 0.3s;
        }

        .feature-card:hover {

            transform: translateY(-5px);
        }

        /**
         * Tombol custom
         */
        .btn-custom {

            padding: 12px 24px;

            border-radius: 10px;

            font-weight: 600;
        }

    </style>

</head>

<body>

    <!-- ========================= -->
    <!-- HERO SECTION -->
    <!-- ========================= -->

    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <!-- Text -->
                <div class="col-lg-6">

                    <h1 class="fw-bold display-5 mb-4">

                        Dashboard Monitoring Pendapatan
                        Mitra Kerja Komisi B DPRD Kota Surabaya

                    </h1>

                    <p class="lead mb-4">

                        Sistem monitoring internal untuk memantau
                        target dan realisasi pendapatan mitra kerja
                        secara data-driven dan terintegrasi.

                    </p>

                    <!-- Tombol -->
                    <div class="d-flex gap-3">

                        <!-- Login -->
                        <a href="{{ route('login') }}"
                           class="btn btn-light btn-custom">

                            <i class="bi bi-box-arrow-in-right"></i>

                            Login

                        </a>

                        <!-- Register -->
                        <a href="{{ route('register') }}"
                           class="btn btn-outline-light btn-custom">

                            <i class="bi bi-person-plus"></i>

                            Register

                        </a>

                    </div>

                </div>

                <!-- Illustration -->
                <div class="col-lg-6 text-center mt-5 mt-lg-0">

                    <img src="https://cdn-icons-png.flaticon.com/512/2620/2620971.png"
                         width="350"
                         class="img-fluid">

                </div>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- FITUR -->
    <!-- ========================= -->

    <section class="pb-5">

        <div class="container">

            <div class="row g-4">

                <!-- Monitoring -->
                <div class="col-md-4">

                    <div class="card feature-card shadow">

                        <div class="card-body text-dark p-4">

                            <i class="bi bi-bar-chart-line-fill fs-1 text-primary"></i>

                            <h4 class="mt-3">
                                Monitoring
                            </h4>

                            <p>

                                Memantau target dan realisasi
                                pendapatan mitra kerja setiap tahun.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Dashboard -->
                <div class="col-md-4">

                    <div class="card feature-card shadow">

                        <div class="card-body text-dark p-4">

                            <i class="bi bi-speedometer2 fs-1 text-success"></i>

                            <h4 class="mt-3">
                                Dashboard
                            </h4>

                            <p>

                                Visualisasi data monitoring
                                menggunakan grafik dan statistik.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Reporting -->
                <div class="col-md-4">

                    <div class="card feature-card shadow">

                        <div class="card-body text-dark p-4">

                            <i class="bi bi-file-earmark-pdf-fill fs-1 text-danger"></i>

                            <h4 class="mt-3">
                                Reporting
                            </h4>

                            <p>

                                Download laporan PDF monitoring
                                pendapatan mitra kerja.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- FOOTER -->
    <!-- ========================= -->

    <footer class="text-center py-4">

        <p class="mb-0">

            © {{ date('Y') }}
            Komisi B DPRD Kota Surabaya

        </p>

    </footer>

</body>

</html>