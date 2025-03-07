

<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page", "Unregistered Comments"); ?>

<?php $__env->startSection("content"); ?>


    <div class="lg:p-6 p-3">

        <div class="rounded border-1 bg-white px-1 lg:px-4  overflow-hidden">

            <header class="flex items-center border-b-1 justify-between mb-10 p-1">
                <p class="font-bold flex items-center py-3 px-4">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    Unregistered Comments
                </p>

                <a href="/admin-panel/unregistered-comments" class="flex items-center py-3 px-4 content-center">
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
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Product Slug</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Created At</th>
                                    <th scope="col" class="sm:pr-0 pl-3 pr-4 py-3.5 relative"></th>

                                </tr>
                            </thead>
                            <tbody class="divide-y">

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td class="sm:pl-0 text-gray-900 whitespace-nowrap font-medium text-sm pl-4 pr-3 py-4"><img class="size-6 rounded-md" src="<?php echo e(image($value->image, "users")); ?>" alt="User Image"></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($value->email); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($value->slug); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($value->created_at); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            <a href="/admin-panel/unregistered-comments/register?<?php echo e("id={$value->id}"); ?>" class="text-indigo-600">Register</a>
                                        </td>

                                    </tr>                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/comments/admin-panel-unregistered-comments.blade.php ENDPATH**/ ?>