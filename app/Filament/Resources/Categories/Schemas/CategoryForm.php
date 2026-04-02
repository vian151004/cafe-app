<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Filament\Schemas\Schema;
use Illuminate\Support\Str; // Tambahkan ini untuk helper slug

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->placeholder('Contoh: Coffee, Snacks, atau Dessert')
                    ->required()
                    // Fitur Auto-Slug:
                    ->live(onBlur: true) // Mendeteksi saat kamu selesai mengetik/pindah kolom
                    ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => 
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->label('Slug (Otomatis)')
                    ->required()
                    ->unique(ignoreRecord: true) // Memastikan tidak ada slug kembar
                    ->helperText('URL ramah sistem yang di-generate otomatis dari nama.')
                    ->readonly() // Opsional: Biar admin nggak asal ubah
                    ->dehydrated(), // Tetap simpan ke database meskipun readonly
            ]);
    }
}