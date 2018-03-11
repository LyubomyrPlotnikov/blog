@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>{{ $post->title }}</h2>
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn-sm btn-primary">{{ __('Edit') }}</a>
                            <a href="{{ route('posts.destroy', ['id' => $post->id]) }}" class="btn-sm btn-danger">{{ __('delete') }}</a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $post->body }}</p>
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn-sm btn-primary">{{ __('Read More') }}</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $post->created_at->diffForHumans() }} by {{ optional($post->user)->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
