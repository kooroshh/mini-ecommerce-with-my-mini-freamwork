

<?php $__env->startSection("title","Register Page"); ?>

<?php $__env->startSection("content"); ?>

    <div class="w-full flex justify-center">
        <div class="border-2 border-gray-700 rounded-md py-16 px-32 mt-5">

            <h1 class="text-4xl text-center font-semibold text-indigo-700">Register Page</h1>
            <?php if(isset($mainError)): ?>
                <span class="text-red-500 mb-2 w-full text-center block"><?php echo e($mainError); ?></span>
            <?php endif; ?>
            <?php if(isset($mainSuccess)): ?>
                <span class="text-green-500 mb-2 w-full text-center block"><?php echo e($mainSuccess); ?></span>
            <?php endif; ?>

            <form action="/auth/register" method="post" class="space-y-2 mt-12" novalidate>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="name" class="text-lg">Name:</label>
                    <div class="flex flex-col">
                        <?php if(isset($name)): ?>
                            <span class="text-red-500 text-sm mb-2">*<?php echo e($name); ?></span>
                        <?php endif; ?>
                        <input type="text" name="name" id="name" class="border-2 border-gray-700 rounded p-1 pr-7">
                    </div>
                </div>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="email" class="text-lg">Email:</label>
                    <div class="flex flex-col">
                        <?php if(isset($email)): ?>
                            <span class="text-red-500 text-sm mb-2">*<?php echo e($email); ?></span>
                        <?php endif; ?>
                        <input type="email" name="email" id="email" class="border-2 border-gray-700 rounded p-1 pr-7">
                    </div>
                </div>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="password" class="text-lg">Password:</label>
                    <div class="flex flex-col">
                        <?php if(isset($password)): ?>
                            <span class="text-red-500 text-sm mb-2">*<?php echo e($password); ?></span>
                        <?php endif; ?>
                        <input type="password" name="password" id="password" class="border-2 border-gray-700 rounded p-1 pr-7">
                    </div>
                </div>

                <div class="flex gap-4 items-center justify-between -mx-6">
                    <label for="confirm_password" class="text-lg">Confirm Password:</label>
                    <div class="flex flex-col">
                        <?php if(isset($confirm_password)): ?>
                            <span class="text-red-500 text-sm mb-2">*<?php echo e($confirm_password); ?></span>
                        <?php endif; ?>
                        <input type="password" name="confirm_password" id="confirm_password" class="border-2 border-gray-700 rounded p-1 pr-7">
                    </div>
                </div>

                <div>
                    <button class="bg-indigo-600 px-5 py-2 rounded block w-full mt-7">Register</button>
                </div>

            </form>

        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/auth/register.blade.php ENDPATH**/ ?>