 @extends('layouts.master')

 @section('content')

    <form class="box"  method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                    <div class="log_in_fields has-addon{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span class="control-addon">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="name" type="text" class="control-field" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                    </div>

                    <div class="log_in_fields has-addon{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="control-addon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" class="control-field" name="email" value="{{ old('email') }}" required placeholder="Email Adress"> 
                    </div>     
            
                    <div class="log_in_fields has-addon{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="control-addon">
                            <i class="fas fa-key"></i>
                        </span>
                        <input id="password" type="password" name="password" required class="control-field" placeholder="Password">

                    </div>


                    <div class="log_in_fields has-addon">
                        <span class="control-addon">
                            <i class="fas fa-unlock"></i>
                        </span>
                         <input id="password-confirm" type="password" class="control-field" name="password_confirmation" required placeholder="Password Confirm"> 
                    </div>
                    
                     <button type="submit" class="user_button">
                         Register
                    </button>

                    @include('layouts.error')

              
            </form>
 @endsection