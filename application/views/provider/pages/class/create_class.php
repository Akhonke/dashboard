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
                            $name = "CEATE A NEW";
                        } ?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name ?> CLASS</h3>
                    </div>
                    <?php
                    if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>

                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateClassForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Training Provider<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="type" name="trainerid" value="<?= $training->company_name ?>" class="form-control class_name" readonly>
                                    <input type="hidden" name="trainer_id" value="<?= $training->id ?>">

                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
                                        <option value="" hidden>Select Learnership Type Name</option>
                                        <?php
                                        if (!empty($learnership)) {
                                            foreach ($learnership as $key => $learnship) { ?>
                                                <option value="<?= $learnship->id; ?>" <?php if (isset($record) && $record->learnership_id == $learnship->id) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            if (isset($_POST['learnership_id']) && $_POST['learnership_id'] == $learnship->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>><?= ucfirst($learnship->name); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control learnership_sub_type_id" name="learnership_sub_type_id" id="learnership_sub_type_id">
                                        <option value="" hidden>Select Learnership Sub Type</option>
                                        <?php
                                        if (!empty($sublearnship)) {
                                            foreach ($sublearnship as $key => $sub_learnship) { ?>
                                                <option value="<?= $sub_learnship->id; ?>" <?php if (isset($record) && $record->learnership_sub_type_id == $sub_learnship->id) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                if (isset($_POST['learnership_sub_type_id']) && $_POST['learnership_sub_type_id'] == $facilitator->id) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?= ucfirst($sub_learnship->sub_type); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Facilitator Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control facilitator" name="facilitator_id" id="facilitator_id">
                                        <option value="" hidden>Select Facilitator</option>
                                        <?php
                                        if (!empty($facilitators)) {
                                            foreach ($facilitators as $key => $facilitator) { ?>
                                                <option value="<?= $facilitator->id; ?>" <?php if (isset($record) && $record->facilitator_id == $facilitator->id) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                if (isset($_POST['facilitator_id']) && $_POST['facilitator_id'] == $facilitator->id) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?= ucfirst($facilitator->fullname); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($record)) ? $record->class_name : ''; ?>" id="class_name">

                                </div>

                                <input type="hidden" name="created_by" value="<?php echo $_SESSION['admin']['trainer_id']; ?>">

                            </div>

                            <div class="line"></div>

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

<script>
    $(function() {

        $('#CreateClassForm').validate({

            rules: {

                /* 'trainer_id':{

                   required: true,

                 },*/

                'learnership_sub_type_id': {

                    required: true,

                },

                'class_name': {

                    required: true,

                },

            },

            messages: {

                /* 'trainer_id':{

                   required: 'Please select your training provider',

                 },*/

                'learnership_sub_type_id': {

                    required: 'Please select your learnership sub type',

                },

                class_name: {

                    required: 'Please enter your class name',

                },

            }

        });

        $.validator.setDefaults({

            submitHandler: function(form) {

                form.submit();

            }

        });

    });
</script>