@extends('layouts.cashier')

@section('title', 'Menu & Stok')

@section('content')
<x-cashier.top-app-bar title="Menu & Stok" search-placeholder="Cari menu..." />

<div class="p-8 max-w-[1400px] mx-auto">
    <x-cashier.category-filter />

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="menu-grid">
        @foreach($products as $product)
        <x-cashier.menu-card
            name="{{ $product['name'] }}"
            price="{{ $product['price'] }}"
            stock="{{ $product['stock'] }}"
            category="{{ $product['category'] }}"
            icon="{{ $product['icon'] }}"
        />
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
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
</script>
@endpush
