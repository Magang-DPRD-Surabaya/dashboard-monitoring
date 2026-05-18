<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">
            Data Pendapatan Mitra
        </h2>

        @if(auth()->user()->role == 'admin')
        <!-- Tombol tambah -->
        <a href="{{ route('pendapatan.create') }}"
           class="btn btn-primary mb-3">

            Tambah Pendapatan

        </a>
        @endif

        <!-- Alert sukses -->
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- SEARCH -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body">

                <form method="GET"
                    action="{{ route('pendapatan.index') }}">

                    <div class="row g-2">

                        <!-- Input -->
                        <div class="col-md-10">

                            <input type="text"
                                name="search"
                                class="form-control rounded-3"
                                placeholder="Cari nama mitra kerja..."
                                value="{{ request('search') }}">

                        </div>

                        <!-- Tombol -->
                        <div class="col-md-2">

                            <button type="submit"
                                    class="btn btn-primary w-100 rounded-3">

                                <i class="bi bi-search"></i>

                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>
        
        <!-- Tabel pendapatan -->
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle table-striped">

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

                                    @if(auth()->user()->role == 'admin')
                                    <!-- Tombol aksi -->
                                    <td>

                                        <!-- Tombol edit -->
                                        <a href="{{ route('pendapatan.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm rounded-3">

                                            Edit

                                        </a>

                                        <!-- Form hapus -->
                                        <form action="{{ route('pendapatan.destroy', $item->id) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm rounded-3">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>
                                    @endif
                                    
                                </tr>

                            @empty

                                <tr>

                                    <td colspan="9"
                                        class="text-center">
                                        <div class="text-center py-4">

                                            <i class="bi bi-inbox fs-1 text-muted"></i>

                                            <p class="text-muted mt-2">

                                                Data pendapatan belum tersedia

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
        
        <div class="mt-4">

            {{ $pendapatan->links() }}

        </div>
    </div>

</x-app-layout>