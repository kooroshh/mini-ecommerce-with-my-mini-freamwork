<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Default")</title>
    <link rel="stylesheet" href="http://localhost:8080/css/main.css">
</head>
<body>


    <div class="flex">

        <div id="menu" class="h-screen w-screen  z-100 bg-gray-900/80 -translate-x-full lg:translate-x-0 duration-300 lg:w-3/12 fixed ">

            <div class="flex h-full">


                <div class="bg-indigo-600 h-full w-9/12 lg:w-full py-4 px-6 flex flex-col gap-5">

                    <div>
                        <a href="/"><img src="{{ image('logo.png') }}" alt="Logo" class="invert brightness-0 h-12 cursor-pointer"></a>

                    </div>
                    <div class="flex flex-col justify-between grow">

                        <div class="flex flex-col gap-7">

                            <div class="-mx-2 space-y-1">

                                <a href="/"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>


                                    Home

                                </a>

                                <a href="/panel"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/panel") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    Account

                                </a>

                                <a href="/panel/orders"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/panel/orders") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>

                                    My Orders

                                </a>

                                <a href="/panel/change-password"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/panel/change-password") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                    Change Password

                                </a>

                                <a href="/panel/delete"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/panel/delete") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Delete Account

                                </a>

                                @if (isAdmin())
                                    <a href="/admin-panel"
                                        class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/admin-panel") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                        </svg>

                                        Admin panel

                                    </a>
                                @endif

                            </div>

                        </div>
                        <div class="-mx-2">

                            <a href="/panel/logout"
                                class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 {{ request()->is("/panel/logout") ? "bg-indigo-700" : "hover:bg-indigo-700"}}">

                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>

                                Logout

                            </a>

                        </div>

                    </div>

                </div>
                <div id="menuToggler2" class="pt-5 flex lg:hidden w-3/12 h-fit justify-center items-center">
                    <svg class="text-white size-6 blcok" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                    </svg>
                </div>

            </div>

        </div>
        <div class="lg:w-9/12 w-full ml-auto">

            <div
                class="px-4 lg:px-8 border-b-2 border-gray-200 min-h-16 w-full flex items-center lg:justify-end justify-between sticky top-0 z-5 bg-white" id="navbar">

                <div id="menuToggler"
                    class="flex justify-center lg:hidden items-center pr-2 h-fit">

                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>

                </div>
                <div class="flex flex-row items-center gap-2">

                    <div class="flex items-center">

                        <a href="/panel" class="justify-self-center flex justify-center items-center gap-2"><img class="size-8 rounded-full" src="{{ image(auth()->user()->image, "users") }}" alt="User Image"><span class="hidden lg:block color-gray-900  font-semibold text-sm text-nowrap">{{ auth()->user()->name }}</span></a>

                    </div>

                </div>

            </div>
            <div class="h-full w-full bg-gray-50">


                <div class="border-b-1 flex flex-col lg:flex-row gap-4 md:gap-0 justify-between items-center p-6">

                    <div>
                        <span class="pr-3 text-2xl leading-8 text-gray-400">User /</span>
                        <span class="font-black text-gray-900 text-2xl text-center">@yield('page','Dashboard')</span>
                    </div>
                    <p class="font-bold text-3xl text-gray-900">Welcome</p>

                </div>

                <div class="p-6 bg-white border-b-1">
                    <h2 class="font-bold text-3xl text-gray-900">@yield("header","Dashboard")</h2>
                </div>

                <div class="p-3">
                    @yield("content")
                </div>
            </div>

        </div>

    </div>


    <script src="/js/script.js"></script>
</body>
</html>