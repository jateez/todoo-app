@extends('layouts.app')

@section('content')
<div class="container">
<h1>Create New Group</h1>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Group Name:</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Input group name here" required>
        <br>
        <label for="description">Group Description:</label>
        <br>
        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
    </div>
    <br>
    <button class="btn btn-primary" type="submit">Create New Group</button>
</form>
<br><br>    
</div>

@endsection