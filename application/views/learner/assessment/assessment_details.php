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

                                <div class="col-md-12">
                                	<p>&nbsp:</p>
                                    <h4>Assessment History</h4>
                                    <?php if (count($learner_assessments)) { ?>
                                    	<ul>
                                    	<?php foreach ($learner_assessments as $assessment_submission) { ?>
											<li>
											<p>Assessment submitted on <?php echo $assessment_submission->created_date ?></p>
											<p>Status : <?php echo $assessment_submission->status; ?></p>
											<p>Assessment Notes : <?php echo $assessment_submission->assessment_notes; ?></p>
											<?php if (!empty($assessment_submission->upload_assessment)) { ?>
											<p>
											Submitted workbook : <a href="/uploads/assessment/upload_assessment/<?php echo $assessment_submission->upload_assessment; ?>" target="_blank"><?php echo $assessment_submission->upload_assessment_name; ?></a>
											</p>
											<?php } ?>
											</li>
                                    	<?php } ?>

                                    	</ul>

                                    <?php } else { ?>
                                		<p>You have not submitted any assessments for this class</p>
                                    <?php } ?>
                                </div>

								<?php if (count($learner_assessments) < 3) { ?>
                                    <div class="col-md-12">
                                    	<p>&nbsp:</p>
                                        <h4>Assessment Upload</h4>
                                    </div>

                                    <div class="col-md-12">

                                		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateAssessment" action="/learner-load-assessment">

                                			<input type="hidden" name="learner_id" value="<?= (isset($learner_id)) ? $learner_id: ''; ?>">
                                			<input type="hidden" name="assessment_id" value="<?= (isset($assessment_id)) ? $assessment_id: ''; ?>">

                                			<label class="form-control-label">Upload Your Assessment<span style="color:red;font-weight:bold;"> *</span></label>

                                            <input type="file" name="upload_assessment" class="form-control">

                                            <label id="upload_assessment-error" class="error" for="upload_assessment"></label>

                                            <button type="submit" class="btn btn-primary">Upload you assessment</button>


                                		</form>

                                    </div>
								<?php } else { ?>
                                    <div class="col-md-12">
                                    	<p>&nbsp:</p>
    									<h4 style="color:red !important;">You cannot submit more than three assessments. Please contact your trainer.</h4>
                                    </div>
								<?php } ?>




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