<?php

$assessment_submission_type = (isset($assessment)) ? $assessment->submission_type : '';

$online_quiz_id = (isset($assessment)) ? $assessment->online_quiz_id : 0;

if ($online_quiz_id) {
   // $quiz_url = BASEURL . 'digilims_online/index.php/quiz/quiz_detail/' . $online_quiz_id;

    $quiz_url = BASEURL . '/learner/take_quiz?id=' . $online_quiz_id . '&aid=' . $assessment->id;
} else {
    $quiz_url = '';
}

?>
<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">


                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Assessment Details</h3>

                    </div>

                    <?php

                    if ((!empty($this->session->flashdata('error'))) && ($this->session->flashdata('error') != 'error')) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-12">
                                	<h4>Assessment Details - <?= (isset($assessment)) ? $assessment->title: ''; ?></h4>
                            	</div>

                                <div class="col-md-4">

                                    <label class="form-control-label">Assessment Title<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Title" name="title" class="form-control assessment_end_date" value="<?= (isset($assessment)) ? $assessment->title: ''; ?>" id="title" readonly="readonly">

                                </div>

                                <div class="col-md-4">

                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($class)) ? $class->class_name: ''; ?>" id="class_name"  readonly="readonly">

                                </div>

                                <div class="col-md-4">

                                    <label class="form-control-label">Module<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Name" name="module" class="form-control class_name" value="<?= (isset($module)) ? $module->title: ''; ?>" id="module"  readonly="readonly">

                                </div>


                                <div class="col-md-4">

                                    <label class="form-control-label">Intervention<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Intervention Name" name="intervention" class="form-control intervention" value="<?= (isset($class)) ? $class->intervention: ''; ?>" id="intervention"  readonly="readonly">

                                </div>

                                <div class="col-md-4">

                                    <label class="form-control-label">Unit Standard<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Unit Standard" name="unit_standard" class="form-control unit_standard" value="<?= (isset($unit_standard)) ? $unit_standard: ''; ?>" id="unit_standard"  readonly="readonly">

                                </div>

                                <div class="col-md-4">
                                </div>


