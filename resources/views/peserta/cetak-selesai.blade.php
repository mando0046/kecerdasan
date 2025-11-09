<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Mencetak Hasil...</title>
    <meta http-equiv="refresh" content="8;url={{ route('peserta.dashboard') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            text-align: center;
            padding-top: 100px;
        }

        .box {
            background: #fff;
            display: inline-block;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>🖨️ Sedang menyiapkan hasil ujian...</h2>
        <p>PDF hasil ujian akan terbuka otomatis.</p>
        <p>Setelah selesai, Anda akan diarahkan kembali ke dashboard.</p>
        <p><a href="{{ asset('storage/' . $fileName) }}" target="_blank" id="openPdf">Klik di sini jika PDF tidak terbuka
                otomatis</a></p>
    </div>

    <script>
        // Buka PDF otomatis di tab baru
        window.onload = function() {
            window.open("{{ asset('storage/' . $fileName) }}", "_blank");
        };
    </script>
</body>

</html>
