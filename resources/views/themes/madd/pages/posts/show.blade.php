@if(!empty($post))
    <h2> {{ $post->title }} </h2>
    {!! $post->description !!}


    <h4>Comments: </h4>
    @if(!empty($post->comments))
        @foreach($post->comments as $comment)
            <b>{{$comment->comment}}</b>
            <b>as - {{$comment->created_at->diffForHumans()}}</b>
            <br>
        @endforeach
    @endif
@endif