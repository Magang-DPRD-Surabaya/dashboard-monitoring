<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Edit Kondisi Lingkungan
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

        <!-- Form edit -->
        <form action="{{ route('kondisi-lingkungan.update', $kondisi->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- Input nama kondisi -->
            <div class="mb-3">

                <label class="form-label">
                    Nama Kondisi
                </label>

                <input type="text"
                       name="nama_kondisi"
                       class="form-control"
                       value="{{ $kondisi->nama_kondisi }}">

            </div>

            <!-- Tombol update -->
            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <!-- Tombol kembali -->
            <a href="{{ route('kondisi-lingkungan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>