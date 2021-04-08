<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <?php if(!empty($_GET['id'])){
                           $name = 'Update';
                        }else{
                           $name = "Add";
                        } ?> 
                     <h3 class="h6 text-uppercase mb-0"><?= $name ?> Class Name</h3>
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
                                    <label class="form-control-label">Training Provider</label>
                                    <select class="form-control" name="trainer_id">
                                        <?php if(empty($_GET['id'])){ ?>
                                        <option label="Choose Your Training Provider"></option>
                                        <?php 
                                         }
                                            foreach ($training as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id ?>" <?php 
                                                if (isset($record)) {
                                                    
                                                if($record->trainer_id == $value->id){ ?> selected="selected"
                                            <?php } }?>><?= $value->company_name ?></option>
                                        <?php
                                            }
                                         ?>
                                    </select>
                                    <label id="trainer_id-error" class="error" for="trainer_id"></label>
                                </div>
                                   <div class="col-md-6">

                                    <label class="form-control-label">Learnership Sub Type</label>
          
                                    <select class="form-control" name="learnership_sub_type_id">
                                        <?php if(empty($_GET['id'])){ ?>
                                          <option value="">Select Learnership Sub Type</option>
                                        <?php } ?>
                                        <?php 
                                          if(!empty($sublearnship)){
                                            foreach ($sublearnship as $key => $learnship) { ?>
                                            <option value="<?= $learnship->id; ?>" <?php if(isset($record)&&$record->learnership_sub_type_id==$learnship->id){ echo 'selected'; }else{ if(isset($_POST['learnership_sub_type_id'])&&$_POST['learnership_sub_type_id']==$learnship->sub_type){ echo 'selected'; }} ?>><?= ucfirst($learnship->sub_type); ?></option>
                                        <?php  } } ?>
                                    </select>
                                   <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Class Name</label>
                                    <input type="text" placeholder="Enter Your Class Name" name="class_name" class="form-control class_name" value="<?= (isset($record)) ? $record->class_name : ''; ?>" id="class_name">
                                </div>
                                <input type="hidden" name="created_by" value="<?php echo projectmanagerid(); ?>">
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
