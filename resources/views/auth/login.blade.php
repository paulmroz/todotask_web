 @extends('layouts.master')

 @section('content')

    <form class="box" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                
                    <div class="log_in_fields has-addon">
                        <span class="control-addon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" class="control-field" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Adress"> 
                    </div>     
            
                    <div class="log_in_fields has-addon">
                        <span class="control-addon">
                            <i class="fas fa-unlock"></i>
                        </span>
                        <input id="password" type="password" name="password" required class="control-field" placeholder="Password">  
                    </div>
                   
               
                <div class="checkbox">
                     <label>
                       <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                 <button type="submit" class="user_button">
                     Login
                </button>

                <a class="btn-link" href="{{ route('password.request') }}">
                   Forgot Your Password?
                 </a>
            </form>
 @endsection