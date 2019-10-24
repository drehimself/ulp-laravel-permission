@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h2>{{ $post->title }}</h2>
                        <p> {{ $post->body }}</p>
                    </div>


                    @can('update posts')
                    <div>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit Post</a>
                    </div>
                    @endcan

                    @can('delete posts')
                    <div class="mt-3">
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete Post</button>
                        </form>
                    </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
