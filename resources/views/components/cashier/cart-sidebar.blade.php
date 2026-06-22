<!-- Cart Sidebar (Desktop) -->
<div class="hidden lg:block w-80 bg-surface-container-lowest border border-surface-variant/30 rounded-card overflow-hidden h-full flex flex-col shadow-sm">
    <div class="p-4 bg-primary-container/5 border-b border-surface-variant/30">
        <h2 class="font-title text-on-surface flex items-center gap-2">
            <span class="material-symbols-outlined">shopping_cart</span>Keranjang
        </h2>
        <p class="text-body-sm text-on-surface-variant/60" id="cart-count">0 item</p>
    </div>
    
    <div class="flex-1 overflow-y-auto p-4 space-y-3" id="cart-items">
        <div class="text-center text-on-surface-variant/30 py-8">
            <span class="material-symbols-outlined" style="font-size: 48px;">shopping_bag</span>
            <p class="text-body-sm mt-2">Belum ada item</p>
        </div>
    </div>
    
    <div class="p-4 border-t border-surface-variant/30">
        <div class="flex justify-between mb-3">
            <span class="text-on-surface-variant font-label">Total</span>
            <span class="font-display text-primary-container" id="cart-total">Rp 0</span>
        </div>
        <button class="w-full py-3 bg-primary-container text-white font-label rounded-lg hover:bg-primary transition-all active:scale-95 flex items-center justify-center gap-2" id="btn-checkout">
            <span class="material-symbols-outlined text-sm">send</span>Pesan Sekarang
        </button>
    </div>
</div>

<!-- Cart Toggle Button (Mobile) -->
<button id="cart-toggle-mobile" class="lg:hidden fixed bottom-6 right-6 z-50 w-14 h-14 bg-primary-container text-white rounded-full shadow-lg flex items-center justify-center">
    <span class="material-symbols-outlined text-[40px]">shopping_cart</span>
    <span id="cart-badge" class="absolute -top-1 -right-1 w-6 h-6 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">0</span>
</button>

<!-- Cart Sidebar (Mobile Slide-in) -->
<div id="cart-sidebar" class="lg:hidden fixed inset-y-0 right-0 w-full sm:w-80 bg-surface-container-lowest shadow-2xl z-50 flex flex-col transition-transform" style="transform: translateX(100%);">
    <div class="p-4 bg-primary-container/5 border-b border-surface-variant/30 flex items-center justify-between">
        <div>
            <h2 class="font-title text-on-surface flex items-center gap-2">
                <span class="material-symbols-outlined">shopping_cart</span>Keranjang
            </h2>
            <p class="text-body-sm text-on-surface-variant/60" id="cart-count-mobile">0 item</p>
        </div>
        <button id="cart-close" class="text-on-surface-variant/60 hover:text-on-surface transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    
    <div class="flex-1 overflow-y-auto p-4 space-y-3" id="cart-items-mobile">
        <div class="text-center text-on-surface-variant/30 py-8">
            <span class="material-symbols-outlined" style="font-size: 48px;">shopping_bag</span>
            <p class="text-body-sm mt-2">Belum ada item</p>
        </div>
    </div>
    
    <div class="p-4 border-t border-surface-variant/30">
        <div class="flex justify-between mb-3">
            <span class="text-on-surface-variant font-label">Total</span>
            <span class="font-display text-primary-container" id="cart-total-mobile">Rp 0</span>
        </div>
        <button class="w-full py-3 bg-primary-container text-white font-label rounded-lg hover:bg-primary transition-all active:scale-95 flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-sm">send</span>Pesan Sekarang
        </button>
    </div>
</div>

<!-- Overlay -->
<div id="cart-overlay" class="lg:hidden fixed inset-0 bg-black/50 z-40 hidden"></div>
