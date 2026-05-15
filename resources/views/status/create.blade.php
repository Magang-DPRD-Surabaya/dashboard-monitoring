<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Tambah Status Capaian
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

        <!-- Form -->
        <form action="{{ route('status-capaian.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nama Status
                </label>

                <input type="text"
                       name="nama_status"
                       class="form-control"
                       value="{{ old('nama_status') }}">

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('status-capaian.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>