


<?php $__env->startSection("title", "Products Page"); ?>


<?php $__env->startSection("content"); ?>

    <div class="grid lg:grid-cols-3 lg:gap-x-8 pb-24 pt-12 px-5">
    
        <div>

            <form action="/products" method="post" novalidate class="flex flex-col">
                <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">

                <div class="flex py-10 w-full">
                    <input type="search" name="search" id="search" class="border rounded rounded-r-none p-2 outline-none grow" value="<?php echo e($search ? $search : ''); ?>">
                    <button class="border border-l-0 rounded rounded-l-none p-2 bg-indigo-600 text-white" type="submit" name="filter" value="search">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                <?php if($errors->has('search')): ?>
                    <p class="text-xs text-red-500 -mt-5 pb-5 pl-2.5"><?php echo e($errors->first("search")); ?></p>
                <?php endif; ?>
                
                <div class="py-10 border-t">

                    <h3 class="text-gray-900 font-medium text-sm block">Categories</h3>
                    <div class="pt-6 space-y-6">

                        <?php if($categories): ?>


                            
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex gap-3 items-center ml-2">

                                    <?php if($lastCategories): ?>
                                        <?php if(in_array($category->name, $lastCategories)): ?>
                                            <input checked type="checkbox" name="categories[]" value="<?php echo e($category->name); ?>" id="category_<?php echo e($category->name); ?>" class="bg-white border border-gray-300  rounded-sm size-4 shrink-0">
                                        <?php else: ?>
                                            <input type="checkbox" name="categories[]" value="<?php echo e($category->name); ?>" id="category_<?php echo e($category->name); ?>" class="bg-white border border-gray-300  rounded-sm size-4 shrink-0">
                                        <?php endif; ?>
                                        <label for="category_<?php echo e($category->name); ?>" class="text-gray-600 text-sm"><?php echo e($category->name); ?></label>
                                    <?php else: ?>
                                        <input type="checkbox" name="categories[]" value="<?php echo e($category->name); ?>" id="category_<?php echo e($category->name); ?>" class="bg-white border border-gray-300  rounded-sm size-4 shrink-0">
                                        <label for="category_<?php echo e($category->name); ?>" class="text-gray-600 text-sm"><?php echo e($category->name); ?></label>

                                    <?php endif; ?>


                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <div class="pt-4">
                                <button class="bg-indigo-600 text-white font-medium rounded-lg py-2 w-full" type="submit" name="filter" value="filter">Filter</button>
                            </div>
                            <?php if($errors->has('categories')): ?>
                                <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("categories")); ?></p>
                            <?php endif; ?>

                        <?php else: ?>
                            <p class="text-gray-500 text-lg text-center w-full">There is not any category yet!</p>
                        <?php endif; ?>

                    </div>

                </div>

            </form>



        </div>
        <div class="lg:mt-0 mt-6 lg:col-span-2">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:gap-x-8 sm:gap-x-6 gap-y-4 lg:gap-y-10">

                <?php if($products): ?>
                
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <a href="/products/<?php echo e($product->slug); ?>" class="block">
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">

                                <img class="sm:h-96 object-cover bg-gray-200 hover:scale-105 transition duration-500" src="<?php echo e(image($product->image, "products")); ?>" alt="Product Image">
                                <div class="p-4 flex-1 flex flex-col space-y-2">

                                    <h3 class="text-gray-900 font-medium"><?php echo e($product->name); ?></h3>
                                    <p class="text-gray-500 truncate"><?php echo e($product->description); ?></p>
                                    <p class="text-gray-500 text-sm">Stock: <?php echo e($product->count); ?></p>
                                    <p class="text-gray-900 font-medium text-base">$<?php echo e($product->price); ?></p>
                                </div>

                            </div>
                        </a>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                    <p class="text-gray-500 text-lg text-center w-full col-start-1 col-end-3">There is not any product yet!</p>
                <?php endif; ?>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.complete", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\1_PHP\session9 MVC\index2 Main\main\resources\views/products/products.blade.php ENDPATH**/ ?>