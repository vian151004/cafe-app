<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

class MenuKatalog extends Component
{
    public $category_id = null;
    public $search = '';

    public function selectCategory($id)
    {
        $this->category_id = $id;
        $this->search = '';
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

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->dispatch('cartUpdated');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return;

        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_price' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'status' => 'pending',
        ]);

        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'unit_price' => $details['price'],
                'subtotal' => $details['price'] * $details['quantity'],
            ]);
        }

        $text = "Halo Cafe Vian, saya mau pesan:\n";
        foreach($cart as $item) {
            $text .= "- " . $item['name'] . " (x" . $item['quantity'] . ")\n";
        }
        
        session()->forget('cart'); // Kosongkan keranjang
        return redirect()->to("https://wa.me/6285117065501?text=" . urlencode($text));
    }
}