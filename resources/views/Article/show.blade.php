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
				<div class="body">
						<p style="font-size: 20px;">	{{  $article->content  }}
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
				</div>
			<br>
				
				<div class="col-md-3 col-md-offset-3">

				<div class="panel panel-default">
				 
				  <div class="panel-body">
				    Panel content
				  </div>
				  <div class="panel-footer"><small> comment by: earl</small>

				  </div>
				</div>
			</div>

			<hr>
				<span class="glyphicon glyphicon-thumbs-up"> like
				</span>
				<span class="glyphicon glyphicon-flag">flag</span>
		</article>
		<br> 




	
	

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