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
		@auth
			<a href="/tasks" class="nav-item">My Tasks</a>
			<a href="/tasks/create" class="nav-item">Add task</a>
		@endauth
		<a href="/contact" class="nav-item">Contact</a>
		<a href="/gallery" class="nav-item">Gallery</a>
	</div>
	<div class="nav-left">
		 @if(!Auth::check())
			 <a href="{{ route('login') }}" class="nav-item">Login</a>
			 <a href="{{ route('register') }}" class="nav-item">Register</a>
		 @endif

		 @auth
		 	<a href="{{ route('logout') }}" class="nav-item">Logout</a>
		 @endauth
		
	</div>
</nav>
@endif