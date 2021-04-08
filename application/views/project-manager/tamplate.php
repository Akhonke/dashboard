<?php if(!isset($_SESSION['projectmanager']['id'])){
    redirect('projectmanager');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digilims | Project-Manager</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- <link rel="shortcut icon" type="image/png" href="<?= BASEURL ?>assets/admin/img/logo.png" /> -->
    <?php
	$CI = &get_instance();
	$CI->load->model(array('jscssProjectmanger', 'common'));
	$data['profile'] = $CI->common->accessrecord(TBL_Project_Manager, ['fullname,email_address'], ['id' => projectmanagerid()], 'row');
	$css = $CI->jscssProjectmanger->css($page);
	$js = $CI->jscssProjectmanger->js($page);

	foreach ($css as $cs) {
		echo $cs;
	}
	?>
    <script>
    var message = '';
    </script>
</head>

<body>
    <?php $this->load->view('project-manager/layout/header', $data); ?>
    <div class="d-flex align-items-stretch">
        <?php $this->load->view('project-manager/layout/sidebar', $data); ?>
        <div class="page-holder w-100 d-flex flex-wrap">
            <?php $this->load->view('project-manager/' . $content,$data); ?>
            <?php $this->load->view('project-manager/layout/footer'); ?>
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


</body>

</html>