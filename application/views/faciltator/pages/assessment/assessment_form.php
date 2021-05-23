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

                    <?php if (!empty($_GET['id'])) {

                        $name = 'Update';
                    } else {

                        $name = "Create";
                    } ?>

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0"><?= $name ?> Assessment</h3>

                    </div>

                    <?php

                    if ((!empty($this->session->flashdata('error'))) && ($this->session->flashdata('error') != 'error')) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateAssessment">

                            <!-- <div class="line"></div> -->




<!--                             // /////////////////////////////////////////////////////////////////////// -->
<!--                             // /////////////////////////////////////////////////////////////////////// -->

                            <div class="form-group row">

<!--                             // /////////////////////////////////////////////////////////////////////// -->
<!--                             // /////////////////////////////////////////////////////////////////////// -->

                               <div class="col-md-3">
                                    <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
                                        <option value="">Select Learnership Type Name</option>
                                        <?php
                                        if (!empty($learnership)) {
                                            foreach ($learnership as $key => $learnship) { ?>
                                                <option value="<?= $learnship->id; ?>" <?php if (isset($class_name) && $class_name->learnership_id == $learnship->id) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            if (isset($_POST['learnship_id']) && $_POST['learnship_id'] == $learnship->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>><?= ucfirst($learnship->name); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                                </div>

                                <div class="col-md-3">



                                    <label class="form-control-label">Qualification/Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>



                                    <select class="form-control learnership_sub_type_id" name="learnershipSubType" id="learnership_sub_type_id">
                                    	<option value="">Select Qualification/Sublearnership</option>

                                        <?php
                                        if (!empty($learnershipSubType)) {
                                            foreach ($learnershipSubType as $key => $sublearnship) { ?>
                                                <option value="<?= $sublearnship->id; ?>" <?php if (isset($class_name) && $class_name->learnership_sub_type_id == $sublearnship->id) {
                                                                                                echo 'selected';
                                                                                            } else {
                                                                                                if (isset($_POST['learnershipSubType']) && $_POST['learnershipSubType'] == $sublearnship->id) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } ?>><?= ucfirst($sublearnship->sub_type); ?></option>
                                        <?php  }
                                        } ?>

                                    </select>

                                    <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>

                                </div>

                                <div class="col-md-3">

                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php

                                    if (!empty($_GET['id'])) {



                                        //if($record->learner_classname == $classname->id){

                                    ?>

                                        <input type="hidden" name="classname" class="form-control" value="<?= $record->classname ?>">

                                        <input type="text" name="classname" class="form-control" value="<?= $record->classname ?>" readonly>

                                    <?php

                                    } else { ?>

                                        <select class="form-control learner_classname" name="classname">

                                            <option label="" value="">Select Your Class Name</option>

                                        </select>

                                    <?php } ?>



                                    <label id="classname-error" class="error" for="classname"></label>



                                </div>

                               <div class="col-md-3">

                                    <label class="form-control-label">Module Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php

                                    if (!empty($_GET['id'])) {



                                        //if($record->learner_classname == $classname->id){

                                    ?>

                                        <input type="hidden" name="class_module" class="form-control" value="<?= $class_module->id ?>">

                                        <input type="text" name="class_module_title" class="form-control" value="<?= $class_module->title ?>" readonly>

                                    <?php

                                    } else { ?>

                                        <select class="form-control class_module" name="class_module" id="class_module">

                                            <option label="" value="">Select Your Module</option>

                                        </select>

                                    <?php } ?>

                                    <label id="class_module-error" class="error" for="class_module"></label>


                                </div>

								<div class="col-md-12" id="class_module_uploads" style="border:1px solid black;">
									<?php if (!empty($_GET['id'])) { ?>

										<h6>Assessment Material</h6>
										<p>The following material is used for this assessment.</p>

									    <p><label class="form-control-label">Learner Guide : </span></label>
                            		    <a href="/uploads/class/learner_guide/<?php echo $class_name->upload_learner_guide; ?>" target="_blank">Download the Learner Guide</a></p>

                            		    <p><label class="form-control-label">Learner Workbook : </span></label>
                            		    <a href="/uploads/class/learner_workbook/<?php echo $class_module->upload_workbook; ?>" target="_blank">Download the Learner Workbook</a></p>

                            		    <p><label class="form-control-label">Learner POE : </span></label>
                            		    <a href="/uploads/class/learner_poe/<?php echo $class_module->upload_poe; ?>" target="_blank">Download the Learner POE</a></p>

                            		    <p><label class="form-control-label">Facilitator Guide : </span></label>
                            		    <a href="/uploads/class/facilitator_guide/<?php echo $class_module->upload_facilitator_guide; ?>" target="_blank">Download the Facilitator Guide</a></p>

                                    <?php } ?>

								</div>

                                <div class="col-md-12">
                                    <!-- ************************* -->
                                    <div class="subject-info-box-1">
                                        <label class="form-control-label">All Unit Standards<span style="color:red;font-weight:bold;"> *</span></label>
                                        <select multiple="multiple" id='lstBox1' class="form-control multilistselection lstBox1">
                                            <?php if (!empty($units)) {
                                                foreach ($units as $key => $unit) {
                                                    if (!empty($sublearnship)) {
                                                        $chkbox = $sublearnship->unit_standard;
                                                        $arr = explode(",", $chkbox);
                                                    }
                                            ?>
                                                <option data-title="<?= (!empty($unit->title)) ? $unit->title : ''; ?>" class="unitype" data-id="<?= (!empty($unit->id)) ? $unit->id : ''; ?>" data-price="<?= (!empty($unit->total_credits)) ? $unit->total_credits : ''; ?>" value="<?= (!empty($unit->id)) ? $unit->id : ''; ?>" <?php if (!empty($sublearnship)) {
                                                                                                                                                                                                                    if ((in_array($unit->id, $arr))) {
                                                                                                                                                                                                                        echo 'selected';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    if (isset($_POST['unit_standard']) && $_POST['unit_standard'] == $unit->id) {
                                                                                                                                                                                                                        echo 'selected';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?>><?= (!empty($unit->title)) ? ucfirst($unit->title) : ''; ?></option>



                                            <?php  }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="subject-info-arrows text-center">
                                        <input type='button' id='btnAllRight' value='>>' class="btn btn-default" /><br />
                                        <input type='button' id='btnRight' value='>' class="btn btn-default" /><br />
                                        <input type='button' id='btnLeft' value='<' class="btn btn-default" /><br />
                                        <input type='button' id='btnAllLeft' value="<<" class="btn btn-default" />
                                    </div>
                                    <div class="subject-info-box-2">
                                        <label class="form-control-label">Selected Unit Standards<span style="color:red;font-weight:bold;"> *</span></label>
                                        <select multiple="multiple" id='lstBox2' class="form-control lstBox2new" name="unit_standard[]">
                                            <?php
                                            if (!empty($sublearnship)) {
                                                $chkbox = $sublearnship->unit_standard;
                                                $arr = explode(",", $chkbox);
                                                foreach ($units as $key => $unit) {
                                                    if (in_array($unit->id, $arr)) {
                                            ?>
                                                        <option data-title="<?= $unit->title; ?>" class="unitype" data-id="<?= $unit->id; ?>" data-price="<?= $unit->total_credits; ?>" value="<?= $unit->id ?>" <?php if (!empty($sublearnship)) {
                                                                                                                                                                                                                        if ((in_array($unit->id, $arr))) {
                                                                                                                                                                                                                            echo 'selected';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        if (isset($_POST['unit_standard']) && $_POST['unit_standard'] == $unit->id) {
                                                                                                                                                                                                                            echo 'selected';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } ?>><?= ucfirst($unit->title); ?></option>



                                            <?php  }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    <label style="display: none" id="unit_standard-error" class="error" for="unit_standard"></label>
                                    <span class='error_validate' style='color:red;'><?= form_error('unit_standard') ?></span>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- ************************************************************** -->

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="assessment_type">

                                        <option value="">Choose Your Assessment Type</option>
                                        <option value="formative"<?php echo (isset($record) && ($record->assessment_type == 'formative')) ? ' selected="selected"' : ''; ?>>Formative</option>
                                        <option value="summative"<?php echo (isset($record) && ($record->assessment_type == 'summative')) ? ' selected="selected"' : ''; ?>>Summative/POE</option>
                                        <option value="live video"<?php echo (isset($record) && ($record->assessment_type == 'live video')) ? ' selected="selected"' : ''; ?>>Live Video</option>
                                        <option value="online questions"<?php echo (isset($record) && ($record->assessment_type == 'online questions')) ? ' selected="selected"' : ''; ?>>Online Questions</option>
                                        <option value="practical assessment"<?php echo (isset($record) && ($record->assessment_type == 'practical assessment')) ? ' selected="selected"' : ''; ?>>Practical Assessment</option>
                                    </select>

                                    <label id="quarter-error" class="error" for="assessment_type"></label>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Submission Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="submission_type">

                                        <option hidden value="">Choose Your Assessment Submission Type</option>
                                        <option value="manual document upload"<?php echo (isset($record) && ($record->submission_type == 'manual document upload')) ? ' selected="selected"' : ''; ?>>Manual Document Upload</option>
                                        <option value="timed based assessment online"<?php echo (isset($record) && ($record->submission_type == 'timed based assessment online')) ? ' selected="selected"' : ''; ?>>Timed based assessment online</option>
                                    </select>

                                    <label id="quarter-error" class="error" for="submission_type"></label>

                                </div>

                               	<div class="col-md-6">

                                    <label class="form-control-label">Assessment Start Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Assessment Start Date" name="assessment_start_date" class="form-control assessment_start_date" value="<?= (isset($record)) ? date("Y-m-d", strtotime($record->assessment_start_date)) : ''; ?>" id="assessment_start_date">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment End Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Assessment End Date" name="assessment_end_date" class="form-control assessment_end_date" value="<?= (isset($record)) ? date("Y-m-d", strtotime($record->assessment_end_date))  : ''; ?>" id="assessment_end_date">

                                </div>


                            	<div class="col-md-6">

                                    <label class="form-control-label">Learning Programme<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Learning Programme" name="learning_programme" class="form-control learning_programme" value="<?= (isset($record)) ? $record->learning_programme : ''; ?>" id="learning_programme">

                                </div>




                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Title<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Title" name="title" class="form-control assessment_title" value="<?= (isset($record)) ? $record->title: ''; ?>" id="title">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Intervention Name</label>

                                    <input type="text" placeholder="Enter the Intervention Name" name="intervention_name" class="form-control intervention_name" value="<?= (isset($record)) ? $record->intervention_name: ''; ?>" id="intervention_name">

                                </div>





<?php
/*

                                <div class="col-md-6">

                                    <?php if (!empty($_GET['id'])) { ?>

                                        <label class="form-control-label">Upload Learner Guide<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_learner_guide" class="form-control">

                                    <?php  } else { ?>

                                        <label class="form-control-label">Upload Learner Guide<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_learner_guide" class="form-control">

                                        <label id="upload_learner_guide-error" class="error" for="upload_learner_guide"></label>

                                    <?php } ?>

                                </div>

                                <div class="col-md-6">

                                    <?php if (!empty($_GET['id'])) { ?>

                                        <label class="form-control-label">Upload Learner Workbook<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_learner_workbook" class="form-control">

                                    <?php  } else { ?>

                                        <label class="form-control-label">Upload Learner Workbook<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_learner_workbook" class="form-control">

                                        <label id="upload_learner_workbook-error" class="error" for="upload_learner_workbook"></label>

                                    <?php } ?>

                                </div>


                                <div class="col-md-6">

                                    <?php if (!empty($_GET['id'])) { ?>

                                        <label class="form-control-label">Upload Learner POE<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_learner_poe" class="form-control">

                                    <?php  } else { ?>

                                        <label class="form-control-label">Upload Learner POE<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_learner_poe" class="form-control">

                                        <label id="upload_learner_poe-error" class="error" for="upload_learner_poe"></label>

                                    <?php } ?>

                                </div>

                                <div class="col-md-6">

                                    <?php if (!empty($_GET['id'])) { ?>

                                        <label class="form-control-label">Upload Facilitator Guide<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_facilitator_guide" class="form-control">

                                    <?php  } else { ?>

                                        <label class="form-control-label">Upload Facilitator Guide<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="upload_facilitator_guide" class="form-control">

                                        <label id="upload_facilitator_guide-error" class="error" for="upload_facilitator_guide"></label>

                                    <?php } ?>

                                </div>

*/
?>


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

              			<?php if (!empty($_GET['id'])) { ?>
              			    <div class="form-group row">
                  			    <div class="col-md-12">
                      			    <div class="text-left">
	                      			    <a href= "/facilitator-completed-assessment-list?aid=<?= (isset($record)) ? $record->id: ''; ?>" class="btn btn-success">See Completed Assessments</a>
                      			    </div>
                  			    </div>
              			    </div>
                        <?php } ?>



                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
