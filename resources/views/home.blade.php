@extends('layouts.app')
@section('title', 'Dashboard Utama POS')
@push('styles')
    <style>
        body { font-family: Arial, sans-serif; }
        .badge-admin { color: green; font-weight: bold; }
        .badge-kasir { color: blue; font-weight: bold; }
    </style>
@endpush

@section('content')
    <h3>Selamat Datang di Halaman POS!</h3>
    @if($role == 'admin')
        <p>Akses: <span class="badge-admin">Administrator System</span></p>
    @elseif($role == 'kasir')
        <p>Akses: <span class="badge-kasir">Petugas Kasir</span></p>
    @else
        <p>Akses: Tamu / Pengunjung</p>
    @endif

    @switch($shift)
        @case('pagi'):
            <p>Shift Kerja: <strong>Pagi (08:00 - 15:00)</strong></p>
            @break
        @case('malam')
            <p>Shift Kerja: <strong>Malam (15:00 - 22:00)</strong></p>
            @break
        @default
            <p>Shift Kerja: <strong>Tidak Terjadwal</strong></p>
    @endswitch
@endsection

@push('scripts')
    <script>
        console.log("Halaman Dashboard POS berhasil dimuat.");
    </script>
@endpush