<?php use Carbon\Carbon; ?>

@extends('app')

@section('content')
	
	

		<h1>Articles</h1>
		<a href="{{ url('article/create') }}">
			<h3 class="pull-right">

				post
				<span class="glyphicon glyphicon-pencil" title="new post" alt="new post">
					
				</span>
			</h3>
		</a>
		
		{!! $article->render() !!}


		@foreach ($article as $article)

			<article> 
				<h2> <a href="{{ action('ArticleController@show', [$article->id])  }}">{{  $article->title  }} </a></h2> 
				last updated: {{{ Carbon::createFromTimeStamp(strtotime($article->updated_at))->diffForHumans() }}}
				<br> posted by : {{ $article->name }}
				<hr>
				<br>
					<div class="body">
						<p style="font-size: 20px;">	{{  $article->content  }} </p>
					</div>
				<br>
					<span class="glyphicon glyphicon-thumbs-up">

					</span>
				<span class="glyphicon glyphicon-thumbs-flag"></span>
					 <hr>
					
				<hr>

			</article>
			<br> 

			

		@endforeach

			

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
			
		})

		</script>


@endsection