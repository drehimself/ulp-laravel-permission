@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach ($posts as $post)
                            <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>

                    @can('create posts')
                    <div>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
