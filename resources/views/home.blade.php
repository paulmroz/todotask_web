@extends('layouts.master')

@section('content')
    <div class="box-main-content">
	    <div class="main_text">
	        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing <strong>eiusmod</strong></h1>
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
	            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
	            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
	    </div>
	     @if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
	    @endif       
	</div>
@endsection
