@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <x-card :title="$post->title">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3">
        @endif
        <p>{{ $post->body }}</p>
        <small class="text-muted">Dibuat pada: {{ $post->created_at->format('d M Y, H:i') }}</small>
    </x-card>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
@endsection