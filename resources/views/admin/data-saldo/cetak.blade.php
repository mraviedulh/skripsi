<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Riwayat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .ttd {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body>
    <strong>{{ $santri->nama }}</strong><br>
    <strong>{{ $santri->nis }}</strong>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRiwayat as $i => $trx)
            <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td>{{ $trx['tanggal'] }}</td>
                <td>{{ $trx['pemasukan'] ? 'Rp ' . number_format($trx['pemasukan'], 0, ',', '.') : '-' }}</td>
                <td>{{ $trx['pengeluaran'] ? 'Rp ' . number_format($trx['pengeluaran'], 0, ',', '.') : '-' }}</td>
                <td>{{ 'Rp ' . number_format($trx['total'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        TTD<br><br><br>
        <strong>{{ $admin->name }}</strong><br>
        Admin
    </div>
</body>

</html>