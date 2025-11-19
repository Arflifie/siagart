<!DOCTYPE html>
<html lang="id">
<head><title>Verifikasi OTP</title></head>
<body>
    <h1>Verifikasi Laporan Anda</h1>
    @if (session('message')) <div style="color: green;">{{ session('message') }}</div> @endif
    @if ($errors->any())
        <div style="color: red;">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <p>Kami telah mengirimkan 6 digit OTP ke email <strong>{{ $report->email }}</strong>. (Cek folder spam jika tidak ada).</p>

    <form action="{{ route('laporan.verifikasi.submit', $report->id) }}" method="POST">
        @csrf
        <div><label>Masukkan OTP:</label><input type="text" name="otp" required maxlength="6"></div>
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>