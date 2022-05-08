

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
    <?php if($errors -> any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($errors); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>




    <div class="container mt-5">
        <form action="<?php echo e(url('order-save')); ?>" method="POST">
       <?php echo csrf_field(); ?>
            <div class="form-grp">
                <label>Date</label>
                <input type="text" name="date" class="form-control" value="<?php echo e(old('date')); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Order Type</label>
                <input type="text" name="ordertypr" class="form-control" value="<?php echo e(old('ordertypr')); ?>">
            </div>

            <div class="form-grp">
                <label>Transaction Code</label>
                <input type="text" name="transactioncode" class="form-control" value="<?php echo e(old('transactioncode')); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Price per/kg</label>
                <input type="text" name="priceperkg" class="form-control" value="<?php echo e(old('priceperkg')); ?>" >
            </div>

            <br>
            <div class="form-grp">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>">
           
            <br>
            <div class="form-grp">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo e(old('price')); ?>" >
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>

        <br><br><br>


            <form action="">
                <div class="input-group rounded">
                    <input type="search" name="search" class="form-control" value="<?php echo e($search); ?>" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </div>
                <button class="btn btn-primary">Search</button>
             </form>



              <?php if(Session::has('message')): ?>
              <div class="alert alert-<?php echo e(Session::get('class')); ?> alert-dismissible fade show" role="alert">
                <strong><?php echo e(Session::get('message')); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <?php endif; ?>


             <table class="table table-bordered table-green">
                 <thead>
                      <tr>
                        <th>Date</th>
                        <th>Order Type</th>
                        <th>Transaction Code</th>
                        <th>Price Per Kg</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                </thead>
                 <tbody>
   
                         <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td><?php echo e($order->date); ?></td>
                            <td><?php echo e($order->ordertypr); ?></td>
                            <td><?php echo e($order->transactioncode); ?></td>
                            <td><?php echo e($order->priceperkg); ?></td> 
                            <td><?php echo e($order->quantity); ?></td> 
                            <td><?php echo e($order->price); ?></td> 
                            <td>
                                <a href="<?php echo e(url('order-edit')); ?>/<?php echo e($order->id); ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo e(url('order-delete')); ?>/<?php echo e($order->id); ?>" class="btn btn-danger">Delete</a> 

                        </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  

                        
                        
                </tbody>
            </table>
            <span data-href="<?php echo e(url('ordertask')); ?>" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">
                Export
            </span>
            <script>
                function exportTasks(_this) {
                    let _url = $(_this).data('href');
                    window.location.href = _url;
                }
            </script>


          </div>


               


    </body>
</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/ordercreate.blade.php ENDPATH**/ ?>