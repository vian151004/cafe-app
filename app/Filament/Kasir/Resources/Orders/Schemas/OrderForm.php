<?php

namespace App\Filament\Kasir\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Placeholder;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

use App\Models\Product;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Header Pesanan')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('order_number')
                                ->label('Nomor Pesanan')
                                ->default('INV-' . date('Ymd-His'))
                                ->readonly(),
                            Select::make('dining_table_id')
                                ->label('Meja')
                                ->relationship('diningTable', 'name')
                                ->required()
                                ->searchable(),
                            Select::make('member_id')
                                ->label('Pelanggan / Member')
                                ->relationship('member', 'name')
                                ->searchable()
                                ->placeholder('Umum (Bukan Member)'),
                        ]),
                    ]),

                Section::make('Daftar Pesanan')
                    ->schema([
                        // Repeater untuk input banyak menu sekaligus
                        Repeater::make('orderItems')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->label('Menu')
                                    ->options(Product::where('is_available', true)->pluck('name', 'id'))
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => 
                                        $set('unit_price', Product::find($state)?->price ?? 0)),
                                
                                TextInput::make('quantity')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->reactive(),

                                TextInput::make('unit_price')
                                    ->label('Harga Satuan')
                                    ->prefix('Rp')
                                    ->numeric()
                                    ->readonly(),

                                Placeholder::make('subtotal')
                                    ->label('Subtotal')
                                    ->content(fn ($get) => 'Rp ' . number_format(($get('quantity') ?? 0) * ($get('unit_price') ?? 0), 0, ',', '.')),
                            ])
                            ->columns(4)
                            ->itemLabel(fn (array $state): ?string => Product::find($state['product_id'])?->name ?? 'Menu Baru'),
                    ]),

                Section::make('Pembayaran')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('payment_method')
                                ->label('Metode Bayar')
                                ->options([
                                    'cash' => 'Tunai',
                                    'qris' => 'QRIS',
                                    'transfer' => 'Transfer Bank',
                                ])->default('cash'),
                            TextInput::make('discount_amount')
                                ->label('Potongan Harga (Rp)')
                                ->numeric()
                                ->default(0),
                            Select::make('status')
                                ->options([
                                    'pending' => 'Pending',
                                    'processing' => 'Proses Dapur',
                                    'completed' => 'Selesai/Lunas',
                                    'cancelled' => 'Batal',
                                ])->default('pending')->required(),
                        ]),
                    ]),
            ]);
    }
}