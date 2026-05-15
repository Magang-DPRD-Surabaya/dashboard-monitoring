<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">
            Data Pendapatan Mitra
        </h2>

        <!-- Tombol tambah -->
        <a href="{{ route('pendapatan.create') }}"
           class="btn btn-primary mb-3">

            Tambah Pendapatan

        </a>

        <!-- Alert sukses -->
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- Tabel pendapatan -->
        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>
                    <th>No</th>
                    <th>Mitra</th>
                    <th>Tahun</th>
                    <th>Target</th>
                    <th>Realisasi</th>
                    <th>Persentase</th>
                    <th>Status</th>
                    <th>Kondisi</th>
                    <th width="200">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($pendapatan as $item)

                    <tr>

                        <!-- Nomor urut -->
                        <td>{{ $loop->iteration }}</td>

                        <!-- Nama mitra -->
                        <td>{{ $item->mitra->nama_mitra }}</td>

                        <!-- Tahun -->
                        <td>{{ $item->tahun->tahun }}</td>

                        <!-- Target -->
                        <td>
                            Rp {{ number_format($item->target, 0, ',', '.') }}
                        </td>

                        <!-- Realisasi -->
                        <td>
                            Rp {{ number_format($item->realisasi, 0, ',', '.') }}
                        </td>

                        <!-- Persentase -->
                        <td>
                            {{ number_format($item->persentase, 2) }}%
                        </td>

                        <!-- Status -->
                        <td>

                            @if($item->persentase >= 80)

                                <span class="badge bg-success">
                                    {{ $item->status->nama_status }}
                                </span>

                            @elseif($item->persentase >= 50)

                                <span class="badge bg-warning text-dark">
                                    {{ $item->status->nama_status }}
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    {{ $item->status->nama_status }}
                                </span>

                            @endif

                        </td>

                        <!-- Kondisi -->
                        <td>
                            {{ $item->kondisi->nama_kondisi }}
                        </td>

                        <!-- Tombol aksi -->
                        <td>

                            <!-- Tombol edit -->
                            <a href="{{ route('pendapatan.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <!-- Form hapus -->
                            <form action="{{ route('pendapatan.destroy', $item->id) }}"
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

                        <td colspan="9"
                            class="text-center">

                            Data pendapatan belum tersedia

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>