<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Login
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
        }

        /**
         * Card register
         */
        .auth-card {

            border: none;

            border-radius: 20px;
        }

        /**
         * Judul
         */
        .auth-title {

            font-weight: bold;

            color: #0d6efd;
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-5">

                <div class="card auth-card shadow-lg">

                    <div class="card-body p-5">

                        <!-- Judul -->
                        <div class="text-center mb-4">

                            <h2 class="auth-title">

                                Register Akun

                            </h2>

                            <p class="text-muted">

                                Akun yang didaftarkan akan memiliki akses viewer

                            </p>

                        </div>

                        <!-- Form -->
                        <form method="POST"
                              action="{{ route('register') }}">

                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">

                                <label class="form-label">

                                    Nama

                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       required>

                            </div>

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">

                                    Email

                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       required>

                            </div>

                            <!-- Password -->
                            <div class="mb-3">

                                <label class="form-label">

                                    Password

                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       required>

                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-3">

                                <label class="form-label">

                                    Konfirmasi Password

                                </label>

                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       required>

                            </div>

                            <!-- Tombol -->
                            <button type="submit"
                                    class="btn btn-primary w-100">

                                Register

                            </button>

                        </form>

                        <!-- Login -->
                        <div class="text-center mt-4">

                            <small>

                                Sudah punya akun?

                                <a href="{{ route('login') }}">

                                    Login

                                </a>

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>