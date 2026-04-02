<?php

namespace App\Filament\Kasir\Resources\Shifts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ShiftsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name') // Ambil nama kasir
                    ->label('Kasir')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_time')
                    ->label('Mulai')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('end_time')
                    ->label('Selesai')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('Masih Berjalan...') // Jika end_time kosong
                    ->sortable(),

                TextColumn::make('starting_cash')
                    ->label('Modal')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('ending_cash')
                    ->label('Total Akhir')
                    ->money('IDR')
                    ->placeholder('Belum Closing')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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