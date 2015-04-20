@extends('app')

@section('content')

	{!!  Form::open([ 'url' => 'article' ])  !!}
			
		@include('Article.partials', ['submitButton' => 'Add Article'])	
		
	{!!  Form::close() !!}

	@include('errors.list')

@endsection