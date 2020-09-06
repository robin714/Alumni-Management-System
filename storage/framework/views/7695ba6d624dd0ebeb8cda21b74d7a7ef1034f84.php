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
                        <h5 class="card-header">People List</h5>
                        <div class="card-body">
                            <table id="people-list" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>ID_Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Program</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Job</th>
                                        <th>Address</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $peoples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $people): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($people->role_id != 1): ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($people->unique_id); ?></td>
                                        <td><?php echo e($people->name); ?></td>
                                        <td><?php echo e($people->email); ?></td>
                                        <td><?php if($people->program == 1): ?>
                                                <span class="badge badge-primary p-2" style="width:100%">
                                          		 <?php echo e('Under Graduation'); ?>

                                          </span>
                                            <?php elseif($people->program == 2): ?>
                                                <span class="badge badge-success p-2" style="width:100%">
                                                <?php echo e('Post Graduation'); ?>


                                            </span><?php endif; ?> </td>
                                        <td><?php echo e($people->phone); ?></td>
                                        <td>
                                            <?php if($people->status == 1): ?>
                                            <span class="badge badge-success p-2" style="width:100%">
                                                <?php echo e('Enable'); ?>

                                            </span>
                                            <?php elseif($people->status == 2): ?>
                                            <span class="badge badge-danger p-2" style="width:100%">
                                                <?php echo e('Disable'); ?>

                                            </span>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="badge badge-primary p-2" style="width:100%">
                                                <?php if($people->role_id == \App\User::SUPPER_USER): ?> <?php echo e('Supper Admin'); ?>

                                                <?php elseif($people->role_id == \App\User::ADMIN): ?> <?php echo e('Admin'); ?>

                                                <?php elseif($people->role_id == \App\User::MODERATOR): ?> <?php echo e('Moderator'); ?>

                                                <?php elseif($people->role_id == \App\User::ALUMNI): ?> <?php echo e('Alumni'); ?>

                                                <?php elseif($people->role_id == \App\User::STUDENT): ?> <?php echo e('Student'); ?>

                                                <?php endif; ?>
                                            </span> </td>
                                        <td><?php echo e($people->job); ?></td>
                                        <td><?php echo e($people->address); ?></td>
                                        <td><?php echo e($people->created_at); ?></td>

                                        <td>
                                            <select id="<?php echo e($people->id); ?>"  class="btn btn-primary action">
                                            <option value="">Select Action</option>
                                            <option value="view">View</option>
                                                <?php if(Auth::check()): ?>
                                                    <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
                                                        <option value="edit">Edit</option>
                                                        <option value="delete">Delete</option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="text-center text-danger"><td>No data created</td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="statusForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status:</label>
                            <select id="status" class="form-control">
                                <option value="1">Enable</option>
                                <option value="2">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(URL::asset('alumni/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('alumni/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('alumni/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('alumni/js/sweetalert.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#people-list').DataTable();
        } );

    </script>
    <script>
        $(".action").on('click',function () {
            let id = $(this).attr('id');
            let action = $(this).val();
            const _token = document.head.querySelector("[property=csrf-token]").content;
            switch (action) {
                case "view":
                    viewUser(id);
                    break;

                case "edit":
                    editUser(id);
                    break;


                case "delete":
                    deleteUser(id);
                    break;

                default :
                    //toastr.error("Invalid Setting type", "Server Notification");
                    break;
            }

            function deleteUser(id) {
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
                                url: '<?php echo route('user-delete'); ?>',
                                type: 'post',
                                data: {id: id, _token: _token,},
                                success: function (response) {
                                    if (response.status == 'success') {
                                        swal("Success to Delete", {
                                            icon: "success",
                                        });
                                        location.reload();
                                    } else if (response.status == 'error') {
                                        swal("Something wrong!", {
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

            function editUser(id) {
                window.open('<?php echo e(route('user-edit',["id"=>'::id'])); ?>'.replace('::id', id),'_self');
            }

            function viewUser(id) {
                window.open('<?php echo e(route('user-view',["id"=>'::id'])); ?>'.replace('::id', id),'_self');
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ams\ams\resources\views/alumni/people.blade.php ENDPATH**/ ?>