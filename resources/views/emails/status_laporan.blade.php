<!DOCTYPE html>
<html>
<head>
    <title>Update Status Laporan</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    
    <h2>Halo, {{ $report->name }}!</h2>

    <p>Ada pembaruan status untuk laporan yang Anda kirimkan.</p>

    <div style="background: #f4f4f4; padding: 15px; border-radius: 8px; margin: 20px 0;">
        <p><strong>ID Laporan:</strong> #LP-{{ $report->id }}</p>
        <p><strong>Kategori:</strong> {{ $report->category }}</p>
        <p><strong>Status Terbaru:</strong> 
            <span style="font-weight: bold; color: {{ $report->status_report->value == 'ditolak' ? 'red' : 'green' }}">
                {{ $report->status_report->label() }}
            </span>
        </p>
    </div>

    @if($report->status_report->value == 'proses')
        <p>Laporan Anda sedang ditindaklanjuti oleh pengurus RT. Mohon kesediaannya untuk menunggu update selanjutnya.</p>
    @elseif($report->status_report->value == 'selesai')
        <p>Laporan Anda telah <strong>SELESAI</strong> ditangani. Terima kasih telah peduli dengan lingkungan kita!</p>
    @elseif($report->status_report->value == 'ditolak')
        <p>Mohon maaf, laporan Anda tidak dapat kami proses saat ini. Silakan hubungi RT jika ada pertanyaan.</p>
    @endif

    <br>
    <p>Salam Hangat,<br>
    <strong>Pengurus SiagaRT 04</strong></p>
    
</body>
</html>