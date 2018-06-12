@extends('layouts.master')

@section('content')
<div class="box">
	<h1>{{$user->name}} Profile</h1>
	<img src="storage/avatars/{{\Auth::user()->avatar}}" style="width:150px; height:150px; border-radius: 50%">
	<h4><label>Update Profile Image:</label></h4>
	<form method="post" action="profile" enctype="multipart/form-data">
		{{ csrf_field() }}
		<br>
		<input type="file" name="avatar">
		<button type="submit" class="user_button">
			Upload avatar
		</button>
	</form>
</div>
@endsection