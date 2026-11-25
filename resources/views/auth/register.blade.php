@extends('layouts.guest')
@section('title', 'Daftar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card card-jm">
                <div class="card-body p-4">
                    <h2 class="text-jm mb-1">Daftar Akun</h2>
                    <p class="text-muted">Bergabunglah dan bagikan pengalaman wisatamu.</p>

                    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NPM</label>
                            <input type="text" name="npm" value="{{ old('npm') }}" class="form-control @error('npm') is-invalid @enderror" placeholder="contoh: 22081010001">
                            @error('npm')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="address" rows="2" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="081234567890">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Profil <small class="text-muted">(JPG/PNG, maks 2 MB)</small></label>
                            <input type="file" name="photo" accept=".jpg,.jpeg,.png" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Captcha</label>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <img id="captcha-img" src="{{ captcha_src() }}" alt="captcha">
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="refresh-captcha">↻ Ganti</button>
                            </div>
                            <input type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Ketik kode di atas" autocomplete="off">
                            @error('captcha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <button class="btn btn-accent w-100 py-2">Daftar</button>
                        <p class="text-center text-muted small mt-3 mb-0">Sudah punya akun? <a href="#">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('refresh-captcha').addEventListener('click', function () {
    document.getElementById('captcha-img').src = '{{ url('captcha/default') }}?' + Math.random();
});
</script>
@endpush