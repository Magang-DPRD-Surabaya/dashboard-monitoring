<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Tambah Data Pendapatan
        </h2>

        <!-- Error validasi -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- Form tambah -->
        <form action="{{ route('pendapatan.store') }}"
              method="POST">

            @csrf

            <!-- Mitra Kerja -->
            <div class="mb-3">

                <label class="form-label">
                    Mitra Kerja
                </label>

                <select name="mitra_id"
                        class="form-control">

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
            <div class="mb-3">

                <label class="form-label">
                    Tahun Anggaran
                </label>

                <select name="tahun_id"
                        class="form-control">

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
            <div class="mb-3">

                <label class="form-label">
                    Target Pendapatan
                </label>

                <input type="number"
                       name="target"
                       class="form-control">

            </div>

            <!-- Realisasi -->
            <div class="mb-3">

                <label class="form-label">
                    Realisasi Pendapatan
                </label>

                <input type="number"
                       name="realisasi"
                       class="form-control">

            </div>

            <!-- Kondisi -->
            <div class="mb-3">

                <label class="form-label">
                    Kondisi Lingkungan
                </label>

                <select name="kondisi_id"
                        class="form-control">

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
            <div class="mb-3">

                <label class="form-label">
                    Catatan
                </label>

                <textarea name="catatan"
                          rows="4"
                          class="form-control"></textarea>

            </div>

            <!-- Tombol -->
            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('pendapatan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>