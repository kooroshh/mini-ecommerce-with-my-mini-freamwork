


<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page"); ?>
    <a href="/admin-panel/users" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Users /</a> Add User
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="p-3">
        <form class="space-y-6" action="/admin-panel/users/add" method="post" novalidate>
            <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
            <div>
                <label class="text-gray-900 font-medium text-sm block" for="name">Name</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="<?php echo e($old('name')); ?>">
                </div>
                <?php if($errors->has('name')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("name")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="email">Email Address</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="email" name="email" id="email" value="<?php echo e($old('email')); ?>">
                </div>
                <?php if($errors->has('email')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("email")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="password">Password</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="password" id="password" value="<?php echo e($old('password')); ?>">
                </div>
                <?php if($errors->has('password')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("password")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="confirm_password">Confirm Password</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="confirm_password" id="confirm_password" value="<?php echo e($old('password')); ?>">
                </div>
                <?php if($errors->has('confirm_password')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("confirm_password")); ?></p>
                <?php endif; ?>
            </div>

            <div class="pt-4">
                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Add User</button>
            </div>

        </form>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/tools/add-user-tool.blade.php ENDPATH**/ ?>