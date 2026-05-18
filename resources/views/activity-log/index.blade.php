<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER -->
        <!-- ========================= -->

        <div class="mb-4">

            <h2 class="fw-bold mb-1">

                Activity Log

            </h2>

            <p class="text-muted mb-0">

                Riwayat aktivitas pengguna pada sistem monitoring

            </p>

        </div>

        <!-- ========================= -->
        <!-- TABLE CARD -->
        <!-- ========================= -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <!-- Header tabel -->
                        <thead class="table-light">

                            <tr>

                                <th>No</th>

                                <th>User</th>

                                <th>Aksi</th>

                                <th>Tabel</th>

                                <th>Deskripsi</th>

                                <th>Waktu</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($logs as $log)

                                <tr>

                                    <!-- Nomor -->
                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <!-- Nama user -->
                                    <td class="fw-semibold">

                                        {{ $log->user->name }}

                                    </td>

                                    <!-- Badge aksi -->
                                    <td>

                                        @if($log->aksi == 'create')

                                            <span class="badge bg-success rounded-pill px-3 py-2">

                                                Create

                                            </span>

                                        @elseif($log->aksi == 'update')

                                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                                Update

                                            </span>

                                        @else

                                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                                Delete

                                            </span>

                                        @endif

                                    </td>

                                    <!-- Nama tabel -->
                                    <td>

                                        <span class="badge bg-primary rounded-pill px-3 py-2">

                                            {{ ucfirst($log->tabel) }}

                                        </span>

                                    </td>

                                    <!-- Deskripsi -->
                                    <td>

                                        {{ $log->deskripsi }}

                                    </td>

                                    <!-- Waktu -->
                                    <td class="text-muted">

                                        {{ $log->created_at->format('d-m-Y H:i') }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="text-center text-muted py-4">

                                        Activity log belum tersedia

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>