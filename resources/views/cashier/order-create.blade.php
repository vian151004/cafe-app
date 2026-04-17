@extends('layouts.cashier')

@section('title', 'Tambah Pesanan')
@section('header_title', 'Tambah Pesanan')

@push('styles')
<style>
    #cart-sidebar {
        transform: translateX(100%);
    }
    #cart-sidebar.open {
        transform: translateX(0);
    }
    .menu-item-btn:active {
        transform: scale(0.95);
    }
</style>
@endpush

@section('content')
<div class="flex h-[calc(100vh-8rem)] gap-3 lg:gap-4">
    <!-- Menu Section -->
    <div class="flex-1 pr-2 lg:pr-0 overflow-y-auto">
        <!-- Search & Category -->
        <div class="mb-4 flex gap-2 overflow-x-auto pb-2">
            <button class="category-btn px-4 py-2 rounded-full bg-white text-[#005246] text-sm font-medium whitespace-nowrap" data-category="all">Semua</button>
            <button class="category-btn px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium whitespace-nowrap hover:bg-white/30" data-category="makanan">Makanan</button>
            <button class="category-btn px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium whitespace-nowrap hover:bg-white/30" data-category="minuman">Minuman</button>
            <button class="category-btn px-4 py-2 rounded-full bg-white/20 text-white text-sm font-medium whitespace-nowrap hover:bg-white/30" data-category="snack">Snack</button>
        </div>
        
        <div class="mb-4">
            <div class="relative">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/50 w-5 h-5"></i>
                <input type="text" id="search-menu" placeholder="Cari menu..." class="w-full pl-12 pr-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 focus:border-white focus:outline-none text-white placeholder-white/50">
            </div>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4" id="menu-grid">
            <!-- Menu Item -->
            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="makanan" data-name="nasi goreng" data-price="25000" data-id="1">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-orange-500/30 to-orange-600/30 flex items-center justify-center">
                    <i data-lucide="rice" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Nasi Goreng</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 15</p>
                    <span class="text-white font-bold">Rp 25.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="minuman" data-name="kopi susu" data-price="18000" data-id="2">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-amber-500/30 to-amber-600/30 flex items-center justify-center">
                    <i data-lucide="coffee" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Kopi Susu</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 25</p>
                    <span class="text-white font-bold">Rp 18.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="minuman" data-name="teh manis" data-price="8000" data-id="3">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-green-500/30 to-green-600/30 flex items-center justify-center">
                    <i data-lucide="cup-soda" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Teh Manis</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 5</p>
                    <span class="text-white font-bold">Rp 8.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="snack" data-name="kentang goreng" data-price="15000" data-id="4">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-yellow-500/30 to-yellow-600/30 flex items-center justify-center">
                    <i data-lucide="french-fries" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Kentang Goreng</h3>
                    <p class="text-red-400 text-xs mb-1">Stock: 0</p>
                    <span class="text-white font-bold">Rp 15.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="makanan" data-name="ayam geprek" data-price="22000" data-id="5">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-red-500/30 to-red-600/30 flex items-center justify-center">
                    <i data-lucide="drumstick" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Ayam Geprek</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 10</p>
                    <span class="text-white font-bold">Rp 22.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="minuman" data-name="espresso" data-price="12000" data-id="6">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-amber-600/30 to-amber-700/30 flex items-center justify-center">
                    <i data-lucide="coffee" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Espresso</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 30</p>
                    <span class="text-white font-bold">Rp 12.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="makanan" data-name="mie goreng" data-price="20000" data-id="7">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-yellow-600/30 to-orange-600/30 flex items-center justify-center">
                    <i data-lucide="utensils" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Mie Goreng</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 12</p>
                    <span class="text-white font-bold">Rp 20.000</span>
                </div>
            </div>

            <div class="menu-card bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden relative" data-category="snack" data-name="cireng" data-price="12000" data-id="8">
                <div class="h-28 sm:h-32 bg-gradient-to-br from-gray-500/30 to-gray-600/30 flex items-center justify-center">
                    <i data-lucide="cookie" class="w-12 h-12 text-white/70"></i>
                </div>
                <button class="menu-item-btn absolute top-2 right-2 w-10 h-10 bg-white text-[#005246] rounded-full font-bold shadow-md hover:bg-gray-100 transition-colors flex items-center justify-center">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                </button>
                <div class="p-3">
                    <h3 class="font-semibold text-sm sm:text-base text-white">Cireng</h3>
                    <p class="text-white/60 text-xs mb-1">Stock: 20</p>
                    <span class="text-white font-bold">Rp 12.000</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Sidebar (Desktop) -->
    <div class="hidden lg:block w-80 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl overflow-hidden h-full flex flex-col">
        <div class="p-4 bg-white text-[#005246]">
            <h2 class="font-bold flex items-center gap-2">
                <i data-lucide="shopping-cart" class="w-5 h-5"></i>Keranjang
            </h2>
            <p class="text-sm text-[#005246]/70" id="cart-count">0 item</p>
        </div>
        
        <!-- Cart Items -->
        <div class="flex-1 overflow-y-auto p-4 pr-2 space-y-3" id="cart-items">
            <p class="text-center text-white/40 text-sm py-8">Belum ada item</p>
        </div>
        
        <!-- Cart Footer -->
        <div class="p-4 border-t border-white/20">
            <div class="flex justify-between mb-2">
                <span class="text-white/70">Total</span>
                <span class="font-bold text-lg text-white" id="cart-total">Rp 0</span>
            </div>
            <button class="w-full py-3 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition-colors" id="btn-checkout">
                <i data-lucide="send" class="w-5 h-5 inline mr-2"></i>Pesan Sekarang
            </button>
        </div>
    </div>

    <!-- Cart Toggle Button (Mobile) -->
    <button id="cart-toggle-mobile" class="lg:hidden fixed bottom-6 right-6 z-50 w-14 h-14 bg-white text-[#005246] rounded-full shadow-lg flex items-center justify-center">
        <i data-lucide="shopping-cart" class="w-6 h-6"></i>
        <span id="cart-badge" class="absolute -top-1 -right-1 w-6 h-6 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">0</span>
    </button>
