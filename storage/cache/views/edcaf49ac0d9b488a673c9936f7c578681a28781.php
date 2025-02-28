

<?php $__env->startSection("title", "Error"); ?>


<?php $__env->startSection('content'); ?>

    <h1>Unknown Error</h1>
    <p><?php echo e($error); ?></p>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/errors/error.blade.php ENDPATH**/ ?>