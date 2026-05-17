<x-app-layout>

    <div class="container py-4">

        <!-- ========================= -->
        <!-- HEADER DASHBOARD -->
        <!-- ========================= -->

        <div class="alert alert-primary border-0 shadow-sm rounded-4">

            <i class="bi bi-info-circle-fill"></i>

            Selamat datang,
            <strong>{{ auth()->user()->name }}</strong>

            di Dashboard Monitoring Pendapatan
            Komisi B DPRD Kota Surabaya.

        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">

                    Dashboard Monitoring Pendapatan

                </h2>

                <p class="text-muted mb-0">

                    Monitoring target dan realisasi pendapatan
                    mitra kerja Komisi B DPRD Kota Surabaya

                </p>

            </div>

            <!-- Badge role -->
            <div>

                <span class="badge bg-primary fs-6 px-3 py-2">

                    {{ strtoupper(auth()->user()->role) }}

                </span>

            </div>

        </div>

        <!-- ========================= -->
        <!-- FILTER TAHUN -->
        <!-- ========================= -->

        <div class="card shadow-sm border-0 mb-4 rounded-4">

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
                                    class="btn btn-primary rounded-3 px-4">

                                <i class="bi bi-funnel-fill"></i>

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

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">

                                    Total Mitra

                                </p>

                                <h2 class="fw-bold">

                                    {{ $totalMitra }}

                                </h2>

                            </div>

                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle">

                                <i class="bi bi-buildings text-primary fs-3"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Total Target -->
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">

                                    Total Target

                                </p>

                                <h4 class="fw-bold">

                                    Rp {{ number_format($totalTarget,0,',','.') }}

                                </h4>

                            </div>

                            <div class="bg-success bg-opacity-10 p-3 rounded-circle">

                                <i class="bi bi-cash-stack text-success fs-3"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Total Realisasi -->
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">

                                    Total Realisasi

                                </p>

                                <h4 class="fw-bold">

                                    Rp {{ number_format($totalRealisasi,0,',','.') }}

                                </h4>

                            </div>

                            <div class="bg-warning bg-opacity-10 p-3 rounded-circle">

                                <i class="bi bi-bar-chart-line text-warning fs-3"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Grafik -->
        <div class="card border-0 shadow-sm rounded-4 mt-4">

            <div class="card-body p-4">

                <h5 class="mb-4">
                    Grafik Target vs Realisasi
                </h5>

                <canvas id="pendapatanChart"></canvas>

            </div>

        </div>

        <!-- Ranking Mitra -->
        <div class="card border-0 shadow-sm rounded-4 mt-4">

            <div class="card-body p-4">

                <h5 class="fw-bold mb-4">

                    Ranking Mitra Berdasarkan Realisasi

                </h5>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>

                                <th>Ranking</th>

                                <th>Mitra</th>

                                <th>Realisasi</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($rankingMitra as $item)

                                <tr>

                                    <td>

                                        <span class="badge bg-dark">

                                            #{{ $loop->iteration }}

                                        </span>

                                    </td>

                                    <td>

                                        {{ $item->mitra->nama_mitra }}

                                    </td>

                                    <td>

                                        Rp {{ number_format($item->realisasi,0,',','.') }}

                                    </td>

                                    <td>

                                        @if($item->persentase >= 80)

                                            <span class="badge bg-success">

                                                Baik

                                            </span>

                                        @elseif($item->persentase >= 50)

                                            <span class="badge bg-warning text-dark">

                                                Perlu Perhatian

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Perlu Evaluasi

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

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