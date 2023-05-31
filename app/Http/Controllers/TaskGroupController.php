<?php

namespace App\Http\Controllers;

use App\Models\TaskGroup;
use Illuminate\Http\Request;

class TaskGroupController extends Controller
{
    public function index(Request $request)
    {
        return view('groups.index', compact('groups'));
    }

    public function store(Request $request)
    {
        $taskGroup = new taskGroup;
        $taskGroup->name = $request->input('name');
        $taskGroup->description = $request->input('description');
        $taskGroup->priority = $request->input('priority');
        $taskGroup->due_date = $request->input('due_date');
        $taskGroup->save();

        return redirect()->route('groups.index')->with('success', 'Task created successfully.');
    }

    public function edit(TaskGroup $taskGroup)
    {
        return view('groups.editTask', compact('taskGroup'));
    }

    public function update(Request $request, TaskGroup $taskGroup)
    {
        $taskGroup->name = $request->input('name');
        $taskGroup->description = $request->input('description');
        $taskGroup->priority = $request->input('priority');
        $taskGroup->due_date = $request->input('due_date');
        $taskGroup->save();

        return redirect()->route('groups.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(TaskGroup $taskGroup)
    {
        $taskGroup->delete();

        return redirect()->route('groups.index')->with('success', 'Task deleted successfully.');
    }
}
