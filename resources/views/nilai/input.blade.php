<!DOCTYPE html>
<html>
<head>
    <title>Hitung Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f5f5f5;
        }
        h1, h2 {
            color: #333;
        }
        form {
            width: 350px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        label {
            display: block;
            margin-bottom: 12px;
        }
        input {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 8px 18px;
            margin-top: 5px;
            cursor: pointer;
        }
        table {
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #ffffff;
        }
        th {
            background-color: #333333;
            color: #ffffff;
        }
        th, td {
            padding: 8px 16px;
            border: 1px solid #cccccc;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Input Nilai Mahasiswa</h1>

    @if (session('pesan'))
        <p style="color: green;"><strong>{{ session('pesan') }}</strong></p>
    @endif

    <form method="POST" action="/nilai/hitung">
        @csrf
        <label>Nama: <input type="text" name="nama" required></label>
        <label>UTS: <input type="number" name="uts" min="0" max="100" required></label>
        <label>UAS: <input type="number" name="uas" min="0" max="100" required></label>
        <label>Tugas: <input type="number" name="tugas" min="0" max="100" required></label>
        <label>Kehadiran (0-18 pertemuan): <input type="number" name="kehadiran" min="0" max="18" required></label>
        <button type="submit">Hitung</button>
    </form>

    <h2>Riwayat Perhitungan</h2>

    @if (count($riwayat) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                    <th>Nilai Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $hasil)
                    <tr>
                        <td>{{ $hasil['nama'] }}</td>
                        <td>{{ $hasil['kehadiran'] }} / 18</td>
                        <td>{{ $hasil['nilai_akhir'] }}</td>
                        <td>{{ $hasil['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada data.</p>
    @endif
</body>
</html>
