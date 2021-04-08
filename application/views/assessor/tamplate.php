<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digilims | ASSESSOR</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- <link rel="shortcut icon" type="image/png" href="<?= BASEURL ?>assets/admin/img/logo.png" /> -->
    <?php
    $CI = &get_instance();
    $CI->load->model(array('JscssAssessor', 'common'));
    // $data['profile'] = $CI->common->accessrecord('organisation', ['image,full_name,email_address'], ['id' => organisation()], 'row');
    $css = $CI->JscssAssessor->css($page);
    $js = $CI->JscssAssessor->js($page);

    foreach ($css as $cs) {
        echo $cs;
    }
    ?>
    <script>
        var message = '';
    </script>
</head>

<body>
    <?php $this->load->view('assessor/layout/header'); ?>
    <div class="d-flex align-items-stretch">
        <?php $this->load->view('assessor/layout/sidebar'); ?>
        <div class="page-holder w-100 d-flex flex-wrap">
            <?php $this->load->view('assessor/' . $content); ?>
            <?php $this->load->view('assessor/layout/footer'); ?>
        </div>
    </div>


    <?php if (!empty($this->session->flashdata('success'))) { ?>
        <script>
            var message = '<?= $this->session->flashdata('success'); ?>';
            var type = 'success';
        </script>
    <?php } else if (!empty($this->session->flashdata('error'))) { ?>
        <script>
            var message = '<?= $this->session->flashdata('error'); ?>';
            var type = 'danger';
        </script>
    <?php } ?>

    <?php
    foreach ($js as $j) {
        echo $j;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        function subscriptionMessage() {
            swal({
                title: 'Oops...',
                type: "warning",
                text: 'Please Upgrade your Plan !',
                showCancelButton: true,
                confirmButtonClass: "btn-primary",
                confirmButtonText: "OK",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            });
        }

      
    </script>
    
</body>

</html>