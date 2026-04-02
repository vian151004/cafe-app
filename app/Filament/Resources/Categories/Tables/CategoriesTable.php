<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(), // Tambahkan sortable agar bisa diurutkan A-Z

                TextColumn::make('slug')
                    ->label('Slug Sistem')
                    ->badge() // Ubah jadi badge agar lebih rapi
                    ->color('gray')
                    ->searchable(),

                // Menampilkan jumlah produk, pastikan relasi 'products' ada di Model Category
                TextColumn::make('products_count')
                    ->label('Total Menu')
                    ->counts('products')
                    ->badge()
                    ->color('info')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y') // Format tanggal Indonesia
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Kosong dulu tidak apa-apa
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}