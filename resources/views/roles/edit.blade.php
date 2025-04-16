@extends('layouts.app')

@section('content')
<h2>Edit Role for {{ $user->name }}</h2>
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <label>Role:</label>
    <select name="role_id" required>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select><br>
    <button type="submit">Update Role</button>
</form>
@endsection
