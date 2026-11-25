@extends('layouts.guest')
@section('title', 'Destinasi')

@section('content')
<div class="container mt-5">
    <h2 class="text-jm mb-4">Destinasi Wisata</h2>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-5">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari destinasi...">
        </div>
        <div class="col-md-4">
            <select name="kategori" class="form-select">
                <option value="">Semua kategori</option>
                @foreach($categories as $c)
                    <option value="{{ $c->slug }}" @selected(request('kategori') == $c->slug)>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-accent w-100">Cari</button>
        </div>
    </form>

    <div class="row g-4">
        @forelse($destinations as $d)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('destinations.show', $d->slug) }}" class="text-decoration-none text-reset">
                    <div class="card card-jm">
                        @if($d->cover)
                            <img class="cover" src="{{ asset($d->cover) }}" alt="{{ $d->name }}">
                        @else
                            <div class="cover"></div>
                        @endif
                        <div class="card-body">
                            <span class="badge badge-jm mb-2">{{ $d->category->name }}</span>
                            <h5>{{ $d->name }}</h5>
                            <p class="text-muted small mb-2">📍 {{ $d->location }}</p>
                            <p class="card-text">{{ Str::limit($d->description, 90) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-muted">Destinasi tidak ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $destinations->links() }}</div>
</div>
@endsection