<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('alumni/css/parsley.css')); ?>">
    <style>
        body{
            overflow-x: hidden;
        }
        .hiddenable{
            display: flex;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section class="mt-5 mb-5">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php endif; ?>


                    <?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <h2 class="bg-primary text-light p-3 text-center mb-5">Email Information</h2>
                    <form action="<?php echo e(route('event-send-mail-to-user')); ?>" method="POST" id="mail-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">To <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="email" value="<?php echo e($user->email); ?>" name="toMail" id="toMail"required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fromMail" class="col-2 col-form-label">From <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="email" name="fromMail" id="fromMail" value="<?php echo e(env('MAIL_USERNAME')); ?>" required="required" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-2 col-form-label">Subject <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="<?php echo e(old('subject')); ?>" type="text" name="subject" id="subject" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-2 col-form-label">Message <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <textarea name="message" id="message" class="form-control" cols="10" rows="10">Dear <?php echo e($user->name); ?>, </textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-12 text-center">
                                <input type="submit" value="Save Information" name="save" class="btn btn-primary btn-large p-3 pr-5 pl-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(URL::asset('alumni/js/parsley.min.js')); ?>"></script>
    <script>
        $('#mail-form').parsley();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/event/sendMail.blade.php ENDPATH**/ ?>