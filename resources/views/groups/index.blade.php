@extends('layouts.app')

@section('content')

<div class="container">
    @if (Auth::check())
    <!-- Display authenticated user-specific content here -->
    @foreach ($groups as $group)
    <h1>{{ $group->name }}</h1>
    <p>{{ $group->description }}</p>
    @endforeach
    @else
    <!-- Display content for non-authenticated users here -->
    <p>Please log in to view the groups.</p>
    @endif




    <form>
        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" id="name" placeholder="Input task name here" required>
        </div>
        <div class="form-group">
            <label for="description">Task Description</label>
            <input type="text" class="form-control" id="description" placeholder="Write task detail here">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control" required>
                    <option value="Urgent">Urgent</option>
                    <option value="Normal">Normal</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="due_date">State</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date ?? '' }}">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">+ Add Task</button>
    </form>

    <br>
    @isset($group)
    <p>Kode Grup: <span id="groupCode">{{ $group->joincode }}</span></p>


    <button onclick="copyGroupCode()">Copy</button> <br> <br>

    @if (Auth::user()->id === $group->user_id)
    <form method="POST" action="{{ route('groups.delete', $group) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
    </form>
    @else
    <form method="POST" action="{{ route('groups.leave') }}" style="display: inline;">
        @csrf
        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to leave this group?')">Leave</button>
    </form>
    @endif


    <!-- <form method="POST" action="{{ route('groups.delete', $group) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        @if (Auth::user()->id === $group->user_id)
        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this group?')">Delete</button>
        @else
        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to leave this group?')">Leave</button>
        @endif
    </form> -->
    @endisset
    @isset($group)
    <!-- tambahkan rute -->
    <form method="POST" action="{{ route('groups.update', $group) }}" style="display: inline;">
        @csrf
        @method('PUT')
        <button class="btn btn-light" type="submit">Edit</button>
    </form>
    @endisset

</div>

<a href=""></a>

<script>
    function copyGroupCode() {
        const groupCode = document.getElementById('groupCode');
        const tempInput = document.createElement('input');
        tempInput.value = groupCode.textContent;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('Kode Grup telah disalin!');
    }
</script>
@endsection