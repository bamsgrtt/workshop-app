@extends('layouts.app')

@section('content')
    <h1>Acara 31â€“32 Part 2: Event Broadcasting dan Reverb</h1>
    <p>Pastikan Reverb dan Vite berjalan. Halaman order berlangganan pada private channel milik akun yang sedang login.</p>
    <p><a href="{{ route('acara31_32.part2.orders.create') }}">Buka form order untuk menguji broadcasting</a></p>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (!window.Echo) {
                console.error('Laravel Echo belum tersedia. Jalankan npm run dev dan periksa konfigurasi VITE_REVERB_* di .env.');
                return;
            }

            window.Echo.private('user.{{ auth()->id() }}')
                .listen('.order.placed', (event) => {
                    alert(`Order #${event.order_id} telah ditempatkan! Total: Rp ${event.total}`);
                    console.log('Order Placed:', event);
                });
        });
    </script>
@endsection
