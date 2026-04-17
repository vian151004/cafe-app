@extends('layouts.cashier')

@section('title', 'Absensi Shift')
@section('header_title', 'Absensi Shift')

@push('styles')
<style>
    #camera-container video,
    #camera-container canvas {
        width: 100%;
        max-width: 400px;
        border-radius: 12px;
        object-fit: cover;
    }
    #camera-container video {
        transform: scaleX(-1);
    }
    #camera-container canvas {
        display: none;
    }
    #camera-container.has-camera video {
        transform: scaleX(-1);
    }
</style>
@endpush

@section('content')
<div class="max-w-xl mx-auto">
    <!-- Current Shift Info -->
    <div class="bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-6 mb-6">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 rounded-full bg-white text-[#005246] flex items-center justify-center">
                <i data-lucide="user" class="w-6 h-6"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg text-white">Nama Kasir</h3>
                <p class="text-white/60 text-sm">Shift Pagi</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 text-center">
            <div class="bg-white/10 rounded-xl p-4">
                <p class="text-sm text-white/60">Check In</p>
                <p class="font-bold text-white">06:00</p>
            </div>
            <div class="bg-white/5 rounded-xl p-4">
                <p class="text-sm text-white/60">Check Out</p>
                <p class="font-bold text-white/40">--:--</p>
            </div>
        </div>
    </div>

    <!-- Camera Section -->
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 mb-6">
        <h3 class="font-bold text-lg mb-4 text-center text-white">Absensi Pergantian Shift</h3>
        
        <div id="camera-container" class="bg-white/5 rounded-xl overflow-hidden mb-4 flex flex-col items-center justify-center min-h-[300px]">
            <video id="video" autoplay playsinline class="hidden"></video>
            <canvas id="canvas"></canvas>
            <div id="camera-placeholder" class="text-center">
                <i data-lucide="camera" class="w-16 h-16 text-white/30 mx-auto"></i>
                <p class="text-white/50 mt-2">Kamera belum aktif</p>
            </div>
        </div>

        <div class="flex gap-3">
            <button id="btn-start-camera" class="flex-1 py-3 bg-white text-[#005246] font-semibold rounded-xl hover:bg-white/90 transition-colors">
                <i data-lucide="camera" class="w-5 h-5 inline mr-2"></i>Buka Kamera
            </button>
            <button id="btn-capture" class="flex-1 py-3 bg-white text-[#005246] font-semibold rounded-xl hover:bg-white/90 transition-opacity hidden">
                <i data-lucide="aperture" class="w-5 h-5 inline mr-2"></i>Ambil Foto
            </button>
        </div>
        
        <div id="preview-section" class="mt-4 hidden">
            <img id="photo-preview" class="w-full rounded-xl mb-3" alt="Preview">
            <div class="flex gap-3">
                <button id="btn-retake" class="flex-1 py-3 bg-white/20 text-white font-semibold rounded-xl hover:bg-white/30 transition-colors">
                    Ambil Ulang
                </button>
                <button class="flex-1 py-3 bg-green-500 text-white font-semibold rounded-xl hover:bg-green-600 transition-colors">
                    <i data-lucide="check" class="w-5 h-5 inline mr-2"></i>Konfirmasi Absen
                </button>
            </div>
        </div>
    </div>

    <!-- Shift Schedule -->
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6">
        <h3 class="font-bold text-lg mb-4 text-white">Jadwal Shift</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-white/10 rounded-xl">
                <div class="flex items-center gap-3">
                    <i data-lucide="sun" class="w-5 h-5 text-yellow-400"></i>
                    <div>
                        <p class="font-medium text-white">Shift Pagi</p>
                        <p class="text-sm text-white/60">06:00 - 14:00</p>
                    </div>
                </div>
                <span class="px-3 py-1 text-xs bg-green-500 text-white rounded-full">Aktif</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-white/5 rounded-xl">
                <div class="flex items-center gap-3">
                    <i data-lucide="sunset" class="w-5 h-5 text-orange-400"></i>
                    <div>
                        <p class="font-medium text-white">Shift Sore</p>
                        <p class="text-sm text-white/60">14:00 - 22:00</p>
                    </div>
                </div>
                <span class="px-3 py-1 text-xs bg-white/20 text-white rounded-full">Berikutnya</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-white/5 rounded-xl">
                <div class="flex items-center gap-3">
                    <i data-lucide="moon" class="w-5 h-5 text-indigo-400"></i>
                    <div>
                        <p class="font-medium text-white">Shift Malam</p>
                        <p class="text-sm text-white/60">22:00 - 06:00</p>
                    </div>
                </div>
            </div>
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
            stream = await navigator.mediaDevices.getUserMedia({ 
                video: { facingMode: 'user' } 
            });
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
        
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
    });

    btnRetake.addEventListener('click', () => {
        previewSection.classList.add('hidden');
        btnStart.classList.remove('hidden');
        cameraPlaceholder.classList.remove('hidden');
    });
</script>
@endpush
