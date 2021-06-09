@extends('Theme::layouts.default')

@section('content')

    <!--================================
=            Page Title            =
=================================-->
    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>{{ $post->title }}</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!--==================================
    =            Blog Section            =
    ===================================-->

    <section class="blog section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
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
                </div>
                <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                    <div class="sidebar">
                        <!-- Search Widget -->
                        <div class="widget search p-0">
                            <div class="input-group">
                                <input type="text" class="form-control" id="expire" placeholder="Search...">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <!-- Category Widget -->
                        <div class="widget category">
                            <!-- Widget Header -->
                            <h5 class="widget-header">Categories</h5>
                            <ul class="category-list">
                                <li><a href="">Appearel <span class="float-right">(2)</span></a></li>
                                <li><a href="">Accesories <span class="float-right">(5)</span></a></li>
                                <li><a href="">Business<span class="float-right">(7)</span></a></li>
                                <li><a href="">Entertaiment<span class="float-right">(3)</span></a></li>
                                <li><a href="">Education<span class="float-right">(9)</span></a></li>
                            </ul>
                        </div>
                        <!-- Archive Widget -->
                        <div class="widget archive">
                            <!-- Widget Header -->
                            <h5 class="widget-header">Archives</h5>
                            <ul class="archive-list">
                                <li><a href="">January 2017</a></li>
                                <li><a href="">February 2017</a></li>
                                <li><a href="">March 2017</a></li>
                                <li><a href="">April 2017</a></li>
                                <li><a href="">May 2017</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('scripts')

@endsection()
