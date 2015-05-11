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
	posted {{{ Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans() }}}
	<div class="clearfix"></div>


	

		<article> 
			
			
				
			
				<div class="body">
						<p style="font-size: 20px;">	{{  $article->content  }}
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
				</div>
			</article>
			
				<span class="glyphicon glyphicon-thumbs-up"> like
				</span>
				<span class="glyphicon glyphicon-flag">flag</span>
			<div class="clearfix"></div>
			<hr>
		

					<div class="col-md-6">
	           				<div class="panel panel-primary">
	           				<div class="panel-heading"
	           					<small>Post comment..</small>
	           				</div>
	           				<div class="panel-body">
	           					<textarea class="form-control" rows="6"></textarea></div>
	           					<div class="panel-footer">
	           					
	           							<button class="btn btn-primary">
	           							post
	           							</button>
	           					
	           					</div>
	           				</div>
	           		</div>
		          <div class="clearfix"></div>

	           	<h3>Comments</h3>
	           	<br>
				<div class="col-md-12">

				<div class="bs-example" data-example-id="media-list">
			    <ul class="media-list">
			      <li class="media">
			        <div class="media-left">
			          <a href="#">
			            <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
			          </a>
			        </div>
			        <div class="media-body">
			          <h4 class="media-heading">earl </h4><small>posted: 5 mins ago</small>
			          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
			          <!-- Nested media object -->
			          <div class="media">
			            <div class="media-left">
			              <a href="#">
			                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
			              </a>
			            </div>
			            <div class="media-body">
			              <h4 class="media-heading">earl heading</h4><small>posted: 5 minutes ago</small>
			              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
			              <!-- Nested media object -->
			              <div class="media">
			                <div class="media-left">
			                  <a href="#">
			                    <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
			                  </a>
			                </div>
			                <div class="media-body">
			                  <h4 class="media-heading">earl heading</h4>
			                  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
			                	<!-- Nested media object -->
						          <div class="media">
						            <div class="media-left">
						              <a href="#">
						                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
						              </a>
						            </div>
						            <div class="media-body">
						              <h4 class="media-heading">earl heading</h4>
						              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
						            </div>
						            <!-- Nested media object -->
							        <div class="media">
							            <div class="media-left">
							              <a href="#">
							                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
							              </a>
							            </div>
							            <div class="media-body">
							              <h4 class="media-heading">earl heading</h4>
							              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
							            </div>
			                		</div>
			                		<!-- end of nested media -->
			              			</div>
			            </div>
			          </div>
			          <!-- Nested media object -->
			          <div class="media">
			            <div class="media-left">
			              <a href="#">
			                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
			              </a>
			            </div>
			            <div class="media-body">
			              <h4 class="media-heading">earl heading</h4>
			             <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
			              <!-- Nested media object -->
							        <div class="media">
							            <div class="media-left">
							              <a href="#">
							                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
							              </a>
							            </div>
							            <div class="media-body">
							              <h4 class="media-heading">earl heading</h4>
							              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
							            </div>
			                		</div>
			              <!-- end of nested media -->
			            </div>
			          </div>
			        </div>

			      </li>
			      <!-- Nested media object -->
							        <div class="media">
							            <div class="media-left">
							              <a href="#">
							                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
							              </a>
							            </div>
							            <div class="media-body">
							              <h4 class="media-heading">earl heading</h4>
							              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
							            <!-- Nested media object -->
							        <div class="media">
							            <div class="media-left">
							              <a href="#">
							                <img class="media-object" src="{{ asset('img/user.png') }}" alt="Generic placeholder image">
							              </a>
							            </div>
							            <div class="media-body">
							              <h4 class="media-heading">earl heading</h4>
							              <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p><p><i class="glyphicon glyphicon-thumbs-up"></i> <i class="glyphicon glyphicon-flag"></i></p><hr>
							            </div>
			                		</div>
			                		<!-- end of nested media -->
							            </div>
			                		</div>
			                		<!-- end of nested media -->
			    </ul>
			  </div>
			</div>

	
	

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