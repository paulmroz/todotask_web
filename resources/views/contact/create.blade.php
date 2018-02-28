@extends('layouts.master')

@section('content')
	@if($flash = session('message'))
		<div id="flash-message">
			{{$flash}}
		</div>
	@endif

	<form class="box" method="POST" action="/contact">
	{{ csrf_field() }}
	<h1>Do you have a question? Send us an email!.</h1>
	<label class="filed_title_text">Name:</label>
	<div class="log_in_fields has-addon{{ $errors->has('title') ? ' has-error' : '' }}">
		<input id="title" type="text" class="control-field" name="title" required  placeholder="{{ $errors->first('title') }}">   
	</div>    


	<label class="filed_title_text">Description:</label>
	<div class="log_in_fields has-addon{{ $errors->has('body') ? ' has-error' : '' }}">
		<textarea id="body" type="text" class="control-field" name="body" required  placeholder="{{ $errors->first('body') }}"></textarea>
	</div>   


	<button type="submit" class="user_button">
		Send Email
	</button>

	{{-- @include('layouts.error') --}}


</form>
	
@endsection