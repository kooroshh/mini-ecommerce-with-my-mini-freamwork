@extends('layouts.master')

@section("title", "Error")


@section('content')

    <h1>{{ $error->getMessage() }}</h1>

@endsection

