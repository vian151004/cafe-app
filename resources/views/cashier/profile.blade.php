@extends('layouts.cashier')

@section('title', 'Profil Saya')

@section('content')
<x-cashier.top-app-bar title="Profil Saya" />

<div class="p-8 max-w-2xl mx-auto">
    <div class="bg-surface-container-lowest rounded-card overflow-hidden shadow-sm border border-surface-variant/30">
        <div class="bg-primary-container/5 p-8 text-center">
            <div class="w-24 h-24 mx-auto bg-primary-container text-white rounded-full flex items-center justify-center mb-4 shadow-lg">
                <span class="material-symbols-outlined" style="font-size: 48px;">account_circle</span>
            </div>
            <h2 class="text-xl font-bold text-on-surface">{{ $user['name'] }}</h2>
            <p class="text-on-surface-variant/70">{{ $user['role'] }}</p>
        </div>
        <div class="p-6 space-y-4" id="profile-fields">
            <div class="flex items-center gap-4 p-4 bg-surface-container rounded-card group" data-field="email">
                <span class="material-symbols-outlined text-on-surface-variant/60">mail</span>
                <div class="flex-1">
                    <p class="text-body-sm text-on-surface-variant/60">Email</p>
                    <p class="font-semibold text-on-surface field-value">{{ $user['email'] }}</p>
                    <input class="hidden field-input font-semibold text-on-surface bg-transparent px-0 py-0 w-full outline-none border-none" value="{{ $user['email'] }}" type="email">
                </div>
                <button class="edit-btn hidden p-1.5 rounded-lg hover:bg-surface-container-high text-on-surface-variant/40 hover:text-primary-container transition-colors" title="Edit">
                    <span class="material-symbols-outlined text-sm">edit</span>
                </button>
            </div>
            <div class="flex items-center gap-4 p-4 bg-surface-container rounded-card group" data-field="phone">
                <span class="material-symbols-outlined text-on-surface-variant/60">smartphone</span>
                <div class="flex-1">
                    <p class="text-body-sm text-on-surface-variant/60">No. Telepon</p>
                    <p class="font-semibold text-on-surface field-value">{{ $user['phone'] }}</p>
                    <input class="hidden field-input font-semibold text-on-surface bg-transparent px-0 py-0 w-full outline-none border-none" value="{{ $user['phone'] }}" type="text">
                </div>
                <button class="edit-btn hidden p-1.5 rounded-lg hover:bg-surface-container-high text-on-surface-variant/40 hover:text-primary-container transition-colors" title="Edit">
                    <span class="material-symbols-outlined text-sm">edit</span>
                </button>
            </div>
            <div class="flex items-center gap-4 p-4 bg-surface-container rounded-card group" data-field="name">
                <span class="material-symbols-outlined text-on-surface-variant/60">badge</span>
                <div class="flex-1">
                    <p class="text-body-sm text-on-surface-variant/60">Nama</p>
                    <p class="font-semibold text-on-surface field-value">{{ $user['name'] }}</p>
                    <input class="hidden field-input font-semibold text-on-surface bg-transparent px-0 py-0 w-full outline-none border-none" value="{{ $user['name'] }}" type="text">
                </div>
                <button class="edit-btn hidden p-1.5 rounded-lg hover:bg-surface-container-high text-on-surface-variant/40 hover:text-primary-container transition-colors" title="Edit">
                    <span class="material-symbols-outlined text-sm">edit</span>
                </button>
            </div>
            <div class="flex items-center gap-4 p-4 bg-surface-container rounded-card group" data-field="shift">
                <span class="material-symbols-outlined text-on-surface-variant/60">schedule</span>
                <div class="flex-1 relative">
                    <p class="text-body-sm text-on-surface-variant/60">Shift Saat Ini</p>
                    <p class="font-semibold text-on-surface field-value">{{ $user['shift'] }}</p>
                    <div class="hidden field-input relative">
                        <button type="button" class="shift-select-btn w-full flex items-center justify-between font-semibold text-on-surface bg-transparent cursor-pointer px-0 py-0 text-left">
                            <span class="shift-selected">{{ $user['shift'] }}</span>
                            <span class="material-symbols-outlined text-sm text-primary-container ml-2">expand_more</span>
                        </button>
                        <div class="shift-options hidden absolute left-0 top-full mt-1 w-full bg-white rounded-card shadow-lg border border-surface-variant/50 z-50 overflow-hidden">
                            <button type="button" class="shift-option w-full text-left px-4 py-3 font-semibold text-on-surface hover:bg-emerald-50 transition-colors border-b border-surface-variant/20" data-value="Pagi (06:00 - 14:00)">
                                <span class="material-symbols-outlined text-sm text-amber-500 mr-2">wb_sunny</span>Pagi (06:00 - 14:00)
                            </button>
                            <button type="button" class="shift-option w-full text-left px-4 py-3 font-semibold text-on-surface hover:bg-emerald-50 transition-colors border-b border-surface-variant/20" data-value="Sore (14:00 - 22:00)">
                                <span class="material-symbols-outlined text-sm text-orange-500 mr-2">sunny</span>Sore (14:00 - 22:00)
                            </button>
                            <button type="button" class="shift-option w-full text-left px-4 py-3 font-semibold text-on-surface hover:bg-emerald-50 transition-colors" data-value="Malam (22:00 - 06:00)">
                                <span class="material-symbols-outlined text-sm text-indigo-400 mr-2">nightlight</span>Malam (22:00 - 06:00)
                            </button>
                        </div>
                    </div>
                </div>
                <button class="edit-btn hidden p-1.5 rounded-lg hover:bg-surface-container-high text-on-surface-variant/40 hover:text-primary-container transition-colors" title="Edit">
                    <span class="material-symbols-outlined text-sm">edit</span>
                </button>
            </div>
            <div class="flex items-center gap-4 p-4 bg-surface-container rounded-card" data-field="joined">
                <span class="material-symbols-outlined text-on-surface-variant/60">calendar_today</span>
                <div class="flex-1">
                    <p class="text-body-sm text-on-surface-variant/60">Tanggal Bergabung</p>
                    <p class="font-semibold text-on-surface">{{ $user['joined'] }}</p>
                </div>
            </div>
        </div>
        <div class="p-6 pt-0" id="profile-actions">
            <button id="btn-edit-all" class="w-full py-3 bg-primary-container text-white font-label rounded-lg hover:bg-primary transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">edit</span>Edit Profil
            </button>
            <div id="save-cancel-group" class="hidden flex gap-3">
                <button id="btn-cancel" class="flex-1 py-3 bg-surface-container text-on-surface font-label rounded-lg hover:bg-surface-container-high transition-all flex items-center justify-center gap-2">
                    Batal
                </button>
                <button id="btn-save" class="flex-1 py-3 bg-emerald-600 text-white font-label rounded-lg hover:bg-emerald-700 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">check_circle</span>Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let originalValues = {};

    function formatPhone(val) {
        const digits = val.replace(/\D/g, '');
        if (digits.length <= 4) return digits;
        if (digits.length <= 8) return digits.slice(0, 4) + '-' + digits.slice(4);
        return digits.slice(0, 4) + '-' + digits.slice(4, 8) + '-' + digits.slice(8, 15);
    }

    function unformatPhone(val) {
        return val.replace(/\D/g, '');
    }

    const fields = document.querySelectorAll('#profile-fields [data-field]');
    const editBtns = document.querySelectorAll('.edit-btn');
    const btnEditAll = document.getElementById('btn-edit-all');
    const btnSave = document.getElementById('btn-save');
    const btnCancel = document.getElementById('btn-cancel');
    const saveGroup = document.getElementById('save-cancel-group');

    // Format phone saat blur (cursor keluar)
    document.addEventListener('blur', function(e) {
        const input = e.target;
        if (input.dataset.field === 'phone') {
            const cursor = input.selectionStart;
            const raw = unformatPhone(input.value);
            const formatted = formatPhone(raw);
            input.value = formatted;
            let newPos = cursor;
            for (let i = 0; i < formatted.length; i++) {
                if (formatted[i] === '-') newPos++;
                if (i >= cursor) break;
            }
            input.setSelectionRange(newPos, newPos);
        }
    }, true);

    // Custom shift dropdown
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.shift-select-btn');
        if (btn) {
            const panel = btn.parentElement.querySelector('.shift-options');
            // tutup semua panel lain
            document.querySelectorAll('.shift-options').forEach(p => {
                if (p !== panel) p.classList.add('hidden');
            });
            panel.classList.toggle('hidden');
            return;
        }
        const option = e.target.closest('.shift-option');
        if (option) {
            const panel = option.closest('.shift-options');
            const btn = panel.parentElement.querySelector('.shift-select-btn');
            const selected = btn.querySelector('.shift-selected');
            selected.textContent = option.dataset.value;
            panel.classList.add('hidden');
            return;
        }
        // klik di luar → tutup
        document.querySelectorAll('.shift-options').forEach(p => p.classList.add('hidden'));
    });

    function setAllFieldsEditable(editable) {
        fields.forEach(field => {
            if (field.dataset.field === 'joined') return;

            const valueEl = field.querySelector('.field-value');
            const inputEl = field.querySelector('.field-input');
            const pencil = field.querySelector('.edit-btn');

            if (editable) {
                if (!(field.dataset.field in originalValues)) {
                    originalValues[field.dataset.field] = valueEl.textContent;
                }
                valueEl.classList.add('hidden');
                inputEl.classList.remove('hidden');

                if (field.dataset.field === 'phone') {
                    const input = inputEl.querySelector('input');
                    if (input) {
                        input.dataset.field = 'phone';
                        input.value = unformatPhone(input.value);
                    }
                }

                if (pencil) pencil.classList.remove('hidden');
            } else {
                valueEl.classList.remove('hidden');
                inputEl.classList.add('hidden');
                if (pencil) pencil.classList.add('hidden');
            }
        });
    }

    function restoreOriginalValues() {
        fields.forEach(field => {
            if (field.dataset.field === 'joined') return;
            const valueEl = field.querySelector('.field-value');
            if (field.dataset.field in originalValues) {
                valueEl.textContent = originalValues[field.dataset.field];
            }
        });
    }

    function collectValues() {
        const values = {};
        fields.forEach(field => {
            if (field.dataset.field === 'joined') return;
            const container = field.querySelector('.field-input');
            const valueEl = field.querySelector('.field-value');
            if (container) {
                const shiftBtn = container.querySelector('.shift-selected');
                const input = container.querySelector('input');
                let raw;
                if (shiftBtn) {
                    raw = shiftBtn.textContent.trim();
                } else if (input) {
                    raw = input.value;
                }
                if (field.dataset.field === 'phone') {
                    raw = formatPhone(raw);
                }
                values[field.dataset.field] = raw;
                valueEl.textContent = raw;
            }
        });
        return values;
    }

    // Edit Profil → semua field jadi bisa diedit + pencil muncul
    btnEditAll.addEventListener('click', function() {
        setAllFieldsEditable(true);
        btnEditAll.classList.add('hidden');
        saveGroup.classList.remove('hidden');
    });

    // Simpan → collect values, balik ke view mode
    btnSave.addEventListener('click', function() {
        collectValues();
        originalValues = {};
        setAllFieldsEditable(false);
        saveGroup.classList.add('hidden');
        btnEditAll.classList.remove('hidden');

        btnSave.innerHTML = '<span class="material-symbols-outlined text-sm">check_circle</span>Tersimpan!';
        btnSave.classList.remove('bg-emerald-600', 'hover:bg-emerald-700');
        btnSave.classList.add('bg-emerald-500');
        setTimeout(() => {
            btnSave.innerHTML = '<span class="material-symbols-outlined text-sm">check_circle</span>Simpan';
            btnSave.classList.remove('bg-emerald-500');
            btnSave.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
        }, 2000);
    });

    // Batal → revert ke original, balik ke view mode
    btnCancel.addEventListener('click', function() {
        restoreOriginalValues();
        originalValues = {};
        setAllFieldsEditable(false);
        saveGroup.classList.add('hidden');
        btnEditAll.classList.remove('hidden');
    });
</script>
@endpush
