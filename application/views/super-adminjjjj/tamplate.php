<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SUPER | ADMIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- <link rel="shortcut icon" type="image/png" href="<?= BASEURL ?>assets/admin/img/logo.png" /> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=base_url()?>assets/super-admin/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/super-admin/iconic-fonts/flat-icons/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/super-admin/iconic-fonts/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/super-admin/iconic-fonts/cryptocoins/cryptocoins-colors.css">
    <link href="<?=base_url()?>assets/super-admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/super-admin/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/super-admin/css/slick.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/super-admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/super-admin/css/morris.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

    <script>
        var message = '';
    </script> 
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar>
      <!-- Preloader -->

    <?php $this->load->view('super-admin/layout/sidebar'); ?>
    <main class="body-content">
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