@extends("layouts.master")

@section("title","Register Page")


@section("content")

    <div class="w-full flex justify-center">
        <div class="border-2 border-gray-700 rounded-md py-16 px-32 mt-5">

            <h1 class="text-4xl text-center font-semibold text-indigo-700">Register Page</h1>

            <form action="/auth/register" method="post" class="space-y-2 mt-12" novalidate>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="name" class="text-lg">Name:</label>
                    <div class="flex flex-col">
                        <input type="text" name="name" id="name" class="border-2 border-gray-700 rounded p-1 pr-7" value="{{ $old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-red-500 text-sm mb-2">*{{ $errors->first("name") }}</span>
                        @endif
                    </div>
                </div>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="email" class="text-lg">Email:</label>
                    <div class="flex flex-col">
                        <input type="email" name="email" id="email" class="border-2 border-gray-700 rounded p-1 pr-7" value="{{ $old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-red-500 text-sm mb-2">*{{ $errors->first("email") }}</span>
                        @endif
                    </div>
                </div>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="password" class="text-lg">Password:</label>
                    <div class="flex flex-col">
                        <input type="password" name="password" id="password" class="border-2 border-gray-700 rounded p-1 pr-7" value="{{ $old('password') }}">
                        @if ($errors->has('password'))
                            <span class="text-red-500 text-sm mb-2">*{{ $errors->first("password") }}</span>
                        @endif
                    </div>
                </div>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="confirm_password" class="text-lg">Confirm Password:</label>
                    <div class="flex flex-col">
                        <input type="password" name="confirm_password" id="confirm_password" class="border-2 border-gray-700 rounded p-1 pr-7"  value="{{ $old('confirm_password') }}">
                        @if ($errors->has('confirm_password'))
                            <span class="text-red-500 text-sm mb-2">*{{ $errors->first("confirm_password") }}</span>
                        @endif
                    </div>
                </div>

                <div>
                    <button class="bg-indigo-600 px-5 py-2 rounded block w-full mt-7">Register</button>
                </div>

            </form>

        </div>
    </div>


@endsection