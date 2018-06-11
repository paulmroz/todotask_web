@section('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@if (Route::has('login'))
<header>
	{{-- <a href="#" class="menu"><i class="fas fa-bars"></i></a> --}}
{{-- 	<nav id="main_nav">
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
	</nav> --}}

	<nav class="top">

		<ul class="nav_links">
			<li>
				<a href="{{ url('/') }}" class="nav-item">
					<i class="fa fa-home" aria-hidden="true">	 
					</i> 		
					Home		
				</a>
			</li>
			<li>
				<a href="/contact" class="nav-item">Contact</a>
				<a href="/gallery" class="nav-item">Gallery</a>
			</li>
		</ul>
		<ul class="nav_links">
			<li>
				@if(!Auth::check())
				<a href="{{ route('login') }}" class="nav-item">Login <i class="fas fa-sign-in-alt"></i></a>
				<a href="{{ route('register') }}" class="nav-item">Register</a>
				@endif
			</li>
		</ul>
		<div class="dropdownBackground">
			<span class="arrow"></span>
		</div>
		@auth
		<ul class="cool">
			<li>
				<a href="#">Menu <i class="fas fa-chevron-circle-down"></i></a>
				<ul class="dropdown dropdown2">
					<li><a href="/tasks" class="button">My Tasks <i class="fas fa-eye"></i></a></li>
					<li><a href="/tasks/create" class="button">Add task <i class="fas fa-plus"></i></a></li>
					<li><a href="{{ route('logout') }}" class="button">Logout <i class="fas fa-sign-out-alt"></i></a></li>
         			{{-- <li><a class="button" href="http://twitter.com/wesbos">Twitter</a></li>--}}
      			</ul>
  			</li>
		</ul>
		@endauth
</nav>
</header>
<script>
/*	const triggers = document.querySelectorAll('.cool > li');
	const background = document.querySelector('.dropdownBackground');
	const nav = document.querySelector('.top');

	function handleEnter() 
	{
		this.classList.add('trigger-enter');
		setTimeout(()=>{
			if(this.classList.contains('trigger-enter')){
				this.classList.add('trigger-enter-active')
			}  
		}, 150)
		background.classList.add('open');

		const dropdown = this.querySelector('.dropdown');
		const dropdownCoords = dropdown.getBoundingClientRect();
		const navCoords = nav.getBoundingClientRect();

		const coords = {
			height: dropdownCoords.height,
			width: dropdownCoords.width,
			top: dropdownCoords.top - navCoords.top - 25,
			left: dropdownCoords.left - navCoords.left - 20,
		};

		background.style.setProperty('width', `${coords.width}px`);
		background.style.setProperty('height', `${coords.height}px`);
		background.style.setProperty('transform', `translate(${coords.left}px, ${coords.top}px)`);
	}

	function handleLeave()
	{
		this.classList.remove('trigger-enter-active');
		this.classList.remove('trigger-enter');
		background.classList.remove('open');
	}

	triggers.forEach(trigger => trigger.addEventListener('mouseenter', handleEnter));
	triggers.forEach(trigger => trigger.addEventListener('mouseleave', handleLeave));*/

</script>
@endif