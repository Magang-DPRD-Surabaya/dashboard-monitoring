<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Edit Mitra Kerja

            </h2>

            <p class="text-muted mb-0">

                Perbarui data mitra kerja

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

                <form action="{{ route('mitra-kerja.update', $mitra->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Nama Mitra -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            Nama Mitra

                        </label>

                        <input type="text"
                               name="nama_mitra"
                               class="form-control rounded-3"
                               value="{{ $mitra->nama_mitra }}">

                    </div>

                    <!-- Jenis -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            Jenis Mitra

                        </label>

                        <select name="jenis"
                                class="form-select rounded-3">

                            <option value="BUMD"
                                {{ $mitra->jenis == 'BUMD' ? 'selected' : '' }}>

                                BUMD

                            </option>

                            <option value="DINAS"
                                {{ $mitra->jenis == 'DINAS' ? 'selected' : '' }}>

                                DINAS

                            </option>

                        </select>

                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Deskripsi

                        </label>

                        <textarea name="deskripsi"
                                  class="form-control rounded-3"
                                  rows="4">{{ $mitra->deskripsi }}</textarea>

                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-save me-1"></i>

                            Update

                        </button>

                        <a href="{{ route('mitra-kerja.index') }}"
                           class="btn btn-secondary rounded-3 px-4">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>