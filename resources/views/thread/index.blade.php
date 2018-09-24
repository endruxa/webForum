@extends('layouts.front')

@section('heading')

      <a class="btn btn-primary pull-right" href="{{route('thread.create')}}">Create thread</a> <br>

@endsection

@section('content')

  @include('thread.partials.thread-list')

@endsection