<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <div class="sidebar-brand-text m-2 text-center text-white">
        <div class="text-center d-none d-md-inline">
        <img src="<?php echo e(asset('Frontend/images/artist_logo.png')); ?>" class="artist_logo" style = "margin-right:10px; height:80px; width:80px;"><?php echo e(\Auth::user()->name); ?>

            <!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
        </div>
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('users.index')); ?>">
            <i class="fas fa-fw fa-user"></i>
            Users 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed mt-3" href="#" data-toggle="modal" data-target="#logoutModal" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-sign-out-alt" style="color: red;"></i>
            <span>Logout</span>
        </a>
    </li>
</ul><?php /**PATH D:\xampp\htdocs\artist_pro\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>