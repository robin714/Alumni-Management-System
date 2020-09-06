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
                    <h2 class="bg-primary text-light p-3 text-center mb-5">Notice Information</h2>
                    <form action="<?php echo e(route('notice.store')); ?>" method="POST" id="notice-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required="required" data-parsley-length="[3, 40]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-2 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <textarea name="description" id="description" class="form-control" cols="10" rows="10"><?php echo e(old('description')); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">Department <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select id="department" name="department_id" class="form-control">
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>" <?php echo e(old('department_id') == $department->id ? 'selected':''); ?>><?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
        $('#notice-form').parsley();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\ams\resources\views/alumni/notice/create.blade.php ENDPATH**/ ?>