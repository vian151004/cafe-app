@props(['placeholder' => 'Cari...', 'id' => 'search-input'])

<div class="relative flex items-center">
    <span class="material-symbols-outlined absolute left-5 text-on-surface-variant/60" style="font-size: 20px; top: calc(50% + 1px); transform: translate(-50%, -50%);">search</span>
    <input type="text" id="{{ $id }}" placeholder="{{ $placeholder }}" class="pl-10 pr-4 py-1.5 bg-surface-container-low border border-outline-variant rounded-lg focus:border-primary-container focus:outline-none text-body-sm leading-none text-on-surface placeholder-on-surface-variant/70 w-full h-9">
</div>
