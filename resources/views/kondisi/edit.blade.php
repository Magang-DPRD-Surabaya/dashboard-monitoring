<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Edit Kondisi Lingkungan

            </h2>

            <p class="text-muted mb-0">

                Perbarui data kondisi lingkungan

            </p>

        </div>

        <!-- ========================= -->
        <!-- VALIDATION -->
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

                <!-- Form edit -->
                <form action="{{ route('kondisi-lingkungan.update', $kondisi->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Nama kondisi -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Nama Kondisi

                        </label>

                        <input type="text"
                               name="nama_kondisi"
                               class="form-control rounded-3"
                               value="{{ $kondisi->nama_kondisi }}">

                    </div>

                    <!-- Tombol -->
                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-save me-1"></i>

                            Update

                        </button>

                        <a href="{{ route('kondisi-lingkungan.index') }}"
                           class="btn btn-secondary rounded-3 px-4">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>