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
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="text">Home</p>
                    </a>
                </li>

                <?php if ($_SESSION['role'] == 3 || $_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>products.php" class="nav-link products">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p class="text">Products</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>category.php" class="nav-link category">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p class="text">Category</p>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if ($_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>members.php" class="nav-link members">
                            <i class="nav-icon fas fa-users"></i>
                            <p class="text">Members</p>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if ($_SESSION['role'] == 3 || $_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>events.php" class="nav-link events">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p class="text">Events</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 3 || $_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>reports.php" class="nav-link reports">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p class="text">Reports</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 3 || $_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>notices.php" class="nav-link notices">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p class="text">Notices</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>branches.php" class="nav-link branches">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p class="text">Branches</p>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if ($_SESSION['role'] == 2 || $_SESSION['role'] == 1) :
                ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>vacancy.php" class="nav-link vacancy">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p class="text">Vacancy Notice</p>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if ($_SESSION['role'] == 2 || $_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>applications.php" class="nav-link applications">
                            <i class="nav-icon fas fa-book"></i>
                            <p class="text">Job Applications</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?php echo url ?>users.php" class="nav-link users">
                            <i class="nav-icon fas fa-users"></i>
                            <p class="text">Users</p>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>