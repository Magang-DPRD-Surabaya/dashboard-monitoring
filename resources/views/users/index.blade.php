<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            User Management
        </h2>

        <!-- Tombol tambah -->
        <a href="{{ route('users.create') }}"
           class="btn btn-primary mb-3">

            Tambah User

        </a>

        <!-- Alert -->
        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif

        <!-- Tabel -->
        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>No</th>

                    <th>Nama</th>

                    <th>Email</th>

                    <th>Role</th>

                    <th width="200">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $user->role }}

                            </span>

                        </td>

                        <td>

                            <!-- Edit -->
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <!-- Delete -->
                            <form action="{{ route('users.destroy', $user->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center">

                            Data user belum tersedia

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>