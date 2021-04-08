<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Import Learner Marks</h3>
                    </div>
                     <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="ImportLearnerForm" enctype="multipart/form-data" action="<?=BASEURL?>provider-learnermarks-import-data">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h2>Personal Information</h2>
                                </div>
                                <div class="col-md-6">
                                   <label>Select file: <span class="tx-danger">Please don't upload more then 1000 records in one excel file*</span></label>
                                    <input type="file" placeholder="Please select excel file" class="form-control learnermarks" name="learnermarks">
                                   <label id="learner-error" class="error" for="learnermarks"></label>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-12">
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
