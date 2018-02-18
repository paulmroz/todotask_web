@section('scripts')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@if (Route::has('login'))
<nav>
	<div class="nav-left">
		<a href="{{ url('/') }}" class="nav-item">
			<i class="fa fa-home" aria-hidden="true">	 
			</i> 		
			Home		
		</a>
		<a href="#" class="nav-item">About</a>
		<a href="#" class="nav-item">Services</a>
	</div>
	<div class="nav-left">
		 @if(!Auth::check())
			 <a href="{{ route('login') }}" class="nav-item">Login</a>
			 <a href="{{ route('register') }}" class="nav-item">Register</a>
		 @endif

		 @if(Auth::check()) 
		 	{{-- <a href="{{ route('logout') }}" class="nav-item">Logout</a> --}}
		 	<a href="/logout" class="nav-item">Logout</a>
		  @endif
		
	</div>
</nav>
@endif