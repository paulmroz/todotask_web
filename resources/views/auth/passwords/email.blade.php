@extends('layouts.master')

@section('content')
<form class="box" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="log_in_fields has-addon{{ $errors->has('email') ? ' has-error' : '' }}">
        <span class="control-addon">
            <i class="fas fa-envelope"></i>
        </span>
        <input id="email" type="email" class="control-field" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">
     </div> 
    <button type="submit" class="user_button">
     Send Password Reset Link
    </button>
</form>       
@endsection
