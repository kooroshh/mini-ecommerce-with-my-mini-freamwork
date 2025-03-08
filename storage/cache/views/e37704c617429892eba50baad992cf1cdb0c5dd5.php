


<?php $__env->startSection("title", "Single Product Page"); ?>


<?php $__env->startSection("content"); ?>

    <div class="px-3 py-4 flex flex-col-reverse gap-7 lg:gap-0 lg:flex-row">

        <div class="lg:w-7/12 w-full">

            <img class="object-cover bg-gray-100 rounded-lg w-full h-auto hidden lg:block" src="<?php echo e(image($product->image, "products")); ?>" alt="Product Image">
            <div class="mt-10 divide-y">

                <div class="flex gap-8 *:whitespace-nowrap *:font-medium *:text-sm *:py-3 *:cursor-pointer">
                    <a id="commentsBtn" href="/products/<?php echo e($product->slug); ?>" class="text-indigo-600 border-b-2 border-indigo-600">
                        Comments
                    </a>
                    <div class="text-gray-700" id="addComment">
                        Add Comments
                    </div>
                </div>
                <div class="space-y-3 px-4" id="comments">
                    <?php if($comments): ?>
                        <?php
                            $counter = 0;
                        ?>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $counter++;
                            ?>
                            <div class="text-gray-500 text-sm flex">

                                <div class="py-5 flex-none mr-4">
                                    <img class="bg-gray-100 rounded-full size-10" src="<?php echo e(image($comment->image, "users")); ?>" alt="">
                                </div>
                                <div 
                                    <?php if($counter != 1): ?>
                                        class="py-5 grow border-t"
                                    <?php else: ?>
                                        class="py-5 grow"
                                    <?php endif; ?>
                                    >
                                    <h3 class="text-gray-900 font-medium"><?php echo e($comment->name); ?></h3>
                                    <p><?php echo e(explode(' ', $comment->created_at)[0]); ?></p>
                                    <div class="mt-4 bg-gray-50 w-full p-2 rounded-md">
                                        <p><?php echo e($comment->body); ?></p>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    <?php else: ?>
                        <p class="w-full text-center mt-4 text-4xl text-gray-500">There are not any comment yet</p>
                    <?php endif; ?>


                </div>
                <div class="hidden px-4" id="add-comment">
                    <?php if(auth()->check()): ?>
                        <form class="space-y-6" action="/products/comment/add" method="post" novalidate>

                            <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                            <input type="hidden" name="product_slug" value="<?php echo e($product->slug); ?>">

                            <div>
                                <label class="text-gray-900 font-medium text-sm block" for="body">Body</label>
                                <div class="mt-2">
                                    <textarea class="text-sm py-1.5 px-3 w-full min-h-20 rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" name="body" id="body"><?php echo e($old('body')); ?></textarea>
                                </div>
                                <?php if($errors->has('body')): ?>
                                    <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("body")); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Send Comment</button>
                            </div>

                        </form>
                    <?php else: ?>
                        <a href="/auth/sign-in" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full block mt-5 mx-auto text-center">Sign In</a>
                    <?php endif; ?>
                </div>

            </div>

        </div>
        <div class="lg:w-5/12 w-full px-2">
            <img class="mb-3 lg:hidden object-cover bg-gray-100 rounded-lg w-full h-auto" src="<?php echo e(image($product->image, "products")); ?>" alt="Product Image">
            <div class="space-y-5 divide-y-2">
                
                <div>
                    <h2 class="text-2xl sm:text-3xl text-gray-900 tracking-tight font-bold"><?php echo e($product->name); ?></h2>
                    <p class="text-gray-900  tracking-tight text-3xl mt-2">$<?php echo e($product->price); ?></p>
                    <p class="text-gray-500 my-6 w-full bg-gray-50 p-2 rounded-md"><?php echo e($product->description); ?></p>
                    <a href="/shopping-cart/add?productId=<?php echo e($product->id); ?>" class="block w-full bg-indigo-600 text-white text-center px-8 py-3 rounded-md">Add To Shopping Cart</a> 
                </div>
                <div class="pt-3">

                    <h3 class="text-lg sm:text-xl text-gray-900 tracking-tight font-bold">Categories</h3>
                    <div class="flex flex-wrap gap-3 mt-4 w-full">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-2 py-1 bg-gray-50 rounded-full"><?php echo e($category); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                <div class="pt-3">

                    <h3 class="text-lg sm:text-xl text-gray-900 tracking-tight font-bold">Products Details</h3>
                    <ol class="space-y-2 list-disc list-inside mt-4">
                        <li class="text-gray-900 tracking-tight text-xl">Stock: <?php echo e($product->count); ?></li>
                        <li class="text-gray-900 tracking-tight text-xl">Release Date: <?php echo e(explode(' ', $product->created_at)[0]); ?></li>
                        <li class="text-gray-900 tracking-tight text-xl">Last Update: <?php echo e(explode(' ', $product->updated_at)[0]); ?></li>
                    </ol>

                </div>
                <div class="pt-3">
                    <h3 class="text-lg sm:text-xl text-gray-900 tracking-tight font-bold">Share</h3>
                    <div class="flex gap-4 mt-3">

                        <a href="#">
                            <svg class="fill-gray-400 size-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                                <path d="M 20.302734 2.984375 C 20.013769 2.996945 19.748583 3.080055 19.515625 3.171875 C 19.300407 3.256634 18.52754 3.5814726 17.296875 4.0976562 C 16.06621 4.61384 14.435476 5.2982348 12.697266 6.0292969 C 9.2208449 7.4914211 5.314238 9.1361259 3.3125 9.9785156 C 3.243759 10.007156 2.9645852 10.092621 2.65625 10.328125 C 2.3471996 10.564176 2.0039062 11.076462 2.0039062 11.636719 C 2.0039062 12.088671 2.2295201 12.548966 2.5019531 12.8125 C 2.7743861 13.076034 3.0504903 13.199244 3.28125 13.291016 L 3.28125 13.289062 C 4.0612776 13.599827 6.3906939 14.531938 6.9453125 14.753906 C 7.1420423 15.343433 7.9865895 17.867278 8.1875 18.501953 L 8.1855469 18.501953 C 8.3275588 18.951162 8.4659791 19.243913 8.6582031 19.488281 C 8.7543151 19.610465 8.8690398 19.721184 9.0097656 19.808594 C 9.0637596 19.842134 9.1235454 19.868148 9.1835938 19.892578 C 9.191962 19.896131 9.2005867 19.897012 9.2089844 19.900391 L 9.1855469 19.894531 C 9.2029579 19.901531 9.2185841 19.911859 9.2363281 19.917969 C 9.2652427 19.927926 9.2852873 19.927599 9.3242188 19.935547 C 9.4612233 19.977694 9.5979794 20.005859 9.7246094 20.005859 C 10.26822 20.005859 10.601562 19.710937 10.601562 19.710938 L 10.623047 19.695312 L 12.970703 17.708984 L 15.845703 20.369141 C 15.898217 20.443289 16.309604 21 17.261719 21 C 17.829844 21 18.279025 20.718791 18.566406 20.423828 C 18.853787 20.128866 19.032804 19.82706 19.113281 19.417969 L 19.115234 19.416016 C 19.179414 19.085834 21.931641 5.265625 21.931641 5.265625 L 21.925781 5.2890625 C 22.011441 4.9067171 22.036735 4.5369631 21.935547 4.1601562 C 21.834358 3.7833495 21.561271 3.4156252 21.232422 3.2226562 C 20.903572 3.0296874 20.591699 2.9718046 20.302734 2.984375 z M 19.908203 5.1738281 C 19.799442 5.7198576 17.33401 18.105877 17.181641 18.882812 L 13.029297 15.041016 L 10.222656 17.414062 L 11 14.375 C 11 14.375 16.362547 8.9468594 16.685547 8.6308594 C 16.945547 8.3778594 17 8.2891719 17 8.2011719 C 17 8.0841719 16.939781 8 16.800781 8 C 16.675781 8 16.506016 8.1197812 16.416016 8.1757812 C 15.272368 8.8887854 10.401283 11.664685 8.0058594 13.027344 C 7.8617016 12.96954 5.6973962 12.100458 4.53125 11.634766 C 6.6055146 10.76177 10.161156 9.2658083 13.472656 7.8730469 C 15.210571 7.142109 16.840822 6.4570977 18.070312 5.9414062 C 19.108158 5.5060977 19.649538 5.2807035 19.908203 5.1738281 z M 17.152344 19.025391 C 17.152344 19.025391 17.154297 19.025391 17.154297 19.025391 C 17.154252 19.025621 17.152444 19.03095 17.152344 19.03125 C 17.153615 19.024789 17.15139 19.03045 17.152344 19.025391 z"></path>
                            </svg>
                        </a>

                        <a href="#">
                            <svg class="fill-gray-400 size-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                                <path d="M 8 3 C 5.239 3 3 5.239 3 8 L 3 16 C 3 18.761 5.239 21 8 21 L 16 21 C 18.761 21 21 18.761 21 16 L 21 8 C 21 5.239 18.761 3 16 3 L 8 3 z M 18 5 C 18.552 5 19 5.448 19 6 C 19 6.552 18.552 7 18 7 C 17.448 7 17 6.552 17 6 C 17 5.448 17.448 5 18 5 z M 12 7 C 14.761 7 17 9.239 17 12 C 17 14.761 14.761 17 12 17 C 9.239 17 7 14.761 7 12 C 7 9.239 9.239 7 12 7 z M 12 9 A 3 3 0 0 0 9 12 A 3 3 0 0 0 12 15 A 3 3 0 0 0 15 12 A 3 3 0 0 0 12 9 z"></path>
                            </svg>
                        </a>

                        <a href="#">
                            <svg class="fill-gray-400 size-5" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                                <path d="M12,2C6.477,2,2,6.477,2,12c0,5.013,3.693,9.153,8.505,9.876V14.65H8.031v-2.629h2.474v-1.749 c0-2.896,1.411-4.167,3.818-4.167c1.153,0,1.762,0.085,2.051,0.124v2.294h-1.642c-1.022,0-1.379,0.969-1.379,2.061v1.437h2.995 l-0.406,2.629h-2.588v7.247C18.235,21.236,22,17.062,22,12C22,6.477,17.523,2,12,2z"></path>
                            </svg>
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.complete", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/products/single-product.blade.php ENDPATH**/ ?>