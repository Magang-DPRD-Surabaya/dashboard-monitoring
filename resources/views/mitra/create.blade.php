<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">Tambah Mitra Kerja</h2>

        <!-- Menampilkan error validasi -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- Form tambah data -->
        <form action="{{ route('mitra-kerja.store') }}"
              method="POST">

            @csrf

            <!-- Nama Mitra -->
            <div class="mb-3">

                <label class="form-label">
                    Nama Mitra
                </label>

                <input type="text"
                       name="nama_mitra"
                       class="form-control"
                       value="{{ old('nama_mitra') }}">

            </div>

            <!-- Jenis Mitra -->
            <div class="mb-3">

                <label class="form-label">
                    Jenis Mitra
                </label>

                <select name="jenis"
                        class="form-control">

                    <option value="">
                        -- Pilih Jenis --
                    </option>

                    <option value="BUMD">
                        BUMD
                    </option>

                    <option value="DINAS">
                        DINAS
                    </option>

                </select>

            </div>

            <!-- Deskripsi -->
            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"></textarea>

            </div>

            <!-- Tombol simpan -->
            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <!-- Tombol kembali -->
            <a href="{{ route('mitra-kerja.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>