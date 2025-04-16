<!DOCTYPE html>
<html>
<head>
    <title>Auth System</title>
</head>
<body>
    @if (auth()->check())
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('roles.index') }}">Manage Roles</a> |
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('register') }}">Register</a>
    @endif
    <hr>
    @yield('content')
</body>
</html>
