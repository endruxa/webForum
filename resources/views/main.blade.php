@extends('layouts.front')

@section('banner')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3">Hello, world!</h1>
            <hr class="my-4">
            <p>Help and get help</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
@endsection
@section('heading', "Threads")
@section('content')

    @include('thread.partials.thread-list')

@endsection