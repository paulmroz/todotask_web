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
			<h3><a id="task_{{$task->id}}" href="/tasks/{{$task->id}}">{{$task->title}}</a></h3>
			<p id="task_body_{{$task->id}}" class="body_edit_value">{{$task->body}}</p>
			@auth
			<div class="task-buttons">

				<form method="POST" action="/tasks/{{$task->id}}">	
					{{ csrf_field() }}
					<input type="text" name="title" value="{{$task->title}}">
					<input type="text" name="body" value="{{$task->body}}">
					<input type="hidden" name="id" value="{{$task->id}}">

					<input type="button" class="update-button"  data-id="{{$task->id}}" value="Update">	
					<input type="button" class="delete-button"  data-id="{{$task->id}}" value="Delete">
				</form>
				{{-- <button class="update-button" type="delete" data-id="{{$task->id}}">Update</button>	 --}}

				{{-- <form method="POST" action="/tasks/{{$task->id}}">
					{{ csrf_field() }}
	                {{ method_field('DELETE')}}
					<button class="delete-button" type="delete">Delete</button>	
				</form> --}}
			</div>
			@endauth
		</div>	
		@endforeach
		{{$tasks->appends(Request::except('page'))->links()}}
	</div>
</div>

@include('layouts.sidebar')
@endsection