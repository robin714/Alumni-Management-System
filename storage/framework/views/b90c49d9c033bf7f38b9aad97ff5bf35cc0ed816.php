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
            font-size: 25px;
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
                            <h2><?php echo e($notice->title); ?></h2>
                        </div>
                    </div>
                </div>
        </div>
    </section>

     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th>Created</th><td><?php echo e($notice->created_at); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th><td><?php echo e($notice->description); ?></td>
                        </tr>
                        <tr>
                            <th>Department</th><td><?php echo e($notice->department->name); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th><td>
                                <span class="badge badge-success p-2">
                                    <?php echo e($notice->status == 1? 'Enable' : 'Disable'); ?>

                                </span> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\ams\resources\views/alumni/notice/view.blade.php ENDPATH**/ ?>