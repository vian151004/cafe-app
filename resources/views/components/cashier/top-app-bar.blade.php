@props(['title' => '', 'searchPlaceholder' => 'Cari...'])

<header class="bg-surface-bright/80 backdrop-blur-md border-b border-outline-variant/30 flex justify-between items-center h-16 px-8 sticky top-0 z-40">
    <div class="flex items-center gap-4">
        <h2 class="font-title text-primary-container">{{ $title }}</h2>
    </div>
    <div class="flex items-center gap-6">
        <div class="relative flex items-center">
            <span class="material-symbols-outlined absolute left-5 text-on-surface-variant/60" style="font-size: 20px; top: calc(50% + 1px); transform: translate(-50%, -50%);">search</span>
            <input id="global-search" type="text" placeholder="{{ $searchPlaceholder }}" class="pl-10 pr-14 py-0.3 bg-surface-container-low border border-outline-variant rounded-lg focus:border-primary-container focus:outline-none text-body-sm leading-none w-64 h-10">
            <span id="search-counter" class="search-match-count absolute right-3 top-1/2 -translate-y-1/2 hidden"></span>
        </div>
        <div class="flex items-center gap-4 text-on-surface-variant/60">
            <div class="relative">
                <span id="notif-btn" class="material-symbols-outlined cursor-pointer hover:text-primary-container transition-colors select-none pointer-events-auto">notifications</span>
                <!-- Notif Dropdown -->
                <div id="notif-dropdown" class="hidden absolute right-0 top-full mt-2 w-80 bg-white rounded-xl shadow-xl border border-surface-variant/30 overflow-hidden z-50">
                    <div class="px-4 py-3 border-b border-surface-variant/30 flex items-center justify-between">
                        <h3 class="font-title text-sm text-on-surface">Notifikasi</h3>
                        <button id="notif-close" class="text-on-surface-variant/40 hover:text-on-surface transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                        </button>
                    </div>
                    <div class="max-h-80 overflow-y-auto">
                        <div class="p-4 border-b border-surface-variant/20 hover:bg-surface-container-low/50 transition-colors cursor-pointer">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-sm mt-0.5 text-amber-500">local_shipping</span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-body-sm font-semibold text-on-surface">Pesanan #INV-001</p>
                                    <p class="text-xs text-on-surface-variant/60">Telah selesai diproses</p>
                                    <p class="text-[10px] text-on-surface-variant/40 mt-1">2 menit lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-b border-surface-variant/20 hover:bg-surface-container-low/50 transition-colors cursor-pointer">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-sm mt-0.5 text-red-500">inventory_2</span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-body-sm font-semibold text-on-surface">Stok Menipis</p>
                                    <p class="text-xs text-on-surface-variant/60">Kentang Goreng tersisa 2</p>
                                    <p class="text-[10px] text-on-surface-variant/40 mt-1">15 menit lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-b border-surface-variant/20 hover:bg-surface-container-low/50 transition-colors cursor-pointer">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-sm mt-0.5 text-emerald-500">assignment_turned_in</span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-body-sm font-semibold text-on-surface">Shift Dimulai</p>
                                    <p class="text-xs text-on-surface-variant/60">Shift Pagi telah dimulai</p>
                                    <p class="text-[10px] text-on-surface-variant/40 mt-1">1 jam lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-t border-surface-variant/30 text-center">
                        <button class="text-xs font-semibold text-primary-container hover:text-primary transition-colors">Lihat Semua Notifikasi</button>
                    </div>
                </div>
            </div>
            <span class="material-symbols-outlined cursor-pointer hover:text-primary-container transition-colors select-none">settings</span>
        </div>
    </div>
</header>

<style>
    .search-highlight {
        background-color: #fef08a;
        color: inherit;
        padding: 0 1px;
        border-radius: 2px;
        box-shadow: 0 0 0 1px rgba(250, 204, 21, 0.3);
        transition: background-color 0.2s;
    }
    .search-highlight.active {
        background-color: #facc15;
        box-shadow: 0 0 0 2px rgba(250, 204, 21, 0.5);
    }
    .search-match-count {
        font-size: 11px;
        color: #6f7976;
        white-space: nowrap;
        pointer-events: none;
    }
</style>

