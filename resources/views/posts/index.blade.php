@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Posts</h1>
                @include('posts.feed')
            </div>
        </div>
    </div>
@endsection
