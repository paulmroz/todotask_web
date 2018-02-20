<div class="sidebar-column">
	<div class="archives">
		<h3>Archives</h3>
		@foreach($archives as $archive)
			<p><a href="/tasks?month={{$archive->month}}&year={{$archive->year}}">
				{{ $archive->month.' '. $archive->year}}
			</a></p>
		@endforeach
	</div>
</div>