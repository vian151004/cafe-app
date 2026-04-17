<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\DiningTable;
use App\Models\Member;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format(Order::whereDate('created_at', now())->where('status', 'completed')->sum('total_price'), 0, ',', '.'))
                ->description('Total dari pesanan lunas hari ini')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Meja Terisi', DiningTable::where('status', 'occupied')->count())
                ->description('Jumlah meja yang sedang digunakan')
                ->descriptionIcon('heroicon-m-table-cells')
                ->color('warning'),

            Stat::make('Total Member', Member::count())
                ->description('Total pelanggan terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}