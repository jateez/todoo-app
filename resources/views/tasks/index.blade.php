@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center" >Task Manager</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>
        <div class="dropdown" style="float:right">
            <button class="btn btn-primary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Sort By
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                <li><a class="dropdown-item" href="{{ route('tasks.index', ['sort_by' => 'priority']) }}">Priority</a></li>
                <li><a class="dropdown-item" href="{{ route('tasks.index', ['sort_by' => 'due_date']) }}">Due Date</a></li>
            </ul>
        </div>




        @if(count($tasks) > 0)
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
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->updated_at }}</td>
                            <td>{{ $task->due_date}}</td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-primary">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tasks found.</p>
        @endif
    </div>
@endsection
