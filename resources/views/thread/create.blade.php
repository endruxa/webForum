@extends('layouts.front')

@section('heading', "Create Thread")

@section('content')

    <div class="row">
        <div class="container-fluid">
            <form class="form-group" action="{{route('thread.store')}}" method="post" role="form" id="create-thread-form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..." value="{{old('subject')}}">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="" placeholder="Input..." value="{{old('type')}}">
                </div>

                <div class="form-group">
                    <label for="thread">Thread</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Input..." rows="2">{{old('thread')}}</textarea>
                </div>

                {{--<div class="form-group">
                    {!! app('captcha')->display(); !!}
                </div>--}}

                <div class="form-group">
                    <label for="thread">Add file</label>
                    <input name="image" type="file">
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

@endsection