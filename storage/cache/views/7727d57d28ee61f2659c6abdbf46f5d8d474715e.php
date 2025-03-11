


<?php $__env->startSection("title", "Checkout"); ?>


<?php $__env->startSection("content"); ?>

    <div class="lg:px-8 sm:px-6 px-4 sm:pb-24 pb-16 sm:pt-8 pt-4 max-w-[80rem] mx-auto">

        <div class="grid lg:grid-cols-2 grid-cols-1 lg:max-w-none max-w-[32rem] gap-y-16 gap-x-8 mx-auto">

            <div class="max-w-[32rem] w-full mx-auto">

                <ul class="divide-y">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li class="py-6 flex">

                            <div class="shrink-0">
                                <img class="sm:size-32 size-24 object-cover rounded-md" src="<?php echo e(image($product->image, "products")); ?>" alt="Product Image">
                            </div>
                            <div class="sm:ml-6 ml-4 flex flex-row justify-between flex-1">

                                <div class="w-full">

                                    <div class="flex flex-col gap-2">
                                        <h4 class="text-sm font-medium"><?php echo e($product->name); ?></h4>
                                        <p class="text-gray-900 font-medium text-sm">$<?php echo e($product->price); ?></p>
                                    </div>

                                </div>
                                <div class="flex justify-end w-fit">


                                    <a class="text-indigo-600 font-medium text-sm block" href="<?php echo e("/shopping-cart/remove?productId={$product->id}"); ?>">Remove</a>

                                </div>

                            </div>

                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>

                <div class="flex justify-between text-gray-900 pt-6 border-gray-200 border-t font-medium text-base mt-10">
                    <p>Total</p>
                    <p>$<?php echo e($totalPrice); ?></p>
                </div>



            </div>
            <div class="max-w-[32rem] w-full mx-auto">

                <a href="/checkout/paid?orderCode=<?php echo e($orderCode); ?>" class="flex justify-center items-center w-full py-2 bg-black border border-transparent rounded-md">
                    <svg class="w-auto h-5 text-white" fill="currentColor" viewBox="0 0 50 20"><path d="M9.536 2.579c-.571.675-1.485 1.208-2.4 1.132-.113-.914.334-1.884.858-2.484C8.565.533 9.564.038 10.374 0c.095.951-.276 1.884-.838 2.579zm.829 1.313c-1.324-.077-2.457.751-3.085.751-.638 0-1.6-.713-2.647-.694-1.362.019-2.628.79-3.323 2.017-1.429 2.455-.372 6.09 1.009 8.087.676.99 1.485 2.075 2.552 2.036 1.009-.038 1.409-.656 2.628-.656 1.228 0 1.58.656 2.647.637 1.104-.019 1.8-.99 2.475-1.979.771-1.122 1.086-2.217 1.105-2.274-.02-.019-2.133-.828-2.152-3.263-.02-2.036 1.666-3.007 1.742-3.064-.952-1.408-2.437-1.56-2.951-1.598zm7.645-2.76v14.834h2.305v-5.072h3.19c2.913 0 4.96-1.998 4.96-4.89 0-2.893-2.01-4.872-4.885-4.872h-5.57zm2.305 1.941h2.656c2 0 3.142 1.066 3.142 2.94 0 1.875-1.142 2.95-3.151 2.95h-2.647v-5.89zM32.673 16.08c1.448 0 2.79-.733 3.4-1.893h.047v1.779h2.133V8.582c0-2.14-1.714-3.52-4.351-3.52-2.447 0-4.256 1.399-4.323 3.32h2.076c.171-.913 1.018-1.512 2.18-1.512 1.41 0 2.2.656 2.2 1.865v.818l-2.876.171c-2.675.162-4.123 1.256-4.123 3.159 0 1.922 1.495 3.197 3.637 3.197zm.62-1.76c-1.229 0-2.01-.59-2.01-1.494 0-.933.752-1.475 2.19-1.56l2.562-.162v.837c0 1.39-1.181 2.379-2.743 2.379zM41.1 20c2.247 0 3.304-.856 4.227-3.454l4.047-11.341h-2.342l-2.714 8.763h-.047l-2.714-8.763h-2.409l3.904 10.799-.21.656c-.352 1.114-.923 1.542-1.942 1.542-.18 0-.533-.02-.676-.038v1.779c.133.038.705.057.876.057z"></path></svg>
                </a>

                <div class="mt-10 flex gap-3 items-center">

                    <div class="lg:w-5/12 w-5/12 bg-gray-200 py-[0.03rem] h-0"></div>
                    <p class="lg:w-2/12 w-2/12 font-medium lg:text-sm text-xs text-gray-900 text-center">Or</p>
                    <div class="lg:w-5/12 w-5/12 bg-gray-200 py-[0.03rem] h-0"></div>

                </div>

                <form class="space-y-6" action="/checkout/pay" method="post" novalidate>
                    <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
                    <input type="hidden" name="orderCode" value="<?php echo e($orderCode); ?>">
                    <div>
                        <label class="text-gray-900 font-medium text-sm block" for="nameOfCard">Name of card</label>
                        <div class="mt-2">
                            <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="nameOfCard" id="nameOfCard" value="<?php echo e($old('nameOfCard')); ?>">
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-900 font-medium text-sm block" for="cardNumber">Card Number</label>
                        <div class="mt-2">
                            <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="cardNumber" id="cardNumber" value="<?php echo e($old('cardNumber')); ?>">
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-900 font-medium text-sm block" for="expirationDate">Expiration Date (MM/YY)</label>
                        <div class="mt-2">
                            <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="expirationDate" id="expirationDate" value="<?php echo e($old('expirationDate')); ?>">
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-900 font-medium text-sm block" for="cvc">CVC</label>
                        <div class="mt-2">
                            <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="cvc" id="cvc" value="<?php echo e($old('cvc')); ?>">
                        </div>
                    </div>

                    <?php if($errors->has('error')): ?>
                        <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("error")); ?></p>
                    <?php endif; ?>

                    <div class="pt-4 grid grid-cols-2 gap-4">
                        <a href="/checkout/cancel?orderCode=<?php echo e($orderCode); ?>" class="block bg-white py-2 px-3 rounded border-2 w-full text-center">Cancel Order</a>
                        <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Pay</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.complete", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/checkout/checkout.blade.php ENDPATH**/ ?>