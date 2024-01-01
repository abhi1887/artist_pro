

<?php $__env->startSection('content'); ?>
<div class="col-12 content ">
    <div class="col-lg-12 col-md-12 col-sm-12 userData" style="background:red; padding: 20px;">
        <section class="main-header" id="myHeader">
            <div class="">
                <div class="header-top row" style="margin:auto; width: 100%;">
                    <div class="logo col-lg-12 text-center" style="width: 100%!important;">
                        <a href="<?php echo e(route('shop')); ?>">
                            <img src="<?php echo e(asset('Frontend/images/artist_logo.png')); ?>" class="artist_logo">
                        </a>
                    </div>
                 
                </div>
                
            </div>
        </section>
    <?php if(count($users) > 0): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row udata">
                <div class="col-lg-4 col-lg-4 col-sm-4 text-right">
                    <img src="<?php echo e(asset('/user_images/' . $user->image)); ?>" alt="<?php echo e($user->image); ?>" class="image-item mt-3" width="350px" height="400px">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8" style="color: #fff">
                    <div class="col-lg-12 col-md-10 col-sm-12 text-left" style="color: #fff;">
                        <h2> <?php echo e($user->name); ?> </h2>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 " style="color: #fff;padding: 0px 10px;font-size:medium; height:310px;overflow-y:auto;">
                        <?php echo e($user->bio); ?>

                    </div>
                </div>
            </div>
            <?php if(count($user->comments) > 0): ?>
            <div class=" col-lg-10 col-md-10 col-sm-12  comments-block" style = "overflow-y:scroll;height:150px; margin-bottom:10px; margin-left:7%; margin-top: 1%; padding:0%; ">
                <?php $__currentLoopData = $user->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row" style="background:#fff; padding: 5px; margin: 3px 0; font-size: small;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p> Review Date  <?php echo e(date('d/m/Y', strtotime($comment->created_at))); ?> </p>
                        <p> <?php echo e($comment->comment); ?> </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            <div class="row" style="margin: 10px 0;">
                <textarea name="comment" id="comment_<?php echo e($user->id); ?>" placeholder = "You Can Write Comment Here..." rows="4" cols="150"  style=" margin-left:7%;"> </textarea>
                <button class="saveComment" style = "position: relative; top: -29px; padding: 14px 38px;" data-id="<?php echo e($user->id); ?>">Comment</button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </div>
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