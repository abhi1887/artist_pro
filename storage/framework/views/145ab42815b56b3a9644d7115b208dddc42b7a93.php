<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="sidebar-brand-text m-2 text-center text-white">
        <div class="text-center d-none d-md-inline">
            <i class="fa fa-shopping-basket"></i><?php echo e(\Auth::user()->name); ?>

            <!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
        </div>
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('profile')); ?>">
            <i class="fa fa-user"></i>
            <span><?php echo e(__('Profile')); ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link mt-3" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt" style="color: red;"></i>
            <span><?php echo e(__('Logout')); ?></span> 
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    </li>
</ul>
<?php /**PATH C:\xampp7.4\htdocs\artist\resources\views/layouts/user_sidebar.blade.php ENDPATH**/ ?>