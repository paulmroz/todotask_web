@extends('layouts.master')

@section('content')
<div class="box-main-content">
	<div class="tasks-column">

		<div class="single-task">
			<h1>{{$task->title}}</h1>
			<hr>
			<p>{{$task->body}}</p>
		</div>	

	</div>
</div>
@endsection