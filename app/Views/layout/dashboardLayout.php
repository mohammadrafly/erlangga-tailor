<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <link href="<?= base_url('assets-be/vendors/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url('assets-be/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets-be/vendors/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('layout/partials/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout/partials/topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?= $this->include('layout/partials/pageHeading') ?>

                    <!-- Content Row -->
                    <?= $this->renderSection('content') ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layout/partials/footer') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?= $this->include('layout/partials/ScrollToTop') ?>

    <!-- Logout Modal-->
    <?= $this->include('layout/partials/logoutModal') ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets-be/js/Main.js') ?>"></script>
    <script src="<?= base_url('assets-be/vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets-be/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets-be/vendors/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets-be/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('assets-be/vendors/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets-be/vendors/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets-be/js/demo/datatables-demo.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?= $this->renderSection('script') ?>
</body>

</html>