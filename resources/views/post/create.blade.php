@extends('main')

@section('title', '| Create New Post')

@section('stylesheet')

	{!! Html::style('css/parsley.css') !!}

@endsection('stylesheet')

@section('content')
	<div class="row">
		<div class="col-md-8  col-md-offset-2">
			<h1> CREATE NEW POST</h1>
			<hr>

				{!! Form::open(['route' => 'post.store', 'data-parsley-validate' => '']) !!}

					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}

					{{ Form::label('slug', 'Slug:') }}
					{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength'=> '5', 'maxlength'=> '255')) }}

					{{ Form::label('body', 'Post Body') }}
					{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

					{{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block', 'style'=> 'margin-top: 20px' )) }}
    			{!! Form::close() !!}


		</div>
	</div>

@endsection('content')

@section('javascript')

	{!! Html::script('js/parsley.min.js') !!}

@endsection('javascript')