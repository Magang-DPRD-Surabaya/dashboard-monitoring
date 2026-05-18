<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    User Management

                </h2>

                <p class="text-muted mb-0">

                    Kelola akun pengguna dan hak akses sistem

                </p>

            </div>

            <!-- Tombol tambah user -->
            <a href="{{ route('users.create') }}"
               class="btn btn-primary rounded-3 px-4">

                <i class="bi bi-plus-circle me-1"></i>

                Tambah User

            </a>

        </div>

        <!-- ========================= -->
        <!-- ALERT -->
        <!-- ========================= -->

        @if(session('success'))

            <div class="alert alert-success border-0 shadow-sm rounded-4">

                {{ session('success') }}

            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger border-0 shadow-sm rounded-4">

                {{ session('error') }}

            </div>

        @endif

        <!-- ========================= -->
        <!-- TABLE CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <!-- Header -->
                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Nama</th>

                                <th>Email</th>

                                <th>Role</th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($users as $user)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <!-- Nama -->
                                    <td class="fw-semibold">

                                        {{ $user->name }}

                                    </td>

                                    <!-- Email -->
                                    <td>

                                        {{ $user->email }}

                                    </td>

                                    <!-- Role -->
                                    <td>

                                        @if($user->role == 'admin')

                                            <span class="badge bg-primary rounded-pill px-3 py-2">

                                                Admin

                                            </span>

                                        @else

                                            <span class="badge bg-secondary rounded-pill px-3 py-2">

                                                Viewer

                                            </span>

                                        @endif

                                    </td>

                                    <!-- Tombol aksi -->
                                    <td>

                                        <!-- Edit -->
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="btn btn-warning btn-sm rounded-3">

                                            <i class="bi bi-pencil-square"></i>

                                            Edit

                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('users.destroy', $user->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm rounded-3">

                                                <i class="bi bi-trash"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center text-muted py-4">

                                        Data user belum tersedia

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>