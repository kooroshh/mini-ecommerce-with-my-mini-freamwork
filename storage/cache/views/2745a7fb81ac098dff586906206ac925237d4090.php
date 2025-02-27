

<?php $__env->startSection("title", "404 - Not Found"); ?>


<?php $__env->startSection('content'); ?>

    <div class="flex h-screen px-1 w-full items-center justify-center">
        <div class="text-center -mt-14">
            <span class="text-base font-semibold text-indigo-600">404</span>
            <h1 class="md:mt-4 mt-2 md:text-5xl text-4xl font-semibold tracking-tight text-gray-900">Page not found</h1>
            <p class="mt-6 text-lg font-medium text-gray-500 leading-8">Sorry, we couldn’t find the page you’re looking for.</p>
            <div class="mt-10 flex items-center justify-center">
                <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Go back home</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/errors/404.blade.php ENDPATH**/ ?>