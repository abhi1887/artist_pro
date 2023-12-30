<?php $__env->startSection('content'); ?>
   
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
        <h1 class="h3 mb-0 text-gray-800"> Edit Profile </h1>
    </div>

    <div class="card push-top m-3">
        <div class="card-header">
            Profile Details
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo e(route('profile.update', $user->id)); ?>" autocomplete="off"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="name" disabled 
                        value="<?php echo e(old('name', $user->name)); ?>" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" autocomplete="off" name="email" disabled 
                        value="<?php echo e(old('email', $user->email)); ?>" />
                </div>
                <div class="form-group">
                    <label for="bio">User Bio</label>
                    <textarea class="form-control" autocomplete="off" rows="4" name="bio" required><?php echo e(old('bio', $user->bio)); ?> </textarea>
                    <?php if($errors->has('bio')): ?>
                        <div class="error-text">
                            <?php echo e($errors->first('bio')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="image">User Image</label>
                    <input type="file" class="form-control" autocomplete="off" name="image" />
                    <?php if($errors->has('image')): ?>
                        <div class="error-text">
                            <?php echo e($errors->first('image')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(isset($user->id) && $user->image): ?>
                        <img src="<?php echo e(asset('/user_images/' . $user->image)); ?>" alt="<?php echo e($user->image); ?>" class="image-item mt-3" width="200px" height="200px">
                    <?php endif; ?>
                </div>
                <button type="submit"
                    class="btn btn-primary"><?php echo e(__('Update user')); ?></button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\artist\resources\views/user/profile.blade.php ENDPATH**/ ?>