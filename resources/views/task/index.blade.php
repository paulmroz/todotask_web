@extends('layouts.master')

@section('content')
<div class="box-main-content">
	<h1 class="header-title">Your all added Tasks.</h1>
	<hr>
	<div class="tasks-column">
		@foreach($tasks as $task)
		<div class="single-task">
			<h3><a href="/tasks/{{$task->id}}">{{$task->title}}</a></h3>
			<p>{{$task->body}}</p>
		</div>	
		@endforeach
		{{ $tasks->links() }}
	</div>
</div>
@include('layouts.sidebar')
@endsection