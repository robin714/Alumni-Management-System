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
                            <h2><?php echo e($event->title); ?></h2>
                        </div>
                    </div>
                </div>
        </div>
    </section>

     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th>Start Time</th><td><?php echo e($event->startDateTime); ?></td>
                        </tr>
                        <tr>
                            <th>Event Place</th><td><?php echo e($event->event_place); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th><td><?php echo e($event->description); ?></td>
                        </tr>
                        <tr>
                            <th>Department</th><td><?php echo e($event->department->name); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th><td>
                                <span class="badge badge-success p-2">
                                    <?php echo e($event->status == 1? 'Enable' : 'Disable'); ?>

                                </span> </td>
                        </tr>
                        <?php if(Auth::check()): ?>
                            <hr>
                        <tr class="text-center">
                            <button id="going" class="action btn btn-sm btn-success mr-2">Going</button>
                            <button id="maybe" class="action btn btn-sm btn-primary mr-2">Maybe</button>
                            <button id="not-going" class="action btn btn-sm btn-danger mr-2">Not Going</button>
                            <?php if(Auth::user()->role_id <= 3): ?>
                                <a href="<?php echo e(url('event/action/'.$event->id)); ?>" class="btn btn-sm btn-info">List of People</a>
                            <?php endif; ?>
                        </tr>
                            <hr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(URL::asset('alumni/js/sweetalert.min.js')); ?>"></script>
<script>

    $(".action").on('click',function () {
        let user_id = <?php echo e(Auth::id()); ?>;
        let event_id = <?php echo e($event->id); ?>;
        let action = $(this).attr('id');
        const _token = document.head.querySelector("[property=csrf-token]").content;
        swal({
            title: "Are you sure?",
            text: "Once Ok, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '<?php echo e(route('event-action')); ?>',
                    type: 'post',
                    data: {user_id: user_id, event_id:event_id, action:action, _token: _token},
                    success: function (response) {
                        if (response.status == 'success') {
                            swal(response.html, {
                                icon: "success",
                            });
                            //location.reload();
                        } else if (response.status == 'error') {
                            swal(response.html, {
                                icon: "error",
                            });
                        }
                    }
                });

            }
        });
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/event/view.blade.php ENDPATH**/ ?>