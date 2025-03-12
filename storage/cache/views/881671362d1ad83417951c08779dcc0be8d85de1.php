

<?php $__env->startSection('title', "Sign In Page"); ?>


<?php $__env->startSection('content'); ?>


    <div class="min-h-screen px-2 flex flex-col justify-center bg-gray-50">

        <div class="min-h-full py-12 px-8 flex flex-col justify-center flex-[1]">

            <div class="max-w-[28rem] w-full mx-auto">
            
                <a href="/"><img class="w-auto h-10 mx-auto" src="<?php echo e(image('logo.png')); ?>" alt="Logo" width="176" height="136"></a>
                <h2 class="text-gray-900 tracking-tight font-bold text-2xl text-center mt-6">Sign in to your account</h2>

            </div>

            <div class="max-w-[30rem] w-full mx-auto mt-10">

                <div class="lg:p-12 p-5 rounded-lg shadow bg-white">

                    <form class="space-y-6" action="/auth/sign-in" method="post" novalidate>
                        <input type="hidden" name="_token" value="<?php echo e(session()->get('_token')); ?>">
                        <div>
                            <label class="text-gray-900 font-medium text-sm block" for="email">Email Address</label>
                            <div class="mt-2">
                                <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="email" name="email" id="email" value="<?php echo e($old('email')); ?>">
                            </div>
                            <?php if($errors->has('email')): ?>
                                <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("email")); ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label class="text-gray-900 font-medium text-sm block" for="password">Password</label>
                            <div class="mt-2">
                                <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="password" name="password" id="password" value="<?php echo e($old('password')); ?>">
                            </div>
                            <?php if($errors->has('password')): ?>
                                <p class="text-xs text-red-500 mt-1 pl-2.5"><?php echo e($errors->first("password")); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Sing In</button>
                        </div>

                    </form>

                    <div>

                        <div class="mt-10 flex gap-3 items-center">

                            <div class="lg:w-4/12 md:w-3/12 w-2/12 bg-gray-200 py-[0.03rem] h-0"></div>
                            <p class="lg:w-4/12 md:w-6/12 w-8/12 font-medium lg:text-sm text-xs text-gray-900 text-center">Or Continuo With</p>
                            <div class="lg:w-4/12 md:w-3/12 w-2/12 bg-gray-200 py-[0.03rem] h-0"></div>

                        </div>

                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 mt-6">

                            <button class="ring-inset ring-1 ring-gray-300 shadow text-gray-900 font-semibold bg-gray-50 rounded-md flex justify-center items-center gap-3 w-full py-2 px-3" title="Disable" disabled>
                                <svg class="size-5" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335"></path><path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4"></path><path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05"></path><path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.2654 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853"></path></svg>
                                <span class="text-sm">Google</span>
                            </button>
                            <button class="ring-inset ring-1 ring-gray-300 shadow text-gray-900 font-semibold bg-gray-50 rounded-md flex justify-center items-center gap-3 w-full py-2 px-3" title="Disable" disabled>
                                <svg class="size-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                <span class="text-sm">Github</span>
                            </button>

                        </div>

                    </div>


                </div>

                <p class="text-sm text-gray-500 text-center mt-10">Not A Member? <a class="text-indigo-600 font-semibold" href="/auth/register">Register</a></p>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.blank", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/auth/singIn.blade.php ENDPATH**/ ?>