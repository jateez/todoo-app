@extends('layouts.app')

@section('content')
    <h1>Daftar Grup</h1>
    <ul>
        @foreach ($groups as $group)
            <li>
                <a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a>
                <form method="POST" action="{{ route('groups.delete', $group) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
