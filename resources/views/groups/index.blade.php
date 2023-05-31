@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row" style="display:inline-block">
        @isset($group)
        <h1>{{ $group->name }}</h1>

        <form action="{{ route('groups.showMembers', ['group' => $group->id]) }}" method="GET">
            @csrf
            <button type="submit">Show Group Members</button>
        </form>


        @if(isset($showMembers) && $showMembers)
        <div>
            <h3>Group Members:</h3>
            <ul>
                @foreach($group->creator->group->users as $member)
                <li>{{ $member->name }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
    <p>{{ $group->description }}</p>
    @endisset



    <form action="{{ route('taskgroups.store', $group) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input task name here" required>
        </div>
        <div class="form-group">
            <label for="description">Task Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Write task detail here">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control" required>
                    <option value="Urgent">Urgent</option>
                    <option value="Normal">Normal</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="due_date">Due Date</label>
                <!-- New -->
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}">
                <!-- Old -->
                <!-- <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $taskGroup->due_date ?? '' }}"> -->
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>




    <!-- menampilkan tasks group -->
    @if(isset($taskGroup) && count($taskGroup) > 0)
    <table class="table styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($taskGroup as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
                <td>{{ $task->due_date}}</td>
                <td>
                    <a href="{{ route('taskGroup.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('taskGroup.destroy', $task->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No tasks found.</p>
    @endif


    <!-- menampilkan tasks group -->


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