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
				<h3>Community</h3>
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

				@foreach($posts as $post)
					<article>
						<!-- Post Title -->
						<h3>{{ $post->title}}</h3>
						<ul class="list-inline">
							<li class="list-inline-item"> @foreach($post->tags as $tag) <a href="">{{ $tag->name }} </a> @if (!$loop->last) , @endif @endforeach </li>
							<li class="list-inline-item">by <a href="">Admin</a></li>
							<li class="list-inline-item">Nov 22,2016</li>
						</ul>
						<!-- Post Description -->
						<p class="">{{ $post->description}}</p>
						<!-- Read more button -->
						<a href="{{ route('theme.posts',['slug' => $post->slug]) }}" class="btn btn-transparent">Read More</a>
					</article>
				@endforeach
				<!-- Article 01 -->
				
				<!-- Pagination -->
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <li class="page-item active"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
				        <span class="sr-only">Next</span>
				      </a>
				    </li>
				  </ul>
				</nav>
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
							@foreach($categories as $category)
								<li><a href="">{{ $category->name}} <span class="float-right">( {{ $category->posts->count() }} )</span></a></li>
							@endforeach
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
