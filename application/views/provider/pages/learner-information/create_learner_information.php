<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <?php if (!empty($_GET['id'])) {
                            $name = 'Update';
                        } else {
                            $name = "Create ";
                        } ?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name ?>Learner Information</h3>
                    </div>
                    <?php
                    if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>

                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateOrganisationForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label"> Enrolment date <span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="date" placeholder="Enter Your Enrolment  " name="" class="form-control" value="" id="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Completion Date<span style="color:red;font-weight:bold;"> *</span> </label>
                                    <input type="date" placeholder="Enter Your  Completion Date " name="" class="form-control" value="" id="">
                                </div>





                                <input type="hidden" name="created_by" value="<?php echo adminid(); ?>">
                            </div>
                            <div class="line"></div>
                            <div class="form-group row" id="assessorfield">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>