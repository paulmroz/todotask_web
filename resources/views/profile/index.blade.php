@extends('layouts.master')

@section('content')
<div class="box">
	<h1>{{$user->name}} Profile</h1>
	<br>
	<img src="storage/avatars/{{\Auth::user()->avatar}}" style="width:150px; height:150px; border-radius: 50%">
	<h2><label>Update Profile Image:</label></h2>
	<form method="post" action="profile" enctype="multipart/form-data">
		{{ csrf_field() }}
		<br>
		<input type="file" name="avatar">
		<button type="submit" class="user_button">
			Upload avatar
		</button>
	</form>
	<br>
	<h2><label>Change Password:</label></h2>
	<form method="post" action="/profile/password/reset">
		{{ csrf_field() }}
		<label class="filed_title_text">Old Password:</label>
		<div class="log_in_fields has-addon">
			<input id="title" type="password" class="control-field" name="password_old" required>   
		</div>  

		<label class="filed_title_text">New Password:</label>
		<div class="log_in_fields has-addon">
			<input id="title" type="password" class="control-field" name="password" required>   
		</div>  

		<label class="filed_title_text">Confirm New Password:</label>
		<div class="log_in_fields has-addon">
			<input id="title" type="password" class="control-field" name="password_confirmation" required>   
		</div>  
		<button type="submit" class="user_button">
			Change Password
		</button>
	</form>
</div>
@endsection