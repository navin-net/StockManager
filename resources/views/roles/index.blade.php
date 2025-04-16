@extends('layouts.app')

@section('content')
<h2>Manage Roles</h2>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
<h3>Create Role</h3>
<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    <label>Role Name:</label>
    <input type="text" name="name" required><br>
    <button type="submit">Create Role</button>
</form>

<h3>Users</h3>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}">Edit Role</a> |
                <a href="{{ route('users.edit-details', $user) }}">Edit Details</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection
