<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">
            Data Kondisi Lingkungan
        </h2>

        <!-- Tombol tambah -->
        <a href="{{ route('kondisi-lingkungan.create') }}"
           class="btn btn-primary mb-3">

            Tambah Kondisi

        </a>

        <!-- Alert sukses -->
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
                    <th>Nama Kondisi</th>
                    <th width="200">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($kondisi as $item)

                    <tr>

                        <!-- Nomor urut -->
                        <td>{{ $loop->iteration }}</td>

                        <!-- Nama kondisi -->
                        <td>{{ $item->nama_kondisi }}</td>

                        <td>

                            <!-- Tombol edit -->
                            <a href="{{ route('kondisi-lingkungan.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <!-- Form hapus -->
                            <form action="{{ route('kondisi-lingkungan.destroy', $item->id) }}"
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