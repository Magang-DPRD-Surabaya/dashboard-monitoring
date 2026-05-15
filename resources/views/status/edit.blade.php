<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Edit Status Capaian
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
        <form action="{{ route('status-capaian.update', $status->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nama Status
                </label>

                <input type="text"
                       name="nama_status"
                       class="form-control"
                       value="{{ $status->nama_status }}">

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <a href="{{ route('status-capaian.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>