@extends("layouts.user-panel.master")


@section("title", "User Panel")

@section("page")
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> <span class="text-center w-full block lg:inline">Account</span>
@endsection

@section("header")
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> Account
@endsection


@section('content')

    <div class="lg:px-8 sm:px-6 px-4 py-16 grid md:grid-cols-3 grid-cols-1 gap-y-10 gap-x-8 max-w-[80rem] bg-white rounded-md">

        <div>
            <h2 class="font-semibold text-base">Personal Information</h2>
            <p class="text-gray-400 text-sm mt-1">See and edit your personal information here!</p>
        </div>
        <form action="/panel/edit" class="md:col-span-2" method="post" novalidate enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
            <div class="sm:max-w-[36rem] flex flex-col gap-y-8 gap-x-6">

                <div class="flex items-center gap-x-8">

                    <img id="objectImage" class="flex-none size-24 rounded-lg object-cover bg-gray-100" src="{{ image($user->image, "users") }}" alt="Product Image">

                    <label id="image" class="cursor-pointer block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
                        Select Image
                        <input type="file" class="hidden" id="image" name="image" accept=".jpg, .jpeg, .png">
                    </label>
                    @if ($errors->has('image'))
                        <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("image") }}</p>
                    @endif
                </div>

                <div>
                    <label class="text-gray-900 font-medium text-sm block" for="name">Name</label>
                    <div class="mt-2">
                        <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="{{ $user->name }}">
                    </div>
                    @if ($errors->has('name'))
                        <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("name") }}</p>
                    @endif
                </div>

                <div>
                    <label class="text-gray-900 font-medium text-sm block" for="name">email</label>
                    <div class="mt-2">
                        <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-gray-50 outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="{{ $user->email }}" disabled>
                    </div>
                </div>

            </div>
            <div class="flex mt-8">
                <button type="submit" class="shadow text-white bg-indigo-600 text-sm py-2 px-3 rounded-md">Save</button>
            </div>

        </form>
        

    </div>

@endsection



