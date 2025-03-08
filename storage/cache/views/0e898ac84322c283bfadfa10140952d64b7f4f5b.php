


<?php $__env->startSection("title", "ShoppingCart"); ?>


<?php $__env->startSection("content"); ?>

    <div class="sm:py-24 py-16 sm:px-6 px-4 max-w-[42rem] mx-auto">

        <h2 class="sm:text-4xl text-3xl text-gray-900 tracking-tight font-bold text-center">Shopping Cart</h2>

        <?php if($productCount): ?>
            <form action="/checkout" method="post" class="mt-12">

                <ul class="border-gray-200 border-y divide-y">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li class="py-6 flex">

                            <div class="shrink-0">
                                <img class="sm:size-32 size-24 object-cover rounded-md" src="<?php echo e(image($product->image, "products")); ?>" alt="Product Image">
                            </div>
                            <div class="sm:ml-6 ml-4 flex flex-col flex-1">

                                <div>

                                    <div class="flex justify-between">
                                        <h4 class="text-sm font-medium"><?php echo e($product->name); ?></h4>
                                        <p class="text-gray-900 font-medium text-sm ml-4">$<?php echo e($product->price); ?></p>
                                    </div>

                                </div>
                                <div class="flex justify-between items-end flex-1 mt-4">

                                    <?php if($product->count): ?>
                                        <p class="text-gray-700 text-sm flex items-center">
                                            <svg class="text-green-500 shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd"></path></svg>
                                            <span class="ml-2">In Stock</span>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-gray-700 text-sm flex items-center">
                                            <svg class="text-red-500 shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            <span class="ml-2">Out of Stock</span>
                                        </p>
                                    <?php endif; ?>

                                    <a class="text-indigo-600 font-medium text-sm block" href="<?php echo e("/shopping-cart/remove?productId={$product->id}"); ?>">Remove</a>

                                </div>

                            </div>

                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>

                <div class="mt-10">

                    <div>

                        <div class="flex justify-between items-center text-gray-900 font-medium text-base">
                            <p>Total</p>
                            <p>$<?php echo e($totalPrice); ?></p>
                        </div>
                        <p class="text-gray-500 text-sm mt-1">The Final Amount Displayed In The Checkout</p>

                    </div>

                    <a href="/checkout" class="block mt-10 shadow text-white bg-indigo-600 font-medium text-base py-3 px-4 border border-transparent rounded-md w-full text-center">Checkout</a>

                    <p class="text-gray-500 text-sm text-center mt-6">

                        Or 
                        <a href="/products" class="text-indigo-600 font-medium inline-flex gap-1">
                            Continue Shopping
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>

                    </p>                    

                </div>


            </form>
        <?php else: ?>

            <h3 class="sm:text-2xl text-xl text-gray-500 tracking-tight font-medium text-center mt-5">There Is Not Any Product Yet!</h3>
            <a href="/products" class="py-2 px-3 bg-indigo-600 text-white block w-fit mx-auto rounded-md mt-3">Go Shopping</a>

        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.complete", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/shopping-cart/shopping-cart.blade.php ENDPATH**/ ?>