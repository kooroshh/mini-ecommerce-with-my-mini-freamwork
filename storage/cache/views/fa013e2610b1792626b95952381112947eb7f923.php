


<?php $__env->startSection('title','Create Articles'); ?>

<?php $__env->startSection('content'); ?>

    <?php if($auth): ?>
        <h1>You Are Logged</h1>
    <?php else: ?>
        <h1>You Are not Logged</h1>
    <?php endif; ?>

    <form action="/articles/create?id=62" method="post">
        <h2><?php echo e($title); ?></h2>
        <label for="title" class="form-label p-2">Title:</label>
        <input type="text" class="form-check my-1 p-1 w-100" name="title" id="title">
        <div class="w-100 d-flex justify-content-center mt-3">
            <button class="btn btn-primary p-2 px-5 " type="submit">Submit</button>
        </div>
    </form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Desktop\koori\session16 MVC\index2 Main\main\resources\views/articles/create.blade.php ENDPATH**/ ?>