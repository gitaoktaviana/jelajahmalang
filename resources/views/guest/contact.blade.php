@extends('layouts.guest')
@section('title', 'Kontak')

@section('content')
<div class="container mt-5">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-5">
            <h2 class="text-jm">Hubungi Kami</h2>
            <p class="text-muted">Punya pertanyaan, saran, atau ingin berbagi informasi wisata? Kirim pesan lewat formulir ini.</p>
            <ul class="list-unstyled">
                <li class="mb-2">📍 Malang, Jawa Timur</li>
                <li class="mb-2">✉️ admin@jelajahmalang.test</li>
                <li class="mb-2">🕒 Senin - Jumat, 08.00 - 16.00</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="card card-jm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('contact.store') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subjek</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror">
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button class="btn btn-accent w-100 py-2">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection