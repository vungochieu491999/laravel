@if(!empty($posts))
    @foreach($posts as $post)
        <h2> {{ $post->title }} </h2>
        <div>
            <a href="{{ route('theme.category',$post->category_id)}}">{{$post->category->name}}</a>
            <br>
            {!! $post->description !!}
            <br>
            <a href="{{ route('theme.post',$post->id)}}">View post</a>
        </div>
        <hr>
    @endforeach
@endif