<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\DiningTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionHistorySeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $tables = DiningTable::all();
        $kasir = User::role('kasir')->first();

        if ($products->isEmpty() || !$kasir) {
            $this->command->warn('Product atau Kasir belum ada. Jalankan CafeSeeder terlebih dahulu.');
            return;
        }

        $statuses = ['completed', 'completed', 'completed', 'completed', 'completed', 'completed', 'completed', 'cancelled', 'cancelled', 'processing'];
        $paymentMethods = ['QRIS', 'Cash', 'E-Wallet', 'Debit Card'];

        $dailyCounter = 1;
        $lastDate = null;

        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays(rand(0, 29))->setTime(rand(8, 20), rand(0, 59));
            $status = $statuses[array_rand($statuses)];
            $payment = $status === 'cancelled' ? null : $paymentMethods[array_rand($paymentMethods)];

            if ($date->toDateString() !== $lastDate) {
                $dailyCounter = 1;
                $lastDate = $date->toDateString();
            }

            $orderNumber = 'INV-' . $date->format('Ymd') . '-' . str_pad($dailyCounter, 3, '0', STR_PAD_LEFT);
            $dailyCounter++;

            $isTakeAway = rand(0, 100) < 30;
            $tableId = $isTakeAway ? null : $tables->random()->id;

            $itemCount = rand(1, 4);
            $selectedProducts = $products->random(min($itemCount, $products->count()));

            $totalPrice = 0;
            $orderItems = [];

            foreach ($selectedProducts as $product) {
                $qty = rand(1, 3);
                $subtotal = $product->price * $qty;
                $totalPrice += $subtotal;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $product->price,
                    'subtotal' => $subtotal,
                    'notes' => null,
                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            }

            $order = Order::create([
                'user_id' => $kasir->id,
                'dining_table_id' => $tableId,
                'member_id' => null,
                'order_number' => $orderNumber,
                'total_price' => $totalPrice,
                'discount_amount' => 0,
                'status' => $status,
                'payment_method' => $payment,
                'created_at' => $date,
                'updated_at' => $date,
            ]);

            foreach ($orderItems as $item) {
                $item['order_id'] = $order->id;
                OrderItem::create($item);
            }
        }

        $this->command->info('30 transaksi berhasil di-seed!');
    }
}
