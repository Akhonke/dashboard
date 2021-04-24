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

                            <div class="form-group row">

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Title<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Assessment Title" name="title" class="form-control assessment_end_date" value="<?= (isset($record)) ? $record->title: ''; ?>" id="title">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

<!--                                      <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($record)) ? $record->class_name: ''; ?>" id="class_name">  -->

                                    <select class="form-control" name="class_name" id="class_name">

                                        <option hidden value="">Select Class Name</option>
                                        <?php foreach ($classes as $class) { ?>
                                            <option value="<?= $class['id'] ?>"  <?php echo ( (isset($record) && $record->class_name == $class['id']) ? 'selected' : '' ) ?>>
                                            	<?= $class['class_name'] ?>
                                        	</option>
                                        <?php } ?>
                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Programme Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Programme Name" name="programme_name" class="form-control programme_name" value="<?= (isset($record)) ? $record->programme_name: ''; ?>" id="programme_name">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Programme Number<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Programme Number" name="programme_number" class="form-control programme_number" value="<?= (isset($record)) ? $record->programme_number: ''; ?>" id="programme_number">

                                </div>



                                <div class="col-md-6">

                                    <label class="form-control-label">Unit Standard<span style="color:red;font-weight:bold;"> *</span></label>

                                    <!-- <input type="text" placeholder="Enter the Unit Standard" name="unit_standard" class="form-control unit_standard" value="<?= (isset($record)) ? $record->unit_standard: ''; ?>" id="unit_standard">  -->

                                    <select class="form-control" name="unit_standard" id="class_name">

                                        <option hidden value="">Select Unit Standard</option>
                                        <?php foreach ($units as $unit) { ?>
                                            <option value="<?= $unit['id'] ?>"  <?php echo ( (isset($record) && $record->unit_standard == $unit['id']) ? 'selected' : '' ) ?>>
                                            	<?= $unit['title'] ?>
                                        	</option>
                                        <?php } ?>
                                    </select>

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Intervention Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter the Intervention Name" name="intervention_name" class="form-control intervention_name" value="<?= (isset($record)) ? $record->intervention_name: ''; ?>" id="intervention_name">

                                </div>

                            	<div class="col-md-6">

                                    <label class="form-control-label">Assessment Start Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Assessment Start Date" name="assessment_start_date" class="form-control assessment_start_date" value="<?= (isset($record)) ? $record->assessment_start_date : ''; ?>" id="assessment_start_date">

                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment End Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Assessment End Date" name="assessment_end_date" class="form-control assessment_end_date" value="<?= (isset($record)) ? $record->assessment_end_date : ''; ?>" id="assessment_end_date">

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="assessment_type">

                                        <option hidden value="">Choose Your Assessment Type</option>
                                        <option value="formative">Formative</option>
                                        <option value="summative">Summative</option>
                                        <option value="poe">POE</option>
                                        <option value="live video">Live Video</option>
                                        <option value="online questions">Online Questions</option>
                                        <option value="practical assessment">Practical Assessment</option>
                                    </select>

                                    <label id="quarter-error" class="error" for="assessment_type"></label>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Assessment Submission Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="submission_type">

                                        <option hidden value="">Choose Your Assessment Submission Type</option>
                                        <option value="manual document upload">Manual Document Upload</option>
                                        <option value="timed based assessment online">Timed based assessment online</option>
                                    </select>

                                    <label id="quarter-error" class="error" for="submission_type"></label>

                                </div>


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