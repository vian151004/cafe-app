<?php

namespace App\Filament\Kasir\Resources\Orders\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('Invoice')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('diningTable.name')
                    ->label('Meja')
                    ->badge()
                    ->sortable(),
                TextColumn::make('total_price')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('H:i | d M Y')
                    ->sortable(),
            ])
            ->actions([
                ViewAction::make()->label('Lihat Detail'), // Ini akan membuka Infolist tadi
                EditAction::make(),
            ]);
    }
}