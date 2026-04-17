<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
// Hapus import Trend jika kamu tidak menggunakannya untuk sementara agar kode lebih bersih
// use Flowframe\Trend\Trend; 
// use Flowframe\Trend\TrendValue;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Tren Penjualan (7 Hari Terakhir)';
    
    // PERBAIKAN: Hapus kata 'static' di sini
    protected string $color = 'success'; 
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Logika sederhana mengambil data 7 hari terakhir
        $data = collect(range(6, 0))->map(function ($days) {
            $date = now()->subDays($days);
            return [
                'date' => $date->format('d M'),
                'total' => Order::whereDate('created_at', $date)
                            ->where('status', 'completed')
                            ->sum('total_price'),
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Rp)',
                    'data' => $data->pluck('total')->toArray(),
                    // Memberikan efek warna di bawah garis agar lebih cantik
                    'fill' => 'start',
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Jenis grafik garis
    }
}