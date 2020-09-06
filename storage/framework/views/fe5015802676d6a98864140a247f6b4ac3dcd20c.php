<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('alumni/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('alumni/css/responsive.bootstrap4.min.css')); ?>">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="mt-5 mb-5">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col-md-6 text-left">
                                <h5>Notice List</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('notice.create')); ?>" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="notice-list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Department</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($notice->title); ?></td>
                                        <td><?php echo e(substr($notice->description,0,100).'...'); ?></td>
                                        <td><?php echo e($notice->department->name); ?></td>
                                        <td><?php echo e($notice->created_at); ?></td>
                                        <td>
                                            <span class="badge badge-danger p-2" style="width:100%">
                                                <?php echo e($notice->status == 1? 'Enable' : 'Disable'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <select id="<?php echo e($notice->id); ?>"  class="btn btn-primary action">
                                                <option value="">Select Action</option>
                                                <option value="view">View</option>
                                                <option value="edit">Edit</option>
                                                <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
                                                    <option value="delete">Delete</option>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(URL::asset('alumni/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('alumni/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('alumni/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('alumni/js/sweetalert.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#notice-list').DataTable();
        } );
    </script>
    <script>
        $(".action").on('click',function () {
            let id = $(this).attr('id');
            let action = $(this).val();
            const _token = document.head.querySelector("[property=csrf-token]").content;
            switch (action) {
                case "view":
                    viewNotice(id);
                    break;

                case "edit":
                    editNotice(id);
                    break;


                case "delete":
                    deleteNotice(id);
                    break;

                default :
                    //toastr.error("Invalid Setting type", "Server Notification");
                    break;
            }

            function deleteNotice(id) {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '<?php echo e(route('notice.destroy',["id"=>'::id'])); ?>'.replace('::id', id),
                                type: 'delete',
                                data: {id: id, _token: _token,},
                                success: function (response) {
                                    if (response.status == 'success') {
                                        swal("Poof! Your data has been deleted!", {
                                            icon: "success",
                                        });
                                        location.reload();
                                    } else if (response.status == 'error') {
                                        swal("Poof! Your imaginary file has been deleted!", {
                                            icon: "error",
                                        });
                                    }
                                }
                            });

                        } else {
                            swal("Your data is safe!");
                        }
                    });

            }

            function editNotice(id) {
                window.open('<?php echo e(route('notice.edit',["id"=>'::id'])); ?>'.replace('::id', id),'_self');
            }

            function viewNotice(id) {
                window.open('<?php echo e(route('notice.show',["id"=>'::id'])); ?>'.replace('::id', id),'_self');
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\ams\resources\views/alumni/notice/notice.blade.php ENDPATH**/ ?>