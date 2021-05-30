<style>
    input.btn.btn-default {

        padding: 2px 10px !important;

        background: #4680ff;

        margin: 3px;

    }

    .subject-info-arrows.text-center {

        margin: 45px 0 0;

    }

    select.form-control[multiple],
    select.form-control[size] {

        height: 130px;

        border-radius: 3px !important;

    }

    select.form-control[multiple] option:hover {

        background: #4680ff;

        color: #fff;

    }

    /*********************3 jan *************/

    .subject-info-box-1,

    .subject-info-box-2 {

        float: left;

        width: 45%;



        select {

            height: 200px;

            padding: 0;



            option {

                padding: 4px 10px 4px 10px;

            }



            option:hover {

                background: #EEEEEE;

            }

        }

    }



    .subject-info-arrows {

        float: left;

        width: 10%;



        input {

            width: 70%;

            margin-bottom: 5px;

        }

    }

    @media(max-width:767px) {
        .subject-info-box-1,

        .subject-info-box-2 {
            width: 40%;
        }

        .subject-info-arrows {
            width: 20%;
        }
    }
</style>

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
                            $name = "CREATE A NEW";
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

                                    <label class="form-control-label">Intervention</label>

                                    <input type="text" placeholder="Enter the Intervention" name="intervention" class="form-control intervention" value="<?= (isset($record)) ? $record->intervention: ''; ?>" id="intervention">

                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($record)) ? $record->class_name : ''; ?>" id="class_name">

                                </div>




                                <div class="col-md-6">
                                    <label class='form-control-label'>Learner Guide</label><br/>
                                    <?php if (!empty($record->upload_learner_guide)) { ?>
                                    	<a href="uploads/class/learner_guide/<?php echo $record->upload_learner_guide; ?>" target="_blank">Download the Learner Guide</a><br/>
                                    <?php } ?>
                                    <input type='file' name='upload_learner_guide'><br/>

                                </div>




                                <input type="hidden" name="created_by" value="<?php echo $_SESSION['admin']['trainer_id']; ?>">

                                <div class="col-md-12">

                                    <label class="form-control-label">Class Modules<span style="color:red;font-weight:bold;"> *</span></label>

                                            <table>
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Module Name</th>
                                                    <th>Module Uploads</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($class_modules as $class_module_item) { ?>
                                       			<tr>
                                       				<td>
                                       					<input type='checkbox' name='record'>
                                       					<input type='hidden' name='class_module_id[]' value="<?php echo $class_module_item->id; ?>">

                                       				</td>
                                       				<td>
                                       					<input type='text' name='class_module[]' value="<?php echo $class_module_item->title; ?>">
														<br/>
                                   					</td>
                                       				<td>
<?php /*
                                                        <label class='form-control-label'>Learner Guide<span style='color:red;font-weight:bold;'> *</span></label><br/>
                                                        <?php if (!empty($class_module_item->upload_learner_guide)) { ?>
                                                        	<a href="uploads/class/learner_guide/<?php echo $class_module_item->upload_learner_guide; ?>" target="_blank">Download the Learner Guide</a><br/>
                                                        <?php } ?>
                                                        <input type='file' name='learner_guide[]'><br/>
*/
?>

                                                        <label class='form-control-label'>Learner Workbook<span style='color:red;font-weight:bold;'> *</span></label><br/>
                                                        <?php if (!empty($class_module_item->upload_workbook)) { ?>
                                                        	<a href="uploads/class/learner_workbook/<?php echo $class_module_item->upload_workbook; ?>" target="_blank">Download the Learner Workbook</a><br/>
                                                        <?php } ?>
                                                        <input type='file' name='learner_workbook[]'><br/>

                                                        <label class='form-control-label'>Learner POE<span style='color:red;font-weight:bold;'> *</span></label><br/>
                                                        <?php if (!empty($class_module_item->upload_poe)) { ?>
                                                        	<a href="uploads/class/learner_poe/<?php echo $class_module_item->upload_poe; ?>" target="_blank">Download the Learner POE</a><br/>
                                                        <?php } ?>
                                                        <input type='file' name='learner_poe[]'><br/>

                                                        <label class='form-control-label'>Facilitator Guide<span style='color:red;font-weight:bold;'> *</span></label><br/>
                                                        <?php if (!empty($class_module_item->upload_facilitator_guide)) { ?>
                                                        	<a href="uploads/class/facilitator_guide/<?php echo $class_module_item->upload_facilitator_guide; ?>" target="_blank">Download the Facilitator Guide</a><br/>
                                                        <?php } ?>

                                                        <input type='file' name='facilitator_guide[]'><br/>

                                       				</td>
                                       			</tr>
                                            <?php } ?>


                                            </tbody>
                                        </table>
                                        <button type="button" class="delete-class-module btn btn-danger">Delete Selected Class Module</button>
                                        <button type="button" class="add-class-module btn btn-success">Add Class Module</button>

                                </div>

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



<style>
/*     form{ */
/*         margin: 20px 0; */
/*     } */
/*     form input, button{ */
/*         padding: 5px; */
/*     } */
    table{
        width: 100%;
        margin-bottom: 20px;
		border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>


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

            console.log('abcd');

                form.submit();

            }

        });

    });
</script>