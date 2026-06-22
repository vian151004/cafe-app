@extends('layouts.cashier')

@section('title', 'Tambah Pesanan')

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
<x-cashier.top-app-bar title="Tambah Pesanan" search-placeholder="Cari menu..." />

<div class="flex h-[calc(100vh-4rem)]">
    <div class="flex-1 p-8 overflow-y-auto pr-4">
        <x-cashier.category-filter />

        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-6" id="menu-grid">
            @foreach($products as $product)
            <x-cashier.menu-card
                name="{{ $product['name'] }}"
                price="{{ $product['price'] }}"
                stock="{{ $product['stock'] }}"
                category="{{ $product['category'] }}"
                icon="{{ $product['icon'] }}"
                show-add-btn
            />
            @endforeach
        </div>
    </div>

    <x-cashier.cart-sidebar />
</div>
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
            const emptyMsg = `<div class="text-center text-on-surface-variant/30 py-8"><span class="material-symbols-outlined" style="font-size: 48px;">shopping_bag</span><p class="text-body-sm mt-2">Belum ada item</p></div>`;
            cartItems.innerHTML = emptyMsg;
            cartItemsMobile.innerHTML = emptyMsg;
            return;
        }

        let html = '';
        cart.forEach((item, index) => {
            html += `
            <div class="flex items-center gap-3 p-3 bg-surface-container rounded-card">
                <div class="flex-1">
                    <p class="font-medium text-body-sm text-on-surface">${item.name}</p>
                    <p class="text-body-sm font-bold text-primary-container">${formatRupiah(item.price)}</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="qty-btn w-8 h-8 bg-surface-container-high rounded-lg font-bold text-on-surface-variant flex items-center justify-center hover:bg-surface-container-highest transition-colors" data-index="${index}" data-action="minus">
                        <span class="material-symbols-outlined text-sm">remove</span>
                    </button>
                    <span class="w-8 text-center font-bold text-on-surface">${item.qty}</span>
                    <button class="qty-btn w-8 h-8 bg-surface-container-high rounded-lg font-bold text-on-surface-variant flex items-center justify-center hover:bg-surface-container-highest transition-colors" data-index="${index}" data-action="plus">
                        +
                    </button>
                </div>
            </div>`;
        });

        cartItems.innerHTML = html;
        cartItemsMobile.innerHTML = html;

        if (typeof lucide !== 'undefined') lucide.createIcons();
        document.querySelectorAll('.material-symbols-outlined').forEach(el => {});

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
            document.getElementById('cart-sidebar').classList.add('open');
            document.getElementById('cart-overlay').classList.remove('hidden');
        });
    });

    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.category-btn').forEach(b => {
                b.classList.remove('bg-primary-container', 'text-white');
                b.classList.add('bg-surface-container', 'text-on-surface-variant');
            });
            this.classList.remove('bg-surface-container', 'text-on-surface-variant');
            this.classList.add('bg-primary-container', 'text-white');

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
