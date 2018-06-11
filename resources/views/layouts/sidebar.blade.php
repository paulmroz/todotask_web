<div class="sidebar-column">
	<div class="archives">
		<h3>Archives <i class="fas fa-archive"></i></h3>
		@foreach($archives as $archive)
			<p><a href="/tasks?month={{$archive->month}}&year={{$archive->year}}">
				{{ $archive->month.' '. $archive->year}}
			</a></p>
		@endforeach
		<h3>Your all tags <i class="fas fa-tags"></i></h3>
		<div class="all_tags">
			@foreach($tags as $tag => $number)
				<a href="/tasks/tags/{{$tag}}">#{{$tag}}({{$number}})</a>
			@endforeach 
		</div>
	</div>
</div>