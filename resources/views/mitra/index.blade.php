<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">Data Mitra Kerja</h2>

        <!-- Tombol tambah data -->
        <a href="{{ route('mitra-kerja.create') }}" class="btn btn-primary mb-3">
            Tambah Mitra
        </a>

        <!-- Pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel data -->
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mitra</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($mitra as $item)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_mitra }}</td>

                        <td>{{ $item->jenis }}</td>

                        <td>{{ $item->deskripsi }}</td>

                        <td>

                            <!-- Tombol edit -->
                            <a href="{{ route('mitra-kerja.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- Form hapus -->
                            <form action="{{ route('mitra-kerja.destroy', $item->id) }}"
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
                        <td colspan="5" class="text-center">
                            Data belum tersedia
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>