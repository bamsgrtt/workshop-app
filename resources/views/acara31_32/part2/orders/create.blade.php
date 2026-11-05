@extends('layouts.app')

@section('content')
    <h1>Uji Event Broadcasting: Order</h1>

    @if (session('success'))
        <p role="status">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <p>Listener aktif untuk private channel <code>user.{{ auth()->id() }}</code>. Setelah order dibuat, event <code>order.placed</code> akan diterima oleh browser ini.</p>

    <form method="POST" action="{{ route('acara31_32.part2.orders.store') }}">
        @csrf
        <label for="total">Total (Rp)</label>
        <input id="total" type="number" name="total" min="1" value="{{ old('total') }}" required>
        <button type="submit">Buat order dan kirim event</button>
    </form>

    <div class="mt-6 flex flex-wrap items-center gap-3">
        <a href="{{ route('acara31_32.part2.orders.index') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Lihat riwayat order saya
        </a>
        <a href="{{ route('acara31_32.part2.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
            Kembali ke Acara 31-32 Part 2
        </a>
    </div>

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
