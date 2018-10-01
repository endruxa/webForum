<h4>{{$comment->body}}</h4>
@if(!empty($thread->solution))
    @if($thread->solution == $comment->id)
        <button class="btn btn-success pull-right">Solution</button>
    @endif

@else
    @if(auth()->check())
        @if(auth()->user()->id == $thread->user_id)
        {{--//solution--}}
        {{--<form action="{{route('markAsSolution')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="threadId" value="{{$thread->id}}">
            <input type="hidden" name="solutionId" value="{{$comment->id}}">
            <input type="submit" class="btn btn-success pull-right" id="{{$comment->id}}" value="Mark As Solution">
        </form>--}}

            <div id="markItSolution" class="btn btn-success pull-right" onclick="markAsSolution('{{$thread->id}}', '{{$comment->id}}', this)">
                Mark As Solution</div>
        @endif
    @endif
@endif

<lead>{{$comment->user->name}}</lead>

<div class="actions">

    {{--<a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>--}}
    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}">edit</a>
    <div class="modal fade" id="{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="comment-form">

                        <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <legend>Edit comment</legend>

                            <div class="form-group">
                                <input type="text" class="form-control" name="body" id=""
                                       placeholder="Input..." value="{{$comment->body}}">
                            </div>


                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {{--//delete form--}}
    <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input class="btn btn-xs btn-danger" type="submit" value="Delete">
    </form>

</div>

@section('js')

    <script>
        function markAsSolution(threadId, solutionId,elem) {
            var csrfToken='{{csrf_token()}}';
            $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
                $(elem).text('Solution');
            });
        }
    </script>

@endsection