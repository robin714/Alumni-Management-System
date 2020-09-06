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
                        <button type="button" class="list-group-item list-group-item-action active">Latest Notice</button>

                        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('notice.show',["id"=>$notice->id])); ?>" class="list-group-item list-group-item-action"><?php echo e($notice->title); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php echo e($notices->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/notice-list.blade.php ENDPATH**/ ?>