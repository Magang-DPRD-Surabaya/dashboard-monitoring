<x-app-layout>

    <div class="container py-4">

        <!-- Judul halaman -->
        <h2 class="mb-4">Edit Mitra Kerja</h2>

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

        <!-- Form edit -->
        <form action="{{ route('mitra-kerja.update', $mitra->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- Nama Mitra -->
            <div class="mb-3">

                <label class="form-label">
                    Nama Mitra
                </label>

                <input type="text"
                       name="nama_mitra"
                       class="form-control"
                       value="{{ $mitra->nama_mitra }}">

            </div>

            <!-- Jenis Mitra -->
            <div class="mb-3">

                <label class="form-label">
                    Jenis Mitra
                </label>

                <select name="jenis"
                        class="form-control">

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
            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4">{{ $mitra->deskripsi }}</textarea>

            </div>

            <!-- Tombol update -->
            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <!-- Tombol kembali -->
            <a href="{{ route('mitra-kerja.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>