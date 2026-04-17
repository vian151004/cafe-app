@extends('layouts.cashier')

@section('title', 'Riwayat Pesanan')
@section('header_title', 'Riwayat Pesanan')

@section('content')
<!-- Date Filter -->
<div class="mb-6 flex flex-wrap gap-3 items-center">
    <div class="flex items-center gap-2">
        <input type="date" class="px-3 py-2 rounded-lg bg-white/10 border border-white/20 focus:border-white focus:outline-none text-white text-sm w-36">
        <span class="text-white/50">-</span>
        <input type="date" class="px-3 py-2 rounded-lg bg-white/10 border border-white/20 focus:border-white focus:outline-none text-white text-sm w-36">
    </div>
    <button class="px-4 py-2 bg-white text-[#005246] rounded-lg text-sm font-medium flex items-center gap-2">
        <i data-lucide="filter" class="w-4 h-4"></i>Filter
    </button>
</div>

<!-- Summary Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <p class="text-white/60 text-xs">Total Pesanan</p>
        <p class="text-xl lg:text-2xl font-bold text-white">156</p>
    </div>
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <p class="text-white/60 text-xs">Hari Ini</p>
        <p class="text-xl lg:text-2xl font-bold text-white">24</p>
    </div>
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <p class="text-white/60 text-xs">Total Pendapatan</p>
        <p class="text-xl lg:text-2xl font-bold text-white">Rp 12.5jt</p>
    </div>
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <p class="text-white/60 text-xs">Rata-rata/Order</p>
        <p class="text-xl lg:text-2xl font-bold text-white">Rp 80rb</p>
    </div>
</div>

<!-- History Cards (Mobile-first) -->
<div class="space-y-3 lg:hidden">
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <div class="flex justify-between items-start mb-2">
            <span class="font-bold text-white">#ORD-001</span>
            <span class="px-2 py-0.5 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span>
        </div>
        <div class="text-xs text-white/60 space-y-1">
            <p>12 Apr 2026, 10:30</p>
            <p>Meja 5 - 2 item</p>
            <p class="font-bold text-white">Rp 68.000</p>
        </div>
    </div>
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <div class="flex justify-between items-start mb-2">
            <span class="font-bold text-white">#ORD-002</span>
            <span class="px-2 py-0.5 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span>
        </div>
        <div class="text-xs text-white/60 space-y-1">
            <p>12 Apr 2026, 09:15</p>
            <p>Takeaway - 4 item</p>
            <p class="font-bold text-white">Rp 125.000</p>
        </div>
    </div>
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
        <div class="flex justify-between items-start mb-2">
            <span class="font-bold text-white">#ORD-003</span>
            <span class="px-2 py-0.5 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span>
        </div>
        <div class="text-xs text-white/60 space-y-1">
            <p>11 Apr 2026, 18:45</p>
            <p>Meja 2 - 3 item</p>
            <p class="font-bold text-white">Rp 85.000</p>
        </div>
    </div>
</div>

<!-- History Table (Desktop) -->
<div class="hidden lg:block bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-white/10">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Order ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Tanggal</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Meja</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Item</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Total</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-white/60 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                <tr class="hover:bg-white/5">
                    <td class="px-4 py-3 text-sm font-medium text-white whitespace-nowrap">#ORD-001</td>
                    <td class="px-4 py-3 text-sm text-white/80 whitespace-nowrap">12 Apr 2026, 10:30</td>
                    <td class="px-4 py-3 text-sm text-white/80">Meja 5</td>
                    <td class="px-4 py-3 text-sm text-white/80">2 item</td>
                    <td class="px-4 py-3 text-sm font-bold text-white">Rp 68.000</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span></td>
                    <td class="px-4 py-3">
                        <button class="text-white/70 hover:text-white">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-white/5">
                    <td class="px-4 py-3 text-sm font-medium text-white whitespace-nowrap">#ORD-002</td>
                    <td class="px-4 py-3 text-sm text-white/80 whitespace-nowrap">12 Apr 2026, 09:15</td>
                    <td class="px-4 py-3 text-sm text-white/80">Takeaway</td>
                    <td class="px-4 py-3 text-sm text-white/80">4 item</td>
                    <td class="px-4 py-3 text-sm font-bold text-white">Rp 125.000</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span></td>
                    <td class="px-4 py-3">
                        <button class="text-white/70 hover:text-white">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-white/5">
                    <td class="px-4 py-3 text-sm font-medium text-white whitespace-nowrap">#ORD-003</td>
                    <td class="px-4 py-3 text-sm text-white/80 whitespace-nowrap">11 Apr 2026, 18:45</td>
                    <td class="px-4 py-3 text-sm text-white/80">Meja 2</td>
                    <td class="px-4 py-3 text-sm text-white/80">3 item</td>
                    <td class="px-4 py-3 text-sm font-bold text-white">Rp 85.000</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span></td>
                    <td class="px-4 py-3">
                        <button class="text-white/70 hover:text-white">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-white/5">
                    <td class="px-4 py-3 text-sm font-medium text-white whitespace-nowrap">#ORD-004</td>
                    <td class="px-4 py-3 text-sm text-white/80 whitespace-nowrap">11 Apr 2026, 14:20</td>
                    <td class="px-4 py-3 text-sm text-white/80">Meja 7</td>
                    <td class="px-4 py-3 text-sm text-white/80">5 item</td>
                    <td class="px-4 py-3 text-sm font-bold text-white">Rp 210.000</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span></td>
                    <td class="px-4 py-3">
                        <button class="text-white/70 hover:text-white">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-white/5">
                    <td class="px-4 py-3 text-sm font-medium text-white whitespace-nowrap">#ORD-005</td>
                    <td class="px-4 py-3 text-sm text-white/80 whitespace-nowrap">11 Apr 2026, 11:00</td>
                    <td class="px-4 py-3 text-sm text-white/80">Meja 1</td>
                    <td class="px-4 py-3 text-sm text-white/80">2 item</td>
                    <td class="px-4 py-3 text-sm font-bold text-white">Rp 45.000</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Selesai</span></td>
                    <td class="px-4 py-3">
                        <button class="text-white/70 hover:text-white">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="mt-4 flex items-center justify-between">
    <p class="text-sm text-white/60">Menampilkan 1-5 dari 156</p>
    <div class="flex gap-1">
        <button class="px-3 py-1 rounded bg-white/10 text-white/70 text-sm hover:bg-white/20">Prev</button>
        <button class="px-3 py-1 rounded bg-white text-[#005246] text-sm">1</button>
        <button class="px-3 py-1 rounded bg-white/10 text-white/70 text-sm hover:bg-white/20">2</button>
        <button class="px-3 py-1 rounded bg-white/10 text-white/70 text-sm hover:bg-white/20">3</button>
        <button class="px-3 py-1 rounded bg-white/10 text-white/70 text-sm hover:bg-white/20">Next</button>
    </div>
</div>
@endsection
