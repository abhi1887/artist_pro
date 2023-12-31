<?php $__env->startSection('content'); ?>
   
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
        <h1 class="h3 mb-0 text-gray-800"> Edit Profile </h1>
    </div>

    <div class="card push-top m-3">
        <div class="card-header">
            Profile Details
        </div>
        <div class="card-body">


            <?php echo Form::open([
                'url' => route('profile.update', $user->id),
                'method' => 'post',
                'id' => 'profile',
                'role' => 'form',
                'class' => 'profile-form',
                'enctype' => 'multipart/form-data',
            ]); ?>


                <div class="form-group">
                    <?php echo Form::label('name', 'Name'); ?>

                    <?php echo Form::text('name', old('name', $user->name), ['class' => 'form-control', 'autocomplete' => 'off', 'disabled' => 'disabled']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('email', 'Email'); ?>

                    <?php echo Form::text('email', old('email', $user->email), ['class' => 'form-control', 'autocomplete' => 'off', 'disabled' => 'disabled']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('bio', 'User Bio'); ?>

                    <?php echo Form::textarea('bio', old('bio', $user->bio), ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => '4']); ?>

                    <?php if($errors->has('bio')): ?>
                        <div class="error-text">
                            <?php echo e($errors->first('bio')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('image', 'User Image'); ?>

                    <?php echo Form::file('image', ['class' => 'form-control']); ?>

                    <?php if($errors->has('image')): ?>
                        <div class="error-text">
                            <?php echo e($errors->first('image')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <?php if(isset($user->id) && $user->image): ?>
                    <div class="form-group">
                        <?php echo Form::image(asset('/user_images/' . $user->image), 'alt text', ['class' => 'image-item mt-3', 'width' => '200px', 'height' => '200px']); ?>

                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <?php echo Form::submit(__('Update user'), ['class' => 'btn btn-primary']); ?>

                </div>
            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\artist_copy\resources\views/user/profile.blade.php ENDPATH**/ ?>