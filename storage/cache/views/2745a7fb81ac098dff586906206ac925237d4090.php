

<?php $__env->startSection("title", "Error"); ?>


<?php $__env->startSection('content'); ?>

    <h1><?php echo e($error->getMessage()); ?></h1>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/errors/404.blade.php ENDPATH**/ ?>