@extends('main')

@section('title', '| Posted Message')

@section('content')

	<div class="row">
			<div class="col-md-8">

					<h1>  {{ $post->title  }} </h1>

					<p>
						{{ $post->body }}
					</p>
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Url:</label>
							 <p><a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug)}} </a></p> 
							
					</dl>
					<dl class="dl-horizontal">
						<label>
							Created At:
						</label>

							<p>
							 {{ date('M j, Y   h : ia', strtotime( $post->created_at )) }}
							</p>
					</dl>

				<dl class="dl-horizontal">
						<label>
							Last Updated:
						</label>

						<p>
								{{date('M j, Y   h : ia', strtotime( $post->updated_at ))}}
							</p>
					</dl>

					<hr>

					<div class="row">
						<div class="col-md-6">
						{!! Html::linkRoute('post.edit', 'Edit', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					
						</div>
						<div class="col-md-6">
							
							{!! Form::open(['route' => ['post.destroy', $post->id ], 'method' => 'DELETE']) !!}
						

							{{ Form::submit('Delete', ['class' => 'btn btn-primary btn-block']) }}
							{!! Form::close() !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{{ Html::linkRoute('post.index', '<< See All Post', [] , ['class'=>'btn btn-default  btn-block btn-h1-spacing']) }}
						</div>
					</div>



				</div>
			</div>

	</div>

@endsection('content')