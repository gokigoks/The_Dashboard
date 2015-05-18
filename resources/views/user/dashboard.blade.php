<?php 
use Carbon\Carbon; 
use App\Post;

?>
@extends('app')

@section('content')

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{asset('img/'.Auth::user()->profile_pic)}}" class="img-responsive" alt="">
						
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ Auth::user()->name }}
					</div>
					<div class="profile-usertitle-job">
						
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="{{ url('user/settings') }}">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-ok"></i>
							Groups </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-time"></i>
							member since : {{ Carbon::createFromTimeStamp(strtotime(Auth::user()->created_at))->diffForHumans() }}</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		
		<div class="col-md-9">	
           	<div class="profile-content">
	           		
	           		<div class="col-md-10">
	           			<div class="panel panel-primary">
	           				<div class="panel-heading"
	           					<small>Post something..</small>
	           				</div>
	           				<div class="panel-body">
	           					
	           					<form action="" method="post">
	           					
	           						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	           						
	           						
	           						<textarea class="form-control" rows="3" name="content">

	           						</textarea>
	           							<div class="clearfix"></div>	           					
	           					
	           				
	           							<br>
		           						
		           							<button class="btn btn-primary" id="postbtn" type="submit">
		           							post 
		           							</button>
		           					</form>		
		           			</div>	
	           			</div>
	           		</div>
	           		
					@if($post)

					@foreach($post as $posts)
	           		<div class="col-md-10">
	           			<div class="panel panel-primary">
	           				<div class="panel-body">
	           						
		           					<div id="post_content"><br>
		           						{{ $posts->content }}

		           						{{ $posts->id }}										
		           					</div>
		           					<br>	
		           					<div class="clearfix"></div>
		           					post by : {{ $posts->user->name }}
		           					<div class="clearfix"></div>
		           					posted on: {{{ Carbon::createFromTimeStamp(strtotime($posts->created_at))->diffForHumans() }}}
		           					<div class="clearfix"></div>
		           					<p><i class="glyphicon glyphicon-thumbs-up"></i></p>
		           					<hr>
	           						

										
		           	<!--	comment block	-->

					<ul class="media-list" id="comment_block">

						 

					</ul>
				

						
				

					@foreach($posts->comments as $comment)
					<blockquote>
				    	<h6> 
							<img src="{{ asset('img/d2.jpg') }}" class="media-object pull-left">
				    		{{ $comment->content }}				
				    	</h6>
						<small>{{ $comment->user->name  }}</small>
					</blockquote>
					@endforeach
		           	<!--	end comment block	-->

		           				</div>
		           				<!--	panel body end -->



		           			<!--	panel footer block	-->
		           				<div class="panel-footer">

		           					<div class="comment_box">
		           					</div>
		           					
									    <div class="input-group">
									      <input type="hidden" id="post_id" value="{{ $posts->id }}">
									      <input type="text" class="form-control" placeholder="post comment" id="comment_content">
									      <span class="input-group-btn">
									        <button class="btn btn-primary" type="button" id="post_comment">comment</button>
									      </span>
									    </div><!-- /input-group -->
									
	           				

	           					</div>	           					

		           	<!--	panel footer end	-->

	           		</div>																
	           		</div>
	           		
					@endforeach
					<div class="col-md-10">	         		           						     
				           			<button class="btn btn-success btn-sm btn-block">load more</button>
				    </div>
					@else
					<div class="col-md-10">
	           			<div class="panel panel-primary">
	           				<div class="panel-body">	           						       
	           					<h2>No recent posts.</h2>
	           				</div>
	           			</div>
	           		</div>		
	           		@endif
	           		<!--  modal  -->
	           		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModal">
					  <div class="modal-dialog">
					    <div class="modal-content">
					    	<div class="modal-body">
					    		comment has been posted!
					  		</div>
					    </div>
					  </div>
					</div>
					<!--  modal end  -->

	           				
			</div> <!--end of profile content -->
		</div>		
		</div> <!--end of row profile-->
	</div> <!--end of container-->
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('/js/javascripts/jquery.cssemoticons.js') }}"></script>
	<script type="text/javascript">
		
		/*
		*	javascript block
		**
		*/

		$(document).ready(function(){
			
			/*
			* emoticonize content of the page
			**
			*/
		
			$('.container').emoticonize({
				
				animate: false,
				
			});

			$(document).on('click','#post_comment', function(e){

				e.preventDefault();	
				
				var content = $(this).closest('.input-group').children('#comment_content').val();
				
				var post_id = $(this).closest('.input-group').children('#post_id').val();
				
				var element = this;

				console.log(post_id);
				$.ajax({

					url: 'ajax/postcomment',
	                type: 'post',

					data: {  
					   "_token": "{{ csrf_token() }}",
						content : content,
						id : post_id,
					},
	                	success : function(){
	                		
	                		/*
							*	append new comment to comment box
							**
							*/
							
	                		$(element).closest('.panel').children('.panel-body').append('<blockquote><h6> <img src="{{asset('img/'.Auth::user()->profile_pic)}}" class="media-object pull-left">'+ content +'</h6><small>{{ Auth::user()->name }}</small></blockquote>');
	                		
	                		$(element).closest('.input-group').children('#comment_content').val('');

	                		$('#myModal').modal('show');

	                	}

				});

			});///

			

		});


	</script>
@endsection											