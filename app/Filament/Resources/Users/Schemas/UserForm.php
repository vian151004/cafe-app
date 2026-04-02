<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select; // Tambahkan ini
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengguna')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),

                        // Input Role (Spatie)
                        Select::make('roles')
                            ->label('Hak Akses / Role')
                            ->relationship('roles', 'name')
                            ->preload()
                            ->searchable()
                            ->required(),

                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            // Password hanya wajib diisi saat CREATE (buat baru)
                            ->required(fn (string $context): bool => $context === 'create')
                            // Jika saat EDIT dikosongkan, password lama tidak berubah
                            ->dehydrated(fn ($state) => filled($state))
                            ->revealable(), // Tombol mata untuk lihat password
                    ])->columns(2)
            ]);
    }
}