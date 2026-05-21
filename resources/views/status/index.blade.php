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

                <!-- Judul -->
                <h2 class="fw-bold mb-1">

                    Data Status Capaian

                </h2>

                <!-- Subjudul -->
                <p class="text-muted mb-0">

                    Kelola status capaian monitoring pendapatan

                </p>

            </div>

            <!-- Tombol tambah -->
            <a href="{{ route('status-capaian.create') }}"
               class="btn btn-primary rounded-3 px-4 shadow-sm">

                <i class="bi bi-plus-circle me-1"></i>

                Tambah Status

            </a>

        </div>

        <!-- ========================= -->
        <!-- ALERT -->
        <!-- ========================= -->

        @if(session('success'))

            <div class="alert alert-success border-0 shadow-sm rounded-4">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

            </div>

        @endif

        <!-- ========================= -->
        <!-- TABLE CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle table-hover">

                        <!-- Header tabel -->
                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>Nama Status</th>

                                <th width="200">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($status as $item)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <!-- Status -->
                                    <td>

                                        <!-- Badge status -->
                                        @if($item->nama_status == 'Baik')

                                            <span class="badge bg-success rounded-pill px-3 py-2">

                                                {{ $item->nama_status }}

                                            </span>

                                        @elseif($item->nama_status == 'Perlu Perhatian')

                                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                                {{ $item->nama_status }}

                                            </span>

                                        @else

                                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                                {{ $item->nama_status }}

                                            </span>

                                        @endif

                                    </td>

                                    <!-- Aksi -->
                                    <td>

                                        <div class="d-flex flex-wrap gap-2">

                                        <!-- Tombol edit -->
                                        <a href="{{ route('status-capaian.edit', $item->id) }}"
                                           class="btn btn-warning btn-sm rounded-3">

                                            <i class="bi bi-pencil-square"></i>

                                            Edit

                                        </a>

                                        <!-- Form hapus -->
                                        <!-- Tombol Hapus -->
                                        <button type="button"
                                                class="btn btn-danger btn-sm rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#hapusStatus{{ $item->id }}">

                                            <i class="bi bi-trash"></i>

                                            Hapus

                                        </button>

                                        <!-- ================= MODAL DELETE ================= -->
                                        <div class="modal fade"
                                            id="hapusStatus{{ $item->id }}"
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

                                                        Apakah Anda yakin ingin menghapus status:

                                                        <strong>

                                                            {{ $item->nama_status }}

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
                                                        <form action="{{ route('status-capaian.destroy', $item->id) }}"
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

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <!-- Empty state -->
                                <tr>

                                    <td colspan="3"
                                        class="text-center py-5">

                                        <i class="bi bi-clipboard-x fs-1 text-muted"></i>

                                        <p class="text-muted mt-3 mb-0">

                                            Data status capaian belum tersedia

                                        </p>

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