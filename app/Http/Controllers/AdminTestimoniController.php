<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::orderByDesc('id')->get();

        return view('admin.testimoni.index', compact('testimonials'));
    }

    public function approve($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update(['disetujui' => true]);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni telah disetujui');
    }

    public function reject($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni telah dihapus');
    }
}
