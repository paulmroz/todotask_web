@extends('layouts.master')
@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
    <link href="path/to/lightbox.css" rel="stylesheet">

@endsection
@section('content')
<div class="box-main-content">
    <div class="main_text">
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing <strong>eiusmod</strong></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et.</p>
        </div>
        
        <div class="main_photo">
            <div class="fotorama" data-autoplay="true">
                @foreach($photos as $photo)
                    <img src="storage/photos/{{$photo->photo}}">
                @endforeach
            </div>
        </div>
</div>
@endsection


