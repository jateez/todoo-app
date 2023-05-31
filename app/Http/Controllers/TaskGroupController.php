<?php

namespace App\Http\Controllers;

use App\Models\TaskGroup;
use Illuminate\Http\Request;

class TaskGroupController extends Controller
{
    public function index(Request $request)
    {
        //Nambahin dari sini
        $sortBy = $request->input('sort_by', 'priority');

        if ($sortBy == 'priority') {
            $taskGroup = TaskGroup::orderBy('priority', 'asc')->get();
        } elseif ($sortBy == 'due_date') {
            $taskGroup = TaskGroup::orderBy('due_date', 'asc')->get();
        } else {
            $taskGroup = TaskGroup::all();
        }
        //Sampai sini

        return view('groups.index', compact('taskGroup'));
    }


    public function store(Request $request)
    {
        //New

        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'priority' => 'required|integer',
            'due_date' => 'required|date',
        ]);

        // Create a new task group
        $taskGroup = TaskGroup::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
        ]);

        //Old
        // $taskGroup = new TaskGroup;
        // $taskGroup->name = $request->input('name');
        // $taskGroup->description = $request->input('description');
        // $taskGroup->priority = $request->input('priority');
        // $taskGroup->due_date = $request->input('due_date');
        // $taskGroup->save();

        return redirect()->route('groups.index')->with('success', 'Task created successfully.');
    }

    public function edit(TaskGroup $taskGroup)
    {
        return view('groups.editTask', compact('taskGroup'));
    }

    public function update(Request $request, TaskGroup $taskGroup)
    {
        //New
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'priority' => 'required|integer',
            'due_date' => 'required|date',
        ]);

        // Update the task group with the new data
        $taskGroup->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
        ]);

        //Old
        // $taskGroup->name = $request->input('name');
        // $taskGroup->description = $request->input('description');
        // $taskGroup->priority = $request->input('priority');
        // $taskGroup->due_date = $request->input('due_date');
        // $taskGroup->save();

        return redirect()->route('groups.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(TaskGroup $taskGroup)
    {
        $taskGroup->delete();

        return redirect()->route('groups.index')->with('success', 'Task deleted successfully.');
    }
}
