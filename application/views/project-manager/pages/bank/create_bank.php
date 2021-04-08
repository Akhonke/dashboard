<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <?php if (!empty($_GET['id'])) {

                        $name = 'Update';
                    } else {

                        $name = "Add";
                    } ?>

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0"><?= $name ?> Bank Statement</h3>

                    </div>

                    <?php

                    if ((!empty($this->session->flashdata('error'))) && ($this->session->flashdata('error') != 'error')) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateBankForm">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-6">

                                    <label class="form-control-label">Project Manager Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Project Manager Name" name="project_manager_name" class="form-control project_manager_name" value="<?= (isset($projectmanager)) ? $projectmanager->project_manager : ''; ?>" id="project_manager_name" readonly>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Project Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <!-- <input type="text" placeholder="Enter Your Project Name" name="project_name" class="form-control project_name" value="<?= (isset($projectmanager)) ? $projectmanager->project_name : ''; ?>" id="project_name" readonly>

                                    <input type="hidden"  name="project_id"  value="<?= (isset($projectmanager)) ? $projectmanager->id : ''; ?>" id="project_id"> -->
                                    <select class="form-control" name="project_name" id="project_name">

                                        <option hidden value="">Select Project Name</option>
                                        <?php foreach ($project as $pro) { ?>
                                            <option value="<?= $pro['id'] ?>" <?php if (isset($record) && $record->project_name == $pro['id']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $pro['project_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Bank Statement Start Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Bank Start Date" name="bank_start_date" class="form-control bank_start_date" value="<?= (isset($record)) ? $record->bank_start_date : ''; ?>" id="bank_start_date">

                                </div>



                                <div class="col-md-6">

                                    <label class="form-control-label">Bank Statement End Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Bank End Date" name="bank_end_date" class="form-control bank_end_date" value="<?= (isset($record)) ? $record->bank_end_date : ''; ?>" id="bank_end_date">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Quarter<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="quarter">

                                        <option hidden value="">Choose Your Quarter</option>

                                        <option value="Quarter 1" <?php if (isset($record)) {

                                                                        if ($record->quarter == 'Quarter 1') { ?> selected="selected" <?php }
                                                                                                                                } ?>><?php

                                                                                                                                        if (isset($record)) {

                                                                                                                                            if ($record->quarter == 'Quarter 1') {

                                                                                                                                                echo "Quarter 1";
                                                                                                                                            } else {

                                                                                                                                                echo "Quarter 1";
                                                                                                                                            }
                                                                                                                                        } else {

                                                                                                                                            echo "Quarter 1";
                                                                                                                                        } ?>

                                        </option>

                                        <option value="Quarter 2" <?php if (isset($record)) {

                                                                        if ($record->quarter == 'Quarter 2') { ?> selected="selected" <?php }
                                                                                                                                } ?>><?php

                                                                                                                                        if (isset($record)) {

                                                                                                                                            if ($record->quarter == 'Quarter 2') {

                                                                                                                                                echo "Quarter 2";
                                                                                                                                            } else {

                                                                                                                                                echo "Quarter 2";
                                                                                                                                            }
                                                                                                                                        } else {

                                                                                                                                            echo "Quarter 2";
                                                                                                                                        } ?>

                                        </option>

                                        <option value="Quarter 3" <?php if (isset($record)) {

                                                                        if ($record->quarter == 'Quarter 3') { ?> selected="selected" <?php }
                                                                                                                                } ?>><?php

                                                                                                                                        if (isset($record)) {

                                                                                                                                            if ($record->quarter == 'Quarter 3') {

                                                                                                                                                echo "Quarter 3";
                                                                                                                                            } else {

                                                                                                                                                echo "Quarter 3";
                                                                                                                                            }
                                                                                                                                        } else {

                                                                                                                                            echo "Quarter 3";
                                                                                                                                        } ?>

                                        </option>

                                        <option value="Quarter 4" <?php if (isset($record)) {

                                                                        if ($record->quarter == 'Quarter 4') { ?> selected="selected" <?php }
                                                                                                                                } ?>><?php

                                                                                                                                        if (isset($record)) {

                                                                                                                                            if ($record->quarter == 'Quarter 4') {

                                                                                                                                                echo "Quarter 4";
                                                                                                                                            } else {

                                                                                                                                                echo "Quarter 4";
                                                                                                                                            }
                                                                                                                                        } else {

                                                                                                                                            echo "Quarter 4";
                                                                                                                                        } ?>

                                        </option>

                                    </select>

                                    <label id="quarter-error" class="error" for="quarter"></label>

                                </div>

                                <div class="col-md-6">

                                    <?php if (!empty($_GET['id'])) { ?>

                                        <label class="form-control-label">Bank Statement<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_bank_statements" class="form-control">

                                    <?php  } else { ?>

                                        <label class="form-control-label">Bank Statement<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_bank_statement" class="form-control">

                                        <label id="upload_bank_statement-error" class="error" for="upload_bank_statement"></label>

                                    <?php } ?>

                                </div>

                            </div>

                            <div class="line"></div>

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