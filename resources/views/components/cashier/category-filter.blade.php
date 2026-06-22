@props(['active' => 'all', 'id' => 'category-filter'])

<div id="{{ $id }}" class="mb-6 flex gap-2 overflow-x-auto pb-2">
    <button class="category-btn px-4 py-2.5 rounded-full {{ $active === 'all' ? 'bg-primary-container text-white' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }} text-label whitespace-nowrap transition-all" data-category="all">Semua</button>
    <button class="category-btn px-4 py-2.5 rounded-full {{ $active === 'makanan' ? 'bg-primary-container text-white' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }} text-label whitespace-nowrap transition-all" data-category="makanan">Makanan</button>
    <button class="category-btn px-4 py-2.5 rounded-full {{ $active === 'minuman' ? 'bg-primary-container text-white' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }} text-label whitespace-nowrap transition-all" data-category="minuman">Minuman</button>
    <button class="category-btn px-4 py-2.5 rounded-full {{ $active === 'snack' ? 'bg-primary-container text-white' : 'bg-surface-container text-on-surface-variant hover:bg-surface-container-high' }} text-label whitespace-nowrap transition-all" data-category="snack">Snack</button>
</div>
