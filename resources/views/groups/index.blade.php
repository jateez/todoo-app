@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <h1>List Groups</h1>
    <ul>
        @foreach ($groups as $group)
            <li>
                <a class="btn btn-success"href="{{ route('groups.show', $group) }}">{{ $group->name }}</a>
                <form method="POST" action="{{ route('groups.delete', $group) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    </div> -->

<div class="container">
    <h1>{{ $group->name }}</h1>
    <p>{{ $group->description }}</p>
    <form method="POST" action="{{ route('groups.delete', $group) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
                </form>
                <!-- tambahkan rute -->
                <form method="POST" action="" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-light" type="submit" >Edit</button>
                </form>
</div>

<a href=""></a>
@endsection