<?php

namespace App\Filament\Kasir\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

use Filament\Schemas\Components\Grid as ComponentsGrid;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Transaksi')
                    ->schema([
                        ComponentsGrid::make(3)->schema([
                            TextEntry::make('order_number')->label('Invoice')->weight('bold'),
                            TextEntry::make('diningTable.name')->label('Meja')->badge(),
                            TextEntry::make('status')
                                ->badge()
                                ->color(fn ($state) => match($state) {
                                    'completed' => 'success',
                                    'pending' => 'warning',
                                    'cancelled' => 'danger',
                                    default => 'gray'
                                }),
                        ]),
                    ]),

                ComponentsSection::make('Rincian Menu')
                    ->schema([
                        RepeatableEntry::make('orderItems')
                            ->label('')
                            ->schema([
                                TextEntry::make('product.name')->label('Menu'),
                                TextEntry::make('quantity')->label('Qty')->alignCenter(),
                                TextEntry::make('unit_price')->label('Harga')->money('IDR'),
                                TextEntry::make('subtotal')->label('Total')->money('IDR')->weight('bold'),
                            ])->columns(4),
                    ]),

                ComponentsSection::make('Total Pembayaran')
                    ->schema([
                        ComponentsGrid::make(2)->schema([
                            TextEntry::make('payment_method')->label('Metode'),
                            TextEntry::make('total_price')
                                ->label('TOTAL AKHIR')
                                ->money('IDR')
                                ->size('lg')
                                ->weight('black')
                                ->color('success'),
                        ]),
                    ]),
            ]);
    }
}