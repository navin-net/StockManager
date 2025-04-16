@extends('layouts.app')

@section('content')
<h2>Welcome, {{ auth()->user()->name }}</h2>
<p>Role: {{ auth()->user()->role->name }}</p>
@if (auth()->user()->image)
    <img src="{{ asset('storage/' . auth()->user()->image) }}" width="100">
@endif
@endsection
