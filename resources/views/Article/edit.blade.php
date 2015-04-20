@extends('app')

@section('content')

	{!!  Form::model($article, [ 'method' => 'PATCH' ,'action' => ['ArticleController@update', $article->id]])  !!}
		
		@include('Article.partials', ['submitButton' => 'Apply Edit'])
		
	{!!  Form::close() !!}

	@include('errors.list')

@endsection