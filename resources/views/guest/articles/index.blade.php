@extends('layouts.guest')
@section('title', 'Artikel')

@section('content')
<div class="container mt-5">
    <h2 class="text-jm mb-4">Artikel & Review</h2>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-5">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari artikel...">
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
        @forelse($articles as $a)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('articles.show', $a->slug) }}" class="text-decoration-none text-reset">
                    <div class="card card-jm">
                        @if($a->thumbnail)
                            <img class="cover" src="{{ asset($a->thumbnail) }}" alt="{{ $a->title }}">
                        @else
                            <div class="cover"></div>
                        @endif
                        <div class="card-body">
                            <span class="badge badge-jm mb-2">{{ $a->category->name }}</span>
                            <h5>{{ $a->title }}</h5>
                            <p class="small text-muted mb-1">oleh {{ $a->user->name }} · {{ $a->created_at->format('d M Y') }}</p>
                            <p class="card-text">{{ Str::limit(strip_tags($a->content), 90) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-muted">Belum ada artikel.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $articles->links() }}</div>
</div>
@endsection