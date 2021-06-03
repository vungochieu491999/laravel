@if(!empty($category))
    <h2> {{ $category->name }} </h2>

    <div>
        @if(!empty($category->posts))
            @foreach($category->posts as $item)
                <b>{{$item->title}}</b>
            @endforeach
        @endif
    </div>
@endif