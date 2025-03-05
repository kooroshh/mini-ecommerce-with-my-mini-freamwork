


<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page"); ?>
    <a href="/admin-panel/categories" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Categories /</a> Add Category
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="p-3">
        <form class="space-y-6" action="/admin-panel/categories/add" method="post" novalidate>
            <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
            <div>
                <label class="text-gray-900 font-medium text-sm block" for="email">Name</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="<?php echo e($old('name')); ?>">
                </div>
                <?php if($errors->has('name')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("name")); ?></p>
                <?php endif; ?>
            </div>


            <div class="pt-4">
                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Add Category</button>
            </div>

        </form>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/tools/add-category-tool.blade.php ENDPATH**/ ?>