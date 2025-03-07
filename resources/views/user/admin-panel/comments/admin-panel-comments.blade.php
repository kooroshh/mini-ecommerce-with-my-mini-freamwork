@extends("layouts.admin-panel.master")

@section("title", "Admin Panel")

@section("page", "Comments")

@section("content")


    <div class="lg:p-6 p-3">

        <div class="rounded border-1 bg-white px-1 lg:px-4  overflow-hidden">

            <header class="flex items-center border-b-1 justify-between mb-10 p-1">
                <p class="font-bold flex items-center py-3 px-4">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    Comments
                </p>

                <a href="/admin-panel/comments" class="flex items-center py-3 px-4 content-center">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </a>
            </header>
            <div class="flow-root mt-8">
                <div class="lg:-mx-8 sm:-mx-6 overflow-x-auto -my-2">
                    <div class="lg:px-8 sm:px-6 align-middle py-2 min-w-full inline-block">
                        <table class="min-w-full">

                            <thead>
                                <tr>

                                    <th scope="col" class="sm:pl-0 text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 pr-3 py-3.5">User Image</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">User Email</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Is Active</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Product Slug</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Created At</th>
                                    <th scope="col" class="sm:pr-0 pl-3 pr-4 py-3.5 relative"></th>

                                </tr>
                            </thead>
                            <tbody class="divide-y">

                                @foreach ($data as $value)
                                    <tr>

                                        <td class="sm:pl-0 text-gray-900 whitespace-nowrap font-medium text-sm pl-4 pr-3 py-4"><img class="size-6 rounded-md" src="{{ image($value->image, "users") }}" alt="User Image"></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">{{ $value->email }}</td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            @if ($value->is_active)
                                                <svg class="size-6 stroke-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>                                       
                                            @else
                                                <svg class="size-6 stroke-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">{{ $value->slug }}</td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">{{ $value->created_at }}</td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            @if ($value->is_active)
                                                <a href="/admin-panel/comments/delete?{{ "id={$value->id}" }}" class="text-red-500">Delete</a>
                                            @else
                                                <a href="/admin-panel/unregistered-comments/register?{{ "id={$value->id}" }}" class="text-indigo-600">Register</a>
                                            @endif
                                        </td>

                                    </tr>                                
                                @endforeach


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection