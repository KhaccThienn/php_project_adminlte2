<?php
$admin = $_SESSION['admin_login'];
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/images/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $admin['name'] ?></p>
                <?php if ($admin['status'] == 1) { ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <?php } else { ?>
                    <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
                <?php } ?>
            </div>
        </div>
        <!-- search form -->
        <form action="?page=search/index.php" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="">
                    <i class="fa fa-th"></i> <span>Menu Management</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">FE</small>
                    </span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Category Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?page=category/index.php"><i class="fa fa-circle-o"></i>List Category</a></li>
                    <li><a href="?page=category/add.php"><i class="fa fa-circle-o"></i>Add Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Product Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?page=product/index.php"><i class="fa fa-circle-o"></i> List Product </a></li>
                    <li><a href="?page=product/add.php"><i class="fa fa-circle-o"></i> Add Product </a></li>
                </ul>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>