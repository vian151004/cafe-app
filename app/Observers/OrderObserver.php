<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    public function updated(Order $order): void
    {
        // 1. LOGIKA SAAT PESANAN SELESAI (LUNAS)
        if ($order->isDirty('status') && $order->status === 'completed') {
            
            // Otomatis bebaskan meja kembali ke 'available'
            if ($order->diningTable) {
                $order->diningTable->update(['status' => 'available']);
            }

            // Otomatis kurangi stok produk berdasarkan item yang dibeli
            foreach ($order->orderItems as $item) {
                if ($item->product) {
                    $item->product->decrement('stock', $item->quantity);
                }
            }
        }

        // 2. LOGIKA SAAT PESANAN DIPROSES (DAPUR)
        if ($order->isDirty('status') && $order->status === 'processing') {
            // Tandai meja sebagai 'occupied' agar tidak diisi orang lain
            if ($order->diningTable) {
                $order->diningTable->update(['status' => 'occupied']);
            }
        }
        
        // 3. LOGIKA SAAT PESANAN DIBATALKAN
        if ($order->isDirty('status') && $order->status === 'cancelled') {
            if ($order->diningTable) {
                $order->diningTable->update(['status' => 'available']);
            }
        }
    }
}