<script>
(function() {
    let prevQuery = '';
    let matchCount = 0;

    function clearHighlights() {
        document.querySelectorAll('.search-highlight').forEach(function(el) {
            var parent = el.parentNode;
            if (parent) {
                parent.replaceChild(document.createTextNode(el.textContent), el);
                parent.normalize();
            }
        });
        var counter = document.getElementById('search-counter');
        if (counter) counter.classList.add('hidden');
    }

    function scrollToFirst() {
        var first = document.querySelector('.search-highlight');
        if (first) {
            first.classList.add('active');
            first.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function doSearch(query) {
        if (!query || query.length < 2) {
            clearHighlights();
            prevQuery = query;
            matchCount = 0;
            return;
        }

        // Hapus highlight lama yang bukan active
        document.querySelectorAll('.search-highlight').forEach(function(el) {
            var parent = el.parentNode;
            if (parent) {
                parent.replaceChild(document.createTextNode(el.textContent), el);
                parent.normalize();
            }
        });

        // Cari di dalam main-content
        var container = document.getElementById('main-content');
        if (!container) {
            container = document.querySelector('main') || document.body;
        }

        // exclude header, sidebar, nav, script, style, button, input, select, badge/chip, table actions
        var walker = document.createTreeWalker(
            container,
            NodeFilter.SHOW_TEXT,
            {
                acceptNode: function(node) {
                    if (!node.textContent.trim()) return NodeFilter.FILTER_REJECT;
                    var p = node.parentElement;
                    if (!p) return NodeFilter.FILTER_REJECT;
                    // Skip elemen interaktif & UI
                    if (p.closest('header') || p.closest('aside') || p.closest('script') || p.closest('style') || p.closest('nav')) {
                        return NodeFilter.FILTER_REJECT;
                    }
                    if (p.closest('button, input, select, textarea, a[href], [role="button"]')) {
                        return NodeFilter.FILTER_REJECT;
                    }
                    // Skip badge/chip/pill (rounded-full + bg-*)
                    if (p.closest('[class*="rounded-full"]') || p.closest('[class*="rounded-card"]')) {
                        // Tapi jangan skip teks di dalam table/data display
                        var closestTable = p.closest('table, [role="grid"]');
                        if (!closestTable) return NodeFilter.FILTER_REJECT;
                    }
                    // Skip icon-only elements
                    if (p.closest('.material-symbols-outlined, .material-symbols-filled')) {
                        return NodeFilter.FILTER_REJECT;
                    }
                    return NodeFilter.FILTER_ACCEPT;
                }
            }
        );

        var nodes = [];
        while (walker.nextNode()) nodes.push(walker.currentNode);

        var flags = 'gi';
        var escaped = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        var regex = new RegExp(escaped, flags);
        matchCount = 0;

        nodes.forEach(function(textNode) {
            var text = textNode.textContent;
            if (!regex.test(text)) return;
            regex.lastIndex = 0;

            var fragment = document.createDocumentFragment();
            var lastIdx = 0;
            var match;

            while ((match = regex.exec(text)) !== null) {
                if (match.index > lastIdx) {
                    fragment.appendChild(document.createTextNode(text.slice(lastIdx, match.index)));
                }
                var mark = document.createElement('mark');
                mark.className = 'search-highlight';
                mark.textContent = match[0];
                fragment.appendChild(mark);
                lastIdx = regex.lastIndex;
                matchCount++;
            }
            if (lastIdx < text.length) {
                fragment.appendChild(document.createTextNode(text.slice(lastIdx)));
            }
            textNode.parentNode.replaceChild(fragment, textNode);
        });

        // update counter
        var counter = document.getElementById('search-counter');
        counter.classList.remove('hidden');
        if (matchCount > 0) {
            counter.textContent = matchCount + '';
        } else {
            counter.textContent = '0';
        }

        scrollToFirst();
    }

    // Notif dropdown toggle
    document.addEventListener('click', function(e) {
        var btn = e.target.closest('#notif-btn');
        if (btn) {
            e.stopPropagation();
            var dd = document.getElementById('notif-dropdown');
            var isOpen = !dd.classList.contains('hidden');
            dd.classList.toggle('hidden');
            if (isOpen) btn.classList.remove('text-primary-container');
            else btn.classList.add('text-primary-container');
            return;
        }
        var close = e.target.closest('#notif-close');
        if (close) {
            document.getElementById('notif-dropdown').classList.add('hidden');
            document.getElementById('notif-btn').classList.remove('text-primary-container');
            return;
        }
        // klik di luar → tutup
        var dd = document.getElementById('notif-dropdown');
        if (!dd.classList.contains('hidden')) {
            var inside = e.target.closest('#notif-dropdown');
            if (!inside) {
                dd.classList.add('hidden');
                document.getElementById('notif-btn').classList.remove('text-primary-container');
            }
        }
    });

    document.addEventListener('input', function(e) {
        if (e.target && e.target.id === 'global-search') {
            var q = e.target.value.trim();
            if (q !== prevQuery) {
                prevQuery = q;
                doSearch(q);
            }
        }
    });

    // Navigasi highlight dengan Enter
    document.addEventListener('keydown', function(e) {
        if (e.target && e.target.id === 'global-search') {
            if (e.key === 'Enter') {
                e.preventDefault();
                var highlights = document.querySelectorAll('.search-highlight');
                if (highlights.length === 0) return;
                // cari yang active, scroll ke next
                var active = document.querySelector('.search-highlight.active');
                var nextIdx = 0;
                if (active) {
                    active.classList.remove('active');
                    for (var i = 0; i < highlights.length; i++) {
                        if (highlights[i] === active) {
                            nextIdx = (i + 1) % highlights.length;
                            break;
                        }
                    }
                }
                highlights[nextIdx].classList.add('active');
                highlights[nextIdx].scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            if (e.key === 'Escape') {
                e.target.value = '';
                clearHighlights();
                prevQuery = '';
            }
        }
    });
})();
</script>
