<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimoni::create($validated);

        return redirect()->back()->with('success', 'Terima kasih atas testimoni Anda! Testimoni akan ditampilkan setelah disetujui admin.');
    }
}
