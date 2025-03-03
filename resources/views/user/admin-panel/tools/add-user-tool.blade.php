@extends("layouts.admin-panel.master")


@section("title", "Admin Panel")

@section("page")
    <a href="/admin-panel/users" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Users /</a> Add User
@endsection


@section('content')

    <div class="p-3">
        <form class="space-y-6" action="/admin-panel/users/add" method="post" novalidate>
            <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
            <div>
                <label class="text-gray-900 font-medium text-sm block" for="email">Name</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="{{ $old('name') }}">
                </div>
                @if ($errors->has('name'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("name") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="email">Email Address</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="email" name="email" id="email" value="{{ $old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("email") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="password">Password</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="password" id="password" value="{{ $old('password') }}">
                </div>
                @if ($errors->has('password'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("password") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="confirm_password">Confirm Password</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="confirm_password" id="confirm_password" value="{{ $old('password') }}">
                </div>
                @if ($errors->has('confirm_password'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("confirm_password") }}</p>
                @endif
            </div>

            <div class="pt-4">
                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Add User</button>
            </div>

        </form>
    </div>

@endsection



