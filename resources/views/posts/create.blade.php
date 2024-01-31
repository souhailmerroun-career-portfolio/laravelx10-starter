@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Create Post</h1>
                @include('posts.create_form')
            </div>
        </div>
    </div>
@endsection
