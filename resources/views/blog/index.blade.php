@extends('main')

@section('title', '| Blog')

@section('stylesheet')

	{!! Html::style('css/parsley.css') !!}

@endsection('stylesheet')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1> Blog </h1>
		</div>
	</div>

@foreach ($posts as $post)

	<div class="row">
		<div class="col-md-12  col-md-offset-2">
			<h2>{{ $post->title }}</h2>
			<h5>{{ date('M j, Y', strtotime($post->created_at )) }}</h5>
			<p>{{ substr($post->body , 0, 50 )}}{{ strlen($post->body) > 100 ? "..." : " " }}</p>
			<a href="{{ route('blog.single', $post->slug )}}" class="btn btn-primary"> Read More</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</div>
	

@endforeach

@endsection('content')

@section('javascript')

	{!! Html::script('js/parsley.min.js') !!}

@endsection('javascript')