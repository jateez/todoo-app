@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 py-5">
        <div>
            <h1>Welcome to the Todoo App</h1>
            <img src="{{ asset('images/bunnies_logo.png') }}" alt="">
        </div>
        <div>
            <form action="{{ route('groups.index') }}">
                <input type="submit" value="View Groups" />
            </form>
            <br><br><br><br>
            <form action="{{ route('groups.create') }}">
                <input type="submit" value="Create a Group" />
            </form>
            <!-- <a href="{{ route('groups.index') }}">1. View Groups</a> -->
            <br> <br> <br>
            <!-- <a href="{{ route('groups.create') }}">2. Create a Group</a> -->
        </div>
    </div>
</div>
@endsection