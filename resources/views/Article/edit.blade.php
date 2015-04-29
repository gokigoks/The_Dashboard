@extends('app')

@section('content')

	{!!  Form::model($article, [ 'method' => 'PATCH' ,'action' => ['ArticleController@update', $article->id]])  !!}
		
		@include('Article.partials', ['submitButton' => 'Apply Edit'])
		
	{!!  Form::close() !!}

	@include('errors.list')

@endsection


@section('js')
		<script type="text/javascript" src="{{ asset('/js/javascripts/jquery.cssemoticons.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			$('.body').emoticonize({
				//delay: 800,
				animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
			$('#toggle-headline').toggle(
				function(){
					$('#large').unemoticonize({
						//delay: 800,
						//animate: false
					})
				}, 
				function(){
					$('#large').emoticonize({
						//delay: 800,
						//animate: false
					})
				}
			);
		})

		</script>

@endsection