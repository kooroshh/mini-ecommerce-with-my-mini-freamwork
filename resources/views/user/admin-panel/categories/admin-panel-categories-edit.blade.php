@extends("layouts.admin-panel.master")


@section("title", "Admin Panel")

@section("page")
    <a href="/admin-panel/categories" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Categories /</a> Edit Category
@endsection


@section('content')

    <div class="p-3">
        <form class="space-y-6" action="/admin-panel/categories/edit" method="post" novalidate>
            <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
            <input type="hidden" name="id" value="{{ $id }}">
            <div>
                <label class="text-gray-900 font-medium text-sm block" for="name">Name</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="{{ $name }}">
                </div>
                @if ($errors->has('name'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("name") }}</p>
                @endif
            </div>


            <div class="pt-4">
                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Edit</button>
            </div>

        </form>
    </div>

@endsection



