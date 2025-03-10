

<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page", "Orders"); ?>

<?php $__env->startSection("content"); ?>


    <div class="lg:p-6 p-3">

        <div class="rounded border-1 bg-white px-1 lg:px-4  overflow-hidden">

            <header class="flex items-center border-b-1 justify-between mb-10 p-1">
                <p class="font-bold flex items-center py-3 px-4">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    Orders
                </p>

                <a href="/admin-panel/orders" class="flex items-center py-3 px-4 content-center">
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

                                    <th scope="col" class="sm:pl-0 text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 pr-3 py-3.5">Order Code</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">User Image</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">User Email</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Products Slug</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Total Price</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Status</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Created At</th>
                                    <th scope="col" class="text-gray-900 whitespace-nowrap font-semibold text-sm text-left pl-4 px-3 py-3.5">Close At</th>

                                </tr>
                            </thead>
                            <tbody class="divide-y">

                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td class="sm:pl-0 text-gray-400 whitespace-nowrap font-medium text-sm pl-4 pr-3 py-4">#<?php echo e($order->orderCode); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><img class="size-6 rounded-md" src="<?php echo e(image($order->image, "users")); ?>" alt="User Image"></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($order->email); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3 min-w-48">
                                            <div class="flex flex-wrap gap-3 w-full">
                                                    <?php $__currentLoopData = $order->productsSlugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="px-2 py-1 bg-gray-50 rounded-full"><?php echo e($slug); ?></div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3">$<?php echo e($order->price); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3 h-full">
                                            <div class="flex items-center gap-2.5">
                                                <?php echo e($order->status); ?>

                                                <?php if($order->status == "paid"): ?>
                                                    <div class="inline-flex relative size-3.5 justify-center -mb-[0.3rem]">
                                                        <div class="absolute top-0 right-0 size-full bg-green-400/70 animate-ping rounded-full"></div>
                                                        <div class="size-3 justify-self-center self-center bg-green-500 rounded-full"></div>
                                                    </div>
                                                <?php elseif($order->status == "paying"): ?>
                                                    <div class="inline-flex relative size-3.5 justify-center -mb-[0.3rem]">
                                                        <div class="absolute top-0 right-0 size-full bg-amber-400/70 animate-ping rounded-full"></div>
                                                        <div class="size-3 justify-self-center self-center bg-amber-500 rounded-full"></div>
                                                    </div>
                                                <?php elseif($order->status == "cancelled"): ?>
                                                    <div class="inline-flex relative size-3.5 justify-center -mb-[0.3rem]">
                                                        <div class="absolute top-0 right-0 size-full bg-red-400/70 animate-ping rounded-full"></div>
                                                        <div class="size-3 justify-self-center self-center bg-red-500 rounded-full"></div>
                                                    </div>
                                                <?php endif; ?>                                                
                                            </div>

                                        </td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($order->created_at); ?></td>
                                        <td class="text-gray-500 whitespace-nowrap text-sm py-4 px-3"><?php echo e($order->close_at); ?></td>
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
<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/orders/admin-panel-orders.blade.php ENDPATH**/ ?>