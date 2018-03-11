<div class="card mb-4">
    <div class="card-header">
        <h2>{{ $post->title }}</h2>
        @can('edit', \App\Models\Post::class)
            <a href="{{ route('posts.edit', ['id' => $post->slug]) }}" class="btn-sm btn-primary">{{ __('Edit') }}</a>
        @endcan

        @can('delete', \App\Models\Post::class)
            <a href="{{ route('posts.destroy', ['id' => $post->slug]) }}" class="btn-sm btn-danger">{{ __('Delete') }}</a>
        @endcan
    </div>
    <div class="card-body">
        <p class="card-text">{{ $post->body }}</p>
        <a href="{{ route('posts.show', ['id' => $post->slug]) }}" class="btn-sm btn-primary">{{ __('Read More') }}</a>
    </div>
    <div class="card-footer text-muted">
        {{ $post->created_at->diffForHumans() }} by {{ optional($post->user)->name }}
    </div>
</div>