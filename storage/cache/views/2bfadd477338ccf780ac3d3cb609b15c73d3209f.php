


<?php $__env->startSection("title", "Admin Panel"); ?>

<?php $__env->startSection("page"); ?>
    <a href="/admin-panel/products" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Products /</a> Add Product
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="p-3">
        <form class="space-y-6" action="/admin-panel/products/add" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
            
            <div class="flex flex-col justify-center items-center gap-2 mx-auto">
                <div>
                    <img id="objectImage" class="w-2/12 mx-auto rounded-md" src="<?php echo e(image('product.webp', "products")); ?>" alt="Product Image">
                </div>
                <label id="image" class="cursor-pointer block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
                    Select Image
                    <input type="file" class="hidden" id="image" name="image" accept=".jpg, .jpeg, .png">
                </label>
                <?php if($errors->has('image')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("image")); ?></p>
                <?php endif; ?>
            </div>

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
                <label class="text-gray-900 font-medium text-sm block" for="slug">Slug</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="slug" id="slug" value="<?php echo e($old('slug')); ?>">
                </div>
                <?php if($errors->has('slug')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("slug")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="description">Description</label>
                <div class="mt-2">
                    <textarea class="text-sm py-1.5 px-3 w-full min-h-20 rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" name="description" id="description"><?php echo e($old('description')); ?></textarea>
                </div>
                <?php if($errors->has('description')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("description")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="price">Price</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 w-full block rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="price" id="price" value="<?php echo e($old('price')); ?>">
                </div>
                <?php if($errors->has('price')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("price")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="count">Count</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 w-full block rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="number" name="count" id="count" value="<?php echo e($old('count')); ?>">
                </div>
                <?php if($errors->has('count')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("count")); ?></p>
                <?php endif; ?>
            </div>

            <div>
                <h3 class="text-gray-900 font-medium text-sm block" for="categories">Categories</h3>
                <div class="mt-2 bg-white py-3 px-6 flex flex-wrap gap-7 items-center rounded-md">

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($old('categories')): ?>

                            <?php if(in_array($value->name, $old("categories"))): ?>
                                <label class="bg-gray-200 rounded-full px-4 py-2 select-none" for="category_<?php echo e($key); ?>">
                                    <input checked type="checkbox" class="checker hidden" name="categories[]" id="category_<?php echo e($key); ?>" value="<?php echo e($value->name); ?>">
                                    <?php echo e($value->name); ?>

                                </label> 
                            <?php else: ?>
                                <label class="border rounded-full px-4 py-2 select-none" for="category_<?php echo e($key); ?>">
                                    <input  type="checkbox" class="checker hidden" name="categories[]" id="category_<?php echo e($key); ?>" value="<?php echo e($value->name); ?>">
                                    <?php echo e($value->name); ?>

                                </label>
                            <?php endif; ?>

                        <?php else: ?>
                            <label class="border rounded-full px-4 py-2 select-none" for="category_<?php echo e($key); ?>">
                                <input  type="checkbox" class="checker hidden" name="categories[]" id="category_<?php echo e($key); ?>" value="<?php echo e($value->name); ?>">
                                <?php echo e($value->name); ?>

                            </label>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($errors->has('categories')): ?>
                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("categories")); ?></p>
                <?php endif; ?>
            </div>


            <div class="pt-4">
                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Add Product</button>
            </div>

        </form>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make("layouts.admin-panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/admin-panel/tools/add-product-tool.blade.php ENDPATH**/ ?>