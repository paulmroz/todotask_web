@extends('layouts.master')

@section('content')
<div class="box-main-content">
	<div class="main_photo">
		<div class="delete_box">
			@foreach($photos as $photo)
				<div class="delete_box_row"> 
					<img src="/storage/photos/{{$photo->photo}}">
					@auth
					<div class="delete_button">
						<form method="POST" action="/gallery/{{$photo->id}}">
							{{ csrf_field() }}
							{{ method_field('DELETE')}}
							<button type="delete">Delete</button>	
						</form>
					</div>
					@endauth
				</div>
			@endforeach
		</div>
	</div>
	{{$photos->appends(Request::except('page'))->links()}}
</div>
@endsection