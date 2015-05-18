@extends('app')

@section('content')
<div class="col-lg-9">
<div class="panel panel-default">
	<div class="panel-heading"><h4>{{ $group->name }}</h4>
	</div>
	<div class="panel-body">
		@foreach($users as $member)
			
			<p> {{ $member->name }} </p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		@endforeach
	</div>
	<div class="panel-footer">
		
</div>
</div>

</div>
<div class="col-lg-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			announcement.. 
		</div>
		<div class="panel-body">
			<p> hello all. just wanna say hi and keep cleaning through the flagged posts. have a nice weekend</p>
			5 minutes ago
		</div>
		<div class="panel-footer">
			posted by : Goks
		</div>
	</div>
</div>

<div class="col-lg-3 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">
			members 
		</div>
		
			<ol class="list-group">
			<li class="list-group-item"><a href="#"> <p>goks <span class="badge">12<span></p> </a></li>
			<li class="list-group-item"><a href="#"><p>jords </p></a></li>
			<li class="list-group-item"><a href="#"><p>asdasd </p></a></li>
			<li class="list-group-item"><a href="#"><p>goks </p></a></li>
			</div>
			

	</div>
</div>

	
@endsection()