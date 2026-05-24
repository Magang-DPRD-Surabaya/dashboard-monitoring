<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="d-flex flex-column flex-md-row
            justify-content-between
            align-items-start
            align-items-md-center
            gap-3
            mb-4">

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

                    <div class="row g-2 align-items-end">

                        <!-- Filter mitra kerja -->
                        <div class="col-md-5">

                            <select name="mitra_id"
                                    class="form-select rounded-3">

                                <option value="">
                                    Semua Mitra Kerja
                                </option>

                                @foreach($mitraList as $mitra)

                                    <option value="{{ $mitra->id }}"
                                        @selected(request('mitra_id') == $mitra->id)>
                                        {{ $mitra->nama_mitra }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Filter tahun -->
                        <div class="col-md-4">

                            <select name="tahun_id"
                                    class="form-select rounded-3">

                                <option value="">
                                    Semua Tahun
                                </option>

                                @foreach($tahunList as $tahun)

                                    <option value="{{ $tahun->id }}"
                                        @selected(request('tahun_id') == $tahun->id)>
                                        {{ $tahun->tahun }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Tombol cari -->
                        <div class="col-md-3 d-grid">

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

        <!-- ========================= -->
        <!-- DATA PENDAPATAN BUMD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-header bg-primary text-white rounded-top-4">

                <h5 class="mb-0 fw-semibold">

                    Data Pendapatan BUMD

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <!-- Header tabel -->
                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Mitra</th>

                                <th>Tahun</th>

                                <th>Pemodalan</th>

                                <th>Target</th>

                                <th>Realisasi</th>

                                <th>Persentase</th>

                                <th>Dividen</th>

                                <th>Status</th>

                                <th>Kondisi</th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @php $noBumd = 1; @endphp

                            @forelse($pendapatan->where('mitra.jenis', 'BUMD') as $item)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $noBumd++ }}

                                    </td>

                                    <!-- Nama mitra -->
                                    <td class="fw-semibold">

                                        {{ $item->mitra->nama_mitra }}

                                    </td>

                                    <!-- Tahun -->
                                    <td>

                                        {{ $item->tahun->tahun }}

                                    </td>

                                    <!-- Pemodalan -->
                                    <td>

                                        Rp {{ number_format($item->pemodalan, 0, ',', '.') }}

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

                                    <!-- Dividen -->
                                    <td>

                                        Rp {{ number_format($item->dividen, 0, ',', '.') }}

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

                                        <div class="d-flex flex-wrap gap-2">

                                        @if(auth()->user()->role == 'admin')

                                            <!-- Edit -->
                                            <a href="{{ route('pendapatan.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm rounded-3">

                                                <i class="bi bi-pencil-square"></i>

                                                Edit

                                            </a>

                                            <!-- Tombol Hapus -->
                                            <button type="button"
                                                    class="btn btn-danger btn-sm rounded-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusPendapatan{{ $item->id }}">

                                                <i class="bi bi-trash"></i>

                                                Hapus

                                            </button>

                                            <!-- ================= MODAL DELETE ================= -->
                                            <div class="modal fade"
                                                id="hapusPendapatan{{ $item->id }}"
                                                tabindex="-1"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">

                                                    <div class="modal-content rounded-4 border-0 shadow">

                                                        <!-- Header Modal -->
                                                        <div class="modal-header border-0">

                                                            <h5 class="modal-title fw-bold text-danger">

                                                                <i class="bi bi-exclamation-triangle-fill"></i>

                                                                Konfirmasi Hapus

                                                            </h5>

                                                            <!-- Tombol close -->
                                                            <button type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal">

                                                            </button>

                                                        </div>

                                                        <!-- Body Modal -->
                                                        <div class="modal-body">

                                                            Apakah Anda yakin ingin menghapus data pendapatan dari mitra:

                                                            <strong>

                                                                {{ $item->mitra->nama_mitra }}

                                                            </strong> ?

                                                        </div>

                                                        <!-- Footer Modal -->
                                                        <div class="modal-footer border-0">

                                                            <!-- Tombol batal -->
                                                            <button type="button"
                                                                    class="btn btn-secondary rounded-3"
                                                                    data-bs-dismiss="modal">

                                                                Batal

                                                            </button>

                                                            <!-- Form hapus -->
                                                            <form action="{{ route('pendapatan.destroy', $item->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                        class="btn btn-danger rounded-3">

                                                                    Ya, Hapus

                                                                </button>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @else

                                            <span class="text-muted small">

                                                Viewer Only

                                            </span>

                                        @endif

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="11"
                                        class="text-center text-muted py-4">

                                        Data pendapatan BUMD belum tersedia

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- ========================= -->
        <!-- DATA PENDAPATAN DINAS -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-success text-white rounded-top-4">

                <h5 class="mb-0 fw-semibold">

                    Data Pendapatan DINAS

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <!-- Header tabel -->
                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Mitra</th>

                                <th>Tahun</th>

                                <th>Pemodalan</th>

                                <th>Target</th>

                                <th>Realisasi</th>

                                <th>Persentase</th>

                                <th>Dividen</th>

                                <th>Status</th>

                                <th>Kondisi</th>

                                <th width="180">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @php $noDinas = 1; @endphp

                            @forelse($pendapatan->where('mitra.jenis', 'DINAS') as $item)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $noDinas++ }}

                                    </td>

                                    <!-- Nama mitra -->
                                    <td class="fw-semibold">

                                        {{ $item->mitra->nama_mitra }}

                                    </td>

                                    <!-- Tahun -->
                                    <td>

                                        {{ $item->tahun->tahun }}

                                    </td>

                                    <!-- Pemodalan -->
                                    <td>

                                        Rp {{ number_format($item->pemodalan, 0, ',', '.') }}

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

                                    <!-- Dividen -->
                                    <td>

                                        Rp {{ number_format($item->dividen, 0, ',', '.') }}

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

                                        <div class="d-flex flex-wrap gap-2">

                                        @if(auth()->user()->role == 'admin')

                                            <!-- Edit -->
                                            <a href="{{ route('pendapatan.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm rounded-3">

                                                <i class="bi bi-pencil-square"></i>

                                                Edit

                                            </a>

                                            <!-- Tombol Hapus -->
                                            <button type="button"
                                                    class="btn btn-danger btn-sm rounded-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusPendapatan{{ $item->id }}">

                                                <i class="bi bi-trash"></i>

                                                Hapus

                                            </button>

                                            <!-- ================= MODAL DELETE ================= -->
                                            <div class="modal fade"
                                                id="hapusPendapatan{{ $item->id }}"
                                                tabindex="-1"
                                                aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">

                                                    <div class="modal-content rounded-4 border-0 shadow">

                                                        <!-- Header Modal -->
                                                        <div class="modal-header border-0">

                                                            <h5 class="modal-title fw-bold text-danger">

                                                                <i class="bi bi-exclamation-triangle-fill"></i>

                                                                Konfirmasi Hapus

                                                            </h5>

                                                            <!-- Tombol close -->
                                                            <button type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal">

                                                            </button>

                                                        </div>

                                                        <!-- Body Modal -->
                                                        <div class="modal-body">

                                                            Apakah Anda yakin ingin menghapus data pendapatan dari mitra:

                                                            <strong>

                                                                {{ $item->mitra->nama_mitra }}

                                                            </strong> ?

                                                        </div>

                                                        <!-- Footer Modal -->
                                                        <div class="modal-footer border-0">

                                                            <!-- Tombol batal -->
                                                            <button type="button"
                                                                    class="btn btn-secondary rounded-3"
                                                                    data-bs-dismiss="modal">

                                                                Batal

                                                            </button>

                                                            <!-- Form hapus -->
                                                            <form action="{{ route('pendapatan.destroy', $item->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                        class="btn btn-danger rounded-3">

                                                                    Ya, Hapus

                                                                </button>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @else

                                            <span class="text-muted small">

                                                Viewer Only

                                            </span>

                                        @endif

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="11"
                                        class="text-center text-muted py-4">

                                        Data pendapatan DINAS belum tersedia

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