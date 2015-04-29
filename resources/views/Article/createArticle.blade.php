@extends('app')

@section('content')

	{!!  Form::open([ 'url' => 'article' ])  !!}
			
		@include('Article.partials', ['submitButton' => 'Add Article'])	
		
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