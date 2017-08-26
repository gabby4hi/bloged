@extends('main')

@section('title', '| Posted Message')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
			<h1> {{ $posts->title }}</h1>
			<p> {{ $posts->body }}</p>
		</div>
	</div>

@endsection('content')