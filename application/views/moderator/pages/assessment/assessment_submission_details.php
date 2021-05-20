<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">


                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Assessment Moderation</h3>

                    </div>

                    <?php

                    if ((!empty($this->session->flashdata('error'))) && ($this->session->flashdata('error') != 'error')) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-12">
                                	<h4>Assessment Moderation - <?= (isset($record)) ? $record->title: ''; ?></h4>
                            	</div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Title<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Title" name="title" class="form-control assessment_end_date" value="<?= (isset($record)) ? $record->title: ''; ?>" id="title" readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($record)) ? $record->class_name: ''; ?>" id="class_name"  readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Unit Standard<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Unit Standard" name="unit_standard" class="form-control unit_standard" value="<?= (isset($record)) ? $record->unit_standard: ''; ?>" id="unit_standard"  readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Intervention Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Intervention Name" name="intervention_name" class="form-control intervention_name" value="<?= (isset($record)) ? $record->intervention_name: ''; ?>" id="intervention_name"  readonly="readonly">

                                </div>

                            	<div class="col-md-6">

                                    <label class="form-control-label">Assessment Start Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Start Date" name="assessment_start_date" class="form-control assessment_start_date" value="<?= (isset($record)) ? $record->assessment_start_date : ''; ?>" id="assessment_start_date"  readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment End Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment End Date" name="assessment_end_date" class="form-control assessment_end_date" value="<?= (isset($record)) ? $record->assessment_end_date : ''; ?>" id="assessment_end_date"  readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Type" name="assessment_type" class="form-control assessment_type" value="<?= (isset($record)) ? $record->assessment_type : ''; ?>" id="assessment_type">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Submission Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Submission Type" name="assessment_type" class="form-control assessment_type" value="<?= (isset($record)) ? $record->submission_type : ''; ?>" id="submission_type">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Learner Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" name="learner_name" class="form-control assessment_type" value="<?= (isset($record)) ? $record->first_name . ' ' . $record->surname : ''; ?>" id="submission_type">

                                </div>
