@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-2">Back</a>

                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                <div class="d-flex">
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary me-2">Edit</a>
                    @endcan
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    @endsection
