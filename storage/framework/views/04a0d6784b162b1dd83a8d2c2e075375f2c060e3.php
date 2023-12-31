

<?php $__env->startSection('content'); ?>
<div class="col-12">
    <?php if(count($users) > 0): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 col-sm-6 userData" style="background:red; padding: 20px;">
                <div class="row">
                    <div class="col-lg-5 col-lg-5 col-sm-5 text-sm-center">
                        <img src="<?php echo e(asset('/user_images/' . $user->image)); ?>" alt="<?php echo e($user->image); ?>" class="image-item mt-3" width="200px" height="200px">
                    </div>
                    <div class="col-lg-7 col-lg-7 col-sm-7" style="color: #fff">
                        <div class="col-12 text-center" style="color: #fff;">
                            <h2> <?php echo e($user->name); ?> </h2>
                        </div>
                        <div class="col-12 " style="color: #fff;padding: 0px 10px;font-size: small;">
                            <?php echo e($user->bio); ?>

                        </div>
                    </div>
                </div>
                <?php if(count($user->comments) > 0): ?>
                <div class="comments-block" style="height:150px;overflow-y: scroll;">
                    <?php $__currentLoopData = $user->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" style="background:#fff; padding: 5px; margin: 3px 0; font-size: small;">
                        <div class="col-12">
                            <p> Review Date  <?php echo e(date('d/m/Y', strtotime($comment->created_at))); ?> </p>
                            <p> <?php echo e($comment->comment); ?> </p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <div class="row" style="margin: 10px 0;">
                    <input type="text" name="comment" id="comment_<?php echo e($user->id); ?>" style="width: 86%;">
                    <button class="saveComment" data-id="<?php echo e($user->id); ?>">Submit</button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>

<script>
    $(document).on('click', '.saveComment', function(){
        $("#pageloader").fadeIn();
        var thisa = $(this);
        var userid = $(this).data('id');
        var comment = $('#comment_' + userid).val();

        if($.trim(comment) == '') {
            $('#comment_' + userid).val('');
            $("#pageloader").fadeOut();
            return false;
        }

        var data = {        
            userid: userid,
            comment: comment,
        }

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: "<?php echo e(url('/save-comment')); ?>",
            method: 'POST',
            data: data,
            success: function(response) {
                var div = $(thisa).closest('.userData').find('.comments-block');
                div.append(response);
                $('#comment_' + userid).val('');
                thisa.closest('.userData').find('.comments-block').scrollTop(div.prop('scrollHeight'));
                $("#pageloader").fadeOut();
            },
            error: function(xhr) {
                toastr.error('Something Went Wrong, Please Try Again');
                $("#pageloader").fadeOut();
            }
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\artist\resources\views/Frontend/home.blade.php ENDPATH**/ ?>