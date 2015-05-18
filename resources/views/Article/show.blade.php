<?php use Carbon\Carbon; ?>

@extends('app')

@section('content')
	<div class="panel panel-default">
				<div class="panel-body"><h3> {{  $article->title  }} </h3>
					
					<p class="text-muted"><a href="{{ action('ArticleController@edit', [$article->title]) }}">
						
							edit
							<span class="glyphicon glyphicon-pencil" title="new post" alt="new post">				
							</span>
						
					</a> posted {{{ Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans() }}} by {{ $article->posted_by }}</p>		
										
						<p>	{{  $article->content  }}
						</p>
				</div>
				<div class="panel-footer">
				<input type="hidden" id="article_id" value="{{ $article->id }}">
				<button type="button" class="btn btn-default btn-xs" id="likePost" data-toggle="button" aria-pressed="false"><span class="glyphicon glyphicon-thumbs-up">
				</span></button> 
				<button class="btn btn-default btn-xs" id="makeComment" data-toggle="button"><span class="glyphicon glyphicon-comment">
				</span></button> 
				<button class="btn btn-default btn-xs" id="flagPost"><span class="glyphicon glyphicon-flag">
				</span></button> <div style="display:inline;" id="likeCount">4</div> likes 	
			</div>
	</div>								
					
	           				<!-- <div class="panel panel-primary">
	           				
	           				<div class="panel-body">
	           					<textarea class="form-control" rows="6"></textarea>
	           					
	           						<br>
	           							<button class="btn btn-primary">
	           							post
	           							</button>
	           					</div>
	           					
	           				</div> -->
	           		


	           

	           		@foreach($comments as $comment)
						
						<div class="panel panel-default">
		           			<div class="panel-body">
		           				<p>{{ $comment->content }}</p>
		           			</div>
		           				<div class="panel-footer">
		           				
		           				<button class="btn btn-default btn-xs" id="likePost" data-toggle="button" aria-pressed="false"><span class="glyphicon glyphicon-thumbs-up">
								</span></button> 
								<button class="btn btn-default btn-xs"  id="makeComment" data-toggle="button"><span class="glyphicon glyphicon-comment">
								</span></button> 
								<button class="btn btn-default btn-xs" id="flagPost"><span class="glyphicon glyphicon-flag"></span></button>  <div style="display:inline;" id="likeCount">0	</div> likes 	 	
		           				 <small class="text-muted pull-right">by goks | post 3 minutes ago</small>
		           			</div>
	           		
		           		</div>	           		

	           		@endforeach

	           
<!-- 
		<div class="modal fade" id="flag modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<button ty
		</div> -->



<div class="modal fade" id="flagModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Why shouldn't this be on The Dashboard?</h4>
      </div>
      <div class="modal-body">
        <p><div style="position:absolute; left:50%; top:25%">
    
			</div>
		<form class="form-horizontal">

		  <div class="form-group">
		   <label class="col-xs-3 control-label">Give us your reason.</label>
		   <div class="col-xs-9">
		    <div class="radio">
		     <label>
		      <input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
		      It's offensive.</label>
		    </div>
		    <div class="radio">
		     <label>
		      <input id="inlineradio1" name="sampleinlineradio" value="option2" type="radio">
		      I don't think this should be on The Dashboard.</label>
		    </div>
		    <div class="radio">
		     <label>
		      <input id="inlineradio1" name="sampleinlineradio" value="option3" type="radio">
		      It's spam.</label>
		      
		    </div>
		    <div>
		    	<label>
		     	Others:<br><textarea></textarea>
		     </label>
		 </div>	
		 <input type="hidden" id="post_id" value="{{ $article->id }}">
		   </div>
		  </div>

		</form></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmReport">Report</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	

@endsection


@section('js')

		<script type="text/javascript" src="{{ asset('/js/javascripts/jquery.cssemoticons.js') }}"></script>
		<script type="text/javascript">

			$(document).ready(function(){

				$("body").css("background-image", "url({{ asset('img/background.png') }})");
				$(".footer").css("background-image", "url({{ asset('img/background.png') }})");
				

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

				$(document).on('click','#flagPost', function(){
					
					$('#flagModal').modal('show');

					var id = $('#flagModal').closest('.modal').find('#post_id').val();

  					console.log(id);

					$(document).on('click','#confirmReport', function(){

						

					$.ajax({

			            	url: 'ajax/makeArticleComment',
	                		type: 'POST',	
	                		data : { id:id },						

	                		success : function(){

	                			$('.modal.in').modal('hide');
    							
	                		}

				            });

						$('#flagModal').modal('hide');

					});

				});
					

				$(document).on('click','#makeComment', function(){	

					
					var element = $(this);
					
					

					if($(this).hasClass('active'))
					{		
							console.log('enabled');
							$(element).closest('.panel-default').after("<div class='panel panel-default' id='commentBox'><div class='panel-body'><textarea class='form-control' rows='2' id='commentContent'></textarea></div><input type='hidden' name='_token' value='{{ csrf_token() }}''><div class='panel-footer'><button class='btn btn-primary btn-xs' id='submitComment'>post</button></div></div>").hide().fadeIn('5000');
								
					}
					if(!$(this).hasClass('active'))
					{	
							console.log('disabled');
							$(element).closest('.panel').next().fadeOut();

					}
					

					$(document).on('click','#submitComment', function(){
						
						var content = $(document).find('#commentContent').val();
						
						element.toggleClass('active');
						var article_id = $(document).find('#article_id').val();
						

						$.ajax({

							

							url: '/ajax/makeArticleComment',
			                type: 'POST',

							data: {  
								"_token": "{{ csrf_token() }}",
								content : content,							
								article_id : article_id
							},			                				                

						      success : function(){
			                		
			                		/*
									*	append new comment to comment box
									**
									*/

									$(element).closest('.panel').after("<div class='panel panel-default'><div class='panel-body'>"+ content +"</div><div class='panel-footer'></div></div>").hide().fadeIn();
									
			                		
			                		$(document).find('#commentBox').remove();

			                		

			                	},

			                	error : function(){

			                		
			                		alert('something went wrong..');
			                	},

             				

							});	
													
						});

					
				});

				

				

				

				$(document).on('click','#likePost', function(){
					var element = $(this);

					if(element.hasClass('btn-default')){

						var val = element.closest('.panel-footer').find('#likeCount').html();
						var amount = + val.replace(/,/g, '');	
						amount += 1;
						element.closest('.panel-footer').find('#likeCount').html(amount);


					}
					if(element.hasClass('btn-info')){

						var val = element.closest('.panel-footer').find('#likeCount').html();
						var amount = + val.replace(/,/g, '');	

						amount = amount - 2;

						element.closest('.panel-footer').find('#likeCount').html(amount);


					}

					$(this).toggleClass('btn-info');

				});

				
		})

		</script>

@endsection