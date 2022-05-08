

<?php $__env->startSection('title'); ?>
   Edit Registered
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit-role for Registered user</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/role-register-update<?php echo e($users->id); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>

                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" value="<?php echo e($users->name); ?>" class="form-control" placeholder="Name">
                                 </div>

                                 <div class="form-group">
                                    <label> Phone </label>
                                    <input type="text" name="phone" value="<?php echo e($users->phone); ?>" class="form-control" placeholder="Name">
                                 </div>

                                 <div class="form-group">
                                    <label>Email </label>
                                    <input type="text" name="email" value="<?php echo e($users->email); ?>" class="form-control" placeholder="Name">
                                 </div>



                                 <div class="form-group">
                                     <label >Give Role</label>
                                     <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="normaluser">Normal User</option>
                                    </select>
                                    </div>



                               <button type="submit" class="btn btn-success">Update</button>
                               <a href="/role-register" class="btn btn-danger">Cancel</a>
                               
                        
                       

                                     
                    </form>
                        </div>
                    </div>
 

                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/register-edit.blade.php ENDPATH**/ ?>