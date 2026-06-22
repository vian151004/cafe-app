@extends('layouts.cashier')

@section('title', 'Absensi Shift')

@section('content')
<x-cashier.top-app-bar title="Absensi Shift" />

<div class="p-8 max-w-xl mx-auto">
    <div class="bg-surface-container-lowest rounded-card border border-surface-variant/30 p-6 mb-6 shadow-sm">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 rounded-full bg-primary-container text-white flex items-center justify-center">
                <span class="material-symbols-outlined text-[32px]">account_circle</span>
            </div>
            <div>
                <h3 class="font-bold text-lg text-on-surface">{{ $shift['name'] }}</h3>
                <p class="text-on-surface-variant/60 text-body-sm">{{ $shift['shift_name'] }}</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 text-center">
            <div class="bg-surface-container rounded-card p-4">
                <p class="text-body-sm text-on-surface-variant/60">Check In</p>
                <p class="font-bold text-on-surface">{{ $shift['check_in'] }}</p>
            </div>
            <div class="bg-surface-container rounded-card p-4">
                <p class="text-body-sm text-on-surface-variant/60">Check Out</p>
                <p class="font-bold text-on-surface-variant/30">{{ $shift['check_out'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-surface-container-lowest border border-surface-variant/30 rounded-card p-6 mb-6 shadow-sm">
        <h3 class="font-bold text-lg mb-4 text-center text-on-surface">Absensi Pergantian Shift</h3>

        <div id="camera-container" class="bg-surface-container rounded-card overflow-hidden mb-4 flex flex-col items-center justify-center min-h-[300px]">
            <video id="video" autoplay playsinline class="hidden"></video>
            <canvas id="canvas"></canvas>
            <div id="camera-placeholder" class="text-center">
                <span class="material-symbols-outlined text-on-surface-variant/20" style="font-size: 64px;">photo_camera</span>
                <p class="text-on-surface-variant/60 mt-2">Kamera belum aktif</p>
            </div>
        </div>

        <div class="flex gap-3">
            <button id="btn-start-camera" class="flex-1 py-3 bg-primary-container text-white font-label rounded-lg hover:bg-primary transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">photo_camera</span>Buka Kamera
            </button>
            <button id="btn-capture" class="flex-1 py-3 bg-primary-container text-white font-label rounded-lg hover:bg-primary transition-all active:scale-95 flex items-center justify-center gap-2 hidden">
                <span class="material-symbols-outlined text-sm">camera</span>Ambil Foto
            </button>
        </div>

        <div id="preview-section" class="mt-4 hidden">
            <img id="photo-preview" class="w-full rounded-card mb-3" alt="Preview">
            <div class="flex gap-3">
                <button id="btn-retake" class="flex-1 py-3 bg-surface-container text-on-surface font-label rounded-lg hover:bg-surface-container-high transition-all flex items-center justify-center gap-2">
                    Ambil Ulang
                </button>
                <button class="flex-1 py-3 bg-emerald-600 text-white font-label rounded-lg hover:bg-emerald-700 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">check_circle</span>Konfirmasi Absen
                </button>
            </div>
        </div>
    </div>

    <div class="bg-surface-container-lowest border border-surface-variant/30 rounded-card p-6 shadow-sm">
        <h3 class="font-bold text-lg mb-4 text-on-surface">Jadwal Shift</h3>
        <div class="space-y-3">
            @foreach($schedules as $sched)
            <div class="flex items-center justify-between p-4 bg-surface-container rounded-card">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined {{ $sched['icon_color'] }}">{{ $sched['icon'] }}</span>
                    <div>
                        <p class="font-medium text-on-surface">{{ $sched['name'] }}</p>
                        <p class="text-body-sm text-on-surface-variant/60">{{ $sched['time'] }}</p>
                    </div>
                </div>
                @if($sched['status'])
                <span class="px-3 py-1 text-xs {{ $sched['status_color'] }} rounded-full font-semibold">{{ $sched['status'] }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let stream = null;
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const btnStart = document.getElementById('btn-start-camera');
    const btnCapture = document.getElementById('btn-capture');
    const btnRetake = document.getElementById('btn-retake');
    const previewSection = document.getElementById('preview-section');
    const photoPreview = document.getElementById('photo-preview');
    const cameraPlaceholder = document.getElementById('camera-placeholder');
    const cameraContainer = document.getElementById('camera-container');

    btnStart.addEventListener('click', async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' } });
            video.srcObject = stream;
            video.classList.remove('hidden');
            cameraPlaceholder.classList.add('hidden');
            cameraContainer.classList.add('has-camera');
            btnStart.classList.add('hidden');
            btnCapture.classList.remove('hidden');
        } catch (err) {
            alert('Tidak dapat mengakses kamera: ' + err.message);
        }
    });

    btnCapture.addEventListener('click', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const ctx = canvas.getContext('2d');
        ctx.scale(-1, 1);
        ctx.drawImage(video, -canvas.width, 0, canvas.width, canvas.height);
        const imageData = canvas.toDataURL('image/jpeg');
        photoPreview.src = imageData;
        video.classList.add('hidden');
        btnCapture.classList.add('hidden');
        previewSection.classList.remove('hidden');
        if (stream) { stream.getTracks().forEach(track => track.stop()); }
    });

    btnRetake.addEventListener('click', () => {
        previewSection.classList.add('hidden');
        btnStart.classList.remove('hidden');
        cameraPlaceholder.classList.remove('hidden');
    });
</script>
@endpush
