<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:150',
            'email' => 'required|email|max:180',
            'pesan' => 'required|string|max:2000',
        ]);

        $adminEmail = config('mail.admin_address', 'framenow23@gmail.com');

        try {
            Mail::to($adminEmail)->send(new ContactMessage($data));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Pesan gagal dikirim. Silakan coba lagi atau hubungi kami melalui email langsung.');
        }

        return redirect()->back()->with('success', 'Pesan berhasil dikirim. Terima kasih telah menghubungi kami.');
    }
}
