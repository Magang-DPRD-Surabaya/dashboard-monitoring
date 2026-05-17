<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-4">
            Activity Log
        </h2>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

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

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $log->user->name }}</td>

                        <td>{{ $log->aksi }}</td>

                        <td>{{ $log->tabel }}</td>

                        <td>{{ $log->deskripsi }}</td>

                        <td>

                            {{ $log->created_at->format('d-m-Y H:i') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            Activity log belum tersedia

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>