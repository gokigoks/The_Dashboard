<?php use Carbon\Carbon; ?>
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
							<a href="{{ url('home') }}">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		
		<div class="col-md-9">	
           	<div class="profile-content">
	           		
	           		<div class="col-md-12">
	           			<div class="panel panel-primary">
	           				<div class="panel-heading">
	           					<h4>Account Settings</h4>
	           				</div>
	           				<div class="panel-body">
	       						@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
	           					
	           						
	           						
	           						 {{ $user->profile_pic }}
									  
									  {!! Form::model($user, [ 'method' => 'post' ,'url' => 'user/settings','files'=>'true' ,'class'=>'form-horizontal']) !!}
									  
									  <fieldset>
									   <br>
									    <!-- block for file upload -->
									    <div class="form-group">									    	
											 <label for="inputPassword" class="col-lg-2 control-label">change profile picture</label>
									     	 <div class="col-lg-10">									     									        
									          <label>
									            <span class="btn btn-default btn-file">
											  	  Browse {!! Form::file('image','',array('id'=>'','class'=>'form-control')) !!}
												</span>
									          </label>									        
									      </div>
									    </div>
									    <!-- block for file upload -->
									    <div class="form-group">
									      <label for="inputName" class="col-lg-2 control-label">Name</label>
									      <div class="col-lg-10">
									       {!! Form::text('name', null, ['class' => 'form-control']) !!}
									      </div>
									    </div>
									    <div class="form-group">
									      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
									      <div class="col-lg-10">
									        {!! Form::text('email', null, ['class' => 'form-control']) !!}
									      </div>
									    </div>
										<div class="form-group">
									      <label for="inputAbout" class="col-lg-2 control-label">about me</label>
									      <div class="col-lg-10">
									        {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
									      </div>
									    </div>									    
									   
									   
									   
									  </fieldset>										           				
	           				</div>
	           				<div class="panel-footer">
	           					
	           					{!!  Form::submit('save changes',array('class'=>'btn btn-success')) !!}
	           				</div>
	           				{!! Form::close() !!}
	           			</div>
	           		</div>

			</div> <!--end of profile content -->
		</div>		
		</div> <!--end of row profile-->
	</div> <!--end of container-->
@endsection