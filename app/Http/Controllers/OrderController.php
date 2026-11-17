<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer|exists:produk,id',
            'qty' => 'nullable|integer|min:1',
            'nama' => 'required|string|max:150',
            'nomor_hp' => 'required|string|max:20',
        ]);

        $qty = $data['qty'] ?? 1;

        return DB::transaction(function () use ($data, $qty) {
            $product = Product::find($data['product_id']);
            if (!$product) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan.');
            }

            if ($product->stok < $qty) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi.');
            }

            $total = $product->harga * $qty;

            $pesananId = DB::table('pesanan')->insertGetId([
                'user_id' => auth()->id() ?? null,
                'nama' => $data['nama'],
                'nomor_hp' => $data['nomor_hp'],
                'alamat' => null,
                'jumlah_produk' => $qty,
                'total' => $total,
                'status' => 'pending',
                'tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('detail_pesanan')->insert([
                'pesanan_id' => $pesananId,
                'produk_id' => $product->id,
                'qty' => $qty,
                'subtotal' => $total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Kurangi stok produk
            $product->decrement('stok', $qty);

            return redirect()->back()->with('success', 'Produk ditambahkan ke pesanan.');
        });
    }
}
