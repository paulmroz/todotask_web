@extends('layouts.master')

@section('content')
<form class="box" method="POST" action="/tasks">
	{{ csrf_field() }}

	<label class="filed_title_text">Title:</label>
	<div class="log_in_fields has-addon{{ $errors->has('title') ? ' has-error' : '' }}">
		<input id="title" type="text" class="control-field" name="title" required  placeholder="{{ $errors->first('title') }}">   
	</div>    


	<label class="filed_title_text">Description:</label>
	<div class="log_in_fields has-addon{{ $errors->has('body') ? ' has-error' : '' }}">
		<textarea id="body" type="text" class="control-field" name="body" required  placeholder="{{ $errors->first('body') }}"></textarea>
	</div>   


	<label class="filed_title_text">Tag:</label>
	<p>Add tags separated by coma (',') or dot ('.') e.g: 'cats,dogs,house...'</p>
	<div class="log_in_fields has-addon{{ $errors->has('tag') ? ' has-error' : '' }}">
		<input type="text" name="tags" class="control-field">
	</div> 

	

	<button type="submit" class="user_button">
		Add Task
	</button>

	{{-- @include('layouts.error') --}}


</form>
@endsection