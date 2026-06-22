@props([
    'title' => 'Total',
    'value' => '0',
    'icon' => 'list_alt',
    'iconBg' => 'bg-emerald-50',
    'iconColor' => 'text-primary-container',
    'accentBorder' => 'border-primary-container',
    'badgeText' => null,
])

<div class="bg-surface-container-lowest p-6 rounded-card shadow-[0px_4px_12px_rgba(0,0,0,0.05)] border-l-4 {{ $accentBorder }} transition-transform hover:scale-[1.02] cursor-default">
    <div class="flex justify-between items-start mb-4">
        <div class="p-2 {{ $iconBg }} rounded-lg">
            <span class="material-symbols-outlined {{ $iconColor }}">{{ $icon }}</span>
        </div>
        @if($badgeText)
        <span class="text-xs font-bold text-emerald-600 bg-emerald-100 px-2 py-1 rounded-full">{{ $badgeText }}</span>
        @endif
    </div>
    <p class="text-on-surface-variant font-label mb-1">{{ $title }}</p>
    <h3 class="font-headline font-bold text-on-surface">{{ $value }}</h3>
</div>
