@extends('layouts.app')

@section('content')
<h2>Register</h2>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required><br>
    <label>Role:</label>
    <select name="role_id" required>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select><br>
    <label>Image:</label>
    <input type="file" name="image"><br>
    <button type="submit">Register</button>
</form>
@endsection
