
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', "Default"); ?></title>
    <link rel="stylesheet" href="http://localhost:8080/css/main.css">
</head>
<body>


    <div class="flex">

        <div id="menu" class="h-screen w-screen  z-100 bg-gray-900/80 -translate-x-full lg:translate-x-0 duration-300 lg:w-3/12 fixed ">

            <div class="flex h-full">


                <div class="bg-indigo-600 h-full w-9/12 lg:w-full py-4 px-6 flex flex-col gap-5">

                    <div>

                        <svg class="h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 40" fill="none">
                            <path fill="#fff"
                                d="M23.5 6.5C17.5 6.5 13.75 9.5 12.25 15.5C14.5 12.5 17.125 11.375 20.125 12.125C21.8367 12.5529 23.0601 13.7947 24.4142 15.1692C26.6202 17.4084 29.1734 20 34.75 20C40.75 20 44.5 17 46 11C43.75 14 41.125 15.125 38.125 14.375C36.4133 13.9471 35.1899 12.7053 33.8357 11.3308C31.6297 9.09158 29.0766 6.5 23.5 6.5ZM12.25 20C6.25 20 2.5 23 1 29C3.25 26 5.875 24.875 8.875 25.625C10.5867 26.0529 11.8101 27.2947 13.1642 28.6693C15.3702 30.9084 17.9234 33.5 23.5 33.5C29.5 33.5 33.25 30.5 34.75 24.5C32.5 27.5 29.875 28.625 26.875 27.875C25.1633 27.4471 23.9399 26.2053 22.5858 24.8307C20.3798 22.5916 17.8266 20 12.25 20Z" />
                            <defs>
                                <linearGradient id="%%GRADIENT_ID%%" x1="33.999" x2="1" y1="16.181" y2="16.181"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="%%GRADIENT_TO%%" />
                                    <stop offset="1" stop-color="%%GRADIENT_FROM%%" />
                                </linearGradient>
                            </defs>
                        </svg>

                    </div>
                    <div class="flex flex-col justify-between grow">

                        <div class="flex flex-col gap-7">

                            <div class="-mx-2 space-y-1">

                                <a href="/admin-panel"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                                        </path>
                                    </svg>
                                    Dashboard

                                </a>

                                <a href="/admin-panel/users"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/users", "/admin-panel/users/delete", "/admin-panel/users/ban", "/admin-panel/users/un-ban", "/admin-panel/users/edit") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z">
                                        </path>
                                    </svg>
                                    Users

                                </a>

                                <a href="#"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/projects") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z">
                                        </path>
                                    </svg>
                                    Projects

                                </a>

                                <a href="#"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/calendar") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5">
                                        </path>
                                    </svg>
                                    Calendar

                                </a>

                                <a href="#"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/documents") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75">
                                        </path>
                                    </svg>
                                    Documents

                                </a>

                                <a href="#"
                                    class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/reports") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z"></path>
                                    </svg>
                                    Reports

                                </a>

                            </div>
                            <div>

                                <span class="text-indigo-200 font-semibold text-xs">Tools</span>
                                <div class="-mx-2 mt-2   space-y-1">

                                    <a href="/admin-panel/users/add"
                                        class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/users/add") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                        <span
                                            class="text-white font-medium text-[0.625rem] bg-indigo-500 border border-indigo-400 rounded-lg size-6 flex items-center justify-center">A</span>
                                        Add User

                                    </a>

                                    <a href="#"
                                        class="font-semibold hover:bg-indigo-700 text-sm rounded-md flex gap-3 items-center p-2 text-gray-200">

                                        <span
                                            class="text-white font-medium text-[0.625rem] bg-indigo-500 border border-indigo-400 rounded-lg size-6 flex items-center justify-center">T</span>
                                        Tailwind Labs

                                    </a>

                                    <a href="#"
                                        class="font-semibold hover:bg-indigo-700 text-sm rounded-md flex gap-3 items-center p-2 text-gray-200">

                                        <span
                                            class="text-white font-medium text-[0.625rem] bg-indigo-500 border border-indigo-400 rounded-lg size-6 flex items-center justify-center">W</span>
                                        Workcation

                                    </a>

                                </div>

                            </div>

                        </div>
                        <div class="-mx-2">

                            <a href="#"
                                class="font-semibold text-sm rounded-md flex gap-3 items-center p-2 text-gray-200 <?php echo e(request()->is("/admin-panel/settings") ? "bg-indigo-700" : "hover:bg-indigo-700"); ?>">

                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                </svg>
                                Settings

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
                class="px-4 lg:px-8 border-b-2 border-gray-200 min-h-16 w-full flex items-center sticky top-0 z-5 bg-white" id="navbar">

                <div id="menuToggler"
                    class="flex justify-center lg:hidden items-center pr-2 mr-2 border-r-2 border-gray-100 h-fit">

                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>

                </div>
                <form action="#" class="flex flex-row items-center grow ">



                    <svg class="size-5 mr-3 fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"
                            clip-rule="evenodd"></path>
                    </svg>

                    <input class="focus:outline-none text-sm text-gray-900 w-full h-full" type="search" name="search"
                        id="search" placeholder="Search">

                </form>
                <div class="flex flex-row items-center gap-2">

                    <div
                        class="flex justify-center items-center lg:pr-5 lg:mr-4 lg:border-r-2 lg:border-gray-100 h-fit">

                        <svg class="size-6 stroke-gray-400 fill-none" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0">
                            </path>
                        </svg>

                    </div>
                    <div class="flex items-center">

                        <img class="bg-gray-100 rounded-full size-8 lg:mr-4" src="<?php echo e(userImage()); ?>"
                            alt="User Image">
                        <span class="hidden lg:block color-gray-900  font-semibold text-sm text-nowrap"><?php echo e(auth()->user()->name); ?></span>

                    </div>

                </div>

            </div>
            <div class="h-full w-full bg-gray-50">


                <div class="border-b-1 flex flex-col lg:flex-row gap-4 md:gap-0 justify-between items-center p-6">

                    <div>
                        <span class="pr-3 text-2xl leading-8 text-gray-400">Admin /</span>
                        <span class="font-black text-gray-900 text-2xl"><?php echo $__env->yieldContent('page','Dashboard'); ?></span>
                    </div>
                    <p class="font-bold text-3xl text-gray-900">Welcome</p>

                </div>

                <div class="p-6 bg-white border-b-1">
                    <h2 class="font-bold text-3xl text-gray-900"><?php echo $__env->yieldContent("page","Dashboard"); ?></h2>
                </div>

                <?php echo $__env->yieldContent("content"); ?>
            </div>

        </div>

    </div>


    <script src="/js/script2.js"></script>
</body>
</html><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/layouts/admin-panel/master.blade.php ENDPATH**/ ?>