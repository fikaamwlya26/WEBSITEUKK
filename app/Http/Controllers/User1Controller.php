<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class User1Controller extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index(): View
    {
        // Ambil semua produk, urut terbaru
        $products = Product::latest()->paginate(9);

        // Tampilkan ke view galeri
        return view('user1.index', compact('products'));
    }

    /**
     * Menampilkan detail produk berdasarkan ID.
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);

        return view('user1.detail', compact('product'));
    }

    public function product(Request $request)
    {
        // Ambil semua produk
        $products = Product::latest()->paginate(10);
    
        // Jika ada query pencarian, filter produk berdasarkan nama
        if ($request->has('query')) {
            $query = $request->input('query');
            $products = Product::where('nama', 'LIKE', "%{$query}%")->paginate(10);
        }
    
        return view('user1.product', compact('products'));
    }
    
}
