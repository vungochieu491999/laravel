@if(count($posts) > 0)
    @foreach($posts as $post)
        <article>
            <!-- Post Title -->
            <a href="{{ route('theme.posts',['slug' => $post->slug]) }}" rel="noopener"> <h3> {{ $post->title}} </h3> </a>
            <ul class="list-inline">
                <li class="list-inline-item"> @foreach($post->tags as $tag) <a href="{{ route('theme.post-tag',['slug' => $tag->slug ]) }}">{{ $tag->name }} </a> @if (!$loop->last) ,@endif @endforeach </li>
                <li class="list-inline-item">by <a href=" {{ route('theme.user-profile',['username' => $post->user->username ]) }} "> {{ $post->user->getFullName() }} </a></li>
                <li class="list-inline-item"> {{ $post->created_at->diffForHumans() }} </li>
                <li class="list-inline-item fa fa-eye"> {{ $post->views->count() }} </li>
                <li class="list-inline-item fa fa-thumbs-up"> {{ $post->reactions->count() }} </li>
                <li class="list-inline-item fa fa-heart"> {{ $post->reactions->count() }} </li>
                <li class="list-inline-item fa fa-comment"> {{ $post->comments->count() }} </li>
            </ul>
        </article>
    @endforeach
@else
    No data found :((
@endif
