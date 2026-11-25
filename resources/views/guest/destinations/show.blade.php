@extends('layouts.guest')
@section('title', $destination->name)

@section('content')
<div class="container mt-5">
    <a href="{{ route('destinations.index') }}" class="text-decoration-none">&larr; Kembali ke destinasi</a>

    <div class="row mt-3 g-4">
        <div class="col-lg-7">
            @if($destination->cover)
                <img src="{{ asset($destination->cover) }}" class="img-fluid rounded-4 w-100" alt="{{ $destination->name }}">
            @else
                <div class="cover rounded-4" style="height:320px;background:linear-gradient(135deg,var(--jm-secondary),var(--jm-primary))"></div>
            @endif
        </div>
        <div class="col-lg-5">
            <span class="badge badge-jm mb-2">{{ $destination->category->name }}</span>
            <h2 class="text-jm">{{ $destination->name }}</h2>
            <p class="text-muted">📍 {{ $destination->location }}</p>
            <p>{{ $destination->description }}</p>
        </div>
    </div>

    <h4 class="text-jm mt-5 mb-3">Galeri {{ $destination->name }}</h4>
    <div class="row g-3">
        @forelse($destination->galleries as $g)
            <div class="col-6 col-md-4 col-lg-3">
                <img src="{{ asset($g->image) }}" class="img-fluid rounded-3" alt="{{ $g->title }}">
            </div>
        @empty
            <p class="text-muted">Belum ada foto untuk destinasi ini.</p>
        @endforelse
    </div>
</div>
@endsection