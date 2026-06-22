@props(['showExport' => true, 'startDate' => '', 'endDate' => ''])

<section class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-surface-container-lowest p-6 rounded-card shadow-sm border border-surface-variant/30">
    <div class="flex items-center gap-4">
        <div class="flex flex-col gap-1">
            <label class="text-xs font-semibold text-on-surface-variant/70 uppercase tracking-wider">Rentang Waktu</label>
            <div class="flex items-center bg-surface-container-low border border-outline-variant rounded-lg px-3 py-2 gap-3">
                <span class="material-symbols-outlined text-on-surface-variant/50 text-sm">calendar_month</span>
                <input type="date" value="{{ $startDate }}" class="bg-transparent border-none p-0 text-body-sm focus:ring-0 font-medium text-on-surface">
                <span class="text-on-surface-variant/40">-</span>
                <input type="date" value="{{ $endDate }}" class="bg-transparent border-none p-0 text-body-sm focus:ring-0 font-medium text-on-surface">
            </div>
        </div>
        <button class="mt-5 px-6 py-2.5 bg-primary-container text-white rounded-lg font-label flex items-center gap-2 hover:bg-primary transition-all active:scale-95">
            <span class="material-symbols-outlined text-sm">filter_list</span>
            Filter
        </button>
    </div>
    @if($showExport)
    <div class="flex gap-2">
        <button class="px-4 py-2.5 border border-outline-variant rounded-lg text-on-surface-variant font-label hover:bg-surface-container-low transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">download</span>
            Ekspor CSV
        </button>
    </div>
    @endif
</section>
