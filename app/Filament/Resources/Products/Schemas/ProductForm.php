<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

use Filament\Schemas\Components\Grid as ComponentsGrid;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Produk')
                    ->description('Masukkan detail menu makanan atau minuman.')
                    ->schema([
                        // Ganti TextInput category_id jadi Select agar muncul nama kategorinya
                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name') // Mengambil nama dari tabel categories
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('name')
                            ->label('Nama Menu')
                            ->placeholder('Contoh: Espresso Single Shot')
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Jelaskan komposisi atau rasa...')
                            ->columnSpanFull(),

                        ComponentsGrid::make(2) // Bagi dua kolom untuk harga dan stok
                            ->schema([
                                TextInput::make('price')
                                    ->label('Harga Jual')
                                    ->required()
                                    ->numeric()
                                    ->prefix('Rp'), // Ganti $ jadi Rp

                                TextInput::make('stock')
                                    ->label('Stok Awal')
                                    ->required()
                                    ->numeric()
                                    ->default(0),
                            ]),

                        FileUpload::make('image')
                            ->label('Foto Menu')
                            ->image()
                            ->directory('product-images') // Folder penyimpanan di storage
                            ->imageEditor(), // Biar admin bisa crop foto langsung

                        Toggle::make('is_available')
                            ->label('Tersedia di Menu?')
                            ->helperText('Matikan jika menu sedang habis/tidak dijual')
                            ->default(true)
                            ->required(),
                    ])
            ]);
    }
}