

<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page", "Products"); ?>

<?php $__env->startSection("content"); ?>


    <div class="lg:p-6 p-3">

        <div class="rounded border-1 bg-white px-1 lg:px-4  overflow-hidden">

            <header class="flex items-center border-b-1 justify-between mb-10 p-1">
                <p class="font-bold flex items-center py-3 px-4">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    Products
                </p>
                <a href="/admin-panel/products/add" class="text-white font-semibold text-sm text-center bg-indigo-600 py-2 px-3 rounded whitespace-nowrap">Add Product</a>

                <a href="/admin-panel/products" class="flex items-center py-3 px-4 content-center">
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

                                    <th scope="col" class="sm:pl-0 text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 pr-3 py-3.5">Image</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Name</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Slug</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Price</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Count</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">categories</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Created At</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Updated At</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5"></th>
                                    <th scope="col" class="sm:pr-0 pl-3 pr-4 py-3.5 relative"></th>

                                </tr>
                            </thead>
                            <tbody class="divide-y">

                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td class="sm:pl-0 text-gray-900 whitespace-nowrap font-medium text-sm pl-4 pr-3 py-4"><img class="size-6 rounded-md" src="<?php echo e(image($product->image, "products")); ?>" alt="User Image"></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($product->name); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($product->slug); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">$<?php echo e($product->price); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($product->count); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            <div class="flex flex-wrap gap-3">
                                                <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="px-2 py-1 bg-gray-50 rounded-full"><?php echo e($category); ?></div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($product->created_at); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($product->updated_at); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            <a href="/admin-panel/products/edit?<?php echo e("id={$product->id}"); ?>" class="text-indigo-600">edit</a>
                                        </td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">
                                            <a href="/admin-panel/products/delete?<?php echo e("id={$product->id}"); ?>" class="text-red-500">delete</a>
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
<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/products/admin-panel-products.blade.php ENDPATH**/ ?>