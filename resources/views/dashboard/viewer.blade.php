<x-app-layout>

    <div class="container py-4">

        <!-- Judul Dashboard -->
        <h2 class="mb-4">
            Dashboard Monitoring Pendapatan
        </h2>

        <!-- ========================= -->
        <!-- FILTER TAHUN -->
        <!-- ========================= -->

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <form method="GET"
                    action="{{ route('dashboard') }}">

                    <div class="row align-items-end">

                        <!-- Dropdown tahun -->
                        <div class="col-md-4">

                            <label class="form-label">
                                Filter Tahun Anggaran
                            </label>

                            <select name="tahun_id"
                                    class="form-control">

                                <option value="">
                                    Semua Tahun
                                </option>

                                @foreach($tahunList as $tahun)

                                    <option value="{{ $tahun->id }}"
                                        {{ $tahunId == $tahun->id ? 'selected' : '' }}>

                                        {{ $tahun->tahun }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Tombol filter -->
                        <div class="col-md-2">

                            <button type="submit"
                                    class="btn btn-primary">

                                Filter

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- Tombol download laporan -->
        <div class="mt-3">
            <a href="{{ route('laporan.download', ['tahun_id' => $tahunId]) }}"
            class="btn btn-danger">
                Download PDF
            </a>
        </div>

        <!-- Card Statistik -->
        <div class="row mb-4">

            <!-- Total Mitra -->
            <div class="col-md-4">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5>Total Mitra</h5>

                        <h2>
                            {{ $totalMitra }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Total Target -->
            <div class="col-md-4">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5>Total Target</h5>

                        <h4>

                            Rp {{ number_format($totalTarget, 0, ',', '.') }}

                        </h4>

                    </div>

                </div>

            </div>

            <!-- Total Realisasi -->
            <div class="col-md-4">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5>Total Realisasi</h5>

                        <h4>

                            Rp {{ number_format($totalRealisasi, 0, ',', '.') }}

                        </h4>

                    </div>

                </div>

            </div>

        </div>

        <!-- Grafik -->
        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <h5 class="mb-4">
                    Grafik Target vs Realisasi
                </h5>

                <canvas id="pendapatanChart"></canvas>

            </div>

        </div>

        <!-- Ranking Mitra -->
        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5 class="mb-4">
                    Ranking Mitra Berdasarkan Realisasi
                </h5>

                <table class="table table-bordered">

                    <thead class="table-dark">

                        <tr>
                            <th>No</th>
                            <th>Mitra</th>
                            <th>Realisasi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($rankingMitra as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $item->mitra->nama_mitra }}
                                </td>

                                <td>

                                    Rp {{ number_format($item->realisasi, 0, ',', '.') }}

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Import Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        /**
         * Label nama mitra
         */
        const labels = [
            @foreach($chartData as $item)

                "{{ $item->mitra->nama_mitra }}",

            @endforeach
        ];

        /**
         * Data target
         */
        const targetData = [
            @foreach($chartData as $item)

                {{ $item->target }},

            @endforeach
        ];

        /**
         * Data realisasi
         */
        const realisasiData = [
            @foreach($chartData as $item)

                {{ $item->realisasi }},

            @endforeach
        ];

        // Ambil canvas chart
        const ctx = document.getElementById('pendapatanChart');

        /**
         * Membuat chart
         */
        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: labels,

                datasets: [

                    {
                        label: 'Target',

                        data: targetData,

                        borderWidth: 1
                    },

                    {
                        label: 'Realisasi',

                        data: realisasiData,

                        borderWidth: 1
                    }

                ]
            },

            options: {

                responsive: true,

                scales: {

                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>

</x-app-layout>