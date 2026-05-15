<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Data Status Capaian
        </h2>

        <!-- Tombol tambah -->
        <a href="{{ route('status-capaian.create') }}"
           class="btn btn-primary mb-3">

            Tambah Status

        </a>

        <!-- Alert sukses -->
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- Tabel -->
        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Status</th>
                    <th width="200">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($status as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_status }}</td>

                        <td>

                            <!-- Tombol edit -->
                            <a href="{{ route('status-capaian.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <!-- Form hapus -->
                            <form action="{{ route('status-capaian.destroy', $item->id) }}"
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

                        <td colspan="3" class="text-center">
                            Data belum tersedia
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>