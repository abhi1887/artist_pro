

<?php $__env->startSection('content'); ?>
<div class = "container userData bg-color">
    <?php if(count($users) > 0): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-sm-5">
                <div class="well text-center" style="height: 393px; overflow-y: auto;">
                    <img src="<?php echo e(asset('/user_images/' . $user->image)); ?>" alt="Avatar" class="img-circle" width="100" height="100">
                    <p><b><?php echo e($user->name); ?></b></p>
                    <div class="text-justify">
                        <p> <?php echo e($user->bio); ?> </p>
                    </div> 
                </div> 
            </div>
            <div class="col-sm-7">
                <div class="well">
                    <div class="comments-block" style = "height: 150px; overflow-y:auto;">
                        <?php if(count($user->comments) > 0): ?>
                            <?php $__currentLoopData = $user->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-left">Review Date  <?php echo e(date('d/m/Y', strtotime($comment->created_at))); ?></p>
                                <p class="text-left" ><?php echo e($comment->comment); ?></p><br/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mt-10">
                        <label for="comment" class = "text-left">Comment:</label>
                        <textarea class="form-control" name="comment" id="comment_<?php echo e($user->id); ?>" placeholder = "Comment Here..." rows="3"> </textarea><br>
                        <button type="button" class="saveComment btn btn-primary mt-10" style = "position: relative; top: 0px; padding: 14px 38px;" data-id="<?php echo e($user->id); ?>">Comment</button>
                    </div>
                </div>
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

<?php echo $__env->make('Frontend.layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\artist_pro\resources\views/Frontend/home.blade.php ENDPATH**/ ?>