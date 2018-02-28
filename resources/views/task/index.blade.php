@extends('layouts.master')
@section('scripts')
	<link rel="stylesheet" type="text/css" href="/css/app.css">
@endsection
@section('content')
<div class="box-main-content">
	
	@if($flash = session('message'))
		<div id="flash-message">
			{{$flash}}
		</div>
	@endif
	
	<h1 class="header-title">Your all added Tasks.</h1>
	<hr>
	<div class="tasks-column">
		@foreach($tasks as $task)
		<div class="single-task">
			<h3><a href="/tasks/{{$task->id}}">{{$task->title}}</a></h3>
			<p>{{$task->body}}</p>
			@auth
			<form method="POST" action="/tasks/{{$task->id}}">
				{{ csrf_field() }}
                {{ method_field('DELETE')}}
				<button type="delete">Delete</button>	
			</form>
			@endauth
		</div>	
		@endforeach
		{{$tasks->appends(Request::except('page'))->links()}}
	</div>
</div>
@include('layouts.sidebar')
@endsection