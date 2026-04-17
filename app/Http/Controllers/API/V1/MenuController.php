<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getKatalog()
    {
        $categories = Category::with(['products' => function($query) {
            $query->where('is_available', true);
        }])->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Menu Berhasil Diambil',
            'data'    => $categories
        ], 200);
    }
}