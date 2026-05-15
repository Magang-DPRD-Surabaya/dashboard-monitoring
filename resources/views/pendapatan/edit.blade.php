<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Edit Data Pendapatan
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

        <!-- Form edit -->
        <form action="{{ route('pendapatan.update', $pendapatan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- Mitra -->
            <div class="mb-3">

                <label class="form-label">
                    Mitra Kerja
                </label>

                <select name="mitra_id"
                        class="form-control">

                    @foreach($mitra as $item)

                        <option value="{{ $item->id }}"
                            {{ $pendapatan->mitra_id == $item->id ? 'selected' : '' }}>

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

                    @foreach($tahun as $item)

                        <option value="{{ $item->id }}"
                            {{ $pendapatan->tahun_id == $item->id ? 'selected' : '' }}>

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
                       class="form-control"
                       value="{{ $pendapatan->target }}">

            </div>

            <!-- Realisasi -->
            <div class="mb-3">

                <label class="form-label">
                    Realisasi Pendapatan
                </label>

                <input type="number"
                       name="realisasi"
                       class="form-control"
                       value="{{ $pendapatan->realisasi }}">

            </div>

            <!-- Kondisi -->
            <div class="mb-3">

                <label class="form-label">
                    Kondisi Lingkungan
                </label>

                <select name="kondisi_id"
                        class="form-control">

                    @foreach($kondisi as $item)

                        <option value="{{ $item->id }}"
                            {{ $pendapatan->kondisi_id == $item->id ? 'selected' : '' }}>

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
                          class="form-control">{{ $pendapatan->catatan }}</textarea>

            </div>

            <!-- Tombol -->
            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <a href="{{ route('pendapatan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>