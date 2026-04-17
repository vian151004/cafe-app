@extends('layouts.cashier')

@section('title', 'Daftar Pesanan')
@section('header_title', 'Daftar Pesanan')

@php
$ordersJson = file_get_contents(public_path('data/orders.json'));
$orders = json_decode($ordersJson, true)['orders'];
@endphp

@push('styles')
<style>
    :root {
        --status-pending: #f59e0b;
        --status-processing: #10b981;
    }
    .payment-cash {
        background: rgba(255,255,255,0.15);
        color: white;
    }
    .payment-ewallet {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
    }
    .order-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .order-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
</style>
@endpush

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Daftar Pesanan</h1>
            <p class="text-sm text-white/70 mt-1">Monitoring real-time antrean pesanan pelanggan.</p>
        </div>
        <div class="relative w-full sm:w-120">
            <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/50 w-5 h-5"></i>
            <input type="text" placeholder="Search orders..." class="w-full pl-12 pr-4 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 focus:border-white focus:outline-none text-sm text-white placeholder-white/50">
        </div>
    </div>
</div>

<div class="space-y-4 pb-24" id="orders-list">
    @foreach($orders as $order)
    <div class="order-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 sm:p-5 border border-white/20">
        <div class="flex flex-col lg:flex-row lg:items-center gap-4">
            <div class="flex-1 min-w-[120px]">
                <p class="text-xs text-white/60">#{{ $order['id'] }}</p>
                <p class="text-xl font-bold text-white">{{ $order['location'] }}</p>
            </div>
            <div class="flex-1">
                <p class="text-sm text-white/90 mb-2">{{ $order['items'] }}</p>
                <div class="flex items-center gap-2">
                    <i data-lucide="clock" class="w-3 h-3 text-white/50"></i>
                    <span class="text-xs text-white/50">{{ $order['time'] }}</span>
                    <span class="px-2 py-0.5 rounded-full text-xs font-medium 
                        @if($order['status'] == 'PENDING') bg-[var(--status-pending)]/20 text-[var(--status-pending)]
                        @else bg-[var(--status-processing)]/20 text-[var(--status-processing)] @endif">
                        {{ $order['status'] }}
                    </span>
                </div>
            </div>
            <div class="flex lg:items-center gap-4 lg:gap-8">
                <div>
                    <p class="text-[10px] text-white/40 uppercase tracking-wider mb-1">Metode</p>
                    <span class="px-3 py-1 rounded-full text-xs font-medium payment-{{ $order['payment'] }}">
                        {{ $order['payment_label'] }}
                    </span>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-white/40 uppercase tracking-wider mb-1">Total</p>
                    <p class="text-lg font-bold text-white">Rp {{ number_format($order['total'], 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <a href="{{ route('cashier.order.create') }}" class="block border-2 border-dashed border-white/30 rounded-2xl p-6 text-center hover:border-white hover:bg-white/10 transition-colors">
        <i data-lucide="plus" class="w-8 h-8 text-white/50 mx-auto"></i>
        <p class="text-sm text-white/60 mt-2">INPUT PESANAN LANGSUNG BARU</p>
    </a>
</div>

<div class="fixed bottom-6 right-6 z-40">
    <a href="{{ route('cashier.order.create') }}" class="flex items-center gap-2 px-6 py-3 bg-white text-[#005246] font-semibold rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all">
        <i data-lucide="plus" class="w-5 h-5"></i>
        <span>New Order</span>
    </a>
</div>
@endsection