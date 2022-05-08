

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Employee Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>

    




    <div class="container mt-5">
        <form action="<?php echo e(url('delivery-save')); ?>" method="POST">
       <?php echo csrf_field(); ?>
            <div class="form-grp">
                <label>Stock Name</label>
                <input type="text" name="stockname" class="form-control" value="<?php echo e(old('stockname')); ?>">
            </div>
         

            <br>
            <div class="form-grp">
                <label>Quantity</label>
                <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>"> 
            </div>

            <div class="form-grp">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo e(old('price')); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Suppliername</label>
                <input type="text" name="suppliername" class="form-control" value="<?php echo e(old('suppliername')); ?>" >
            </div>

            <br>
            <div class="form-grp">
            <label>Add poto</label>
            <input type="file" name="itemimg" class="form-control"  value="<?php echo e(old('itemimg')); ?>">
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>
        

        <br>
        <br>


              <?php if(Session::has('message')): ?>
              <div class="alert alert-<?php echo e(Session::get('class')); ?> alert-dismissible fade show" role="alert">
                <strong><?php echo e(Session::get('message')); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <?php endif; ?>

             <table class="table" >
                 <thead>
                 <tr>
                        <th>Tracking Number</th>
                        <th>Order Placement</th>
                        <th>Vehicle Number</th>
                        <th>Delivery Number</th>
                        <th>Receiver Contact</th>
                        <th>Action</th>
                      </tr>
                </thead>
                 <tbody>
   
                        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($items->stockname); ?></td>
                            <td><?php echo e($items->quantity); ?></td>
                            <td><?php echo e($items->price); ?></td>
                            <td><?php echo e($items->suppliername); ?></td>
                            <td><?php echo e($items->itemimg); ?></td>

                            

                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    

                        
                        
                </tbody>
            </table>


          </div>


               


    </body>
</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/itemdetails.blade.php ENDPATH**/ ?>