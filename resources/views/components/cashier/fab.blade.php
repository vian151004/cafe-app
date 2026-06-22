@props(['icon' => 'add', 'iconFilled' => true, 'href' => null, 'color' => 'bg-secondary-container'])

@php
    $iconClass = $iconFilled ? 'material-symbols-filled' : 'material-symbols-outlined';
@endphp

@if($href)
<a href="{{ $href }}" class="fixed bottom-8 right-8 w-14 h-14 {{ $color }} text-white rounded-full shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all flex items-center justify-center z-50">
    <span class="{{ $iconClass }} text-[40px]">{{ $icon }}</span>
</a>
@else
<button class="fixed bottom-8 right-8 w-14 h-14 {{ $color }} text-white rounded-full shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all flex items-center justify-center z-50">
    <span class="{{ $iconClass }} text-[40px]">{{ $icon }}</span>
</button>
@endif
