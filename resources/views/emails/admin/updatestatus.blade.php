@component('mail::message')
Hi,
<b>
    {{ $users->nama_pemilik}}   
</b>
<br>
Selamat <b>{{ $users->nama_usaha}}</b> berhasil mendaftar di <b>UMKM MAROS</b>
Silahkan klik tombol dibawah ini untuk melihat hasil seleksi anda
@component('mail::button', ['url' => route('dashboard')])
Dashboard
@endcomponent

Thanks,<br>
<b>{{ config('app.name') }}</b>
@endcomponent
