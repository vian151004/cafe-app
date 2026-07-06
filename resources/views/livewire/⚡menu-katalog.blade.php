<div class="min-h-screen bg-gray-50 antialiased text-gray-900 pb-24">
    <style>
        @keyframes bounce-in {
            0% { transform: scale(0.95); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-bounce-in { animation: bounce-in 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center p-2 shadow-inner">
                    <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-gray-950 tracking-tight">Cafe <span class="text-orange-600">Vian</span></h1>
                    <p class="text-xs text-gray-500 -mt-0.5">
                        @if($table_number && $table_number != 'Tanpa Meja')
                            Pesanan diantar ke <span class="font-bold text-orange-600 bg-orange-50 px-1.5 py-0.5 rounded">Meja {{ $table_number }}</span>
                        @else
                            Nikmati menu terbaik kami
                        @endif
                    </p>
                </div>
            </div>
            
            <button onclick="document.getElementById('floating-cart')?.scrollIntoView({ behavior: 'smooth' })" class="relative p-2 rounded-full hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-orange-600 rounded-full">
                        {{ collect(session('cart'))->sum('quantity') }}
                    </span>
                @endif
            </button>
        </div>
        
        <div class="bg-white border-t border-gray-100 mt-1">
            <div class="max-w-7xl mx-auto px-4 py-3">
                <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-hide -mb-1">
                    <button wire:click="resetCategory" class="flex-none px-5 py-2.5 rounded-full text-sm font-semibold transition whitespace-nowrap shadow-sm {{ !$category_id ? 'bg-orange-600 text-white shadow-orange-200' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200' }}">
                        Semua Menu
                    </button>
                    @foreach($categories as $category)
                        <button wire:click="selectCategory({{ $category->id }})" class="flex-none px-5 py-2.5 rounded-full text-sm font-semibold transition whitespace-nowrap shadow-sm {{ $category_id == $category->id ? 'bg-orange-600 text-white shadow-orange-200' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200' }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="text-xl font-bold text-gray-900 tracking-tight">
                @if($category_id) Menu {{ $categories->find($category_id)->name }} @else Semua Rekomendasi @endif
            </h2>
            <div class="relative w-full md:w-80 group">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-orange-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input wire:model.live="search" type="text" placeholder="Cari menu favorit..." class="w-full pl-11 pr-4 py-2.5 bg-white border border-gray-200 rounded-2xl shadow-sm focus:ring-2 focus:ring-orange-500 outline-none transition-all">
            </div>
        </div>
        
        @if($products->isEmpty())
            <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 shadow-sm">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <h3 class="mt-4 text-lg font-bold text-gray-900">Menu Tidak Ditemukan</h3>
                <button wire:click="resetCategory" class="mt-6 bg-orange-600 text-white px-6 py-2.5 rounded-xl font-semibold shadow-md">Lihat Semua Menu</button>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($products as $product)
                    <div class="group bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all border overflow-hidden flex flex-col {{ isset(session('cart')[$product->id]) ? 'border-orange-500 ring-2 ring-orange-100' : 'border-gray-100' }}">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 font-bold uppercase tracking-widest text-xs">No Image</div>
                            @endif
                            
                            @if($product->stock <= 0)
                                <span class="absolute top-3 left-3 bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Habis</span>
                            @endif
                        </div>

                        <div class="p-4 md:p-5 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="font-extrabold text-gray-950 text-base md:text-lg tracking-tight group-hover:text-orange-600 truncate">{{ $product->name }}</h3>
                                <p class="text-xs text-gray-600 mt-1 line-clamp-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>

                            <div class="mt-4">
                                @if($product->stock > 0)
                                    @if(isset(session('cart')[$product->id]))
                                        <div class="w-full flex items-center justify-between bg-orange-600 text-white rounded-xl font-bold text-sm overflow-hidden shadow-md animate-bounce-in">
                                            <button wire:click="decrementQuantity({{ $product->id }})" class="px-3 py-2.5 hover:bg-orange-700 transition active:scale-95 text-lg font-black">-</button>
                                            <span class="text-sm font-black">{{ session('cart')[$product->id]['quantity'] }}</span>
                                            <button wire:click="addToCart({{ $product->id }})" class="px-3 py-2.5 hover:bg-orange-700 transition active:scale-95 text-lg font-black">+</button>
                                        </div>
                                    @else
                                        <button wire:click="addToCart({{ $product->id }})" class="w-full py-2.5 bg-gray-900 text-white rounded-xl font-bold text-sm hover:bg-orange-600 transition transform active:scale-95 flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                            Tambah
                                        </button>
                                    @endif
                                @else
                                    <button disabled class="w-full py-2.5 bg-gray-200 text-gray-400 rounded-xl font-bold text-sm cursor-not-allowed">Habis</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    @if(session()->has('cart') && count(session('cart')) > 0)
        <div id="floating-cart" class="fixed bottom-6 right-6 left-6 md:left-auto md:w-96 bg-white rounded-3xl shadow-2xl border border-orange-100 p-6 z-[60] animate-bounce-in">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-extrabold text-gray-900 flex items-center gap-2 text-lg">
                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Keranjang Kamu
                </h3>
                <span class="text-xs font-bold bg-orange-100 text-orange-600 px-2.5 py-1 rounded-full">
                    {{ collect(session('cart'))->sum('quantity') }} Item
                </span>
            </div>

            <div class="max-h-52 overflow-y-auto space-y-3 mb-5 pr-2">
                @foreach(session('cart') as $id => $item)
                    <div class="flex items-center justify-between group">
                        <div class="flex-grow">
                            <p class="font-bold text-sm text-gray-900">{{ $item['name'] }}</p>
                            <p class="text-xs text-gray-500">{{ $item['quantity'] }} x Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-sm text-orange-600">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                            <button wire:click="removeFromCart({{ $id }})" class="text-gray-300 hover:text-red-500 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-gray-100 pt-4">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-gray-500 font-medium">Total Bayar</span>
                    <span class="text-2xl font-black text-gray-950">Rp{{ number_format(collect(session('cart'))->sum(fn($i) => $i['price'] * $i['quantity']), 0, ',', '.') }}</span>
                </div>
                <button wire:click="checkout" wire:loading.attr="disabled" class="w-full bg-orange-600 text-white py-4 rounded-2xl font-black text-base shadow-lg shadow-orange-200 hover:bg-gray-900 transition-all transform active:scale-95 flex items-center justify-center gap-3">
                    <span wire:loading.remove class="flex items-center gap-2">
                        Checkout ke WhatsApp
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                    <span wire:loading class="flex items-center gap-2">
                        Menyiapkan Nota Pesanan...
                    </span>
                </button>
            </div>
        </div>
    @endif

    <footer class="bg-gray-900 text-gray-400 py-10 px-4 mt-auto">
        <div class="max-w-7xl mx-auto text-center">
            <h4 class="text-white font-bold text-lg uppercase tracking-widest">Cafe Vian</h4>
            <p class="text-xs mt-4">Made with ❤️ for Project Semester 4</p>
        </div>
    </footer >
</div>