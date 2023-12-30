<?php $__env->startSection('content'); ?>
    <div class="d-sm-flex align-items-center justify-content-between m-3">
        <h2 class="h3 mb-0 text-gray-800">Users</h2>
    </div>

    <div class="push-top ml-3">

        <?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div><br />
        <?php endif; ?>

        <?php if(count($users) > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="table-warning">
                        <th>#</th>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>Comments</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$i); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->bio); ?></td>
                            <td>
                                <u style="cursor: pointer;" id="viewComment" data-id="<?php echo e($user->id); ?>"> <?php echo e(__('View Comments')); ?> </u>
                            </td>
                            <td class="text-center">
                                <?php if(!$user->hasRole('vendor')): ?>
                                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post" id="deleteForm" style="display: inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete()">Delete</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-6">
                <strong> No data found! </strong>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Comment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="commentContent"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).on('click', '#viewComment', function(){
            $("#pageloader").fadeIn();
            var userid = $(this).data('id');

            var data = {
                userid: userid,
            }

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: "<?php echo e(url('/get-comment')); ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response != '') {
                        $('#commentContent').html(response);
                        $('#commentModal').modal('show');
                    }
                    $("#pageloader").fadeOut();
                },
                error: function(xhr) {
                    toastr.error('Something Went Wrong, Please Try Again');
                    $("#pageloader").fadeOut();
                }
            });
        });

        function confirmDelete() {
            var result = confirm("Are you sure you want to delete this user?");
            if (result) {
                $('#deleteForm').submit();
            } else {
                return false;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\artist\resources\views/Admin/users/index.blade.php ENDPATH**/ ?>