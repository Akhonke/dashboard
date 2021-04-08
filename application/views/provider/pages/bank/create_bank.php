<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <?php if(!empty($_GET['id'])){
                           $name = 'Update';
                        }else{
                           $name = "Create";
                        } ?> 
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0"><?= $name ?>   Quarterly Progress report </h3>
                    </div>
                    <?php 
                   // ECHO '<pre>';print_r($_SESSION);
                       if ((!empty($this->session->flashdata('error'))) &&($this->session->flashdata('error')!='error')) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateBankForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Created By First Name <span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your First Name" name="created_by_first_name" class="form-control " value="<?= (isset($record)) ? $record->created_by_first_name : ''; ?>" id="created_by_first_name" >
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Created By Surname<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Project Name" name="created_by_surname" class="form-control project_name" value="<?= (isset($record)) ? $record->created_by_surname : ''; ?>" id="created_by_surname" >
                                   <!--  <input type="hidden"  name="project_id"  value="<?= (isset($projectmanager)) ? $projectmanager->id : ''; ?>" id="project_id"> -->
                                </div>


                                <div class="col-md-6">
                                    <label class="form-control-label">Training Provider Name</label>
                                    <input type="text" placeholder="Enter Your Provider Name" name="" class="form-control" value="<?= (isset($taringprovider)) ? $taringprovider->company_name : ''; ?>" id="training_provider_name" readonly>
                                      <input type="hidden"  name="training_provider_name"  value="<?= (isset($taringprovider)) ? $taringprovider->trainer_id : ''; ?>" id="trainer_id">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Project Manager Name</label>
                                    <input type="text" placeholder="Enter Your Project Manager Name" name="project_manager_name" class="form-control " value="<?= (isset($project)) ? $project->project_name : ''; ?>" id="project_name" readonly>
                                   <!--  <input type="hidden"  name="project_id"  value="<?= (isset($projectmanager)) ? $projectmanager->id : ''; ?>" id="project_id"> -->
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Start Date<span style="color:red;font-weight:bold;"> *</span> </label>
                                    <input type="date" placeholder="Start Date" name="start_date" class="form-control " value="<?= (isset($record)) ? date('Y-m-d',strtotime($record->start_date)) : ''; ?>" id="start_date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">End Date<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="date" placeholder="End Date" name="end_date" class="form-control" value="<?= (isset($record)) ? date('Y-m-d',strtotime($record->end_date)) : ''; ?>" id="end_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control" name="quater_name">
                                        <option label="Choose Your Quarter"></option>
                                        <option value="Quarter 1"<?php if (isset($record)) {
                                                 if($record->quater_name == 'Quarter 1'){ ?> selected="selected" 
                                            <?php } } ?>
                                            ><?php 
                                            if (isset($record)) {
                                                if($record->quater_name == 'Quarter 1'){ 
                                                    echo "Quarter 1";
                                                }else{
                                                  echo "Quarter 1";
                                                }
                                            }else{
                                                echo "Quarter 1";
                                            } ?>
                                        </option>
                                        <option value="Quarter 2"<?php if (isset($record)) {
                                                 if($record->quater_name == 'Quarter 2'){ ?> selected="selected" 
                                            <?php } } ?>
                                            ><?php 
                                            if (isset($record)) {
                                                if($record->quater_name == 'Quarter 2'){ 
                                                    echo "Quarter 2";
                                                }else{
                                                  echo "Quarter 2";
                                                }
                                            }else{
                                                echo "Quarter 2";
                                            } ?>
                                        </option>
                                        <option value="Quarter 3"<?php if (isset($record)) {
                                                 if($record->quater_name == 'Quarter 3'){ ?> selected="selected" 
                                            <?php } } ?>
                                            ><?php 
                                            if (isset($record)) {
                                                if($record->quater_name == 'Quarter 3'){ 
                                                    echo "Quarter 3";
                                                }else{
                                                  echo "Quarter 3";
                                                }
                                            }else{
                                                echo "Quarter 3";
                                            } ?>
                                        </option>
                                        <option value="Quarter 4"<?php if (isset($record)) {
                                                 if($record->quater_name == 'Quarter 4'){ ?> selected="selected" 
                                            <?php } } ?>
                                            ><?php 
                                            if (isset($record)) {
                                                if($record->quater_name == 'Quarter 4'){ 
                                                    echo "Quarter 4";
                                                }else{
                                                  echo "Quarter 4";
                                                }
                                            }else{
                                                echo "Quarter 4";
                                            } ?>
                                        </option>
                                    </select>
                                    <label id="quarter-error" class="error" for="quarter"></label>
                                </div>
                                <div class="col-md-6">
                                    <?php if(!empty($_GET['id'])){ ?>
                                        <label class="form-control-label">Document<span style="color:red;font-weight:bold;"> *</span> </label>
                                        <input type="file" name="documentnew" class="form-control">
                                    <?php  }else{ ?>
                                        <label class="form-control-label">Document<span style="color:red;font-weight:bold;"> *</span></label>
                                        <input type="file" name="document" class="form-control">
                                      <!--   <label id="upload_bank_statement-error" class="error" for="upload_bank_statement"></label> -->
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


        