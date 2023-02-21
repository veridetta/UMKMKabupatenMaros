@component('mail::message')
Hi,
<b>
    {{ $users->nama_lengkap}}   
</b>
<br>
Selamat Anda dinyatakan lulus seleksi di <b>{{ $users->Sekolahs->nama_sekolah}}</b>
Silahkan klik tombol dibawah ini untuk melihat hasil seleksi anda
@component('mail::button', ['url' => route('dashboard')])
Dashboard
@endcomponent

Thanks,<br>
<b>{{ config('app.name') }}</b>
@endcomponent
