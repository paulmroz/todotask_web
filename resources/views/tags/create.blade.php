@extends('layouts.master')

@section('content')
	<form class="box" method="POST" action="/tags">
	{{ csrf_field() }}
	<label class="filed_title_text">Name:</label>
	<div class="log_in_fields has-addon{{ $errors->has('name') ? ' has-error' : '' }}">
		<input id="name" type="text" class="control-field" name="name" required  placeholder="{{ $errors->first('name') }}">   
	</div>    
	<button type="submit" class="user_button">
		Add Tag
	</button>
{{-- @include('layouts.error') --}}
</form>

@if($flash = session('message'))
		<div id="flash-message">
			{{$flash}}
		</div>
	@endif
@endsection