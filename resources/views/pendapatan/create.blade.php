<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Tambah Data Pendapatan

            </h2>

            <p class="text-muted mb-0">

                Tambahkan data monitoring pendapatan mitra kerja

            </p>

        </div>

        <!-- ========================= -->
        <!-- VALIDATION ERROR -->
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
                <form action="{{ route('pendapatan.store') }}"
                      method="POST">

                    @csrf

                    <!-- ========================= -->
                    <!-- GRID FORM -->
                    <!-- ========================= -->

                    <div class="row">

                        <!-- Mitra kerja -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">

                                Mitra Kerja

                            </label>

                            <select name="mitra_id"
                                    class="form-select rounded-3">

                                <option value="">
                                    -- Pilih Mitra --
                                </option>

                                @foreach($mitra as $item)

                                    <option value="{{ $item->id }}">

                                        {{ $item->nama_mitra }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Tahun -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">

                                Tahun Anggaran

                            </label>

                            <select name="tahun_id"
                                    class="form-select rounded-3">

                                <option value="">
                                    -- Pilih Tahun --
                                </option>

                                @foreach($tahun as $item)

                                    <option value="{{ $item->id }}">

                                        {{ $item->tahun }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Target -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">

                                Target Pendapatan

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    Rp
                                </span>

                                <input type="number"
                                       name="target"
                                       class="form-control rounded-end-3">

                            </div>

                        </div>

                        <!-- Realisasi -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">

                                Realisasi Pendapatan

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    Rp
                                </span>

                                <input type="number"
                                       name="realisasi"
                                       class="form-control rounded-end-3">

                            </div>

                        </div>

                        <!-- Kondisi -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label fw-semibold">

                                Kondisi Lingkungan

                            </label>

                            <select name="kondisi_id"
                                    class="form-select rounded-3">

                                <option value="">
                                    -- Pilih Kondisi --
                                </option>

                                @foreach($kondisi as $item)

                                    <option value="{{ $item->id }}">

                                        {{ $item->nama_kondisi }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Catatan -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label fw-semibold">

                                Catatan

                            </label>

                            <textarea name="catatan"
                                      rows="5"
                                      class="form-control rounded-3"></textarea>

                        </div>

                    </div>

                    <!-- ========================= -->
                    <!-- BUTTON -->
                    <!-- ========================= -->

                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-save me-1"></i>

                            Simpan

                        </button>

                        <a href="{{ route('pendapatan.index') }}"
                           class="btn btn-secondary rounded-3 px-4">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>