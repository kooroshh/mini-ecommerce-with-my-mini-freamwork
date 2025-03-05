
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', "Default"); ?></title>
    <link rel="stylesheet" href="http://localhost:8080/css/main.css">
</head>
<body>
    
    <div class="w-full flex justify-between items-center px-8 h-16 border-b sticky top-0 z-10 bg-white">

        <a href="/"><img class="w-auto h-12" src="<?php echo e(image('logo.png')); ?>" alt="Logo" width="176" height="136"></a>
        <div class="md:flex items-center hidden z-20 bg-white top-0 right-0 w-full justify-between p-3 md:p-0" id="nav">

            <button class="md:hidden border-b-2 w-full pb-2" id="nav-btn2">
                <svg class="size-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="border-b-2 md:border-none pb-5 md:pb-0">
                <ul class="gap-4 text-gray-700 text-sm font-medium h-full justify-center items-center flex md:ml-4 flex-col md:flex-row">

                    <li class="w-full md:w-auto"><a class="px-1.5 py-1 rounded w-full block md:inline text-center md:w-auto <?php echo e(request()->is("/") ? "bg-indigo-600 text-white" : ""); ?>" href="/">Home</a></li>
                    <li class="w-full md:w-auto"><a class="px-1.5 py-1 rounded w-full block md:inline text-center md:w-auto <?php echo e(request()->is("/products") ? "bg-indigo-600 text-white" : ""); ?>" href="/products">Products</a></li>
                    <li class="w-full md:w-auto"><a class="px-1.5 py-1 rounded w-full block md:inline text-center md:w-auto <?php echo e(request()->is("/contact-us") ? "bg-indigo-600 text-white" : ""); ?>" href="/contact-us">Contact Us</a></li>
                    <li class="w-full md:w-auto"><a class="px-1.5 py-1 rounded w-full block md:inline text-center md:w-auto <?php echo e(request()->is("/about-us") ? "bg-indigo-600 text-white" : ""); ?>" href="/about-us">About Us</a></li>
                    <li class="w-full md:w-auto"><a class="px-1.5 py-1 rounded w-full block md:inline text-center md:w-auto <?php echo e(request()->is("/shopping-cart") ? "bg-indigo-600 text-white" : ""); ?>" href="/shopping-cart">Shopping Cart</a></li>

                </ul>
            </div>

            <div class="items-center hidden md:flex justify-end w-full md:w-auto text-center mt-3 md:mt-0" id="nav-items">
                
                <?php if(auth()->check()): ?>
                    <a href="/admin-panel"><img class="size-8 rounded-full" src="<?php echo e(image(auth()->user()->image, "users")); ?>" alt="User Image"></a>
                <?php else: ?>
                    <div>
                        <a class="text-indigo-600 hover:text-indigo-800" href="/auth/register">Register</a>
                        <span>/</span>
                        <a class="text-indigo-600 hover:text-indigo-800" href="/auth/sign-in">Sign In</a>
                    </div>
                <?php endif; ?>
                

            </div>

        </div>

        <button class="md:hidden" id="nav-btn">
            <svg class="size-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

    </div>

    
    <?php echo $__env->yieldContent("content"); ?>


    <div class="px-8 mb-6">
        <div class="pt-28 mt-14 border-t flex flex-col xl:flex-row gap-8">

            <div class="xl:w-3/12">
                <a class="flex justify-center sm:justify-start" href="/"><img class="w-auto h-12" src="<?php echo e(image('logo.png')); ?>" alt="Logo" width="176" height="136"></a>
            </div>
            <div class="xl:w-9/12 grid xl:grid-cols-4 grid-cols-1 sm:grid-cols-2 gap-8 text-center sm:text-start">

                <div>

                    <h3 class="text-gray-900 font-semibold text-sm">Pages</h3>
                    <ul class="mt-6 space-y-4 text-gray-600 text-sm">
                        <li><a class="hover:text-indigo-600 hover:underline" href="/">Home</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="/products">Products</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="/contact-us">Contact Us</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="/about-us">About Us</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="/shopping-cart">Shopping Cart</a></li>
                    </ul>

                </div>

                <div>

                    <h3 class="text-gray-900 font-semibold text-sm">Support</h3>
                    <ul class="mt-6 space-y-4 text-gray-600 text-sm">
                        <li><a class="hover:text-indigo-600 hover:underline" href="tel:+989201518662">09201518662</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="mailto:kooroshsoleymani98@gmail.com">kooroshsoleymani98@gmail.com</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="https://t.me/support">Telegram : @support</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="https://wa.me/9201518662">Whatsapp : 09201518662</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="sms:+989201518662">Sms : 09201518662</a></li>
                    </ul>

                </div>

                <div>

                    <h3 class="text-gray-900 font-semibold text-sm">Social Medias</h3>
                    <ul class="mt-6 space-y-4 text-gray-600 text-sm">
                        <li><a class="hover:text-indigo-600 hover:underline" href="https://t.me/nangg">Telegram</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="https://www.instagram.com/koorosh/">Instagram</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="https://twitter.com/kooorsh">Twitter</a></li>
                    </ul>

                </div>

                <div>

                    <h3 class="text-gray-900 font-semibold text-sm">Popular Categories</h3>
                    <ul class="mt-6 space-y-4 text-gray-600 text-sm">
                        <li><a class="hover:text-indigo-600 hover:underline" href="#">Category 1</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="#">Category 2</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="#">Category 3</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="#">Category 4</a></li>
                        <li><a class="hover:text-indigo-600 hover:underline" href="#">Category 5</a></li>
                    </ul>

                </div>

            </div>

        </div>
    </div>


    <script src="/js/script.js"></script>
</body>
</html><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/layouts/complete.blade.php ENDPATH**/ ?>