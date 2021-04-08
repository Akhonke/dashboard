<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Import Learners</h3>
                    </div>
                    <!-- <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?> -->
                      <?php if (!empty($this->session->flashdata('error'))) { ?>
                   <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                     <?php } elseif(!empty($this->session->flashdata('success'))) {?>
                   <div style="color:red;text-align:center"><?= $this->session->flashdata('success'); ?></div>
                     <?php }?>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="ImportLearnerForm" enctype="multipart/form-data" action="<?=BASEURL?>provider-import-data">
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-0">
                                    <h3 class="h6 text-uppercase mb-0">Personal Information</h3>

                                
                                   <label>Select file: <span class="text-danger">Please don't upload more then 1000 records in one CSV file*</span></label>
                                    <input type="file" placeholder="Please select excel file" class="form-control learner" name="learner">
                                   <label id="learner-error" class="error" for="learner"></label>
                                </div>
                                <div class="col-md-6 offset-md-0">
                                    <!-- <a  class="btn btn-rounded btn-success" href='<?= base_url() ?>Admin/download_QuestionList_csv'>Download Demo Csv</a> -->
                                    <!-- <a href="<?= BASEURL .'uploads/learner/LearnerSheetDemo.xls' ?>" download class="btn btn-sm btn-info">Download Import Sheet Format <i class="fa fa-download" aria-hidden="true"></i></a> -->
                                    <a href="<?=BASEURL?>provider-download-csv-data" download class="btn btn-sm btn-info">Download Import Sheet Format <i class="fa fa-download" aria-hidden="true"></i></a>
                                    
                                    <p><span class="text-danger">Note:- * Please don't use any formula and formating in this CSV file upload only data</span>
                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                <div>
                            <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">


<?php if($this->session->flashdata('warning')){ ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('success')){  ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");

<?php } ?>

</script>