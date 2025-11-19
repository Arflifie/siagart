<x-mail::message>
# Laporan Warga Baru

Halo Admin/Pak RT, ada laporan baru yang telah **terverifikasi**.

**Detail Pelapor:**
* **Nama:** {{ $report->name }}
* **Email:** {{ $report->email }}
* **WA:** {{ $report->wa_number }}

**Isi Laporan:**
<x-mail::panel>
**Kategori:** {{ $report->category }} <br>
**Detail:** <br>
{{ $report->details }}
</x-mail::panel>

Silakan login ke dashboard untuk melihat foto kejadian dan menindaklanjuti.

<x-mail::button :url="route('login')">
Buka Dashboard
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>