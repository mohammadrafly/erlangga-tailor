        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Erlangga Tailor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/orders') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Data Order</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/users') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/collections') ?>">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Data Collection</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/setting') ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Setting</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>