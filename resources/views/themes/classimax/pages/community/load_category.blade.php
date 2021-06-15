@if(count($categories) > 0)
    @foreach($categories as $category)
        <li><a href="{{ route('theme.categories',['slug' => $tag->slug ]) }}">{{ $category->name}} <span class="float-right">( {{ $category->posts->count() }} )</span></a></li>
    @endforeach
@else
    No data found :((
@endif
