<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <div class="sidebar-brand-text m-2 text-center text-white">
        <div class="text-center d-none d-md-inline">
            <i class="fa fa-shopping-basket"></i>{{ \Auth::user()->name }}
            <!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
        </div>
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('users.index') }}">
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
</ul>