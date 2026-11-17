<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/products'), $filename);
            $validated['gambar'] = 'images/products/'.$filename;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // delete old image if exists
            if ($product->gambar && File::exists(public_path($product->gambar))) {
                File::delete(public_path($product->gambar));
            }
            $file = $request->file('gambar');
            $filename = time().'_'.preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/products'), $filename);
            $validated['gambar'] = 'images/products/'.$filename;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->gambar && File::exists(public_path($product->gambar))) {
            File::delete(public_path($product->gambar));
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
