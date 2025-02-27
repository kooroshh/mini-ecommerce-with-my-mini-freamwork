@extends('layouts.blank')

@section("title", "404 - Not Found")


@section('content')

    <div class="flex h-screen px-1 w-full items-center justify-center">
        <div class="text-center -mt-14">
            <span class="text-base font-semibold text-indigo-600">404</span>
            <h1 class="md:mt-4 mt-2 md:text-5xl text-4xl font-semibold tracking-tight text-gray-900">Page not found</h1>
            <p class="mt-6 text-lg font-medium text-gray-500 leading-8">Sorry, we couldn’t find the page you’re looking for.</p>
            <div class="mt-10 flex items-center justify-center">
                <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Go back home</a>
            </div>
        </div>
    </div>

@endsection

