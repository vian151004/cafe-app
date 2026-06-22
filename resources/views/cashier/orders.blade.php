@extends('layouts.cashier')

@section('title', 'Daftar Pesanan')

@section('content')
<x-cashier.top-app-bar title="Daftar Pesanan" search-placeholder="Cari pesanan..." />

<div class="p-8 max-w-[1400px] mx-auto">
    <x-cashier.data-table title="Pesanan Aktif">
        <x-slot name="head">
            <th class="px-6 py-4">Order ID</th>
            <th class="px-6 py-4">Lokasi</th>
            <th class="px-6 py-4">Item</th>
            <th class="px-6 py-4">Waktu</th>
            <th class="px-6 py-4">Metode</th>
            <th class="px-6 py-4">Total</th>
            <th class="px-6 py-4">Status</th>
        </x-slot>

        <x-slot name="body">
            @foreach($orders as $order)
            <tr class="hover:bg-surface-container-low/50 transition-colors">
                <td class="px-6 py-4 font-bold text-primary-container">{{ $order['order_number'] }}</td>
                <td class="px-6 py-4">
                    <span class="bg-surface-container px-2 py-1 rounded text-body-sm font-medium">{{ $order['table_name'] }}</span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-body-sm font-semibold text-on-surface">{{ $order['items'] }}</span>
                </td>
                <td class="px-6 py-4 text-on-surface-variant text-body-sm">{{ $order['time'] }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full bg-surface-container text-on-surface-variant text-xs font-medium">{{ $order['payment_method'] }}</span>
                </td>
                <td class="px-6 py-4 font-bold text-on-surface">Rp {{ number_format($order['total'], 0, ',', '.') }}</td>
                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full {{ $order['status'] === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }} text-xs font-bold">
                        <span class="w-1.5 h-1.5 rounded-full {{ $order['status'] === 'pending' ? 'bg-amber-500' : 'bg-emerald-500' }} mr-2"></span>
                        {{ strtoupper($order['status']) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-cashier.data-table>
</div>

<a href="{{ route('cashier.order.create') }}" class="fixed bottom-8 right-8 w-14 h-14 bg-secondary-container text-white rounded-full shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all flex items-center justify-center z-50">
    <span class="material-symbols-outlined text-[40px]">add</span>
</a>
@endsection
