<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo url ?>" class="brand-link">
        <img src="<?php echo url ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;background:white">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo url ?>index.php" class="nav-link index">
                        <!-- <i class="nav-icon fa-gauge"></i> -->
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="text">Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url ?>products.php" class="nav-link products">
                        <!-- <i class="nav-icon fa-gauge"></i> -->
                        <i class="nav-icon fas fa-boxes"></i>
                        <p class="text">Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url ?>category.php" class="nav-link category">
                        <!-- <i class="nav-icon fa-gauge"></i> -->
                        <i class="nav-icon fas fa-tasks"></i>
                        <p class="text">Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url ?>members.php" class="nav-link members">
                        <!-- <i class="nav-icon fa-gauge"></i> -->
                        <i class="nav-icon fas fa-users"></i>
                        <p class="text">Members</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url ?>reports.php" class="nav-link reports">
                        <!-- <i class="nav-icon fa-gauge"></i> -->
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p class="text">Reports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo url ?>branches.php" class="nav-link branches">
                        <!-- <i class="nav-icon fa-gauge"></i> -->
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p class="text">Branches</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>