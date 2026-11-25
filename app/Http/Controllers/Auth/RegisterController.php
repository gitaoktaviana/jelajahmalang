<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'npm'      => ['required', 'regex:/^[0-9]{8,15}$/', 'unique:users,npm'],
            'address'  => ['required', 'string', 'max:255'],
            'phone'    => ['required', 'regex:/^(08|62)[0-9]{8,12}$/'],
            'email'    => ['required', 'email:rfc', 'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha'  => ['required', 'captcha'],
            'photo'    => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'required'         => ':attribute wajib diisi.',
            'max'              => ':attribute terlalu panjang/besar (maks :max).',
            'min'              => ':attribute minimal :min karakter.',
            'unique'           => ':attribute sudah terdaftar.',
            'confirmed'        => 'Konfirmasi password tidak sama dengan password.',
            'captcha'          => 'Kode captcha salah.',
            'image'            => 'File harus berupa gambar.',
            'mimes'            => 'Format foto harus JPG, JPEG, atau PNG.',
            'npm.regex'        => 'NPM harus angka 8-15 digit.',
            'phone.regex'      => 'Format telepon harus diawali 08 atau 62, 10-14 digit (contoh: 081234567890).',
            'email.email'      => 'Format email tidak valid.',
            'email.regex'      => 'Format email harus xxx@xxx.xxx.',
            'photo.max'        => 'Ukuran foto maksimal 2 MB.',
        ], [
            'name' => 'Nama', 'npm' => 'NPM', 'address' => 'Alamat',
            'phone' => 'Telepon', 'email' => 'Email', 'password' => 'Password',
            'captcha' => 'Captcha', 'photo' => 'Foto',
        ]);

        // Simpan foto langsung ke public/uploads/users (tanpa storage:link)
        $file = $request->file('photo');
        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/users'), $filename);

        User::create([
            'name'      => $data['name'],
            'npm'       => $data['npm'],
            'address'   => $data['address'],
            'phone'     => $data['phone'],
            'email'     => $data['email'],
            'password'  => $data['password'], // di-hash otomatis oleh cast 'hashed'
            'photo'     => 'uploads/users/' . $filename,
            'role'      => 'user',
            'is_active' => true,
        ]);

        return redirect()->route('home')
            ->with('success', 'Pendaftaran berhasil! Silakan login setelah fitur login tersedia.');
    }
}