</div>

<!-- Cart Sidebar (Mobile Slide-in) -->
<div id="cart-sidebar" class="lg:hidden fixed inset-y-0 right-0 w-full sm:w-80 bg-[#005246] shadow-2xl z-50 flex flex-col transition-transform">
    <div class="p-4 bg-white text-[#005246] flex items-center justify-between">
        <div>
            <h2 class="font-bold flex items-center gap-2">
                <i data-lucide="shopping-cart" class="w-5 h-5"></i>Keranjang
            </h2>
            <p class="text-sm text-[#005246]/70" id="cart-count-mobile">0 item</p>
        </div>
        <button id="cart-close" class="text-2xl">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
    </div>
    
    <div class="flex-1 overflow-y-auto p-4 pr-2 space-y-3" id="cart-items-mobile">
        <p class="text-center text-white/40 text-sm py-8">Belum ada item</p>
    </div>
    
    <div class="p-4 border-t border-white/20">
        <div class="flex justify-between mb-2">
            <span class="text-white/70">Total</span>
            <span class="font-bold text-lg text-white" id="cart-total-mobile">Rp 0</span>
        </div>
        <button class="w-full py-3 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition-colors">
            <i data-lucide="send" class="w-5 h-5 inline mr-2"></i>Pesan Sekarang
        </button>
    </div>
</div>

<!-- Overlay -->
<div id="cart-overlay" class="lg:hidden fixed inset-0 bg-black/50 z-40 hidden"></div>
@endsection

@push('scripts')
<script>
    let cart = [];
    
    function formatRupiah(amount) {
        return 'Rp ' + amount.toLocaleString('id-ID');
    }
    
    function renderCart() {
        const cartItems = document.getElementById('cart-items');
        const cartItemsMobile = document.getElementById('cart-items-mobile');
        const cartCount = document.getElementById('cart-count');
        const cartCountMobile = document.getElementById('cart-count-mobile');
        const cartTotal = document.getElementById('cart-total');
        const cartTotalMobile = document.getElementById('cart-total-mobile');
        const cartBadge = document.getElementById('cart-badge');
        
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        
        cartCount.textContent = totalItems + ' item';
        cartCountMobile.textContent = totalItems + ' item';
        cartTotal.textContent = formatRupiah(totalPrice);
        cartTotalMobile.textContent = formatRupiah(totalPrice);
        cartBadge.textContent = totalItems;
        
        if (cart.length === 0) {
            const emptyMsg = '<p class="text-center text-white/40 text-sm py-8">Belum ada item</p>';
            cartItems.innerHTML = emptyMsg;
            cartItemsMobile.innerHTML = emptyMsg;
            return;
        }
        
        let html = '';
        cart.forEach((item, index) => {
            html += `
            <div class="flex items-center gap-3 p-3 bg-white/10 rounded-xl">
                <div class="flex-1">
                    <p class="font-medium text-sm text-white">${item.name}</p>
                    <p class="text-white text-sm font-bold">${formatRupiah(item.price)}</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="qty-btn w-8 h-8 bg-white/20 border border-white/30 rounded-lg font-bold text-white" data-index="${index}" data-action="minus">
                        <i data-lucide="minus" class="w-4 h-4"></i>
                    </button>
                    <span class="w-8 text-center font-bold text-white">${item.qty}</span>
                    <button class="qty-btn w-8 h-8 bg-white/20 border border-white/30 rounded-lg font-bold text-white" data-index="${index}" data-action="plus">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>`;
        });
        
        cartItems.innerHTML = html;
        cartItemsMobile.innerHTML = html;
        
        document.querySelectorAll('.qty-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                const action = this.dataset.action;
                if (action === 'plus') {
                    cart[index].qty++;
                } else if (action === 'minus') {
                    if (cart[index].qty > 1) {
                        cart[index].qty--;
                    } else {
                        cart.splice(index, 1);
                    }
                }
                renderCart();
            });
        });
    }
    
    // Add to cart
    document.querySelectorAll('.menu-item-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const card = this.closest('.menu-card');
            const id = card.dataset.id;
            const name = card.dataset.name;
            const price = parseInt(card.dataset.price);
            
            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.qty++;
            } else {
                cart.push({ id, name, price, qty: 1 });
            }
            
            renderCart();
            
            // Show sidebar on mobile
            document.getElementById('cart-sidebar').classList.add('open');
            document.getElementById('cart-overlay').classList.remove('hidden');
        });
    });
    
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
            if (card.dataset.name.includes(query)) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    });
    
    // Mobile cart toggle
    document.getElementById('cart-toggle-mobile').addEventListener('click', function() {
        document.getElementById('cart-sidebar').classList.add('open');
        document.getElementById('cart-overlay').classList.remove('hidden');
    });
    
    document.getElementById('cart-close').addEventListener('click', function() {
        document.getElementById('cart-sidebar').classList.remove('open');
        document.getElementById('cart-overlay').classList.add('hidden');
    });
    
    document.getElementById('cart-overlay').addEventListener('click', function() {
        document.getElementById('cart-sidebar').classList.remove('open');
        this.classList.add('hidden');
    });
