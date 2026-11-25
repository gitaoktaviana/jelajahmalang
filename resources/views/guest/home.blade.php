@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Jelajahi Keindahan Malang Raya</h1>
        <p class="lead mb-4">Temukan destinasi alam, kuliner, dan budaya di Malang, Batu, dan sekitarnya.</p>
        <a href="{{ route('destinations.index') }}" class="btn btn-accent btn-lg me-2">Lihat Destinasi</a>
        <a href="#" class="btn btn-outline-jm btn-lg">Bergabung</a>
    </div>
</section>

<section class="container mt-5">
    <h2 class="text-jm mb-4">Destinasi Populer</h2>
    <div class="row g-4">
        @forelse($destinations as $d)
            <div class="col-md-6 col-lg-4">
                <div class="card card-jm">
                    @if($d->cover)
                        <img class="cover" src="{{ asset($d->cover) }}" alt="{{ $d->name }}">
                    @else
                        <div class="cover"></div>
                    @endif
                    <div class="card-body">
                        <span class="badge badge-jm mb-2">{{ $d->category->name }}</span>
                        <h5 class="card-title">{{ $d->name }}</h5>
                        <p class="text-muted small mb-2">📍 {{ $d->location }}</p>
                        <p class="card-text">{{ Str::limit($d->description, 90) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada destinasi.</p>
        @endforelse
    </div>
</section>

<section class="container mt-5">
    <h2 class="text-jm mb-4">Artikel Terbaru</h2>
    <div class="row g-4">
        @forelse($articles as $a)
            <div class="col-md-4">
                <div class="card card-jm"><div class="card-body">
                    <span class="badge badge-jm mb-2">{{ $a->category->name }}</span>
                    <h5>{{ $a->title }}</h5>
                    <p class="small text-muted">oleh {{ $a->user->name }}</p>
                </div></div>
            </div>
        @empty
            <p class="text-muted">Belum ada artikel. Nantikan review dari para penjelajah!</p>
        @endforelse
    </div>
</section>
@endsection