<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Tambah Kondisi Lingkungan
        </h2>

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

        <!-- Form tambah -->
        <form action="{{ route('kondisi-lingkungan.store') }}"
              method="POST">

            @csrf

            <!-- Input nama kondisi -->
            <div class="mb-3">

                <label class="form-label">
                    Nama Kondisi
                </label>

                <input type="text"
                       name="nama_kondisi"
                       class="form-control"
                       value="{{ old('nama_kondisi') }}">

            </div>

            <!-- Tombol simpan -->
            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <!-- Tombol kembali -->
            <a href="{{ route('kondisi-lingkungan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>