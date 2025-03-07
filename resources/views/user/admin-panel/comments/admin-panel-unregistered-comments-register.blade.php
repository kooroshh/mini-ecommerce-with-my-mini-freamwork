@extends("layouts.admin-panel.master")


@section("title", "Admin Panel")

@section("page")
    <a href="/admin-panel/unregistered-comments" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Unregistered Comments /</a> Register Comment
@endsection


@section('content')

    <div class="p-3">

        <div class="w-full flex flex-col gap-2 bg-white rounded p-2">
            
            <div class="flex items-center gap-2">
                <img class="size-10 rounded-full bg-gray-100" src="{{ image($data->image, "users") }}" alt="User Image">
                <div>
                    <h3 class="text-gray-900 font-medium">{{ $data->name }}</h3>
                    <span class="text-gray-500 text-sm">{{ explode(' ', $data->created_at)[0] }}</span>
                </div>
            </div>
            <div class="w-full bg-gray-50 rounded p-2">
                <p class="text-gray-500 text-base">{{ $data->body }}</p>
            </div>
        </div>
        <div class="bg-white w-full mt-4 p-2">
            <div class="w-full lg:w-4/12 ml-auto mr-2 flex items-center gap-4">
                <a href="/admin-panel/comments/delete?id={{ $data->id }}" class="text-white bg-red-600 py-2 px-3 rounded text-center w-6/12">Delete</a>
                <form action="/admin-panel/unregistered-comments/register" method="post" class="w-6/12">
                    <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
                    <input type="hidden" name="commentId" value="{{ $data->id }}">
                    <button class="text-white bg-indigo-600 py-2 px-3 rounded w-full text-center">Register</button>
                    <a href=""></a>
                </form>
            </div>
        </div>


    </div>

@endsection



