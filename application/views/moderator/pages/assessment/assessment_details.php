<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">


                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Moderation Details</h3>

                    </div>

                    <?php

                    if ((!empty($this->session->flashdata('error'))) && ($this->session->flashdata('error') != 'error')) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-12">
                                	<h4>Moderation Details - <?php echo $assessment->title; ?></h4>
                            	</div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Title<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Title" name="title" class="form-control title" value="<?= (isset($assessment)) ? $assessment->title: ''; ?>" id="title" readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($class)) ? $class->class_name: ''; ?>" id="class_name"  readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Class Module<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Class Module" name="class_name" class="form-control module_name" value="<?= (isset($module)) ? $module->title: ''; ?>" id="module_name"  readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Unit Standard<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Class Module" name="module_name" class="form-control unit_standard" value="<?= (!empty($unit_standards) && (is_array($unit_standards))) ? join(",", $unit_standards) : ''; ?>" id="unit_standard"  readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Intervention Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Intervention Name" name="intervention_name" class="form-control intervention_name" value="<?= (isset($assessment)) ? $assessment->intervention_name: ''; ?>" id="intervention_name"  readonly="readonly">

                                </div>

                            	<div class="col-md-6">

                                    <label class="form-control-label">Assessment Start Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Start Date" name="assessment_start_date" class="form-control assessment_start_date" value="<?= (isset($assessment)) ? $assessment->assessment_start_date : ''; ?>" id="assessment_start_date"  readonly="readonly">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment End Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment End Date" name="assessment_end_date" class="form-control assessment_end_date" value="<?= (isset($assessment)) ? $assessment->assessment_end_date : ''; ?>" id="assessment_end_date"  readonly="readonly">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Type" name="assessment_type" class="form-control assessment_type" value="<?= (isset($assessment)) ? $assessment->assessment_type : ''; ?>" id="assessment_type">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Submission Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Submission Type" name="assessment_type" class="form-control assessment_type" value="<?= (isset($assessment)) ? $assessment->submission_type : ''; ?>" id="submission_type">

                                </div>

<?php /*
                                <div class="col-md-12">

                                    <label class="form-control-label">Learner Guide<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if (!empty($assessment->upload_learner_guide)) { ?>
                                    	<a href="/uploads/assessment/upload_learner_guide/<?php echo $assessment->upload_learner_guide; ?>" target="_blank">Download the Learner Guide</a>
                                    <?php } else {?>
                                    	<p>No learner guide available for this assessment</p>
                                    <?php } ?>

                                </div>
*/ ?>

                                <div class="col-md-12">

                                    <label class="form-control-label">Learner Workbook<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if (!empty($module->upload_workbook)) { ?>
                                    	<a href="/uploads/assessment/upload_learner_workbook/<?php echo $module->upload_workbook; ?>" target="_blank">Download the Learner Workbook</a>
                                    <?php } else {?>
                                    	<p>No learner workbook available for this assessment</p>
                                    <?php } ?>

                                </div>

                                <div class="col-md-12">

                                    <label class="form-control-label">Learner POE<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if (!empty($module->upload_poe)) { ?>
                                    	<a href="/uploads/assessment/upload_learner_poe/<?php echo $module->upload_poe; ?>" target="_blank">Download the Learner POE</a>
                                    <?php } else {?>
                                    	<p>No learner poe for this assessment</p>
                                    <?php } ?>

                                </div>

                                <div class="col-md-12">
									<p>&nbsp;</p>
                                	<h4>Moderation Report</h4>


        	                        <?php if ($moderation_report) { ?>

                                    	<ul>
                                    		<li>
                                    			<p>Moderation started on <?php echo $moderation_report->moderation_date; ?></p>
                                    			<p>Status :  <?php echo ucwords($assessment->status); ?></p>
                                    			<p>Moderation Number : <?php echo $moderation_report->moderation_number; ?></p>
                                    			<p>Sample Percentage :  <?php echo $moderation_report->sample_percentage; ?></p>

												<form method="post" enctype="multipart/form-data" id="MarkAssessment" action="/moderation-submission-list">
		     										<input type="hidden" name="moderator_report_id" value="<?= (isset($moderation_report)) ? $moderation_report->id : ''; ?>">
   									    			<input type="hidden" name="assessment_id" value="<?= (isset($assessment)) ? $assessment->id : ''; ?>">
                                    				<p>
		                                        		<button type="submit" class="btn btn-primary">View Submissions</button>
                                    				</p>
												</form>
                                    		</li>
                                    	</ul>

                                    <?php } else { ?>

                         				<form method="post" enctype="multipart/form-data" id="MarkAssessment" action="/moderation-submission-list">

         									<input type="hidden" name="moderator_report_id" value="<?= (isset($moderation_report)) ? $moderation_report->id : ''; ?>">
       									    <input type="hidden" name="assessment_id" value="<?= (isset($assessment)) ? $assessment->id : ''; ?>">

                                            <div class="col-md-12">

                                                <label class="form-control-label">Sample Percentage</label>

                                                <select class="form-control" name="sample_percentage">
                                                    <option hidden value="">Choose the Sample Percentage</option>
                                                    <option value="10"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 10)) ? ' selected="selected"' : ''; ?>>10 %</option>
                                                    <option value="20"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 20)) ? ' selected="selected"' : ''; ?>>20 %</option>
                                                    <option value="30"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 30)) ? ' selected="selected"' : ''; ?>>30 %</option>
                                                    <option value="40"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 40)) ? ' selected="selected"' : ''; ?>>40 %</option>
                                                    <option value="50"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 50)) ? ' selected="selected"' : ''; ?>>50 %</option>
                                                    <option value="60"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 60)) ? ' selected="selected"' : ''; ?>>60 %</option>
                                                    <option value="70"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 70)) ? ' selected="selected"' : ''; ?>>70 %</option>
                                                    <option value="80"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 80)) ? ' selected="selected"' : ''; ?>>80 %</option>
                                                    <option value="90"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 90)) ? ' selected="selected"' : ''; ?>>90 %</option>
                                                    <option value="100"<?php echo (!empty($moderation_report) && ($moderation_report->sample_percentage == 100)) ? ' selected="selected"' : ''; ?>>100 %</option>
                                                </select>

                                                <label id="quarter-error" class="error" for="assessment_type"></label>

                                            </div>

                                            <div class="col-md-12">
                                                 <label class="form-control-label">Moderation Number<span style="color:red;font-weight:bold;"> *</span></label>
                                                 <select class="form-control" name="moderation_number" id="moderation_number">
                                                     <option label="Choose Your Moderation Number"></option>
                                                     <option value="1st">1st
                                                     </option>
                                                     <option value="2nd">2nd
                                                     </option>
                                                     <option value="3rd">3rd
                                                     </option>
                                                     <option value="4th">4th
                                                     </option>
                                                 </select>
                                                 <label id="error" class="error" for=""></label>
                                            </div>

                                            <div class="col-md-12">
            									<p>&nbsp;</p>
                                            	<button type="submit" class="btn btn-primary">Select assessments for moderation</button>
                                            </div>

        								</form>

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