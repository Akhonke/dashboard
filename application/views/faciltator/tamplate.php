<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digilims | Faciltator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- <link rel="shortcut icon" type="image/png" href="<?= BASEURL ?>assets/admin/img/logo.png" /> -->
    <?php
    $CI = &get_instance();
    $CI->load->model(array('JscssFaciltator', 'common'));
    // $data['profile'] = $CI->common->accessrecord('organisation', ['image,full_name,email_address'], ['id' => organisation()], 'row');
    $css = $CI->JscssFaciltator->css($page);

    foreach ($css as $cs) {
        echo $cs;
    }
    ?>
    <script>
        var message = '';
    </script>
</head>

<body>
    <?php $this->load->view('faciltator/layout/header'); ?>
    <div class="d-flex align-items-stretch">
        <?php $this->load->view('faciltator/layout/sidebar'); ?>
        <div class="page-holder w-100 d-flex flex-wrap">
            <?php $this->load->view('faciltator/' . $content); ?>
            <?php $this->load->view('faciltator/layout/footer'); ?>
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
        $js = $CI->JscssFaciltator->js($page);
        foreach ($js as $j) {
            echo $j;
        }

//         $js = $CI->jscss->js($page);
//         foreach ($js as $j) {
//             echo $j;
//         }


    ?>


</body>

</html>