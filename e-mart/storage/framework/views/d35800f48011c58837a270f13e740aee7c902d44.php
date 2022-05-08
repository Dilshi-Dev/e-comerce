

<?php $__env->startSection('title'); ?>
    Registered Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Employee Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
      <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> Registered Roles</h4>
                      
                      <form action="">
                        <div class="input-group rounded">
                            <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
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


                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <th>ID </th>
                            <th>Name </th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Usertype</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </thead>
                          <tbody>
                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($row->id); ?></td>
                              <td><?php echo e($row->name); ?></td>
                              <td><?php echo e($row->phone); ?></td>
                              <td><?php echo e($row->email); ?></td>
                              <td><?php echo e($row->usertype); ?></td>
                              <td>
                                  <a href="/role-edit/<?php echo e($row->id); ?>" class="btn btn-success">Edit</a>
                              </td>
                              <td>
                                <form action="/role-delete/<?php echo e($row->id); ?>" method="post">
                                  <?php echo e(csrf_field()); ?>

                                  <?php echo e(method_field('DELETE')); ?>

                                  <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                              </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                          </tbody>
                        </table>
                        <span data-href="<?php echo e(url('usertask')); ?>" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">
                            Export
                        </span>
                        <script>
                            function exportTasks(_this) {
                                let _url = $(_this).data('href');
                                window.location.href = _url;
                            }
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </body>
</html>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\E-Mart\e-mart\resources\views/admin/register.blade.php ENDPATH**/ ?>