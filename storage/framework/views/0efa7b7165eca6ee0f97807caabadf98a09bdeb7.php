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
                        <button type="button" class="list-group-item list-group-item-action active">Latest Events</button>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('event.show',["id"=>$event->id])); ?>" class="list-group-item list-group-item-action"><?php echo e($event->title); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php echo e($events->links()); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/event.blade.php ENDPATH**/ ?>