<x-mail::message>
# Introduction

Gunakan kode berikut untuk memverifikasi laporan anda:

<x-mail::panel>
## {{$otp}}
</x-mail::panel>

Kode ini hanya berlaku selama 10 menit.

Terima Kasih,<br>
{{ config('app.name') }}
</x-mail::message>
