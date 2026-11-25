@extends('layouts.guest')
@section('title', $article->title)

@section('content')
<div class="container mt-5" style="max-width:800px">
    <a href="{{ route('articles.index') }}" class="text-decoration-none">&larr; Kembali ke artikel</a>

    <span class="badge badge-jm d-block mt-3" style="width:fit-content">{{ $article->category->name }}</span>
    <h1 class="text-jm mt-2">{{ $article->title }}</h1>
    <p class="text-muted">
        oleh {{ $article->user->name }} · {{ $article->created_at->format('d M Y') }} · {{ $article->views }}x dibaca
        @if($article->destination)
            · 📍 <a href="{{ route('destinations.show', $article->destination->slug) }}">{{ $article->destination->name }}</a>
        @endif
    </p>

    @if($article->thumbnail)
        <img src="{{ asset($article->thumbnail) }}" class="img-fluid rounded-4 mb-4" alt="{{ $article->title }}">
    @endif

    <div style="white-space:pre-line">{{ $article->content }}</div>
</div>
@endsection