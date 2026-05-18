<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    Data Pendapatan Mitra

                </h2>

                <p class="text-muted mb-0">

                    Monitoring target dan realisasi pendapatan mitra kerja

                </p>

            </div>

            <!-- Tombol tambah -->
            @if(auth()->user()->role == 'admin')

                <a href="{{ route('pendapatan.create') }}"
                   class="btn btn-primary rounded-3 px-4">

                    <i class="bi bi-plus-circle me-1"></i>

                    Tambah Pendapatan

                </a>

            @endif

        </div>

        <!-- ========================= -->
        <!-- ALERT -->
        <!-- ========================= -->

        @if(session('success'))

            <div class="alert alert-success border-0 shadow-sm rounded-4">

                {{ session('success') }}

            </div>

        @endif

        <!-- ========================= -->
        <!-- SEARCH CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body">

                <form action="{{ route('pendapatan.index') }}"
                      method="GET">

                    <div class="row g-2">

                        <!-- Input search -->
                        <div class="col-md-10">

                            <input type="text"
                                   name="search"
                                   class="form-control rounded-3"
                                   placeholder="Cari nama mitra kerja..."
                                   value="{{ request('search') }}">

                        </div>

                        <!-- Tombol cari -->
                        <div class="col-md-2 d-grid">

                            <button type="submit"
                                    class="btn btn-primary rounded-3">

                                <i class="bi bi-search me-1"></i>

                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- ========================= -->
        <!-- TABLE CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <!-- Header tabel -->
                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Mitra</th>

                                <th>Tahun</th>

                                <th>Target</th>

                                <th>Realisasi</th>

                                <th>Persentase</th>

                                <th>Status</th>

                                <th>Kondisi</th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($pendapatan as $item)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <!-- Nama mitra -->
                                    <td class="fw-semibold">

                                        {{ $item->mitra->nama_mitra }}

                                    </td>

                                    <!-- Tahun -->
                                    <td>

                                        {{ $item->tahun->tahun }}

                                    </td>

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

                                        <span class="badge bg-info text-dark rounded-pill px-3 py-2">

                                            {{ number_format($item->persentase, 2) }}%

                                        </span>

                                    </td>

                                    <!-- Status -->
                                    <td>

                                        @if($item->status->nama_status == 'Baik')

                                            <span class="badge bg-success rounded-pill px-3 py-2">

                                                {{ $item->status->nama_status }}

                                            </span>

                                        @elseif($item->status->nama_status == 'Perlu Perhatian')

                                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                                {{ $item->status->nama_status }}

                                            </span>

                                        @else

                                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                                {{ $item->status->nama_status }}

                                            </span>

                                        @endif

                                    </td>

                                    <!-- Kondisi -->
                                    <td>

                                        @if($item->kondisi->nama_kondisi == 'Stabil')

                                            <span class="badge bg-primary rounded-pill px-3 py-2">

                                                {{ $item->kondisi->nama_kondisi }}

                                            </span>

                                        @elseif($item->kondisi->nama_kondisi == 'Kurang Stabil')

                                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                                {{ $item->kondisi->nama_kondisi }}

                                            </span>

                                        @else

                                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                                {{ $item->kondisi->nama_kondisi }}

                                            </span>

                                        @endif

                                    </td>

                                    <!-- Tombol aksi -->
                                    <td>

                                        @if(auth()->user()->role == 'admin')

                                            <!-- Edit -->
                                            <a href="{{ route('pendapatan.edit', $item->id) }}"
                                               class="btn btn-warning btn-sm rounded-3">

                                                <i class="bi bi-pencil-square"></i>

                                                Edit

                                            </a>

                                            <!-- Hapus -->
                                            <form action="{{ route('pendapatan.destroy', $item->id) }}"
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

                                        @else

                                            <span class="text-muted small">

                                                Viewer Only

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="9"
                                        class="text-center text-muted py-4">

                                        Data pendapatan belum tersedia

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