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
                            $name = "Create";
                        } ?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name ?>Dropouts</h3>
                    </div>
                    <?php
                    if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>

                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateOrganisationForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <!-- <div class="col-md-6">
                                    <label class="form-control-label">Create New  Dropouts</label>
                                    <input type="text" placeholder="Enter Your Learner Name" class="form-control" value="" id="">
                                    <label id="" class="error" for=""></label>
                                </div> -->
                                <div class="col-md-6">
                                    <label class="form-control-label">Select Learner</label>

                                    <select class="form-control" name="learner_id" id="learner_id">
                                        <option value="" hidden>Select Learner</option>
                                        <?php foreach ($learner as $lea) { ?>
                                            <option value="<?= $lea->id ?>"><?= $lea->first_name ?></option>
                                        <?php } ?>

                                    </select>

                                    <label id="-error" class="error" for=""></label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Reason for leaving </label>

                                    <select class="form-control" name="reason" id="reason">
                                        <option value="" hidden>Reason for leaving </option>
                                        <option value="Reason for leaving 1">Reason for leaving 1</option>
                                        <option value="Reason for leaving 2">Reason for leaving 2</option>
                                        <option value="Reason for leaving 3">Reason for leaving 3</option>

                                    </select>

                                    <label id="-error" class="error" for=""></label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Attach resignation letter</label>
                                    <input type="file" placeholder="Upload Attach resignation letter" class="form-control" value="" id="attachments" name="attachments">
                                    <label id="attachments-error" class="error" for=""></label>
                                </div>






                                <!-- <input type="hidden" name="created_by" value="<?php echo adminid(); ?>"> -->
                            </div>
                            <div class="line"></div>
                            <div class="form-group row" id="assessorfield">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary"><?= $name ?></button>
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