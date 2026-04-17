@extends('layouts.cashier')

@section('title', 'Profil')
@section('header_title', 'Profil')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Profile Card -->
    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden">
        <div class="bg-white/10 p-6 text-center">
            <div class="w-24 h-24 mx-auto bg-white text-[#005246] rounded-full flex items-center justify-center mb-3">
                <i data-lucide="user" class="w-10 h-10"></i>
            </div>
            <h2 class="text-xl font-bold text-white">Nama Kasir</h2>
            <p class="text-white/70">Kasir</p>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-4 p-4 bg-white/10 rounded-xl">
                <i data-lucide="mail" class="w-5 h-5 text-white/70"></i>
                <div>
                    <p class="text-sm text-white/60">Email</p>
                    <p class="font-medium text-white">kasir@cafe.app</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4 bg-white/10 rounded-xl">
                <i data-lucide="smartphone" class="w-5 h-5 text-white/70"></i>
                <div>
                    <p class="text-sm text-white/60">No. Telepon</p>
                    <p class="font-medium text-white">0812-3456-7890</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4 bg-white/10 rounded-xl">
                <i data-lucide="clock" class="w-5 h-5 text-white/70"></i>
                <div>
                    <p class="text-sm text-white/60">Shift</p>
                    <p class="font-medium text-white">Pagi (06:00 - 14:00)</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4 bg-white/10 rounded-xl">
                <i data-lucide="calendar" class="w-5 h-5 text-white/70"></i>
                <div>
                    <p class="text-sm text-white/60">Tanggal Bergabung</p>
                    <p class="font-medium text-white">15 Januari 2025</p>
                </div>
            </div>
        </div>
        <div class="p-6 pt-0">
            <button class="w-full py-3 bg-white text-[#005246] font-semibold rounded-xl hover:bg-white/90 transition-colors">
                <i data-lucide="edit" class="w-5 h-5 inline mr-2"></i>Edit Profil
            </button>
        </div>
    </div>
</div>
@endsection
