<?php 
ob_start();
session_start();

if (isset($_SESSION['admin_login'])) {
    $admin = $_SESSION['admin_login'];
} else {
    header('location: login.php');
}?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/assets/js/angular.min.js"></script>
    <script src="assets/assets/js/app.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <?php include 'layouts/header.php'; ?>
    <?php include 'layouts/sidebar.php'; ?>
    <div class="wrapper">
        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <?php if (isset($_GET['q']) || isset($_GET['category_search']) || isset($_GET['product_search'])) {
                    $page = "search/index.php";
                } else {
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = "dashboard/index.php";
                    }
                } ?>
                <?php include $page; ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/adminlte.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/tinymce/tinymce.min.js"></script>
    <script src="assets/tinymce/config.js"></script>
    <script src="assets/js/function.js"></script>
</body>

</html>