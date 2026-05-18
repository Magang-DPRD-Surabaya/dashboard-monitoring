<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Tambah Tahun Anggaran

            </h2>

            <p class="text-muted mb-0">

                Tambahkan data tahun anggaran baru

            </p>

        </div>

        <!-- ========================= -->
        <!-- VALIDATION -->
        <!-- ========================= -->

        @if ($errors->any())

            <div class="alert alert-danger border-0 shadow-sm rounded-4">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- ========================= -->
        <!-- FORM CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <!-- Form tambah -->
                <form action="{{ route('tahun-anggaran.store') }}"
                      method="POST">

                    @csrf

                    <!-- Input tahun -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Tahun Anggaran

                        </label>

                        <input type="number"
                               name="tahun"
                               class="form-control rounded-3"
                               placeholder="Contoh: 2025"
                               value="{{ old('tahun') }}">

                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-save me-1"></i>

                            Simpan

                        </button>

                        <a href="{{ route('tahun-anggaran.index') }}"
                           class="btn btn-secondary rounded-3 px-4">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>