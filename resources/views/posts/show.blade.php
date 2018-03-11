@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('shared/breadcrumbs')
            <div class="col-md-8">
                @include('posts.shared.card', ['post' => $post])
            </div>
        </div>
    </div>
@endsection
