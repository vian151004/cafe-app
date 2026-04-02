<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\TextInput;

use Filament\Schemas\Components\Section; 
use Filament\Schemas\Components\Grid;    
use Filament\Schemas\Schema;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Member')
                    ->description('Kelola data pelanggan setia untuk program poin loyalitas.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Lengkap')
                                    ->placeholder('Contoh: Budi Santoso')
                                    ->required(),

                                TextInput::make('phone')
                                    ->label('Nomor WhatsApp/Telepon')
                                    ->tel()
                                    ->placeholder('08123456789')
                                    ->required(),
                            ]),

                        TextInput::make('points')
                            ->label('Jumlah Poin Loyalitas')
                            ->helperText('Poin ini akan digunakan untuk diskon di masa depan.')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->prefix('★'), // Ikon bintang biar lebih estetik
                    ])
            ]);
    }
}