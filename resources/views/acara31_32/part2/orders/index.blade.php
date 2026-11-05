@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl space-y-6">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-indigo-600">Acara 31-32 Part 2</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">Riwayat order saya</h1>
                <p class="mt-2 text-sm text-slate-600">Daftar order yang dibuat oleh akun {{ auth()->user()->name }}.</p>
            </div>
            <a href="{{ route('acara31_32.part2.orders.create') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700">
                Buat order baru
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if ($orders->isEmpty())
                <div class="px-6 py-12 text-center">
                    <h2 class="text-lg font-semibold text-slate-900">Belum ada order</h2>
                    <p class="mt-2 text-sm text-slate-600">Order yang Anda buat akan muncul di tabel ini.</p>
                    <a href="{{ route('acara31_32.part2.orders.create') }}" class="mt-4 inline-block text-sm font-semibold text-indigo-600 hover:text-indigo-800">Buat order pertama</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">Total order</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">Dibuat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @foreach ($orders as $order)
                                <tr class="hover:bg-slate-50">
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-900">#{{ $order->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">Rp {{ number_format((float) ($order->total ?? $order->total_amount), 0, ',', '.') }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                                        <span class="inline-flex rounded-full bg-amber-50 px-2.5 py-1 text-xs font-medium capitalize text-amber-700">{{ $order->status ?? 'pending' }}</span>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">{{ $order->created_at?->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($orders->hasPages())
                    <div class="border-t border-slate-200 px-6 py-4">{{ $orders->links() }}</div>
                @endif
            @endif
        </div>

        <a href="{{ route('acara31_32.part2.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Kembali ke Acara 31-32 Part 2</a>
    </div>
@endsection