</script>
@endpush

@push('scripts')
<script>
    let cart = [];
    
    function formatRupiah(amount) {
        return 'Rp ' + amount.toLocaleString('id-ID');
    }
    
    function renderCart() {
        const cartItems = document.getElementById('cart-items');
        const cartItemsMobile = document.getElementById('cart-items-mobile');
        const cartCount = document.getElementById('cart-count');
        const cartCountMobile = document.getElementById('cart-count-mobile');
        const cartTotal = document.getElementById('cart-total');
        const cartTotalMobile = document.getElementById('cart-total-mobile');
        const cartBadge = document.getElementById('cart-badge');
        
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        
        cartCount.textContent = totalItems + ' item';
        cartCountMobile.textContent = totalItems + ' item';
        cartTotal.textContent = formatRupiah(totalPrice);
        cartTotalMobile.textContent = formatRupiah(totalPrice);
        cartBadge.textContent = totalItems;
        
        if (cart.length === 0) {
            const emptyMsg = '<p class="text-center text-gray-400 text-sm py-8">Belum ada item</p>';
            cartItems.innerHTML = emptyMsg;
            cartItemsMobile.innerHTML = emptyMsg;
            return;
        }
        
        let html = '';
        cart.forEach((item, index) => {
            html += `
            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                <div class="flex-1">
                    <p class="font-medium text-sm">${item.name}</p>
                    <p class="text-[var(--color-orange)] text-sm font-bold">${formatRupiah(item.price)}</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="qty-btn w-8 h-8 bg-white border rounded-lg font-bold" data-index="${index}" data-action="minus">-</button>
                    <span class="w-8 text-center font-bold">${item.qty}</span>
                    <button class="qty-btn w-8 h-8 bg-white border rounded-lg font-bold" data-index="${index}" data-action="plus">+</button>
                </div>
            </div>`;
        });
        
        cartItems.innerHTML = html;
        cartItemsMobile.innerHTML = html;
        
        document.querySelectorAll('.qty-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                const action = this.dataset.action;
                if (action === 'plus') {
                    cart[index].qty++;
                } else if (action === 'minus') {
                    if (cart[index].qty > 1) {
                        cart[index].qty--;
                    } else {
                        cart.splice(index, 1);
                    }
                }
                renderCart();
            });
        });
    }
    
    // Add to cart
    document.querySelectorAll('.menu-item-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const card = this.closest('.menu-card');
            const id = card.dataset.id;
            const name = card.dataset.name;
            const price = parseInt(card.dataset.price);
            
            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.qty++;
            } else {
                cart.push({ id, name, price, qty: 1 });
            }
            
            renderCart();
            
            // Show sidebar on mobile
            document.getElementById('cart-sidebar').classList.add('open');
            document.getElementById('cart-overlay').classList.remove('hidden');
        });
    });
    
    // Category filter
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.category-btn').forEach(b => {
                b.classList.remove('bg-[var(--color-primary)]', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('bg-[var(--color-primary)]', 'text-white');
            
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
            if (card.dataset.name.includes(query)) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    });
    
    // Mobile cart toggle
    document.getElementById('cart-toggle-mobile').addEventListener('click', function() {
        document.getElementById('cart-sidebar').classList.add('open');
        document.getElementById('cart-overlay').classList.remove('hidden');
    });
    
    document.getElementById('cart-close').addEventListener('click', function() {
        document.getElementById('cart-sidebar').classList.remove('open');
        document.getElementById('cart-overlay').classList.add('hidden');
    });
    
    document.getElementById('cart-overlay').addEventListener('click', function() {
        document.getElementById('cart-sidebar').classList.remove('open');
        this.classList.add('hidden');
    });
</script>
@endpush