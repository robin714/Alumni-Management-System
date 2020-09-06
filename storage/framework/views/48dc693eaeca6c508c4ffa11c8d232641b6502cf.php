<?php $__env->startPush('styles'); ?>
    <style>
        body{
            overflow-x: hidden;
        }
        .slide{
            position: relative;
        }
        .content{
            position: absolute;
            bottom: 70px;
            background-color: #000000;
            left: 100px;
            padding: 10px 40px;
            opacity: 0.7;
            color: #ffffff;
        }
        .content h2{
            font-size: 45px;
            font-weight: 900;
        }
        table tr th{
            margin-right: 50px;
            display: block;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section>
        <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carouselExampleIndicators" class="slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo e(asset('alumni/img/transport.png')); ?>" alt="First slide" height="300px" width="100%" />
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h2>Profile</h2>
                        </div>
                    </div>
                </div>
        </div>
    </section>

     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3 text-center">
                    <img src="<?php echo e(asset('alumni/img/avatar.jpg')); ?>" width="100px" class="avatar" alt="">
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th>Name</th><td><?php echo e($user->name); ?></td>
                        </tr>
                        <tr>
                            <th>E-mail</th><td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <th>ID</th><td><?php echo e($user->unique_id); ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th><td><?php echo e($user->phone); ?></td>
                        </tr>
                        <tr>
                            <th>Address</th><td><?php echo e($user->address); ?></td>
                        </tr>
                        <tr>
                            <th>Program</th><td><?php echo e($user->program == 1? 'Under Graduation' : 'Post Graduation'); ?></td>
                        </tr>
                        <tr>
                            <th>Role</th><td>
                                <span class="badge badge-primary p-2">
                                    <?php if($user->role_id == \App\User::SUPPER_USER): ?> <?php echo e('Supper Admin'); ?>

                                    <?php elseif($user->role_id == \App\User::ADMIN): ?> <?php echo e('Admin'); ?>

                                    <?php elseif($user->role_id == \App\User::MODERATOR): ?> <?php echo e('Moderator'); ?>

                                    <?php elseif($user->role_id == \App\User::ALUMNI): ?> <?php echo e('Alumni'); ?>

                                    <?php elseif($user->role_id == \App\User::STUDENT): ?> <?php echo e('Student'); ?>

                                    <?php endif; ?>
                                </span> </td>
                        </tr>
                        <tr>
                            <th>Status</th><td>
                                <span class="badge badge-success p-2">
                                    <?php echo e($user->status == 1? 'Enable' : 'Disable'); ?>

                                </span> </td>
                        </tr>
                    </table>
                    <?php if(Auth::check()): ?>
                        <?php if($user->id === Auth::id()): ?>
                            <div class="mt-3 text-center" style="border-top: 2px solid">
                                <a href="<?php echo e(route('profile-edit')); ?>" class="btn btn-info pl-5 pr-5 mt-2">Edit Profile</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/profile.blade.php ENDPATH**/ ?>