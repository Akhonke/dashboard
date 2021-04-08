<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <?php if(!empty($_GET['id'])){

                           $name = 'Update';

                        }else{

                           $name = "Add";

                        } ?> 

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0"><?= $name ?> Attendence </h3>

                    </div>

                    <?php 

                       if ((!empty($this->session->flashdata('error'))) &&($this->session->flashdata('error')!='error')) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                      <?php 

                       if (!empty($this->session->flashdata('classname'))) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('classname'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateAttendanceForm">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-6">

                                   <label class="form-control-label">Training Provider</label>

                                    <input type="text" name="training_provider" class="form-control" value="<?php  if (!empty($training)){ echo $training->company_name;} ?>" readonly>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Week Ending Date<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder="Enter Your Week Ending Date" name="week_date" class="form-control" value="<?= (isset($record))? $record->week_date:'';  ?>" <?php if(!empty($_GET['id'])){ echo 'readonly';} ?>>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Year<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="year" placeholder="Enter Your Year" name="year" class="form-control" value="<?= (isset($record))? $record->year:'';  ?>" <?php if(!empty($_GET['id'])){ echo 'readonly';} ?>>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <?php if(empty($_GET['id'])){ ?>

                                    <select  class="form-control learnshipsubtype" name="learnership_sub_type">

                                        <option value="">Select learnship sub type</option>

                                        <?php 

                                            foreach ($learnershipSubType as $skey => $shipSubType) { ?>

                                               <option value="<?php echo $shipSubType->id; ?>" <?php if(isset($record)&&$record->learnership_sub_type==$shipSubType->id){ echo 'selected'; }else{if(isset($_POST['learnership_sub_type'])&&$_POST['learnership_sub_type']==$shipSubType->id){ echo 'selected'; }}; ?>><?php echo $shipSubType->sub_type; ?></option> 

                                        <?php  } ?>

                                    </select>

                                  <?php }else{ 

                                      ?>

                                        <input type="text" name="learnershipsubtype" class="form-control"  value="<?php  echo $learner_ship_SubType->sub_type; ?>" readonly>

                                        <input type="hidden"  name="learnership_sub_type" class="form-control"  value="<?php echo $learner_ship_SubType->id ; ?>">

                                <?php  } ?>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>

                                        <?php 

                                            if(!empty($_GET['id'])){ ?>

                                                <input type="hidden" name="learner_classname" class="form-control" value="<?php echo $class_name->id; ?>">

                                                <input type="text" name="learnerclassname" class="form-control" value="<?php echo $class_name->class_name; ?>" readonly>

                                        <?php }else{ ?>

                                                <select class="form-control classname" name="learner_classname">

                                                <option label="Select Your Class Name"></option>

                                              </select>

                                        <?php } ?>

                                    <label id="classname-error" class="error" for="classname"></label>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label"id="">Faciliator<span style="color:red;font-weight:bold;"> *</span></label>

                                     <?php if(empty($_GET['id'])){ ?>

                                    <select  class="form-control facilirator" name="facilirator">

                                        <option label="Select Your Facilitator"></option>

                                    <?php  

                                        foreach ($facilitator as $key => $value_one) { ?>

                                            <option value="<?php echo $value_one->fullname; ?>" <?php if(isset($record)&&$record->facilirator==$value_one->fullname){ echo 'selected'; }?> ><?php echo $value_one->fullname; ?></option> 

                                        <?php  } ?>

                                    </select>

                                         <label id="facilirator-error" class="error" for="facilirator"></label>

                                   <?php }else{ 

                                      ?>

                                    <input type="text" placeholder="Enter Your Faciliator" name="facilirator" class="form-control" value="<?php if(!empty($record)){echo $record->facilirator; } ?>" <?php if(!empty($_GET['id'])){ echo 'readonly';} ?>>

                                <?php } ?>



                                </div>

                                 <div class="col-md-6">

                                    <?php if(!empty($_GET['id'])){ ?>

                                        <label class="form-control-label"> Replace Attendance Sheet<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="attachments" class="form-control">

                                         <?php if(!empty($record->attachment)){ ?>

                                    <?php } }else{ ?>

                                        <label class="form-control-label"> Attendance Sheet<span style="color:red;font-weight:bold;"> *</span></label>

                                        <input type="file" name="attachment" class="form-control">

                                        <label id="attachment-error" class="error" for="attachment"></label>

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





