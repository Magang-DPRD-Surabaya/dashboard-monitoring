<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">Tambah Tahun Anggaran</h2>

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
        <form action="{{ route('tahun-anggaran.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Tahun
                </label>

                <input type="number"
                       name="tahun"
                       class="form-control"
                       value="{{ old('tahun') }}">

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('tahun-anggaran.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>