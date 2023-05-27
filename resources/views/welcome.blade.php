@extends('layouts.app')

@section('content')
<div class="container">
    <div class="inner cover">
        <h1 class="cover-heading">Welcome to Todoo App</h1>
        <p class="lead">This will be the application description</p>
        <p>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
            @else
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            @endif
            @endauth
            @endif
        </p>
    </div>
</div>

@endsection