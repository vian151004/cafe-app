@extends('layouts.cashier')

@section('title', 'Menu & Stock')
@section('header_title', 'Menu & Stock')

@section('content')
<!-- Filter Category -->
<div class="mb-6 flex gap-2 overflow-x-auto pb-2">
    <button class="category-btn px-4 py-2 rounded-full bg-white text-[#005246] text-sm font-medium whitespace-nowrap" data-category="all">Semua</button>
    <button class="category-btn px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium whitespace-nowrap hover:bg-white/30" data-category="makanan">Makanan</button>
    <button class="category-btn px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium whitespace-nowrap hover:bg-white/30" data-category="minuman">Minuman</button>
    <button class="category-btn px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium whitespace-nowrap hover:bg-white/30" data-category="snack">Snack</button>
</div>

<!-- Search -->
<div class="mb-6">
    <div class="relative">
        <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/50 w-5 h-5"></i>
        <input type="text" id="search-menu" placeholder="Cari menu..." class="w-full pl-12 pr-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 focus:border-white focus:outline-none text-white placeholder-white/50">
    </div>
</div>

<!-- Menu Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="menu-grid">
    <!-- Sample Menu Item -->
    <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden" data-category="makanan" data-name="nasi goreng">
        <div class="h-40 bg-gradient-to-br from-orange-500/30 to-orange-600/30 flex items-center justify-center">
            <i data-lucide="rice" class="w-16 h-16 text-white/70"></i>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-lg text-white">Nasi Goreng</h3>
            <p class="text-white/60 text-sm mb-2">Makanan</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-bold">Rp 25.000</span>
                <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Stock: 15</span>
            </div>
        </div>
    </div>

    <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden" data-category="minuman" data-name="kopi susu">
        <div class="h-40 bg-gradient-to-br from-amber-500/30 to-amber-600/30 flex items-center justify-center">
            <i data-lucide="coffee" class="w-16 h-16 text-white/70"></i>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-lg text-white">Kopi Susu</h3>
            <p class="text-white/60 text-sm mb-2">Minuman</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-bold">Rp 18.000</span>
                <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Stock: 25</span>
            </div>
        </div>
    </div>

    <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden" data-category="minuman" data-name="teh manis">
        <div class="h-40 bg-gradient-to-br from-green-500/30 to-green-600/30 flex items-center justify-center">
            <i data-lucide="cup-soda" class="w-16 h-16 text-white/70"></i>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-lg text-white">Teh Manis</h3>
            <p class="text-white/60 text-sm mb-2">Minuman</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-bold">Rp 8.000</span>
                <span class="px-2 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-400">Stock: 5</span>
            </div>
        </div>
    </div>

    <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden" data-category="snack" data-name="kentang goreng">
        <div class="h-40 bg-gradient-to-br from-yellow-500/30 to-yellow-600/30 flex items-center justify-center">
            <i data-lucide="french-fries" class="w-16 h-16 text-white/70"></i>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-lg text-white">Kentang Goreng</h3>
            <p class="text-white/60 text-sm mb-2">Snack</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-bold">Rp 15.000</span>
                <span class="px-2 py-1 text-xs rounded-full bg-red-500/20 text-red-400">Stock: 0</span>
            </div>
        </div>
    </div>

    <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden" data-category="makanan" data-name="ayam geprek">
        <div class="h-40 bg-gradient-to-br from-red-500/30 to-red-600/30 flex items-center justify-center">
            <i data-lucide="drumstick" class="w-16 h-16 text-white/70"></i>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-lg text-white">Ayam Geprek</h3>
            <p class="text-white/60 text-sm mb-2">Makanan</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-bold">Rp 22.000</span>
                <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Stock: 10</span>
            </div>
        </div>
    </div>

    <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden" data-category="minuman" data-name="es jeruk">
        <div class="h-40 bg-gradient-to-br from-orange-500/30 to-orange-600/30 flex items-center justify-center">
            <i data-lucide="lemon" class="w-16 h-16 text-white/70"></i>
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-lg text-white">Es Jeruk</h3>
            <p class="text-white/60 text-sm mb-2">Minuman</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-bold">Rp 12.000</span>
                <span class="px-2 py-1 text-xs rounded-full bg-green-500/20 text-green-400">Stock: 20</span>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Category filter
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.category-btn').forEach(b => {
                b.classList.remove('bg-white', 'text-[#005246]');
                b.classList.add('bg-white/20', 'text-white');
            });
            this.classList.remove('bg-white/20', 'text-white');
            this.classList.add('bg-white', 'text-[#005246]');

            const category = this.dataset.category;
            document.querySelectorAll('.menu-card').forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });

    // Search
    document.getElementById('search-menu').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        document.querySelectorAll('.menu-card').forEach(card => {
            const name = card.dataset.name;
            if (name.includes(query)) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    });
</script>
@endpush
