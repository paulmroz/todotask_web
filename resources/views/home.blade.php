@extends('layouts.master')

@section('content')

<div class="main_text">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <h3>Your task here.</h3>
</div>

@endsection
