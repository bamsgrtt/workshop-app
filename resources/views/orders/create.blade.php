@extends('layouts.app')

@section('content')
    <h3>Buat Order Baru</h3>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <input type="number" name="total" placeholder="Total (Rp)" required>
        <button type="submit">Pesan</button>
    </form>
@endsection
