@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>