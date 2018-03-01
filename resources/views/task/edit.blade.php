@extends('layouts.master')

@section('content')
<form class="box" method="POST" action="/tasks/{{$task->id}}">
	{{ csrf_field() }}
	{{ method_field('PATCH')}}
	<label class="filed_title_text">Title:</label>
	<div class="log_in_fields has-addon">
		<input id="title" type="text" class="control-field" name="title" required  placeholder="{{$task->title}}">   
	</div>    


	<label class="filed_title_text">Description:</label>
	<div class="log_in_fields has-addon">
		<textarea id="body" type="text" class="control-field" name="body" required  placeholder="{{$task->body}}"></textarea>
	</div>   


	<button type="submit" class="user_button">
		Save edit
	</button>

	 @include('layouts.error')


</form>
@endsection