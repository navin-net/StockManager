@extends('layouts.app')

@section('content')
<h2>Edit User: {{ $user->name }}</h2>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('users.update-details', $user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required><br>
    <label>Role:</label>
    <select name="role_id" required>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select><br>
    <label>Image:</label>
    <input type="file" name="image"><br>
    @if ($user->image)
        <img src="{{ asset('storage/' . $user->image) }}" width="100"><br>
    @endif
    <button type="submit">Update User</button>
</form>
<a href="{{ route('roles.index') }}">Back to Roles</a>
@endsection
