@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <h4>Hi, {{ Auth::user()->name }}</h4>
            <h6>Welcome to the Todoo App</h6>
            <img src="{{ asset('images/bunnies_logo.png') }}" alt="">
        </div>
        <div>
            @if (Route::has('groups.index'))
            @auth
            @if (auth()->user()->group)
            <a href="{{ route('groups.index') }}" class="btn btn-primary">
                View {{ auth()->user()->group->name }}
            </a>
            @else
            <a href="{{ route('groups.create') }}" class="btn btn-primary">
                Create Group
            </a>
            <a href="{{ route('groups.joinform') }}" class="btn btn-primary">
                Join Group
            </a>

            @endif
            @endauth
            @endif


        </div>
    </div>
</div>
<div class="my-5 py-5">

</div>
</div>
@endsection