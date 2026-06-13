<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\DiningTable;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class MenuKatalog extends Component
{
    public $category_id = null;
    public $search = '';
    public $table_number = null;

    public function selectCategory($id)
    {
        $this->category_id = $id;
        $this->search = '';
    }

    public function mount()
    {
        // 1. Cek apakah ada parameter '?meja=' di URL browser
        if (request()->has('meja')) {
            // Simpan nomor meja ke session agar awet
            session()->put('nomor_meja', request()->query('meja'));
        }

        // 2. Masukkan nilai session ke properti Livewire
        $this->table_number = session()->get('nomor_meja', 'Tanpa Meja');
    }

    public function render()
    {
        return view('livewire.⚡menu-katalog', [
            'categories' => Category::all(),
            'products' => Product::query()
                ->when($this->category_id, fn($q) => $q->where('category_id', $this->category_id))
                ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                ->where('is_available', true) // Hanya yang tersedia
                ->get(),
        ]);
    }

    public function resetCategory()
    {
        $this->category_id = null;
        $this->search = '';
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image_url,
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cartUpdated');
    }

    public function decrementQuantity($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Jika jumlahnya lebih dari 1, kurangi 1 angka
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                // Jika jumlahnya sudah tinggal 1 lalu diklik minus, hapus total dari keranjang
                unset($cart[$productId]);
            }
            
            session()->put('cart', $cart);
            $this->dispatch('cartUpdated');
        }
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->dispatch('cartUpdated');
        }
    }

    // public function checkout()
    // {
    //     $cart = session()->get('cart', []);
    //     if(empty($cart)) return;

    //     $order = Order::create([
    //         'order_number' => 'ORD-' . strtoupper(uniqid()),
    //         'total_price' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    //         'status' => 'pending',
    //     ]);

    //     foreach($cart as $id => $details) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $id,
    //             'quantity' => $details['quantity'],
    //             'unit_price' => $details['price'],
    //             'subtotal' => $details['price'] * $details['quantity'],
    //         ]);
    //     }

    //     $text = "Halo Cafe Vian, saya mau pesan:\n";
    //     foreach($cart as $item) {
    //         $text .= "- " . $item['name'] . " (x" . $item['quantity'] . ")\n";
    //     }
        
    //     session()->forget('cart'); // Kosongkan keranjang
    //     return redirect()->to("https://wa.me/6285117065501?text=" . urlencode($text));
    // }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return;

        // 1. Cari data meja berdasarkan nomor/nama meja yang tersimpan di properti $table_number
        // Menggunakan \App\Models\DiningTable agar lurus dengan file migrasi kamu
        $table = DiningTable::where('name', $this->table_number)->first();

        // 2. Simpan orderan utama ke database
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_price' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'status' => 'pending',
            // Menyimpan ID Meja ke DB secara otomatis jika tabel orders kamu sudah punya kolomnya
            'dining_table_id' => $table ? $table->id : null, 
        ]);

        // 3. Update status meja tersebut di database menjadi 'occupied' (terisi)
        if ($table) {
            $table->update(['status' => 'occupied']);
        }

        // 4. Masukkan item belanjaan ke database order_items
        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'unit_price' => $details['price'],
                'subtotal' => $details['price'] * $details['quantity'],
            ]);
        }

        // 5. FORMAT SINKRONISASI TEKS WHATSAPP (Menampilkan Nomor Meja Statis)
        $text = "Halo Cafe Vian, saya dari *MEJA " . $this->table_number . "* ingin memesan:\n\n";
        foreach($cart as $item) {
            $text .= "- " . $item['name'] . " (x" . $item['quantity'] . ")\n";
        }
        $text .= "\n*Total Pembayaran:* Rp " . number_format($order->total_price, 0, ',', '.');
        $text .= "\n*Order ID:* " . $order->order_number;
        
        session()->forget('cart'); // Kosongkan keranjang di website
        
        return redirect()->to("https://wa.me/6285117065501?text=" . urlencode($text));
    }
}