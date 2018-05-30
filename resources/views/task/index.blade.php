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
		
			{{--TASK VIEW--}}
			<div class="single_task_{{$task->id}}">
				<h3><a href="/tasks/{{$task->id}}">Title:</a></h3>
				<p id="task_title_{{$task->id}}">{{$task->title}}</p>
				<h4><a href="/tasks/{{$task->id}}">Description:</a></h4>
				<p  id="task_desc_{{$task->id}}">{{$task->body}}</p>
			</div>

			{{-- UPDATE FORM --}}
			<form method="POST" action="tasks/{{$task->id}}" class="form_number_{{$task->id}} updateForm">
				{{ csrf_field() }}
				<h3>Title:</h3>
				<input type="text" name="title" value="{{$task->title}}">
				<h4>Description:</h4>
				<input type="text" name="body" value="{{$task->body}}">
				<input type="hidden" name="id" value="{{$task->id}}">	
				<button type="submit" class="updateButton" data-id="{{$task->id}}">SAVE</button>
			</form>	

			{{-- EDIT BUTTON --}}
			<button class="edit_button_{{$task->id}} toggle_edit_form" data-id="{{$task->id}}">EDIT</button>

			{{-- DELETE BUTTON --}}
			<form method="POST" action="tasks/{{$task->id}}"">
				{{ csrf_field() }}
				{{method_field('DELETE')}}
				<input type="hidden" name="id" value="{{$task->id}}">
				<button type="submit" class="deleteButton" data-id="{{$task->id}}">DELETE</button>
			</form>
			<hr>
		@endforeach
		{{$tasks->appends(Request::except('page'))->links()}}
	</div>
</div>

@include('layouts.sidebar')
@endsection