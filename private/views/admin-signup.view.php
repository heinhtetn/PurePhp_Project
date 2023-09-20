<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= LINK ?>/views/includes/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= LINK ?>/views/includes/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/17cafae4b9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= ROOT ?>/admin?tab=dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= ROOT ?>/admin?tab=adminprofile" class="nav-link">Profile</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= ROOT ?>/admin?tab=request" class="nav-link">Requests</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= ROOT ?>/admin?tab=user-appeals" class="nav-link">User Appeals</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= ROOT ?>/admin?tab=accounts" class="nav-link">Accounts</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <a href="<?= ROOT ?>/logout">
                    <button class="btn btn-sm btn-primary">LOGOUT</button>
                </a>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <div style="text-align: center;">Trading.Co Lt.D <i class="fa fa-globe"></i></div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    MENU
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= ROOT ?>/admin?tab=dashboard" class="nav-link <?= $tab == 'dashboard' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DASHBOARD</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= ROOT ?>/admin?tab=adminprofile" class="nav-link <?= $tab == 'adminprofile' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PROFILE</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= ROOT ?>/admin?tab=request" class="nav-link <?= $tab == 'request' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>REQUESTS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= ROOT ?>/admin?tab=user-appeals" class="nav-link <?= $tab == 'user-appeals' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>USER APPEALS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= ROOT ?>/admin?tab=accounts" class="nav-link <?= $tab == 'accounts' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>USER ACCOUNTS</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>


                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <div class="container-fluid">
                <form action="" method="post">
                    <div class="rounded mx-auto my-5 border" style="width: 100%; max-width: 450px;">
                        <div style="padding: 60px;">
                            <h2 class="text-center mb-5">Admin Signup</h2>
                            <?php if (count($errors) > 0) : ?>
                                <div class="alert alert-warning alert-dismissible fade show p-4" role="alert">
                                    <strong>Errors!</strong>
                                    <?php foreach ($errors as $error) : ?>
                                        <br><span style="color: red;">*</span><?= $error ?>
                                    <?php endforeach; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <input type="text" value="<?= get_var('firstname') ?>" id="firstname" name="firstname" class="form-control mb-4" placeholder="Firstname">
                            <input type="text" value="<?= get_var('lastname') ?>" id="lastname" name="lastname" class="form-control mb-4" placeholder="Lastname">
                            <input type="text" value="<?= get_var('username') ?>" id="username" name="username" class="form-control mb-4" placeholder="Username">
                            <input type="text" value="<?= get_var('email') ?>" id="email" name="email" class="form-control mb-4" placeholder="Email">
                            <input type="text" name="password" id="password" class="form-control mb-4" placeholder="Password">
                            <input type="text" name="password2" id="password2" class="form-control mb-4" placeholder="Confirm Password">
                            <select class="form-select mb-4" id="rank" name="rank">
                                <option value="">---Select Rank---</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                            <div>
                            <button class="btn btn-dark" type="submit">Signup</button>
                            <button class="btn btn-dark" style="margin-left: 180px;" type="button" id="cancelButton">Cancel</button>
                            </div>
                           
                        </div>

                    </div>
                </form>
            </div>

            <script>
                document.getElementById("cancelButton").addEventListener("click", function() {
                    document.getElementById("firstname").value = "";
                    document.getElementById("lastname").value = "";
                    document.getElementById("username").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("password").value = "";
                    document.getElementById("password2").value = "";
                    document.getElementById("rank").value = "";
                });
            </script>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <!-- jQuery -->
    <script src="<?= LINK ?>/views/includes/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= LINK ?>/views/includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= LINK ?>/views/includes/dist/js/adminlte.min.js"></script>
</body>

</html>