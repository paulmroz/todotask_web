@section('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@if (Route::has('login'))
<header>
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
		
		@auth
		<div class="dropdownBackground">
			<span class="arrow"></span>
		</div>
		<ul class="cool">
			<li>
				<a href="#">Menu <i class="fas fa-chevron-circle-down"></i></a>
				<ul class="dropdown dropdown2">
					<li><a href="/profile" class="button">Profile <i class="fas fa-user"></i></a></li>
					<li><a href="/tasks" class="button">My Tasks <i class="fas fa-eye"></i></a></li>
					<li><a href="/tasks/create" class="button">Add task <i class="fas fa-plus"></i></a></li>
					<li><a href="{{ route('logout') }}" class="button">Logout <i class="fas fa-sign-out-alt"></i></a></li>
         			{{-- <li><a class="button" href="http://twitter.com/wesbos">Twitter</a></li>--}}
      			</ul>
  			</li>
  			<div class="avatar">
				<img src="/storage/avatars/{{\Auth::user()->avatar}}">
			</div>
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