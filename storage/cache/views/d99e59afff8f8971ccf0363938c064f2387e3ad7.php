

<?php
    $username = auth()->user()->name;
?>

<?php $__env->startSection('title', "User Panel - $username"); ?>


<?php $__env->startSection('content'); ?>

    <h1>User Panel</h1>
    <p><?php echo e($username); ?></p>
    <a href="/auth/logout">Logout</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/user/index.blade.php ENDPATH**/ ?>