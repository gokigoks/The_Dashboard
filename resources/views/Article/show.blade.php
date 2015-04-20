<?php use Carbon\Carbon; ?>

@extends('app')

@section('content')

	<h1> {{  $article->title  }} </h1>
	<a href="{{ action('ArticleController@edit', [$article->id]) }}">
		<h3 class="pull-right">

			edit
			<span class="glyphicon glyphicon-pencil" title="new post" alt="new post">
				
			</span>
		</h3>
	</a>



	

		<article> 
			
			posted {{{ Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans() }}}
				
			<hr>
			<br>
				<div class="body">{{  $article->content  }}</div>
			<br>
				
			<hr>
				<span class="glyphicon glyphicon-thumbs-up"> like
				</span>
		</article>
		<br> 




	
	

@endsection