

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<html>
    <head>
        
    </head>
    <body>
        <br><br>
       
        <img src="<?php echo e(url('.\assets\img\vegetable.jpg')); ?>" alt="im here" width="100%" height="100%" >
    </body>
</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>