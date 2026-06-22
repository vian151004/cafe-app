@props([
    'name' => 'Menu Item',
    'price' => 0,
    'stock' => 0,
    'category' => 'makanan',
    'icon' => 'utensils',
    'showAddBtn' => false,
    'itemId' => null,
])

@php
    $colorMap = [
        'makanan' => ['bg' => 'from-orange-50 to-orange-100', 'icon' => 'text-orange-600'],
        'minuman' => ['bg' => 'from-amber-50 to-amber-100', 'icon' => 'text-amber-600'],
        'snack' => ['bg' => 'from-yellow-50 to-yellow-100', 'icon' => 'text-yellow-600'],
    ];
    $colors = $colorMap[$category] ?? ['bg' => 'from-slate-50 to-slate-100', 'icon' => 'text-slate-500'];
    $stockBadge = $stock == 0 ? 'bg-red-100 text-red-700' : ($stock <= 5 ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700');
    $itemDataId = $itemId ?? strtolower(str_replace(' ', '-', $name));
@endphp

<div class="menu-card bg-surface-container-lowest border border-surface-variant/30 rounded-card overflow-hidden shadow-sm relative transition-all hover:shadow-md hover:-translate-y-0.5" data-category="{{ $category }}" data-name="{{ strtolower($name) }}" data-price="{{ $price }}" data-id="{{ $itemDataId }}">
    <div class="h-40 bg-gradient-to-br {{ $colors['bg'] }} flex items-center justify-center">
        <span class="material-symbols-outlined {{ $colors['icon'] }}" style="font-size: 64px;">{{ $icon }}</span>
    </div>
    @if($showAddBtn)
    <button class="menu-item-btn absolute top-3 right-3 w-10 h-10 bg-primary-container text-white rounded-full shadow-md hover:bg-primary transition-all flex items-center justify-center active:scale-95">
        <span class="material-symbols-outlined text-[28px]">add</span>
    </button>
    @endif
    <div class="p-4">
        <h3 class="font-semibold text-body text-on-surface">{{ $name }}</h3>
        <p class="text-on-surface-variant/60 text-body-sm mb-2">Stok: {{ $stock }}</p>
        <div class="flex items-center justify-between">
            <span class="font-display text-primary-container">Rp {{ number_format($price, 0, ',', '.') }}</span>
            @if($stock == 0)
            <span class="px-2 py-0.5 text-xs rounded-full {{ $stockBadge }} font-semibold">Habis</span>
            @else
            <span class="px-2 py-0.5 text-xs rounded-full {{ $stockBadge }} font-semibold">Tersedia</span>
            @endif
        </div>
    </div>
</div>
