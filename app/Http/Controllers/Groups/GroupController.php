<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $group = Group::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $usernames = $request->input('usernames');

        if (!empty($usernames) && is_array($usernames)) {
            foreach ($usernames as $username) {
                $user = User::where('username', $username)->firstOrFail();
                $group->users()->attach($user->id);
            }
        }

        return redirect()->route('groups.index');
    }

    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    public function delete(Group $group)
    {
        // Detach all users from the group before deleting
        // $group->users()->detach();

        // Delete the group
        $group->delete();

        return redirect()->route('groups.index');
    }
}
