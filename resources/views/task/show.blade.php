@extends('layouts.master')

@section('content')
@if($flash = session('message'))
		<div id="flash-message">
			{{$flash}}
		</div>
	@endif
<div class="box-main-content">
	
	<div class="tasks-column">

		<div class="single-task">
			<h1 class="header-title">{{$task->title}}</h1>
			
			<p>{{$task->body}}</p>
			<h2>Tags:</h2>
			@if(count($task->tags))
				<ul class="tags_links">
					@foreach($task->tags as $tag)
						<li>
							<a class="tags_links" href="/tasks/tags/{{$tag->name}}">
								#{{$tag->name}}
							</a>
						</li>	
					@endforeach
				</ul>
			@endif
		</div>	
		<div class="task-notes">
			@if(count($task->notes))
			<h2 class="header-title">Notes:</h2>
			@foreach($task->notes as $note)
			<span class="note-body"><i>{{$note->body}}</i></span>
			@endforeach
			@endif
		</div>

		<form class="box" method="POST" action="/tasks/{{$task->id}}/notes">
			{{ csrf_field() }}

			<label class="filed_title_text">Note:</label>
			<div class="log_in_fields has-addon{{ $errors->has('note') ? ' has-error' : '' }}">
				<input id="body" type="text" class="control-field" name="body" required  placeholder="{{ $errors->first('body') }}">  </div>    
			<button type="submit" class="user_button">
				Add Note
			</button>
		</form>
	</div>
</div>
@include('layouts.sidebar')

@endsection