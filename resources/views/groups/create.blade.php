@extends('layouts.app')

@section('content')
<h1>Buat Grup Baru</h1>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Group Name:</label>
        <input type="text" name="name" id="name" required>
        <br> <br>
        <label for="description">Group Description:</label>
        <br>
        <textarea name="description" id="description" rows="4" required></textarea>
    </div>
    <br>
    <button type="submit">Buat Grup</button>
</form>
<br><br>
@endsection