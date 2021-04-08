<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DigiLims | Super Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/admin/img/logo.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= base_url() ?>assets/super-admin/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/super-admin/iconic-fonts/flat-icons/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/super-admin/iconic-fonts/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/super-admin/iconic-fonts/cryptocoins/cryptocoins-colors.css">
    <link href="<?= base_url() ?>assets/super-admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/super-admin/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/super-admin/css/slick.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/super-admin/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/super-admin/css/morris.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <link href="<?= base_url() ?>assets/admin/cloudfront/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="' . BASEURL . 'assets/admin/fontawesome/all.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,800"> -->
    <!-- <link href="<?= base_url() ?>assets/admin/cloudfront/css/orionicons.css" rel="stylesheet" type="text/css"> -->
    <link href="<?= base_url() ?>assets/admin/cloudfront/css/style.default.css" id="theme-stylesheet" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/cloudfront/css/custom.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?= base_url() ?>assets/admin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="<?= base_url() ?>assets/validation/css/screen.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> -->


    <style>
        table.table-bordered.dataTable tbody th,
        table.table-bordered.dataTable tbody td {

            border-bottom-width: 0;

            vertical-align: middle;

            text-transform: capitalize;

        }

        .sa-button-container .cancel.btn.btn-lg.btn-default {

            background: #f95506;

        }
    </style>
    <!-- 

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" rel="stylesheet">   -->
    <script>
        var message = '';
    </script>

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar>
      <!-- Preloader -->

    <?php $this->load->view('super-admin/layout/sidebar'); ?>
    <main class=" body-content">
    <!-- Navigation Bar -->
    <?php $this->load->view('super-admin/layout/header'); ?>
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
        <div class="row">
            <?php $this->load->view('super-admin/' . $content); ?>
        </div>
    </div>
    </main>
    <?php $this->load->view('super-admin/layout/footer'); ?>
</body>

</html>