<?php

namespace App\Filament\Resources\DiningTables\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section; // Gunakan dari Schemas
use Filament\Schemas\Components\Grid;    // Gunakan dari Schemas
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class DiningTableForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Meja')
                    ->description('Kelola informasi nomor meja dan kapasitas cafe.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama/Nomor Meja')
                                    ->placeholder('Contoh: Meja 01')
                                    ->required(),

                                TextInput::make('capacity')
                                    ->label('Kapasitas')
                                    ->numeric()
                                    ->default(2)
                                    ->suffix(' Orang')
                                    ->required(),
                            ]),

                        Select::make('status')
                            ->options([
                                'available' => 'Tersedia',
                                'occupied' => 'Terisi',
                                'reserved' => 'Dipesan'
                            ])
                            ->default('available')
                            ->required()
                            ->native(false), // Tampilan dropdown lebih modern

                        TextInput::make('qr_code')
                            ->label('Token QR Code')
                            ->helperText('Token ini digunakan untuk akses scan pelanggan.')
                            ->default(fn () => Str::random(10)) // Generate otomatis saat buat meja baru
                            ->readonly(), // Biar tidak asal diubah
                    ])
            ]);
    }
}