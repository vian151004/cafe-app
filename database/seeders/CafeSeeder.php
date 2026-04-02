<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\DiningTable;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shift;
use App\Models\StockMovement;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CafeSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ROLE & USER SETUP
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $kasirRole = Role::firstOrCreate(['name' => 'kasir']);

        $admin = User::create([
            'name' => 'Vian Admin',
            'email' => 'admin@cafe.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        $kasir = User::create([
            'name' => 'Lina Kasir',
            'email' => 'kasir@cafe.com',
            'password' => bcrypt('password'),
        ]);
        $kasir->assignRole($kasirRole);

        // 2. MASTER DATA: CATEGORIES
        $kopi = Category::create(['name' => 'Coffee', 'slug' => 'coffee']);
        $makanan = Category::create(['name' => 'Snacks', 'slug' => 'snacks']);

        // 3. MASTER DATA: PRODUCTS
        $espresso = Product::create([
            'category_id' => $kopi->id,
            'name' => 'Espresso',
            'price' => 20000,
            'stock' => 50,
            'is_available' => true,
        ]);

        $croissant = Product::create([
            'category_id' => $makanan->id,
            'name' => 'Butter Croissant',
            'price' => 25000,
            'stock' => 20,
            'is_available' => true,
        ]);

        // 4. MASTER DATA: DINING TABLES
        for ($i = 1; $i <= 5; $i++) {
            DiningTable::create([
                'name' => "Meja 0$i",
                'capacity' => 4,
                'status' => $i == 1 ? 'occupied' : 'available',
                'qr_code' => "QR-TABLE-0$i-" . Str::random(5),
            ]);
        }

        // 5. MASTER DATA: MEMBERS
        $member = Member::create([
            'name' => 'Budi Pelanggan',
            'phone' => '08123456789',
            'points' => 100,
        ]);

        // 6. TRANSACTION: SHIFT (Contoh Shift yang sedang berjalan)
        Shift::create([
            'user_id' => $kasir->id,
            'start_time' => Carbon::now()->subHours(4),
            'starting_cash' => 500000,
        ]);

        // 7. TRANSACTION: ORDER (Contoh Pesanan Selesai)
        $order = Order::create([
            'user_id' => $kasir->id,
            'dining_table_id' => 1,
            'member_id' => $member->id,
            'order_number' => 'INV-' . date('Ymd') . '-001',
            'total_price' => 45000,
            'status' => 'completed',
            'payment_method' => 'QRIS',
        ]);

        // 8. TRANSACTION: ORDER ITEMS
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $espresso->id,
            'quantity' => 1,
            'unit_price' => 20000,
            'subtotal' => 20000,
            'notes' => 'Less sugar',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $croissant->id,
            'quantity' => 1,
            'unit_price' => 25000,
            'subtotal' => 25000,
        ]);

        // 9. TRANSACTION: STOCK MOVEMENTS (Log Stok Awal)
        StockMovement::create([
            'product_id' => $espresso->id,
            'quantity' => 50,
            'type' => 'in',
            'reason' => 'Initial Stock',
        ]);

        StockMovement::create([
            'product_id' => $espresso->id,
            'quantity' => -1,
            'type' => 'sale',
            'reason' => 'Order ' . $order->order_number,
        ]);
    }
}