<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digilims/Training provider</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- <link rel="shortcut icon" type="image/png" href="<?= BASEURL ?>assets/admin/img/logo.png" /> -->
    <?php
	$CI = &get_instance();
	$CI->load->model(array('jscss', 'common'));
	$data['profile'] = $CI->common->accessrecord(TBL_USER, ['image,full_name,email'], ['id' => adminid()], 'row');
	$css = $CI->jscss->css($page);
	$js = $CI->jscss->js($page);

	foreach ($css as $cs) {
		echo $cs;
	}
	?>
    <script>
    var message = '';
    </script>
</head>

<body>
    <?php $this->load->view('provider/layout/header', $data); ?>
    <div class="d-flex align-items-stretch">
        <?php $this->load->view('provider/layout/sidebar', $data); ?>
        <div class="page-holder w-100 d-flex flex-wrap">
            <?php $this->load->view('provider/' . $content); ?>
            <?php $this->load->view('provider/layout/footer'); ?>
        </div>
    </div>

    
    <!-- <?php if (!empty($this->session->flashdata('success'))) { ?>
    <script>
    var message = '<?= $this->session->flashdata('success'); ?>';
    var type = 'success';
    </script>
    <?php } else if (!empty($this->session->flashdata('error'))) { ?>
    <script>
    var message = '<?= $this->session->flashdata('
    error '); ?>';
    var type = 'danger';
    </script>
    <?php } ?> -->


    <!-- <?php if (!empty($this->session->flashdata('error'))) { ?>
    <script>
    var message = '<?= $this->session->flashdata('error'); ?>';
    var type = 'error';
    </script>
    <?php } else if (!empty($this->session->flashdata('success'))) { ?>
    <script>
    var message = '<?= $this->session->flashdata('
    success '); ?>';
    var type = 'success';
    </script>
    <?php } ?> -->

    <script>
    <?php if ($this->session->flashdata('error')) {  ?>
        Swal.fire(
            'Error!',
            '<?= $this->session->flashdata('error') ?>',
            'error'
        )
    <?php } ?>
    <?php if ($this->session->flashdata('success')) {  ?>
        Swal.fire(
            'Done!',
            '<?= $this->session->flashdata('success') ?>',
            'success'
        )
    <?php } ?>
</script>
    

    <?php
	foreach ($js as $j) {
		echo $j;
	}
	?>


</body>

</html>