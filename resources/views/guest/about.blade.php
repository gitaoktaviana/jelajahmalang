@extends('layouts.guest')
@section('title', 'Tentang')

@section('content')
<div class="container mt-5">
    <h2 class="text-jm mb-3">Tentang {{ config('app.name') }}</h2>
    <p class="lead">
        {{ config('app.name') }} adalah portal wisata Malang Raya (Kota Malang, Kota Batu, dan Kabupaten Malang)
        tempat para penjelajah berbagi foto, ulasan, dan rekomendasi destinasi.
    </p>

    <div class="row g-4 mt-2">
        <div class="col-md-6">
            <div class="card card-jm"><div class="card-body">
                <h5 class="text-jm">Visi</h5>
                <p class="mb-0">Menjadi sumber informasi wisata Malang Raya yang lengkap, terpercaya, dan dibangun bersama komunitas.</p>
            </div></div>
        </div>
        <div class="col-md-6">
            <div class="card card-jm"><div class="card-body">
                <h5 class="text-jm">Misi</h5>
                <ul class="mb-0">
                    <li>Menyajikan informasi destinasi alam, kuliner, dan budaya.</li>
                    <li>Memberi ruang bagi pengunjung untuk berbagi foto dan ulasan.</li>
                    <li>Membantu wisatawan merencanakan perjalanan.</li>
                </ul>
            </div></div>
        </div>
    </div>

    <h4 class="text-jm mt-5 mb-3">Pengembang</h4>
    <div class="card card-jm"><div class="card-body">
        <p class="mb-1"><strong>Nama:</strong> (isi nama kamu)</p>
        <p class="mb-1"><strong>NPM:</strong> (isi NPM kamu)</p>
        <p class="mb-0"><strong>Mata kuliah:</strong> Pemrograman Web II</p>
    </div></div>
</div>
@endsection