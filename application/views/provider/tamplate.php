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


<script>
    $(document).ready(function(){
		 $(document).on('click', '.add-module', function (e) {
            var name = $("#name").val();
            var email = $("#email").val();

            var markup =       "<tr>";
            markup  = markup + "   <td><input type='checkbox' name='record'><input type='hidden' name='class_module_id[]' value=''></td>";
            markup  = markup + "   <td><input type='text' name='module[]'></td>";
//          markup  = markup + "   <td><label class='form-control-label'>Learner Guide<span style='color:red;font-weight:bold;'> *</span></label><br/><input type='file' name='learner_guide[]'><br/>";
            markup  = markup + "   <td><label class='form-control-label'>Learner Workbook<span style='color:red;font-weight:bold;'> *</span></label><br/><input type='file' name='learner_workbook[]'><br/>";
            markup  = markup + "       <label class='form-control-label'>Learner POE<span style='color:red;font-weight:bold;'> *</span></label><br/><input type='file' name='learner_poe[]'><br/>";
            markup  = markup + "       <label class='form-control-label'>Facilitator Guide<span style='color:red;font-weight:bold;'> *</span></label><br/><input type='file' name='facilitator_guide[]'><br/>";
			markup  = markup + "   </td>";
            markup  = markup + "</tr>";

            $("table tbody").append(markup);


        });

        // Find and remove selected table rows
//         $(".delete-module).click(function(){
        $(document).on('click', '.delete-module', function (e) {

            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>

</body>

</html>