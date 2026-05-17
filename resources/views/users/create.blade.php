<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Tambah User
        </h2>

        <!-- Error validasi -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- Form tambah -->
        <form action="{{ route('users.store') }}"
              method="POST">

            @csrf

            <!-- Nama -->
            <div class="mb-3">

                <label class="form-label">
                    Nama
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name') }}">

            </div>

            <!-- Email -->
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}">

            </div>

            <!-- Password -->
            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control">

            </div>

            <!-- Role -->
            <div class="mb-3">

                <label class="form-label">
                    Role
                </label>

                <select name="role"
                        class="form-control">

                    <option value="admin">
                        Admin
                    </option>

                    <option value="viewer">
                        Viewer
                    </option>

                </select>

            </div>

            <!-- Tombol -->
            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('users.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>