<?php $__env->startPush('styles'); ?>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="list-group">
                        <form action="<?php echo e(url('search-people')); ?>" role="search" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group-stylish row">
                                <div class="col-sm-2"></div>   
                                <div class="col-sm-6">
                                    <input type="text" name="query" class="form-control" placeholder="Enter name or email or id">
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" type="submit" style="max-width: 120px;">Search</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="list-group">
                        <?php if(isset($users)): ?>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('user-view',["id"=>$user->id])); ?>" class="list-group-item list-group-item-action">Name: <?php echo e($user->name); ?>, ID: <?php echo e($user->unique_id); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h3>No data found</h3>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\ams\resources\views/alumni/search.blade.php ENDPATH**/ ?>