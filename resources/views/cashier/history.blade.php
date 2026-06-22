@extends('layouts.cashier')

@section('title', 'Riwayat Pesanan')

@section('content')
<x-cashier.top-app-bar title="Riwayat Pesanan" search-placeholder="Cari Order ID..." />

<div class="p-8 max-w-[1400px] mx-auto">
    <x-cashier.filter-section />

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        @foreach($stats as $stat)
        <x-cashier.summary-card
            title="{{ $stat['title'] }}"
            value="{{ $stat['value'] }}"
            icon="{{ $stat['icon'] }}"
            icon-bg="{{ $stat['icon_bg'] }}"
            icon-color="{{ $stat['icon_color'] }}"
            accent-border="{{ $stat['accent_border'] }}"
            badge-text="{{ $stat['badge_text'] ?? null }}"
        />
        @endforeach
    </section>

    <x-cashier.data-table title="Daftar Transaksi">
        <x-slot name="head">
            <th class="px-6 py-4">Order ID</th>
            <th class="px-6 py-4">Tanggal</th>
            <th class="px-6 py-4">Meja</th>
            <th class="px-6 py-4">Item</th>
            <th class="px-6 py-4">Total</th>
            <th class="px-6 py-4">Status</th>
            <th class="px-6 py-4 text-center">Aksi</th>
        </x-slot>

        <x-slot name="body">
            @foreach($orders as $order)
            <tr class="hover:bg-surface-container-low/50 transition-colors group">
                <td class="px-6 py-4 font-bold text-primary-container">{{ $order['order_number'] }}</td>
                <td class="px-6 py-4 text-on-surface-variant text-body-sm">{{ $order['date'] }}</td>
                <td class="px-6 py-4">
                    <span class="bg-surface-container px-2 py-1 rounded text-body-sm font-medium">{{ $order['table_name'] }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col">
                        <span class="text-body-sm font-semibold text-on-surface">{{ $order['items'] }}</span>
                        <span class="text-xs text-on-surface-variant/40">{{ $order['items_total'] }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 font-bold text-on-surface">Rp {{ number_format($order['total'], 0, ',', '.') }}</td>
                <td class="px-6 py-4">
                    @php
                        $statusClass = match($order['status']) {
                            'completed' => 'bg-emerald-100 text-emerald-700',
                            'cancelled' => 'bg-red-100 text-red-700',
                            'processing' => 'bg-blue-100 text-blue-700',
                            default => 'bg-surface-container text-on-surface-variant',
                        };
                        $statusLabel = match($order['status']) {
                            'completed' => 'Selesai',
                            'cancelled' => 'Batal',
                            'processing' => 'Proses',
                            default => 'Pending',
                        };
                        $dotColor = match($order['status']) {
                            'completed' => 'bg-emerald-500',
                            'cancelled' => 'bg-red-500',
                            'processing' => 'bg-blue-500',
                            default => 'bg-surface-variant',
                        };
                    @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full {{ $statusClass }} text-xs font-bold">
                        <span class="w-1.5 h-1.5 rounded-full {{ $dotColor }} mr-2"></span>
                        {{ $statusLabel }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-2 text-primary-container hover:bg-emerald-50 rounded-lg transition-colors" title="Lihat Detail">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                        <button class="p-2 text-on-surface-variant/40 hover:bg-surface-container rounded-lg transition-colors" title="Cetak Struk">
                            <span class="material-symbols-outlined">print</span>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </x-slot>

        <x-slot name="pagination">
            <p class="text-body-sm text-on-surface-variant">Menampilkan <span class="font-bold text-on-surface">1-5</span> dari <span class="font-bold text-on-surface">156</span> pesanan</p>
            <div class="flex items-center gap-2">
                <button class="p-2 border border-outline-variant rounded hover:bg-surface-container-lowest transition-colors text-on-surface-variant/50 disabled:opacity-50" disabled>
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-primary-container text-white font-bold text-xs">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-container-lowest border border-transparent hover:border-outline-variant text-on-surface-variant font-medium text-xs transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-container-lowest border border-transparent hover:border-outline-variant text-on-surface-variant font-medium text-xs transition-colors">3</button>
                <span class="text-on-surface-variant/40 px-1">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-container-lowest border border-transparent hover:border-outline-variant text-on-surface-variant font-medium text-xs transition-colors">32</button>
                <button class="p-2 border border-outline-variant rounded hover:bg-surface-container-lowest transition-colors text-on-surface-variant">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </x-slot>
    </x-cashier.data-table>
</div>
@endsection
