@extends("layouts.user-panel.master")


@section("title", "User Panel")

@section("page")
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> <span class="text-center w-full block lg:inline">Change</span>
@endsection

@section("header")
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> Change
@endsection


@section('content')

    <div class="lg:px-8 sm:px-6 px-4 py-16 grid md:grid-cols-3 grid-cols-1 gap-y-10 gap-x-8 max-w-[80rem] bg-white rounded-md">

        <div>
            <h2 class="font-semibold text-base">Changing Password</h2>
            <p class="text-gray-400 text-sm mt-1">Submit your new password here.</p>
        </div>
        <form action="/panel/change-password" class="md:col-span-2" method="post" novalidate>
            <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
            <div class="sm:max-w-[36rem] flex flex-col gap-y-8 gap-x-6">

                <div>
                    <label class="text-gray-900 font-medium text-sm block" for="password">New Password</label>
                    <div class="mt-2">
                        <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="password" id="password" value="{{ $old('password') }}">
                    </div>
                    @if ($errors->has('password'))
                        <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("password") }}</p>
                    @endif
                </div>

                <div>
                    <label class="text-gray-900 font-medium text-sm block" for="confirm_password">Password Confirm</label>
                    <div class="mt-2">
                        <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="confirm_password" id="confirm_password" value="{{ $old('confirm_password') }}">
                    </div>
                    @if ($errors->has('confirm_password'))
                        <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("confirm_password") }}</p>
                    @endif
                </div>

            </div>
            <div class="flex mt-8">
                <button type="submit" class="shadow text-white bg-indigo-600 text-sm py-2 px-3 rounded-md">Save</button>
            </div>

        </form>
        

    </div>

@endsection



