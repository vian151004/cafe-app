<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CafeKita - Cashier')</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.5);
        }
    </style>
</head>
<body class="bg-[#005246] min-h-screen flex">
    <!-- Sidebar - Floating & Rounded -->
    <aside id="sidebar" class="fixed lg:fixed inset-y-4 left-4 z-50 w-64 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">
        <div class="h-full m-0 bg-white/10 backdrop-blur-md rounded-3xl shadow-lg border border-white/20 flex flex-col overflow-hidden">
            <!-- Logo -->
            <div class="p-6 border-b border-white/20">
                <h1 class="text-xl font-bold text-white">CafeKita</h1>
                <p class="text-xs text-white/70 tracking-widest uppercase">Cashier</p>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2 flex-1">
                <a href="{{ route('cashier.orders') }}" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('cashier.orders') || request()->routeIs('cashier.order.create') ? 'bg-white text-[#005246]' : 'text-white/80 hover:bg-white/20 hover:text-white' }}">
                    <i data-lucide="receipt" class="w-5 h-5"></i>
                    <span class="font-medium">Pesanan</span>
                </a>
                <a href="{{ route('cashier.history') }}" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('cashier.history') ? 'bg-white text-[#005246]' : 'text-white/80 hover:bg-white/20 hover:text-white' }}">
                    <i data-lucide="history" class="w-5 h-5"></i>
                    <span class="font-medium">Riwayat Pesanan</span>
                </a>
                <a href="{{ route('cashier.menu') }}" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('cashier.menu') ? 'bg-white text-[#005246]' : 'text-white/80 hover:bg-white/20 hover:text-white' }}">
                    <i data-lucide="coffee" class="w-5 h-5"></i>
                    <span class="font-medium">Menu & Stok</span>
                </a>
                <a href="{{ route('cashier.shift') }}" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('cashier.shift') ? 'bg-white text-[#005246]' : 'text-white/80 hover:bg-white/20 hover:text-white' }}">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="font-medium">Absen</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-white/20">
                <div class="flex items-center gap-3 p-3 rounded-2xl bg-white/10">
                    <div class="w-10 h-10 rounded-full bg-white text-[#005246] flex items-center justify-center font-bold">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="font-medium text-sm text-white">Alex Rivera</p>
                        <p class="text-xs text-white/70">SHIFT MANAGER</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <main class="flex-1 min-h-screen flex flex-col lg:pl-72">
        <!-- Mobile Header -->
        <header class="lg:hidden sticky top-0 z-30 bg-white/10 backdrop-blur-md border-b border-white/20 p-4 flex items-center gap-4">
            <button onclick="toggleSidebar()" class="p-2 hover:bg-white/20 rounded-lg text-white">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <div>
                <h1 class="font-bold text-white">CafeKita</h1>
                <p class="text-xs text-white/70">Cashier</p>
            </div>
        </header>

        <!-- Content -->
        <div class="flex-1 p-4 lg:p-6 overflow-y-auto" style="background-image: linear-gradient(rgba(0, 82, 70, 0.5), rgba(0, 82, 70, 0.5)), url('/images/BGCashier.png'); background-size: cover; background-position: center; background-attachment: fixed;">
            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>