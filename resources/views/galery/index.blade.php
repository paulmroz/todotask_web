@extends('layouts.master')

@section('content')
<div class="box-main-content">
<div class="main_photo">
        <div>
    		@foreach($photos as $photo)
    			<img src="storage/photos/{{$photo->photo}}">
    			{{-- {{dd('storage/photos/'.$photo->photo)}} --}}
    		@endforeach
        </div>

 </div>


@auth
<form class="box" method="POST" action="/gallery" enctype="multipart/form-data">
	{{ csrf_field() }}
	<label class="filed_title_text">Name:</label>
	<div class="log_in_fields has-addon{{ $errors->has('name') ? ' has-error' : '' }}">
		<input id="name" type="text" class="control-field" name="name" required  placeholder="{{ $errors->first('name') }}">   
	</div> 

	<label class="filed_title_text">Description:</label>
	<div class="log_in_fields has-addon{{ $errors->has('description') ? ' has-error' : '' }}">
		<input id="description" type="textarea" class="control-field" name="description" required  placeholder="{{ $errors->first('description') }}">   
	</div> 

	<label class="filed_title_text">Chose photo:</label>
	<div class="log_in_fields has-addon{{ $errors->has('photo') ? ' has-error' : '' }}">
		<input id="photo" type="file" class="control-field" name="photo" required  placeholder="{{ $errors->first('photo') }}">   
	</div>     

	<button type="submit" class="user_button">
		Add Photo
	</button>
{{-- @include('layouts.error') --}}
</form>
@endauth

@if($flash = session('message'))
	<div id="flash-message">
		{{$flash}}
	</div>
@endif
@endsection