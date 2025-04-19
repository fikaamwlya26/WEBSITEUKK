<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index(Request $request) 
    {
        $products = Product::all();
    
        // Cek apakah user ingin print
        if ($request->has('print')) {
            return view('product.print', compact('products'));
        }
    
        return view('product.index', compact('products'));
    }




    /**
     * Menampilkan form untuk menambah produk.
     */
    public function create(): View
    {
        return view('product.create');
    }

    /**
     * Menyimpan produk baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'    => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:3',
            'deskripsi'=> 'nullable|min:5',
            'harga'    => 'required|numeric',
            'stok'     => 'required|integer',
        ]);

        // Menyimpan gambar
        $image = $request->file('image');
        $imageName = $image->hashName(); // otomatis nama unik
        $image->storeAs('public/product', $imageName);
        
        Product::create([
            'image'     => $imageName,
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
        ]);
        

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail produk.
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Memperbarui data produk.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'image'    => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:3',
            'deskripsi'=> 'nullable|min:5',
            'harga'    => 'required|numeric',
            'stok'     => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Menyimpan gambar baru
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());
            Storage::delete('public/product/' . $product->image); // Menghapus gambar lama
            $product->update(['image' => $image->hashName()]);
        }

        // Memperbarui data produk
        $product->update([
            'nama'     => $request->nama,
            'deskripsi'=> $request->deskripsi,
            'harga'    => $request->harga,
            'stok'     => $request->stok,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui!');
    }



    

    /**
     * Menghapus produk.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/product/' . $product->image); // Menghapus gambar
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}