<?php /*
                                <div class="col-md-6">

                                    <label class="form-control-label">Programme Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Programme Name" name="programme_name" class="form-control programme_name" value="<?= (isset($assessment)) ? $assessment->programme_name: ''; ?>" id="programme_name"  readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Programme Number<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Programme Number" name="programme_number" class="form-control programme_number" value="<?= (isset($assessment)) ? $assessment->programme_number: ''; ?>" id="programme_number"  readonly="readonly">

                                </div>
*/
?>

                            	<div class="col-md-6">

                                    <label class="form-control-label">Assessment Start Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Start Date" name="assessment_start_date" class="form-control assessment_start_date" value="<?= (isset($assessment)) ? $assessment->assessment_start_date : ''; ?>" id="assessment_start_date"  readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment End Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment End Date" name="assessment_end_date" class="form-control assessment_end_date" value="<?= (isset($assessment)) ? $assessment->assessment_end_date : ''; ?>" id="assessment_end_date" readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Type" name="assessment_type" class="form-control assessment_type" value="<?= (isset($assessment)) ? $assessment->assessment_type : ''; ?>" id="assessment_type" readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Submission Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Submission Type" name="assessment_type" class="form-control assessment_type" value="<?= (isset($assessment)) ? $assessment->submission_type : ''; ?>" id="submission_type" readonly="readonly">
								</div>

                                <p>&nbsp;</p>

                                <?php if ($assessment_submission_type === 'timed based assessment online') { ?>

                                    <div class="col-md-12" style="border:1px solid black;">

                                    	<h6>This is time based online assessment.</h6>
                                    	<p>Click the button below to start your assessment. </p>

                                        <a href="<?php echo $quiz_url;?>"  class="btn btn-success">Start Assessment.</a>

                                		<p>&nbsp;</p>

                                	</div>

                                <?php } ?>

                                <?php if ($assessment_submission_type === 'manual document upload') { ?>

                                    <div class="col-md-12" style="border:1px solid black;">

                                    	<h6>The following documents are available for you to complete your assessment.</h6>
                                    	<p>Please upload your completed Workbook and POE for marking.</p>

                                    	<div class="row">

                                            <div class="col-md-4">

                                                <label class="form-control-label">Learner Guide</label><br/>

                                                <?php if (!empty($class->upload_learner_guide)) { ?>
                                                	<a href="/uploads/class/learner_guide/<?php echo $class->upload_learner_guide; ?>" target="_blank"><img src="/assets/web/img/download_learner_guide_icon.png" style="width:120px;"></a>
                                                <?php } else {?>
                                                	<p>No learner guide available for this assessment</p>
                                                <?php } ?>
												<p><?php echo $class->upload_learner_guide_name; ?></p>
                                            </div>

                                            <div class="col-md-4">

                                                <label class="form-control-label">Learner Workbook</label><br/>

                                                <?php if (!empty($module->upload_workbook)) { ?>
                                                	<a href="/uploads/class/learner_workbook/<?php echo $module->upload_workbook; ?>" target="_blank"><img src="/assets/web/img/download_learner_workbook_icon.png" style="width:120px;"></a>
                                                <?php } else {?>
                                                	<p>No learner workbook available for this assessment</p>
                                                <?php } ?>
												<p><?php echo $module->upload_workbook_name; ?></p>
                                            </div>

                                            <div class="col-md-4">

                                                <label class="form-control-label">Learner POE</label><br/>

                                                <?php if (!empty($module->upload_poe)) { ?>
                                                	<a href="/uploads/class/learner_poe/<?php echo $module->upload_poe; ?>" target="_blank"><img src="/assets/web/img/download_learner_poe_icon.png" style="width:120px;"></a>
                                                <?php } else {?>
                                                	<p>No learner guide poe for this assessment</p>
                                                <?php } ?>
												<p><?php echo $module->upload_poe_name; ?></p>
                                            </div>
                                    	</div>

								<?php if ( !$learner_assessment) { ?>

            						<?php if (count($learner_assessment_submissions) < 1) { ?>
                                        <div class="col-md-12">
                                        	<p>&nbsp:</p>
                                            <h4>Assessment Upload</h4>
                                        </div>

                                		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateAssessment" action="/learner-load-assessment">
                            			<input type="hidden" name="learner_id" value="<?= (isset($learner_id)) ? $learner_id: ''; ?>">
                            			<input type="hidden" name="assessment_id" value="<?= (isset($assessment_id)) ? $assessment_id: ''; ?>">
<?php /*
                                        <div class="col-md-12">
                                    			<label class="form-control-label">Upload Your Completed Learner Guide<span style="color:red;font-weight:bold;"> *</span></label>
                                                <input type="file" name="upload_completed_learner_guide" class="form-control">
                                                <label id="upload_completed_learner_guide-error" class="error" for="upload_completed_learner_guide"></label>
                                        </div>
*/ ?>

                                        <div class="col-md-12">
                                    			<label class="form-control-label">Upload Your Completed Workbook<span style="color:red;font-weight:bold;"> *</span></label>
                                                <input type="file" name="upload_completed_workbook" class="form-control">
                                                <label id="upload_completed_workbook-error" class="error" for="upload_completed_workbook"></label>
                                        </div>

        								<?php if (count($learner_assessment_submissions) == 0) { ?>
                                            <div class="col-md-12">
                                        			<label class="form-control-label">Upload Your Completed POE<span style="color:red;font-weight:bold;"> *</span></label>
                                                    <input type="file" name="upload_completed_poe" class="form-control">
                                                    <label id="upload_completed_poe-error" class="error" for="upload_completed_poe"></label>
                                            </div>
    									<?php } ?>

                                        <div class="col-md-12">
                                        <p>&nbsp;</p>
                                                <button type="submit" class="btn btn-primary">Submit your assessment</button>
                                        </div>


                                		</form>
    								<?php }  /* count($learner_assessment_submissions) */ ?>

								<?php }  /* $learner_assessment->status */ ?>


                                    </div>

                                <?php } ?>

                                <?php if ($assessment_submission_type === 'practical assessment') { ?>

                                    <div class="col-md-12" style="border:1px solid black;">

                                    	<h6>This is a practical asssessment.</h6>
                                    	<p>Please take note of the scheduled date and time of your assessment. Be sure to download the practical workbook.</p>

                                    	<div class="row">

                                        	<div class="col-md-12">
                                        		<label class="form-control-label">Scheduled Practical Date<span style="color:red;font-weight:bold;"> *</span></label>
                                            	<input type="date" placeholder="Enter Your Practical Date" name="practical_date" class="form-control practical_date" value="<?= (isset($assessment)) ? $assessment->practical_date : ''; ?>" id="practical_date">
                                        	</div>

                                        	<div class="col-md-12">
                                        		<label class="form-control-label">Scheduled Practical Time<span style="color:red;font-weight:bold;"> *</span></label>
                                            	<input type="time" placeholder="Enter Your Practical Time" name="practical_time" class="form-control practical_time" value="<?= (isset($assessment)) ? $assessment->practical_time : ''; ?>" id="practical_time">
                                        	</div>

                                        	<div class="col-md-12">

        									    <p><label class="form-control-label">Practical Assessment Workbook : </span></label>
                                    		    <a href="/uploads/assessment/upload_learner_guide/<?php echo $assessment->upload_practical_workbook; ?>" target="_blank">Practical Assessment Workbook</a></p>

                                        	</div>

                                    	</div>


                                	</div>


                                <?php } ?>


                                <div class="col-md-12">
                                	<p>&nbsp:</p>
                                    <h4>Assessment History</h4>


    								<?php if ( ($learner_assessment) && ($learner_assessment->status == 'submitted for marking') ) { ?>
										<p style="color:red;">Your assessment has been submitted for marking.</p><br>
										<p>You will be notified when your assessment is marked.</p>
                                	<?php } ?>

                                    <?php if (count($learner_assessment_submissions)) { ?>
                                    	<ul>
                                    	<?php foreach ($learner_assessment_submissions as $assessment_submission) { ?>
											<li>
											<p>Assessment submitted on <?php echo $assessment_submission->created_date ?></p>

											<p>Status : <?php echo ucwords($assessment_submission->assessment_status); ?></p>

											<?php if (!empty($assessment_submission->learner_feedback)) { ?>
												<p>Learner Feedback : <?php echo $assessment_submission->learner_feedback; ?></p>
											<?php } ?>

											<?php if (!empty($assessment_submission->overall_assessment)) { ?>
												<p>Overall Assessment : <?php echo $assessment_submission->overall_assessment; ?></p>
											<?php } ?>

											<?php if (!empty($assessment_submission->upload_completed_workbook)) { ?>
												<p>
												Submitted workbook : <a href="/uploads/assessment/upload_completed_workbook/<?php echo $assessment_submission->upload_completed_workbook; ?>" target="_blank"><?php echo $assessment_submission->upload_completed_workbook_name; ?></a>
											</p>
											<?php } ?>

											<?php if (!empty($assessment_submission->upload_marked_workbook)) { ?>
												<p>
												Marked workbook : <a href="/uploads/assessment/upload_marked_workbook/<?php echo $assessment_submission->upload_marked_workbook; ?>" target="_blank"><?php echo $assessment_submission->upload_marked_workbook_name; ?></a>
											</p>
											<?php } ?>

											<?php if (!empty($assessment_submission->assessment_mark)) { ?>
												<p>Assessment Mark: <?php echo $assessment_submission->assessment_mark; ?></p>
											<?php } ?>

											<?php if ($assessment_submission->competency_status == 'not competent') { ?>
												<p style="color:red;"><strong>Your assessment has been rated NOT COMPETENT.</strong></p>
											<?php } ?>

											<?php if ($assessment_submission->competency_status == 'competent') { ?>
												<p style="color:green;"><strong>You have met the assessment criteria for this module.</strong></p>
											<?php } ?>

											</li>
                                    	<?php } ?>

                                    	</ul>

                                    <?php } else { ?>
                                		<p>You have not submitted any assessments for this class</p>
                                    <?php } ?>
                                </div>



                            </div>

                            <div class="line"></div>

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <div class="text-center">

                                        <!-- <button type="submit" class="btn btn-primary"><?= $name ?></button>  -->

                                    </div>

                                </div>

                            </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>