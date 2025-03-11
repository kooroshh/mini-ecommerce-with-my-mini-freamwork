


<?php $__env->startSection("title", "User Panel"); ?>

<?php $__env->startSection("page"); ?>
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> <span class="text-center w-full block lg:inline">Logout</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("header"); ?>
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> Logout
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="p-3">
        <div class="bg-white p-6 rounded-lg flex flex-col">

            <div class="flex flex-col sm:flex-row justify-center sm:justify-start items-center gap-4 pb-4">
                <div class="rounded-full bg-red-300/50 size-10 flex justify-center items-center">
                    <svg class="size-6 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"></path>
                    </svg>
                </div>
                <div class="text-center sm:text-left">
                    <h3 class="font-semibold">Logout?</h3>
                    <p>Are you sure that you want to logout form this account ?</p>
                </div>
            </div>
            <div class="bg-gray-50 py-3 px-6 rounded">
                <div class="w-full flex items-center gap-4">
                    <form action="/panel/logout" method="post" class="sm:w-3/12 w-full ml-auto">
                        <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
                        <button class="text-white bg-red-600 py-2 px-3 rounded w-full text-center">Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.user-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/panel/logout/logout.blade.php ENDPATH**/ ?>