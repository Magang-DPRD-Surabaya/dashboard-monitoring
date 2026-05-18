<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Tambah User

            </h2>

            <p class="text-muted mb-0">

                Tambahkan akun baru dan tentukan hak akses pengguna

            </p>

        </div>

        <!-- ========================= -->
        <!-- ALERT ERROR -->
        <!-- ========================= -->

        @if ($errors->any())

            <div class="alert alert-danger border-0 shadow-sm rounded-4">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- ========================= -->
        <!-- FORM CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('users.store') }}"
                      method="POST">

                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Nama

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control rounded-3"
                               value="{{ old('name') }}"
                               placeholder="Masukkan nama user">

                    </div>

                    <!-- Email -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Email

                        </label>

                        <input type="email"
                               name="email"
                               class="form-control rounded-3"
                               value="{{ old('email') }}"
                               placeholder="Masukkan email user">

                    </div>

                    <!-- Password -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Password

                        </label>

                        <input type="password"
                               name="password"
                               class="form-control rounded-3"
                               placeholder="Masukkan password">

                    </div>

                    <!-- Role -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Role

                        </label>

                        <!-- form-select lebih cocok untuk dropdown -->
                        <select name="role"
                                class="form-select rounded-3">

                            <option value="admin">

                                Admin

                            </option>

                            <option value="viewer">

                                Viewer

                            </option>

                        </select>

                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-2">

                        <!-- Simpan -->
                        <button type="submit"
                                class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-save me-1"></i>

                            Simpan

                        </button>

                        <!-- Kembali -->
                        <a href="{{ route('users.index') }}"
                           class="btn btn-secondary rounded-3 px-4">

                            <i class="bi bi-arrow-left me-1"></i>

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>