<?php
/*
                                <div class="col-md-12">

                                    <label class="form-control-label">Learner Guide<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if (!empty($record->upload_learner_guide)) { ?>
                                    	<a href="/uploads/assessment/upload_learner_guide/<?php echo $record->upload_learner_guide; ?>" target="_blank">Download the Learner Guide</a>
                                    <?php } else {?>
                                    	<p>No learner guide available for this assessment</p>
                                    <?php } ?>

                                </div>

                                <div class="col-md-12">

                                    <label class="form-control-label">Learner Workbook<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if (!empty($record->upload_learner_workbook)) { ?>
                                    	<a href="/uploads/assessment/upload_learner_workbook/<?php echo $record->upload_learner_workbook; ?>" target="_blank">Download the Learner Workbook</a>
                                    <?php } else {?>
                                    	<p>No learner workbook available for this assessment</p>
                                    <?php } ?>

                                </div>

                                <div class="col-md-12">

                                    <label class="form-control-label">Learner POE<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if (!empty($record->upload_learner_poe)) { ?>
                                    	<a href="/uploads/assessment/upload_learner_poe/<?php echo $record->upload_learner_poe; ?>" target="_blank">Download the Learner POE</a>
                                    <?php } else {?>
                                    	<p>No learner guide poe for this assessment</p>
                                    <?php } ?>

                                </div>
*/
?>


                                <div class="col-md-12">
                                	<p>&nbsp;</p>
                                    <h4>Assessment Submissions By Learner</h4>
                                    <?php if (count($learner_assessment_submissions)) { ?>
                                    	<ul>
                                    	<?php foreach ($learner_assessment_submissions as $assessment_submission) { ?>
											<li>
    											<p>Assessment submitted on <?php echo $assessment_submission->created_date ?></p>
    											<p>Status : <?php echo $assessment_submission->assessment_status; ?></p>
    											<p>Assessment Notes : <?php echo $assessment_submission->assessment_notes; ?></p>

<?php /*
    											<?php if (!empty($assessment_submission->upload_completed_learner_guide)) { ?>
        											<p>
        											Submitted Learner Guide : <a href="/uploads/assessment/upload_completed_learner_guide/<?php echo $assessment_submission->upload_completed_learner_guide; ?>" target="_blank"><?php echo $assessment_submission->upload_completed_learner_guide_name; ?></a>
        											</p>
    											<?php } ?>
*/ ?>
    											<?php if (!empty($assessment_submission->upload_completed_workbook)) { ?>
    												<p>
    												Submitted Workbook : <a href="/uploads/assessment/upload_completed_workbook/<?php echo $assessment_submission->upload_completed_workbook; ?>" target="_blank"><?php echo $assessment_submission->upload_completed_workbook_name; ?></a>
    												</p>
    											<?php } ?>
<?php /*
    											<?php if (!empty($assessment_submission->upload_completed_poe)) { ?>
    												<p>
    												Submitted POE : <a href="/uploads/assessment/upload_completed_poe/<?php echo $assessment_submission->upload_completed_poe; ?>" target="_blank"><?php echo $assessment_submission->upload_completed_poe_name; ?></a>
    												</p>
    											<?php } ?>
*/ ?>

    											<?php if (!empty($assessment_submission->upload_marked_workbook)) { ?>
    												<p>
    												Marked Workbook : <a href="/uploads/assessment/upload_marked_workbook/<?php echo $assessment_submission->upload_marked_workbook; ?>" target="_blank"><?php echo $assessment_submission->upload_marked_workbook_name; ?></a>
    												</p>
    											<?php } ?>

											</li>

                                    	<?php } ?>

                                    	</ul>

                                    	<?php if ($record->status == 'assessed') { ?>
                                    		<p>&nbsp;</p>
                                    		<ul>
                                    			<li>
                                    				<p>Assessment has been submitted and is awaiting moderation.</p>
                                    			</li>
                                    		</ul>
                                    	<?php } // else { ?>

		                                <div class="col-md-12">
                                        	<p>&nbsp;</p>
                                            <h4>Marked Assessment Uploads</h4>
                                        </div>

                                		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="MarkAssessment" action="/assessor-mark-assessment">
        								<input type="hidden" name="learner_assessment_id" value="<?= (isset($record)) ? $record->id : ''; ?>">

                                        <div class="col-md-12">
        									<?php if (!empty($record->upload_moderated_workbook)) { ?>
        										<p>
        										Moderated Workbook : <a href="/uploads/assessment/upload_moderated_workbook/<?php echo $record->upload_moderated_workbook; ?>" target="_blank"><?php echo $record->upload_moderated_workbook_name; ?></a>
        										</p>
        									<?php } else { ?>
                                    			<label class="form-control-label">Upload The moderated Workbook<span style="color:red;font-weight:bold;"> *</span></label>
                                                <input type="file" name="upload_assessed_workbook" class="form-control">
                                                <label id="upload_assessed_workbook-error" class="error" for="upload_assessed_workbook"></label>
                                            <?php } ?>
                                        </div>

                                        <div class="col-md-12">
    										<?php if (!empty($record->upload_moderated_learner_feedback)) { ?>
        										<p>
        										Learner Feedback : <a href="/uploads/assessment/upload_assessed_learner_feedback/<?php echo $record->upload_assessed_learner_feedback; ?>" target="_blank"><?php echo $record->upload_assessed_learner_feedback_name; ?></a>
        										</p>
        									<?php } else { ?>
                                    			<label class="form-control-label">Upload The Learner Feedback<span style="color:red;font-weight:bold;"> *</span></label>
                                                <input type="file" name="upload_assessed_learner_feedback" class="form-control">
                                                <label id="upload_assessed_learner_feedback-error" class="error" for="upload_assessed_learner_feedback"></label>
                                            <?php } ?>
                                        </div>

                                        <div class="col-md-12">
    										<?php if (!empty($record->upload_moderated_overall_report)) { ?>
        										<p>
        										Overall Report : <a href="/uploads/assessment/upload_assessed_overall_report/<?php echo $record->upload_assessed_overall_report; ?>" target="_blank"><?php echo $record->upload_assessed_overall_report_name; ?></a>
        										</p>
        									<?php } else { ?>
                                    			<label class="form-control-label">Upload The Overall Report<span style="color:red;font-weight:bold;"> *</span></label>
                                                <input type="file" name="upload_assessed_overall_report" class="form-control">
                                                <label id="upload_assessed_overall_report-error" class="error" for="upload_assessed_overall_report"></label>
                                            <?php } ?>
                                        </div>

                                    	<?php // if ($record->status != 'assessed') { ?>
                                            <div class="col-md-12">
            									<p>&nbsp;</p>
                                            	<button type="submit" class="btn btn-primary">Upload the marked assessments</button>
                                            </div>
                                    	<?php // } ?>

                                		</form>

										<?php //}  ?>

                                    <?php } else { ?>
                                		<p>No assessments have been submitted for this class by the learner.</p>
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