@extends('layouts.master')

@section('content')

<form class="box" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    { <input type="hidden" name="token" value="{{ $token }}"> 

   {{--  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    --}}
      <div class="log_in_fields has-addon{{ $errors->has('email') ? ' has-error' : '' }}">
        <span class="control-addon">
            <i class="fas fa-envelope"></i>
        </span>
        <input id="email" type="email" class="control-field" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="E-Mail Address">
     </div> 

     <div class="log_in_fields has-addon{{ $errors->has('password') ? ' has-error' : '' }}">
        <span class="control-addon">
            <i class="fas fa-key"></i>
        </span>
        <input id="password" type="password" class="control-field" name="password" required placeholder="Password">
     </div> 

       <div class="log_in_fields has-addon{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <span class="control-addon">
            <i class="fas fa-unlock"></i>
        </span>
        <input id="password-confirm" type="password" class="control-field" name="password_confirmation" required placeholder="Password Confirmation">
     </div> 

     <button type="submit" class="user_button">
        Reset Password
    </button>
</div>
</form>

@endsection
