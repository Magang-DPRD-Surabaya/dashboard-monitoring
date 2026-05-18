<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Edit User

            </h2>

            <p class="text-muted mb-0">

                Perbarui data akun dan hak akses pengguna

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

                <!-- Form edit -->
                <form action="{{ route('users.update', $user->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Nama

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control rounded-3"
                               value="{{ $user->name }}"
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
                               value="{{ $user->email }}"
                               placeholder="Masukkan email user">

                    </div>

                    <!-- Role -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Role

                        </label>

                        <!-- Gunakan form-select -->
                        <select name="role"
                                class="form-select rounded-3">

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>

                                Admin

                            </option>

                            <option value="viewer"
                                {{ $user->role == 'viewer' ? 'selected' : '' }}>

                                Viewer

                            </option>

                        </select>

                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-2">

                        <!-- Update -->
                        <button type="submit"
                                class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-save me-1"></i>

                            Update

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