<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::with('role')->get();
        return view('roles.index', compact('roles', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:roles']);
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role created');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('roles.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(['role_id' => 'required|exists:roles,id']);
        $user->update(['role_id' => $request->role_id]);
        return redirect()->route('roles.index')->with('success', 'Role updated');
    }

    public function editDetails(User $user)
    {
        $roles = Role::all();
        return view('roles.edit-details', compact('user', 'roles'));
    }

    public function updateDetails(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $user->update($data);
        return redirect()->route('roles.index')->with('success', 'User details updated');
    }
}
