<div class="min-h-screen bg-gray-50 antialiased text-gray-900">
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-between p-2 shadow-inner">
                    <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-gray-950 tracking-tight">Cafe <span class="text-orange-600">Vian</span></h1>
                    <p class="text-xs text-gray-500 -mt-0.5">Nikmati menu terbaik kami</p>
                </div>
            </div>
            
            <button class="relative p-2 rounded-full hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-orange-600 rounded-full">0</span>
            </button>
        </div>
        
        <div class="bg-white border-t border-gray-100 mt-1">
            <div class="max-w-7xl mx-auto px-4 py-3">
                <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-hide -mb-1">
                    <button 
                        wire:click="resetCategory"
                        class="flex-none px-5 py-2.5 rounded-full text-sm font-semibold transition whitespace-nowrap shadow-sm
                        {{ !$category_id ? 'bg-orange-600 text-white shadow-orange-200' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200' }}">
                        Semua Menu
                    </button>

                    @foreach($categories as $category)
                        <button 
                            wire:click="selectCategory({{ $category->id }})"
                            class="flex-none px-5 py-2.5 rounded-full text-sm font-semibold transition whitespace-nowrap shadow-sm
                            {{ $category_id == $category->id ? 'bg-orange-600 text-white shadow-orange-200' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200' }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-900 tracking-tight">
                @if($category_id)
                    Menu {{ $categories->find($category_id)->name }}
                @else
                    Semua Rekomendasi
                @endif
            </h2>
            <p class="text-sm text-gray-500">{{ $products->count() }} Pilihan</p>
        </div>

        @if($products->isEmpty())
            <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 shadow-sm">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <h3 class="mt-4 text-lg font-bold text-gray-900">Menu Belum Tersedia</h3>
                <p class="mt-1 text-sm text-gray-500">Silakan pilih kategori lain atau kembali nanti.</p>
                <button wire:click="resetCategory" class="mt-6 bg-orange-600 text-white px-6 py-2.5 rounded-xl font-semibold text-sm shadow-md hover:bg-orange-700 transition">Lihat Semua Menu</button>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($products as $product)
                    <div class="group bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400 p-4 text-center">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            
                            @if($product->stock <= 5 && $product->stock > 0)
                                <span class="absolute top-3 left-3 bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Stok Terbatas</span>
                            @elseif($product->stock == 0)
                                <span class="absolute top-3 left-3 bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Habis</span>
                            @endif
                        </div>

                        <div class="p-4 md:p-5 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="font-extrabold text-gray-950 text-base md:text-lg tracking-tight group-hover:text-orange-600 transition truncate">{{ $product->name }}</h3>
                                <p class="text-xs md:text-sm text-gray-600 mt-1 line-clamp-2">{{ $product->description ?? 'Nikmati kelezatan menu favorit Cafe Vian.' }}</p>
                            </div>

                            <div class="mt-5 flex items-end justify-between gap-2">
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-500">Harga</span>
                                    <span class="text-lg md:text-xl font-extrabold text-orange-600 leading-none">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                                
                                <a 
                                    href="https://wa.me/6281234567890?text=Halo Cafe Vian, saya mau pesan: *{{ $product->name }}* (Rp{{ number_format($product->price, 0, ',', '.') }})"
                                    target="_blank"
                                    class="p-3 bg-gray-900 text-white rounded-2xl shadow-md hover:bg-orange-600 transition-colors duration-300 transform active:scale-95">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <footer class="bg-gray-900 text-gray-400 mt-16 py-10 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h4 class="text-white font-bold text-lg">Cafe Vian</h4>
            <p class="text-sm mt-2">© 2024. All rights reserved.</p>
            <p class="text-xs mt-1">Made with ❤️ for Project Semester 4</p>
        </div>
    </footer>
</div>