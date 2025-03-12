


<?php $__env->startSection("title", "User Panel"); ?>

<?php $__env->startSection("page"); ?>
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> <span class="text-center w-full block lg:inline">Orders</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("header"); ?>
    <a href="/panel" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Panel /</a> Orders
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="py-24">

        <div class="lg:px-8 sm:px-2 max-w-[80rem] mx-auto">

            <div class="lg:px-0 px-4 lg:max-w-[56rem] max-w-[42rem] mx-auto">

                <h1 class="font-bold text-2xl sm:text-3xl text-gray-900 tracking-tight">Orders history</h1>
                <p class="text-gray-500 text-sm mt-2">Check all of your orders here!</p>

            </div>

        </div>

        <div class="mt-16">
            <div class="lg:px-8 sm:px-2 max-w-[80rem mx-auto]">
                <div class="lg:px-0 sm:px-4 lg:max-w-[56rem] max-w-[42rem] mx-auto space-y-8">

                    <?php if($orders): ?>
                    
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="sm:border border-y sm:rounded-lg shadow bg-white">

                                <div class="sm:p-6 border-b p-4 flex items-center sm:gap-x-6">

                                    <div class="flex flex-col sm:flex-row justify-between w-full text-sm gap-x-6">

                                        <div class="flex sm:w-6/12 sm:justify-evenly justify-between mb-5">

                                            <div>
                                                <h5 class="text-gray-900 font-medium">Order Code</h5>
                                                <p class="text-gray-500 mt-1">#<?php echo e($order->orderCode); ?></p>
                                            </div>

                                            <div>
                                                <h5 class="text-gray-900 font-medium">Date Placed</h5>
                                                <p class="text-gray-500 mt-1"><?php echo e(explode(' ', $order->created_at)[0]); ?></p>
                                            </div>

                                        </div>

                                        <div class="flex sm:w-6/12 sm:justify-evenly justify-between">

                                            <div>
                                                <h5 class="text-gray-900 font-medium">Close Time</h5>
                                                <?php if(preg_match('/\d/', $order->close_at)): ?>
                                                    <p class="text-gray-500 mt-1"><?php echo e(explode(' ', $order->close_at)[0]); ?></p>
                                                <?php else: ?>
                                                    <p class="text-gray-500 mt-1"><?php echo e($order->close_at); ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div>
                                                <h5 class="text-gray-900 font-medium">Total Amount</h5>
                                                <p class="text-gray-500 mt-1">$<?php echo e($order->price); ?></p>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <ul class="divide-y-2">

                                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <li class="sm:p-6 p-4">

                                            <div class="flex flex-col sm:flex-row sm:items-start items-center">

                                                <div class="bg-gray-200 rounded-lg overflow-hidden shrink-0 size-20 sm:size-40 mb-2 sm:mb-0">
                                                    <img class="object-cover size-full" src="<?php echo e(image($product->image, "products")); ?>" alt="Product Image">
                                                </div>
                                                
                                                <div class="text-sm flex-1 ml-6">

                                                    <div class="sm:flex sm:justify-between text-gray-900 font-medium">

                                                        <h4><?php echo e($product->name); ?></h4>
                                                        <p class="sm:mt-0 mt-2"><?php echo e($product->price); ?></p>

                                                    </div>

                                                    <p class="sm:block none sm:mt-2 p-2 rounded-md text-gray-500 bg-gray-50"><?php echo e($product->description); ?></p>

                                                </div>

                                            </div>

                                            <div class="sm:flex sm:justify-between mt-6">

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

                                                <div class="sm:pt-0 pt-4 sm:border-none sm:ml-4 sm:mt-0 mt-6 font-medium text-sm flex items-center divide-x">

                                                    <div class="pr-4 flex-1 flex justify-center">
                                                        <a href="/products/<?php echo e($product->slug); ?>" class="text-indigo-600 whitespace-nowrap">View Product</a>
                                                    </div>

                                                    <div class="pl-4 flex-1 flex justify-center">
                                                        <a href="/shopping-cart/add?productId=<?php echo e($product->id); ?>" class="text-indigo-600 whitespace-nowrap">Buy again</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                            </div>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                        <p class="text-gray-500 text-xl mt-2 text-center bg-white rounded-md py-5">There is not any orders yet!</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.user-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/panel/orders/orders.blade.php ENDPATH**/ ?>