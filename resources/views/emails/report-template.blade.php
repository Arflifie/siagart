<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Baru</title>
    <style>
        /* PENTING: Gunakan inline CSS atau style di head. 
          Banyak klien email (seperti Gmail) tidak membaca file CSS eksternal.
        */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            font-size: 24px;
            color: #b5382e; /* Warna brand Anda */
            margin-bottom: 20px;
        }
        .content {
            font-size: 16px;
        }
        .content strong {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Laporan Baru Telah Masuk!</h1>
        
        <div class="content">
            <p>Halo Admin,</p>
            <p>Ada laporan baru yang masuk ke sistem dengan detail sebagai berikut:</p>
            <br>
            <p><strong>Nama:</strong> {{ $report->name }}</p>
            <p><strong>Lokasi:</strong> {{ $report->location }}</p>
            <p><strong>Kategori:</strong> {{ $report->category }}</p>
            <p><strong>Tanggal:</strong> {{ $report->date }}</p>
            <br>
            <p><strong>Deskripsi:</strong></p>
            <p>{{ $report->description }}</p>
            <br>
            <p>Silakan cek sistem untuk detail lebih lanjut.</p>
            <p>Terima kasih.</p>
        </div>
    </div>
</body>
</html>