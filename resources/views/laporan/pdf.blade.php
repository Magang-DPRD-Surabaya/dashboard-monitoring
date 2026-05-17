<!DOCTYPE html>
<html>

<head>

    <title>
        Laporan Pendapatan
    </title>

    <style>

        body {

            font-family: sans-serif;
        }

        table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 20px;
        }

        table, th, td {

            border: 1px solid black;
        }

        th, td {

            padding: 8px;

            font-size: 12px;
        }

        th {

            background-color: #f2f2f2;
        }

    </style>

</head>

<body>

    <!-- Judul -->
    <h2>
        Laporan Monitoring Pendapatan
    </h2>

    <!-- Tahun -->
    <p>

        Tahun Anggaran:

        <strong>

            {{ $tahun ? $tahun->tahun : 'Semua Tahun' }}

        </strong>

    </p>

    <!-- Total -->
    <p>

        Total Target:

        <strong>

            Rp {{ number_format($totalTarget, 0, ',', '.') }}

        </strong>

    </p>

    <p>

        Total Realisasi:

        <strong>

            Rp {{ number_format($totalRealisasi, 0, ',', '.') }}

        </strong>

    </p>

    <!-- Tabel -->
    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Mitra</th>

                <th>Tahun</th>

                <th>Target</th>

                <th>Realisasi</th>

                <th>Persentase</th>

                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach($pendapatan as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->mitra->nama_mitra }}</td>

                    <td>{{ $item->tahun->tahun }}</td>

                    <td>

                        Rp {{ number_format($item->target, 0, ',', '.') }}

                    </td>

                    <td>

                        Rp {{ number_format($item->realisasi, 0, ',', '.') }}

                    </td>

                    <td>

                        {{ number_format($item->persentase, 2) }}%

                    </td>

                    <td>

                        {{ $item->status->nama_status }}

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>