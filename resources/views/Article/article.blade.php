<?php use Carbon\Carbon; ?>

@extends('Article.base')

@section('content')
<div class="box" style="background-image:url({{ asset('img/dashboard.jpg') }});">
        <div class="row">
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar">
                <a class="logo" href="#">D</a>
                <ul class="nav">
                    <li class="active"><a href="#featured">Featured</a>
                    </li>
                    <li><a href="#stories">Travel</a>
                    </li>
                    <li><a href="#stories">Food	</a>
                    </li>
                </ul>
                <ul class="nav hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="http://www.bootply.com"><h3>The Dashboard</h3></a>
                      ©Copyright Inc.
                    </li>
                </ul>
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->
						<h3 class="page-header text-muted">Threads
						<a href="{{ url('article/create') }}">
							<span class="btn btn-md btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> thread</span>
						</h3>
					</a>
					{!! $articles->render() !!}
					 <div class="row divider">    
                   <div class="col-sm-12"><hr></div>
                </div><div class="row">  

					@foreach ($articles as $article)					
				<div class="row">    

                  <div class="col-sm-10">
                    <h3 id="hello"><a href="{{ action('ArticleController@show', [$article->id])  }}">{{  $article->title  }} </a></h3>
                    <h4><span class="label label-default">by {{ $article->name }}</span></h4><h4>
                    <small class="text-muted">{{{ Carbon::createFromTimeStamp(strtotime($article->updated_at))->diffForHumans() }}} • <a href="{{ action('ArticleController@show', [$article->id])  }}" class="text-muted">Read More</a></small>
                    </h4>
                  </div>
                  <div class="col-sm-2">
                    <a href="#" class="pull-right"><img src="{{ asset('img/'.$article->profile_pic) }}" class="img-circle"></a>
                  </div> 
                </div>
                
                <div class="row divider">    
                   <div class="col-sm-12"><hr></div>
                </div><div class="row">  
          
		
		@endforeach
                        
                        <div class="col-sm-12">
                          <div class="page-header text-muted divider">
                            Up Next
                          </div>
                        </div>
                      
                        <div class="row">    
                          <div class="col-sm-4 text-center">
                            <h4>Related 1</h4>
                            <a href="#"><img src="//placehold.it/400/f0f0f0" class="img-respsonsive img-circle"></a>
                          </div>
                          <div class="col-sm-4 text-center">
                            <h4>Related 2</h4>
                            <a href="#"><img src="//placehold.it/400/f0f0f0" class="img-respsonsive img-circle"></a>
                          </div>
                          <div class="col-sm-4 text-center">
                            <h4>Related 3</h4>
                            <a href="#"><img src="//placehold.it/400/f0f0f0" class="img-respsonsive img-circle"></a>
                          </div>
                        </div>
                      
                      
                        <div class="col-sm-12">
                          <div class="page-header text-muted divider">
                            Connect with Us
                          </div>
                        </div>
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                          </div>
                        </div>
                        
                        <hr>
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <a href="{{ url('auth/logout') }}" class="pull-right">
                            	<button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-user">
                            </span> log out </button></a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                      <h3 class="text-center">
                      
                      <h4 class="text-muted pull-right"</h4>
                      </h3>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
        </div>
    </div>
					
		{!! $articles->render() !!}
			

			

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