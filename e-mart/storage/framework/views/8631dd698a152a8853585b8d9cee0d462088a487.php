

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Delivery details</title>
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
        <form action="<?php echo e(url('delivery-save')); ?>" method="POST">
       <?php echo csrf_field(); ?>
            <div class="form-grp">
                <label>Trackingno</label>
                <input type="text" name="trackingno" class="form-control" value="<?php echo e(old('trackingno')); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Orderplacement</label>
                <input type="text" name="orderplacement" class="form-control" value="<?php echo e(old('orderplacement')); ?>"> 
            </div>

            <div class="form-grp">
                <label>Vehicleno</label>
                <input type="text" name="vehicleno" class="form-control" value="<?php echo e(old('vehicleno')); ?>">
            </div>

            <br>
            <div class="form-grp">
                <label>Deliverycharge</label>
                <input type="text" name="deliverycharge" class="form-control" value="<?php echo e(old('deliverycharge')); ?>" >
            </div>

            <br>
            <div class="form-grp">
            <label>Receivers Phone number</label>
            <input type="text" name="receiversnumber" class="form-control"  value="<?php echo e(old('receiversnumber')); ?>">
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>
        

        <br>
        <br>
        <form action="">
            <div class="input-group rounded">
                <input type="search" name="search" class="form-control rounded" value="<?php echo e($search); ?>" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
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
              <table class="table">
                 <thead>
                 <tr>
                        <th>Tracking Number</th>
                        <th>Order Placement</th>
                        <th>Vehicle Number</th>
                        <th>Delivery Charge</th>
                        <th>Receiver Contact</th>
                        <th>Action</th>
                      </tr>
                </thead>
                 <tbody>
   
                        <?php $__currentLoopData = $deliverydetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($deliverydetail->trackingno); ?></td>
                            <td><?php echo e($deliverydetail->orderplacement); ?></td>
                            <td><?php echo e($deliverydetail->vehicleno); ?></td>
                            <td><?php echo e($deliverydetail->deliverycharge); ?></td>
                            <td><?php echo e($deliverydetail->receiversnumber); ?></td>
                            
                             

                            <td>
                                <a href="<?php echo e(url('delivery-edit')); ?>/<?php echo e($deliverydetail->id); ?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo e(url('delivery-delete')); ?>/<?php echo e($deliverydetail->id); ?>" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    

                        
                        
                </tbody>
            </table>
            <span data-href="<?php echo e(url('tasks')); ?>" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/deliverydetails.blade.php ENDPATH**/ ?>