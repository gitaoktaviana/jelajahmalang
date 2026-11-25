<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('guest.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email:rfc', 'max:100'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'required'    => ':attribute wajib diisi.',
            'email'       => 'Format email tidak valid.',
            'min'         => ':attribute minimal :min karakter.',
            'max'         => ':attribute terlalu panjang (maks :max karakter).',
        ], [
            'name' => 'Nama', 'email' => 'Email',
            'subject' => 'Subjek', 'message' => 'Pesan',
        ]);

        Message::create($data);

        return redirect()->route('contact')
            ->with('success', 'Pesan berhasil dikirim. Terima kasih atas masukanmu!');
    }
}