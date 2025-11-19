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

<br><br>
**Foto Kejadian:** <br>
@if($report->photo_path)
{{-- Menggunakan Full Namespace Facade Storage agar tidak error --}}
<img src="{{ $message->embed(\Illuminate\Support\Facades\Storage::disk('supabase')->url($report->photo_path)) }}" 
     alt="Foto Kejadian" 
     style="width: 100%; max-width: 500px; border-radius: 8px; margin-top: 10px;">
@else
_Tidak ada foto yang dilampirkan._
@endif
</x-mail::panel>

Silakan login ke dashboard untuk menindaklanjuti.

<x-mail::button :url="route('login')">
Buka Dashboard
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>