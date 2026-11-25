@extends('layouts.guest')
@section('title', 'Galeri')

@section('content')
<div class="container mt-5">
    <h2 class="text-jm mb-4">Galeri Foto</h2>

    <div class="row g-4">
        @forelse($galleries as $g)
            <div class="col-md-6 col-lg-4">
                <div class="card card-jm">
                    <img class="cover" src="{{ asset($g->image) }}" alt="{{ $g->title }}">
                    <div class="card-body">
                        <h5>{{ $g->title }}</h5>
                        @if($g->destination)
                            <span class="badge badge-jm">{{ $g->destination->name }}</span>
                        @endif
                        <p class="small text-muted mt-2 mb-0">oleh {{ $g->user->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada foto di galeri.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $galleries->links('pagination::bootstrap-5') }}</div>
</div>
@endsection