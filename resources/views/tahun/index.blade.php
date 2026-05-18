<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <!-- Judul -->
                <h2 class="fw-bold mb-1">

                    Data Tahun Anggaran

                </h2>

                <!-- Subjudul -->
                <p class="text-muted mb-0">

                    Kelola data tahun anggaran monitoring pendapatan

                </p>

            </div>

            <!-- Tombol tambah -->
            <a href="{{ route('tahun-anggaran.create') }}"
               class="btn btn-primary rounded-3 px-4 shadow-sm">

                <i class="bi bi-plus-circle me-1"></i>

                Tambah Tahun

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

                                <th>Tahun Anggaran</th>

                                <th width="200">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($tahun as $item)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <!-- Tahun -->
                                    <td>

                                        <span class="badge bg-primary rounded-pill px-3 py-2">

                                            {{ $item->tahun }}

                                        </span>

                                    </td>

                                    <!-- Aksi -->
                                    <td>

                                        <!-- Tombol edit -->
                                        <a href="{{ route('tahun-anggaran.edit', $item->id) }}"
                                           class="btn btn-warning btn-sm rounded-3">

                                            <i class="bi bi-pencil-square"></i>

                                            Edit

                                        </a>

                                        <!-- Form hapus -->
                                        <!-- Tombol Hapus -->
                                        <button type="button"
                                                class="btn btn-danger btn-sm rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#hapusTahun{{ $item->id }}">

                                            <i class="bi bi-trash"></i>

                                            Hapus

                                        </button>

                                        <!-- ================= MODAL DELETE ================= -->
                                        <div class="modal fade"
                                            id="hapusTahun{{ $item->id }}"
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

                                                        Apakah Anda yakin ingin menghapus tahun anggaran:

                                                        <strong>

                                                            {{ $item->tahun }}

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
                                                        <form action="{{ route('tahun-anggaran.destroy', $item->id) }}"
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

                                    </td>

                                </tr>

                            @empty

                                <!-- Empty state -->
                                <tr>

                                    <td colspan="3"
                                        class="text-center py-5">

                                        <i class="bi bi-calendar-x fs-1 text-muted"></i>

                                        <p class="text-muted mt-3 mb-0">

                                            Data tahun anggaran belum tersedia

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