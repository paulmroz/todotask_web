<div class="sidebar-column">
	<div class="archives">
		<h3>Archives:</h3>
		@foreach($archives as $archive)
			<p><a href="/tasks?month={{$archive->month}}&year={{$archive->year}}">
				{{ $archive->month.' '. $archive->year}}
			</a></p>
		@endforeach
		<h3>Tags:</h3>
		@foreach($tags as $tag)
			<p><a href="/tasks/tags/{{$tag}}">
				#{{ $tag }}
			</a></p>
		@endforeach
	</div>
</div>