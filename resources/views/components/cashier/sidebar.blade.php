<aside class="fixed left-6 top-6 bottom-6 w-[260px] bg-primary-container flex flex-col py-6 shadow-2xl rounded-3xl z-50 transition-all duration-300">
    <div class="px-6 mb-8">
        <h1 class="text-2xl font-extrabold text-white tracking-tight">CafeKita</h1>
        <p class="text-emerald-100/60 text-body-sm">Modern POS System</p>
    </div>

    <nav class="flex-1 space-y-1 overflow-y-auto px-2">
        <a href="{{ route('cashier.orders') }}" class="{{ request()->routeIs('cashier.orders') || request()->routeIs('cashier.order.create') ? 'active-nav' : 'text-emerald-100/70 hover:bg-white/5' }} my-1 px-4 py-3 rounded-xl cursor-pointer transition-all flex items-center gap-3">
            <span class="material-symbols-outlined">shopping_cart</span>
            <span class="font-label">Pesanan</span>
        </a>
        <a href="{{ route('cashier.history') }}" class="{{ request()->routeIs('cashier.history') ? 'active-nav' : 'text-emerald-100/70 hover:bg-white/5' }} my-1 px-4 py-3 rounded-xl cursor-pointer transition-all flex items-center gap-3">
            <span class="material-symbols-outlined {{ request()->routeIs('cashier.history') ? 'material-symbols-filled' : '' }}">history</span>
            <span class="font-label">Riwayat Pesanan</span>
        </a>
        <a href="{{ route('cashier.menu') }}" class="{{ request()->routeIs('cashier.menu') ? 'active-nav' : 'text-emerald-100/70 hover:bg-white/5' }} my-1 px-4 py-3 rounded-xl cursor-pointer transition-all flex items-center gap-3">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="font-label">Menu & Stok</span>
        </a>
        <a href="{{ route('cashier.shift') }}" class="{{ request()->routeIs('cashier.shift') ? 'active-nav' : 'text-emerald-100/70 hover:bg-white/5' }} my-1 px-4 py-3 rounded-xl cursor-pointer transition-all flex items-center gap-3">
            <span class="material-symbols-outlined">badge</span>
            <span class="font-label">Absen</span>
        </a>
    </nav>

    <div class="mt-auto border-t border-white/10 pt-4 px-2">
        <a href="{{ route('cashier.profile') }}" class="text-emerald-100/70 hover:bg-white/5 my-1 px-4 py-3 rounded-xl cursor-pointer flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">account_circle</span>
            <span class="font-label">Profil Saya</span>
        </a>
        <button id="btn-logout" class="text-emerald-100/70 hover:bg-white/5 my-1 px-4 py-3 rounded-xl cursor-pointer flex items-center gap-3 transition-all w-full text-left">
            <span class="material-symbols-outlined">logout</span>
            <span class="font-label">Logout</span>
        </button>
    </div>
</aside>

<!-- Logout Confirmation Modal -->
<div id="logout-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 text-center animate-scale-up">
        <div class="w-16 h-16 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4">
            <span class="material-symbols-outlined text-red-500 text-3xl">logout</span>
        </div>
        <h3 class="font-title text-on-surface text-xl mb-2">Yakin ingin logout?</h3>
        <p class="text-body-sm text-on-surface-variant/70 mb-8">Kamu akan kembali ke halaman login</p>
        <form id="logout-form" action="/logout" method="POST" class="flex flex-col gap-3">
            @csrf
            <button type="submit" class="w-full py-3 bg-red-600 text-white font-label rounded-xl hover:bg-red-700 transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">logout</span>Ya, Logout
            </button>
            <button type="button" id="btn-cancel-logout" class="w-full py-3 bg-surface-container text-on-surface font-label rounded-xl hover:bg-surface-container-high transition-all active:scale-95">
                Batal
            </button>
        </form>
    </div>
</div>

<style>
    @keyframes scale-up {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    .animate-scale-up {
        animation: scale-up 0.2s ease-out;
    }
</style>

<script>
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('#btn-logout');
        if (btn) {
            e.preventDefault();
            document.getElementById('logout-modal').classList.remove('hidden');
            return;
        }
        const cancel = e.target.closest('#btn-cancel-logout');
        if (cancel) {
            document.getElementById('logout-modal').classList.add('hidden');
            return;
        }
        const modal = document.getElementById('logout-modal');
        if (e.target === modal || e.target.closest('.absolute.inset-0.bg-black\\/50')) {
            modal.classList.add('hidden');
        }
    });
</script>
