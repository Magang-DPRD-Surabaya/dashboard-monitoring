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
         * Card login
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

                                Komisi B DPRD

                            </h2>

                            <p class="text-muted">

                                Dashboard Monitoring Pendapatan

                            </p>

                        </div>

                        <!-- Session -->
                        @if(session('status'))

                            <div class="alert alert-success">

                                {{ session('status') }}

                            </div>

                        @endif

                        <!-- Error -->
                        @if($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        <!-- Form -->
                        <form method="POST"
                              action="{{ route('login') }}">

                            @csrf

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

                            <!-- Remember -->
                            <div class="form-check mb-3">

                                <input type="checkbox"
                                       class="form-check-input"
                                       name="remember">

                                <label class="form-check-label">

                                    Remember me

                                </label>

                            </div>

                            <!-- Tombol -->
                            <button type="submit"
                                    class="btn btn-primary w-100">

                                Login

                            </button>

                        </form>

                        <!-- Register -->
                        <div class="text-center mt-4">

                            <small>

                                Belum punya akun?

                                <a href="{{ route('register') }}">

                                    Register

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