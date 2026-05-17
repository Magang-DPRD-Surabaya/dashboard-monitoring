<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Edit User
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

        <!-- Form edit -->
        <form action="{{ route('users.update', $user->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-3">

                <label class="form-label">
                    Nama
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $user->name }}">

            </div>

            <!-- Email -->
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $user->email }}">

            </div>

            <!-- Role -->
            <div class="mb-3">

                <label class="form-label">
                    Role
                </label>

                <select name="role"
                        class="form-control">

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
            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <a href="{{ route('users.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>