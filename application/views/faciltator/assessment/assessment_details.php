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
                                	<h4>Assessment Details</h4>
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

                                    <label class="form-control-label">Programme Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Programme Name" name="programme_name" class="form-control programme_name" value="<?= (isset($record)) ? $record->programme_name: ''; ?>" id="programme_name"  readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Programme Number<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Programme Number" name="programme_number" class="form-control programme_number" value="<?= (isset($record)) ? $record->programme_number: ''; ?>" id="programme_number"  readonly="readonly">

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
                                	<p>&nbsp:</p>
                                    <h4>Assessment Submission</h4>
                                    	<ul>
											<li>
											<p>Assessment submitted on <?php echo $record->created_date ?></p>
											<p>Status : <?php echo $record->status; ?></p>
											<p>Assessment Notes : <?php echo $record->assessment_notes; ?></p>

											<?php if (!empty($record->upload_completed_learner_guide)) { ?>
    											<p>
    											Submitted Learner Guide : <a href="/uploads/assessment/upload_completed_learner_guide/<?php echo $record->upload_completed_learner_guide; ?>" target="_blank"><?php echo $record->upload_completed_learner_guide_name; ?></a>
    											</p>
											<?php } ?>
											<?php if (!empty($record->upload_completed_workbook)) { ?>
												<p>
												Submitted Workbook : <a href="/uploads/assessment/upload_completed_workbook/<?php echo $record->upload_completed_workbook; ?>" target="_blank"><?php echo $record->upload_completed_workbook_name; ?></a>
												</p>
											<?php } ?>
											<?php if (!empty($record->upload_completed_poe)) { ?>
												<p>
												Submitted POE : <a href="/uploads/assessment/upload_completed_poe/<?php echo $record->upload_completed_poe; ?>" target="_blank"><?php echo $record->upload_completed_poe_name; ?></a>
												</p>
											<?php } ?>


											</li>

                                    	</ul>

                                </div>

                                <div class="col-md-12">
                                	<p>&nbsp:</p>
                                    <h4>Marked Assessment Upload</h4>
                                </div>

                        		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="MarkAssessment" action="/facilitator-mark-assessment">
								<input type="hidden" name="learner_assessment_id" value="<?= (isset($record)) ? $record->id : ''; ?>">

                                <div class="col-md-12">

                                    <label class="form-control-label">Assessment Notes (not viewable by Learner)<span style="color:red;font-weight:bold;"> *</span></label>

                                    <textarea class="form-control"  name="assessment_notes" id="assessment_notes" cols="60" rows="5"><?= (isset($record)) ? $record->assessment_notes : ''; ?></textarea>

                                </div>

                                <div class="col-md-12">

                                    <label class="form-control-label">Learner Feedback<span style="color:red;font-weight:bold;"> *</span></label>

                                    <textarea class="form-control"  name="learner_feedback" id="learner_feedback" cols="60" rows="5"><?= (isset($record)) ? $record->learner_feedback : ''; ?></textarea>

                                </div>

                                <div class="col-md-12">

                                    <label class="form-control-label">Overall Assessment<span style="color:red;font-weight:bold;"> *</span></label>

                                    <textarea class="form-control"  name="overall_assessment" id="overall_assessment" cols="60" rows="5"><?= (isset($record)) ? $record->overall_assessment : ''; ?></textarea>

                                </div>

                                    <div class="col-md-12">
    									<?php if (!empty($record->upload_marked_learner_guide)) { ?>
    										<p>
    										Marked Learner Guide : <a href="/uploads/assessment/upload_marked_learner_guide/<?php echo $record->upload_marked_learner_guide; ?>" target="_blank"><?php echo $record->upload_marked_learner_guide_name; ?></a>
    										</p>
    									<?php } else { ?>
                                    			<label class="form-control-label">Upload The Marked Learner Guide<span style="color:red;font-weight:bold;"> *</span></label>
                                                <input type="file" name="upload_marked_learner_guide" class="form-control">
                                                <label id="upload_marked_learner_guide-error" class="error" for="upload_marked_learner_guide"></label>
                                        <?php } ?>
                                    </div>


                                    <div class="col-md-12">
    									<?php if (!empty($record->upload_marked_workbook)) { ?>
    										<p>
    										Marked Workbook : <a href="/uploads/assessment/upload_marked_workbook/<?php echo $record->upload_marked_workbook; ?>" target="_blank"><?php echo $record->upload_marked_workbook_name; ?></a>
    										</p>
    									<?php } else { ?>
                                			<label class="form-control-label">Upload The Marked Workbook<span style="color:red;font-weight:bold;"> *</span></label>
                                            <input type="file" name="upload_marked_workbook" class="form-control">
                                            <label id="upload_marked_workbook-error" class="error" for="upload_marked_workbook"></label>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-12">
										<?php if (!empty($record->upload_marked_poe)) { ?>
    										<p>
    										Marked POE : <a href="/uploads/assessment/upload_marked_poe/<?php echo $record->upload_marked_poe; ?>" target="_blank"><?php echo $record->upload_marked_poe_name; ?></a>
    										</p>
    									<?php } else { ?>
                                			<label class="form-control-label">Upload The Marked POE<span style="color:red;font-weight:bold;"> *</span></label>
                                            <input type="file" name="upload_marked_poe" class="form-control">
                                            <label id="upload_marked_poe-error" class="error" for="upload_marked_poe"></label>
                                        <?php } ?>
                                    </div>

                                <div class="col-md-12">
									<p>&nbsp;</p>
                                	<button type="submit" class="btn btn-primary">Upload the marked assessments</button>
                                </div>




                        		</form>

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