@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-2">Back</a>

                <h1>Edit Post</h1>
                @include('posts.edit_form')
            </div>
        </div>
    </div>
@endsection
