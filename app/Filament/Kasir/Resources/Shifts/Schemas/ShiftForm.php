<?php

namespace App\Filament\Kasir\Resources\Shifts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ShiftForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Log Shift Kasir')
                    ->description('Catat waktu mulai dan berakhirnya tugas kasir beserta saldo kas.')
                    ->schema([
                        Select::make('user_id')
                            ->label('Nama Kasir')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->default(fn () => auth()->id())
                            ->required(),

                        Grid::make(2)->schema([
                            DateTimePicker::make('start_time')
                                ->label('Waktu Mulai')
                                ->default(now())
                                ->required(),
                            DateTimePicker::make('end_time')
                                ->label('Waktu Berakhir'),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('starting_cash')
                                ->label('Modal Awal (Kas)')
                                ->numeric()
                                ->prefix('Rp')
                                ->default(0)
                                ->required(),
                            TextInput::make('ending_cash')
                                ->label('Total Kas Akhir')
                                ->numeric()
                                ->prefix('Rp')
                                ->helperText('Diisi saat shift berakhir'),
                        ]),
                    ])
            ]);
    }
}