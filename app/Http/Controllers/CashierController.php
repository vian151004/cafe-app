<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function orders()
    {
        $orders = [
            [
                'order_number' => 'INV-20260504-001',
                'table_name' => 'Meja 03',
                'items' => 'Nasi Goreng, Es Teh, Kerupuk',
                'time' => '10:30',
                'status' => 'pending',
                'payment_method' => 'Cash',
                'total' => 43000,
            ],
            [
                'order_number' => 'INV-20260504-002',
                'table_name' => 'Meja 01',
                'items' => 'Kopi Susu, Croissant',
                'time' => '10:45',
                'status' => 'processing',
                'payment_method' => 'QRIS',
                'total' => 53000,
            ],
            [
                'order_number' => 'INV-20260504-003',
                'table_name' => 'Take Away',
                'items' => 'Americano, Sandwich',
                'time' => '11:00',
                'status' => 'pending',
                'payment_method' => 'E-Wallet',
                'total' => 38000,
            ],
            [
                'order_number' => 'INV-20260504-004',
                'table_name' => 'Meja 05',
                'items' => 'Teh Manis, Cireng, Nasi Goreng',
                'time' => '11:15',
                'status' => 'processing',
                'payment_method' => 'Debit Card',
                'total' => 62000,
            ],
            [
                'order_number' => 'INV-20260504-005',
                'table_name' => 'Meja 02',
                'items' => 'Espresso',
                'time' => '11:30',
                'status' => 'pending',
                'payment_method' => 'Cash',
                'total' => 20000,
            ],
        ];

        return view('cashier.orders', compact('orders'));
    }

    public function history()
    {
        $stats = [
            [
                'title' => 'Total Pesanan',
                'value' => '156',
                'icon' => 'list_alt',
                'icon_bg' => 'bg-emerald-50',
                'icon_color' => 'text-primary-container',
                'accent_border' => 'border-primary-container',
                'badge_text' => '+12%',
            ],
            [
                'title' => 'Hari Ini',
                'value' => '24',
                'icon' => 'today',
                'icon_bg' => 'bg-orange-50',
                'icon_color' => 'text-secondary-container',
                'accent_border' => 'border-secondary-container',
            ],
            [
                'title' => 'Total Pendapatan',
                'value' => 'Rp 12.5jt',
                'icon' => 'payments',
                'icon_bg' => 'bg-slate-100',
                'icon_color' => 'text-primary',
                'accent_border' => 'border-primary',
                'badge_text' => '+5.4%',
            ],
            [
                'title' => 'Rata-rata/Order',
                'value' => 'Rp 80rb',
                'icon' => 'analytics',
                'icon_bg' => 'bg-amber-50',
                'icon_color' => 'text-tertiary-container',
                'accent_border' => 'border-tertiary-container',
            ],
        ];

        $orders = [
            [
                'order_number' => 'INV-20260501-001',
                'date' => '01 May 2026, 14:20',
                'table_name' => 'Meja 08',
                'items' => 'Caramel Macchiato, 2x Croissant',
                'items_total' => '3 Items total',
                'total' => 145000,
                'status' => 'completed',
            ],
            [
                'order_number' => 'INV-20260502-002',
                'date' => '02 May 2026, 13:45',
                'table_name' => 'Take Away',
                'items' => 'Iced Americano, Brownie',
                'items_total' => '2 Items total',
                'total' => 65000,
                'status' => 'completed',
            ],
            [
                'order_number' => 'INV-20260503-003',
                'date' => '03 May 2026, 13:10',
                'table_name' => 'Meja 02',
                'items' => 'Hot Latte XL, Sandwich',
                'items_total' => '2 Items total',
                'total' => 82000,
                'status' => 'cancelled',
            ],
            [
                'order_number' => 'INV-20260503-004',
                'date' => '03 May 2026, 10:00',
                'table_name' => 'Meja 05',
                'items' => 'Nasi Goreng Spesial, Es Jeruk',
                'items_total' => '2 Items total',
                'total' => 37000,
                'status' => 'completed',
            ],
            [
                'order_number' => 'INV-20260504-005',
                'date' => '04 May 2026, 09:15',
                'table_name' => 'Meja 01',
                'items' => 'Kopi Susu, Teh Manis, Cireng',
                'items_total' => '3 Items total',
                'total' => 50000,
                'status' => 'completed',
            ],
        ];

        return view('cashier.history', compact('orders', 'stats'));
    }

    public function menu()
    {
        $categories = ['Semua', 'Makanan', 'Minuman', 'Snack'];

        $products = [
            ['name' => 'Nasi Goreng', 'price' => 25000, 'stock' => 15, 'category' => 'makanan', 'icon' => 'restaurant'],
            ['name' => 'Kopi Susu', 'price' => 18000, 'stock' => 25, 'category' => 'minuman', 'icon' => 'local_drink'],
            ['name' => 'Teh Manis', 'price' => 8000, 'stock' => 5, 'category' => 'minuman', 'icon' => 'cup'],
            ['name' => 'Kentang Goreng', 'price' => 15000, 'stock' => 0, 'category' => 'snack', 'icon' => 'fastfood'],
            ['name' => 'Ayam Geprek', 'price' => 22000, 'stock' => 10, 'category' => 'makanan', 'icon' => 'kebab_dining'],
            ['name' => 'Es Jeruk', 'price' => 12000, 'stock' => 20, 'category' => 'minuman', 'icon' => 'glass'],
        ];

        return view('cashier.menu', compact('products', 'categories'));
    }

    public function orderCreate()
    {
        $categories = ['Semua', 'Makanan', 'Minuman', 'Snack'];

        $products = [
            ['name' => 'Nasi Goreng', 'price' => 25000, 'stock' => 15, 'category' => 'makanan', 'icon' => 'restaurant'],
            ['name' => 'Kopi Susu', 'price' => 18000, 'stock' => 25, 'category' => 'minuman', 'icon' => 'local_drink'],
            ['name' => 'Teh Manis', 'price' => 8000, 'stock' => 5, 'category' => 'minuman', 'icon' => 'cup'],
            ['name' => 'Kentang Goreng', 'price' => 15000, 'stock' => 0, 'category' => 'snack', 'icon' => 'fastfood'],
            ['name' => 'Ayam Geprek', 'price' => 22000, 'stock' => 10, 'category' => 'makanan', 'icon' => 'kebab_dining'],
            ['name' => 'Espresso', 'price' => 12000, 'stock' => 30, 'category' => 'minuman', 'icon' => 'coffee'],
            ['name' => 'Mie Goreng', 'price' => 20000, 'stock' => 12, 'category' => 'makanan', 'icon' => 'lunch_dining'],
            ['name' => 'Cireng', 'price' => 12000, 'stock' => 20, 'category' => 'snack', 'icon' => 'bakery_dining'],
        ];

        return view('cashier.order-create', compact('products', 'categories'));
    }

    public function shift()
    {
        $shift = [
            'name' => 'Alex Rivera',
            'shift_name' => 'Shift Pagi',
            'check_in' => '06:00',
            'check_out' => '--:--',
        ];

        $schedules = [
            ['name' => 'Shift Pagi', 'time' => '06:00 - 14:00', 'icon' => 'wb_sunny', 'icon_color' => 'text-amber-500', 'status' => 'Aktif', 'status_color' => 'bg-emerald-500'],
            ['name' => 'Shift Sore', 'time' => '14:00 - 22:00', 'icon' => 'sunny', 'icon_color' => 'text-orange-500', 'status' => 'Berikutnya', 'status_color' => 'bg-surface-container-high text-on-surface-variant'],
            ['name' => 'Shift Malam', 'time' => '22:00 - 06:00', 'icon' => 'nightlight', 'icon_color' => 'text-indigo-400', 'status' => null, 'status_color' => null],
        ];

        return view('cashier.shift', compact('shift', 'schedules'));
    }

    public function profile()
    {
        $user = [
            'name' => 'Alex Rivera',
            'role' => 'Shift Manager',
            'email' => 'alex@cafe.app',
            'phone' => '0812-3456-7890',
            'shift' => 'Pagi (06:00 - 14:00)',
            'joined' => '15 Januari 2025',
        ];

        return view('cashier.profile', compact('user'));
    }
}
