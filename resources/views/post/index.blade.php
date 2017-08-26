@extends('main')

@section('title', '| Create New Post')

@section('stylesheet')

	{!! Html::style('css/parsley.css') !!}

@endsection('stylesheet')

@section('content')
		
		<div class="row">
			<div class="col-md-10">
				<h1>All Post</h1>
			</div>
			
			<div class="col-md-2">
				<a class="btn btn-lg btn-block btn-primary btn-h1-primary" href="{{ route('post.create') }}">CREAT NEW  POST</a>
			</div>

			<hr>

		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created AT</th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($posts as $post)
							
							<tr><th>{{$post->id}}</th>
								<td>{{$post->title}}</td>
								<td>{{substr($post->body, 0, 50)}} {{strlen($post->body) > 50 ? "...." : "  " }}</td>
								<td>{{date("M j, Y", strtotime($post->created_at))}}</td>
								<td><a href="{{ route('post.show', $post->id)}}" class="btn btn-default">View</a>  
									<a href="{{ route('post.edit', $post->id ) }}" class="btn btn-default">Edit</a> </td>
							</tr>
							

						@endforeach
					</tbody>
				</table>
					
					<div class="text-center">

						 {!! $posts->links(); !!}

					</div>

			</div>
		</div>



@endsection('content')

@section('javascript')

	{!! Html::script('js/parsley.min.js') !!}

@endsection('javascript')