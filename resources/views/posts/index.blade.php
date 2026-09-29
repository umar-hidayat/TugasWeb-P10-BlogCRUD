@extends('layouts.app')

@section('title', 'DE Logs & Documentation')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-light m-0 font-mono"><i class="bi bi-journal-code text-warning me-2"></i>Data Engineering Logs</h2>
            <p class="text-secondary small m-0 font-mono">Documentation, Pipeline Incident, & Architecture Notes</p>
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary-de font-mono">
            <i class="bi bi-plus-lg me-1"></i> New Log Entry
        </a>
    </div>

    <!-- Form Search -->
    <form action="{{ route('posts.index') }}" method="GET" class="mb-4 d-flex gap-2">
        <div class="input-group">
            <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-search"></i></span>
            <input type="text" name="search" class="form-control bg-dark border-secondary text-light font-mono" placeholder="Query pipeline, table, or error log..." value="{{ request('search') }}">
        </div>
        <button type="submit" class="btn btn-outline-info font-mono">Query</button>
        @if(request('search'))
            <a href="{{ route('posts.index') }}" class="btn btn-outline-danger font-mono">Clear</a>
        @endif
    </form>

    @forelse ($posts as $post)
        <x-card :title="$post->title">
            @if ($post->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded border border-secondary" style="max-height: 250px; width: 100%; object-fit: cover;">
                </div>
            @endif
            
            <p class="card-text text-light font-mono" style="white-space: pre-line;">{{ Str::limit($post->body, 180) }}</p>
            
            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top border-secondary-subtle">
                <span class="text-secondary font-mono small">
                    <i class="bi bi-clock me-1"></i> {{ $post->created_at->format('Y-m-d H:i:s') }} UTC
                </span>
                <div class="d-flex gap-2">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-info font-mono">
                        <i class="bi bi-eye"></i> Inspect
                    </a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-warning font-mono">
                        <i class="bi bi-pencil"></i> Patch
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Purge this log entry?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger font-mono">
                            <i class="bi bi-trash"></i> Drop
                        </button>
                    </form>
                </div>
            </div>
        </x-card>
    @empty
        <div class="card card-custom text-center py-5">
            <div class="card-body font-mono">
                <i class="bi bi-database-exclamation text-warning fs-1"></i>
                <h5 class="mt-3 text-light">No Pipeline Logs Found</h5>
                <p class="text-secondary small">Database query returned 0 rows. Try adding a new log entry.</p>
            </div>
        </div>
    @endforelse

    <div class="mt-4 font-mono">
        {{ $posts->links() }}
    </div>
@endsection