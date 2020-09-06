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
                    <h2 class="bg-primary text-light p-3 text-center mb-5">User Information</h2>
                    <form action="<?php echo e(url('user/update/'.$user->id)); ?>" method="POST" id="registration-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Full Name <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="name" id="name" value="<?php echo e($user->name); ?>" required="required" data-parsley-length="[3, 40]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_id" class="col-2 col-form-label">ID <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="<?php echo e($user->unique_id); ?>" name="unique_id" id="unique_id" autocomplete="ON" required="required" data-parsley-length="[1, 40]">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-2 col-form-label">Address <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="<?php echo e($user->address); ?>" type="text" name="address" id="address" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-2 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control" value="<?php echo e($user->phone); ?>" type="text" name="phone" id="phone" autocomplete="OFF" required="required" data-parsley-length="[4, 15]">
                            </div>
                        </div>
                        <?php if($user->role_id != 1): ?>
                            <?php if(Auth::user()->role_id < 3): ?>
                                <div class="form-group row">
                                    <label for="role_id" class="col-2 col-form-label">User Type <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <select id="role_id" class="form-control" name="role_id" required="required">
                                            <option value="">Select User Type</option>
                                            <?php if(Auth::user()->role_id == 1): ?>
                                                <option value="2" <?php echo e($user->role_id == 2 ? 'selected':''); ?>>Admin</option>
                                            <?php endif; ?>
                                            <option value="3" <?php echo e($user->role_id == 3 ? 'selected':''); ?>>Moderator</option>
                                            <option value="4" <?php echo e($user->role_id == 4 ? 'selected':''); ?>>Alumni Student</option>
                                            <option value="5" <?php echo e($user->role_id == 5 ? 'selected':''); ?>>Running Student</option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <div class="form-group row">
                            <label for="department_id" class="col-2 col-form-label">Department <span class="text-danger">*</span></label>
                            <div class="col-10">
                                <select id="department_id" name="department_id" class="form-control" required="required">
                                    <option value="">Select Your Department</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php echo e($user->department_id == $department->id ? 'selected':''); ?>><?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                            <?php if($user->role_id > 3): ?>
                                <div class="form-group row">
                                    <label for="program" class="col-2 col-form-label">Program <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <select id="program" class="form-control" name="program">
                                            <option value="">Select Your Program</option>
                                            <option value="1" <?php echo e($user->program == 1 ? 'selected':''); ?>>Under Graduation</option>
                                            <option value="2" <?php echo e($user->program == 2 ? 'selected':''); ?>>Post Graduation</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="batch" class="col-2 col-form-label">Batch</label>
                                    <div class="col-10">
                                        <input class="form-control" value="<?php echo e($user->batch); ?>" type="number" name="batch" id="batch" autocomplete="OFF">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="job" class="col-2 col-form-label">Job</label>
                                    <div class="col-10">
                                        <input class="form-control" value="<?php echo e($user->job); ?>" type="text" id="job" name="job" autocomplete="ON" placeholder="Job Title / NA">
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(Auth::user()->role_id < 3): ?>
                            <div class="form-group row">
                                <label for="status" class="col-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <select id="status" class="form-control" name="status" required>
                                        <option value="">Change Status</option>
                                        <option value="1" <?php echo e($user->status == 1 ? 'selected':''); ?>>Enable</option>
                                        <option value="2" <?php echo e($user->status == 2 ? 'selected':''); ?>>Disable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-2 col-form-label">Password <span class="text-danger">*</span></label>
                                <div class="col-10">
                                    <input class="form-control" type="password" name="password" id="password" placeholder="******" data-parsley-length="[6, 40]">
                                </div>
                            </div>
                        <?php endif; ?>
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
        $('#registration-form').parsley();
    </script>
    <script>
        $("#role_id").on('change',function(){
            let role_id = ($('#role_id').val());
            if(role_id == 3 || role_id == 2){
                $(".hiddenable").css('display','none');
            }else if(role_id == 4 || role_id == 5){
                $(".hiddenable").css('display','flex');
            }else{
                $(".hiddenable").css('display','flex');
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/user-edit.blade.php ENDPATH**/ ?>