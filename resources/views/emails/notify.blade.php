@component('mail::message')
# Halo {{ $user->name }}

Terima kasih telah bergabung.

@component('mail::button', ['url' => $url])
Lihat Dashboard
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
