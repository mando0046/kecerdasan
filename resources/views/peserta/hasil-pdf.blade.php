<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Ujian {{ $user->name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 30px;
            font-size: 13px;
            color: #222;
        }

        h2,
        h3 {
            text-align: center;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #555;
        }
    </style>
</head>

<body>
    <h2>🧩 Hasil Ujian Online</h2>
    <h3>{{ $user->name }}</h3>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Tanggal Cetak:</strong> {{ now()->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Ujian</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Total Soal</th>
                <th>Nilai (%)</th>
                <th>Jenis Ujian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($examAttempts as $i => $attempt)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($attempt->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $attempt->correct_answers }}</td>
                    <td>{{ $attempt->total_questions - $attempt->correct_answers }}</td>
                    <td>{{ $attempt->total_questions }}</td>
                    <td>{{ number_format($attempt->score, 2) }}</td>
                    <td>{{ $attempt->exam->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer" style="font-size: 12px; text-align: center; margin-top: 20px;">
        Dicetak otomatis oleh sistem Ujian Online • Programmer by Mando_ubuntu<br>
        WA: <a href="https://wa.me/6282341436666" target="_blank" style="color: #25D366; text-decoration: none;">
            082341436666
        </a> • {{ date('Y') }} All Rights Reserved
    </div>

</body>

</html>
