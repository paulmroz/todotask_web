@extends('layouts.master')

@section('content')
<div class="box">
	<h1>{{$user->name}} Profile</h1>
	<br>
	<img src="/storage/avatars/{{\Auth::user()->avatar}}" style="width:150px; height:150px; border-radius: 50%">
	<h2><label>Are you sure you want to delete your account?</label></h2>
	<div class="delete_account_buttons">	
		<form method="post" action="/profile/destroy" >
			{{ csrf_field() }}
			<button type="submit" class="user_button">
				Yes
			</button>
		</form>
		<button type="submit" class="user_button">
				No
		</button>
		
	</div>


</div>

@endsection