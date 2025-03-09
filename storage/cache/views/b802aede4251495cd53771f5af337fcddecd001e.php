

<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page", "Categories"); ?>


<?php $__env->startSection("content"); ?>


    <div class="lg:p-6 p-3">

        <div class="rounded border-1 bg-white px-1 lg:px-4  overflow-hidden">

            <header class="flex items-center border-b-1 justify-between mb-10 p-1">
                <p class="font-bold flex items-center py-3 px-4">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    Categories
                </p>
                <a href="/admin-panel/categories/add" class="text-white font-semibold text-sm text-center bg-indigo-600 py-2 px-3 rounded whitespace-nowrap">Add Category</a>

                <a href="/admin-panel/categories" class="flex items-center py-3 px-4 content-center">
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

                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Name</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5"></th>
                                    <th scope="col" class="sm:pr-0 pl-3 pr-4 py-3.5 relative"></th>

                                </tr>
                            </thead>
                            <tbody class="divide-y">

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($category->name); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            <a href="/admin-panel/categories/edit?<?php echo e("id={$category->id}"); ?>" class="text-indigo-600">edit</a>
                                        </td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            <a href="/admin-panel/categories/delete?<?php echo e("id={$category->id}"); ?>" class="text-red-500">delete</a>
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
<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/categories/admin-panel-categories.blade.php ENDPATH**/ ?>