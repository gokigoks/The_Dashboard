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
					<div class="body">{{  $article->content  }}</div>
				<br>
					<span class="glyphicon glyphicon-thumbs-up">
					</span>
				<hr>

			</article>
			<br> 


		@endforeach

		

@endsection