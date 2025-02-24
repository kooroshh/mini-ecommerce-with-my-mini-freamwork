@extends("layouts.master")

@php
    $username = auth()->user()->name;
@endphp

@section('title', "User Panel - $username")


@section('content')

    <h1>User Panel</h1>
    <p>{{ $username }}</p>
    <a href="/auth/logout">Logout</a>

@endsection