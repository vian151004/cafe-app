@props(['title' => 'Daftar Transaksi'])

<section class="bg-surface-container-lowest rounded-card shadow-[0px_4px_12px_rgba(0,0,0,0.05)] overflow-hidden border border-surface-variant/30">
    <div class="px-6 py-5 border-b border-surface-variant/30 flex items-center justify-between">
        <h4 class="font-title text-on-surface">{{ $title }}</h4>
        <div class="flex items-center gap-2">
            <button class="p-2 hover:bg-surface-container-low rounded-lg text-on-surface-variant/40">
                <span class="material-symbols-outlined">more_horiz</span>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low text-on-surface-variant uppercase text-[11px] font-bold tracking-widest border-b border-surface-variant/30">
                    {{ $head }}
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-variant/20">
                {{ $body }}
            </tbody>
        </table>
    </div>
    @isset($pagination)
    <div class="px-6 py-4 bg-surface-container-low/50 flex flex-col sm:flex-row items-center justify-between gap-4">
        {{ $pagination }}
    </div>
    @endisset
</section>
