@if (session('status') === 'verification-link-sent' || session('message'))
    <p>Link verifikasi dikirim ulang!</p>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>
