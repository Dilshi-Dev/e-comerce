

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Order Management </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
    <!-- <?php if($errors -> any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($errors); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?> -->




    <div class="container mt-5">
        <form action="<?php echo e(url('order-update')); ?>" method="POST">
       <?php echo csrf_field(); ?>
          <input type="hidden" name="id" value="<?php echo e($order->id); ?>">
            <div class="form-grp">
                <label>Date</label>
                <input type="text" name="date" class="form-control" value=" <?php echo e($order->date); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Order Type</label>
                <input type="text" name="ordertypr" class="form-control" value="<?php echo e($order->ordertypr); ?>">
            </div>

            <div class="form-grp">
                <label>Transaction Code</label>
                <input type="text" name="transactioncode" class="form-control" value="<?php echo e($order->transactioncode); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Price per/kg</label>
                <input type="text" name="priceperkg" class="form-control" value="<?php echo e($order->priceperkg); ?>" >
            </div>

            <br>
            <div class="form-grp">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control" value=" <?php echo e($order->quantity); ?>" >
           
            <br>
            <div class="form-grp">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo e($order->price); ?>" >
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>
     </div>


               


    </body>
</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/orderedit.blade.php ENDPATH**/ ?>