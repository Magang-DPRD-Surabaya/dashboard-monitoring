<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">Data Tahun Anggaran</h2>

        <!-- Tombol tambah -->
        <a href="{{ route('tahun-anggaran.create') }}"
           class="btn btn-primary mb-3">

            Tambah Tahun

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
                    <th>Tahun</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($tahun as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->tahun }}</td>

                        <td>

                            <!-- Tombol edit -->
                            <a href="{{ route('tahun-anggaran.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <!-- Form hapus -->
                            <form action="{{ route('tahun-anggaran.destroy', $item->id) }}"
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