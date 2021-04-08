<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <?php if (!empty($_GET['id'])) {
                            $name = 'Update';
                        } else {
                            $name = "Create";
                        } ?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name ?> New Stipend</h3>
                    </div>
                    <?php
                    if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>

                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateStipendForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">I.D Number<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your ID" class="form-control id_number" name="learner_id" value="<?php if (!empty($record)) {
                                                                                                                                                echo $record->id_number;
                                                                                                                                            } ?>" id="learner_id">

                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Learner Name<span style="color:red;font-weight:bold;"> *</span> </label>
                                    <input type="text" placeholder="Enter Your Learner Name" class="form-control" value="<?php if (!empty($record)) {
                                                                                                                                echo $record->learner_name;
                                                                                                                            } ?>" id="learner_name" name="learner_name" readonly>
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Learner Surname<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Learner Surname" class="form-control" value="<?php if (!empty($record)) {
                                                                                                                                echo $record->learner_surname;
                                                                                                                            } ?>" id="learner_surname" name="learner_surname" readonly>
                                    <label id="" class="error" for=""></label>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
                                        <option value="" hidden>Select Learnership Type Name</option>
                                        <?php
                                        if (!empty($learnership)) {
                                            foreach ($learnership as $key => $learnship) { ?>
                                                <option value="<?= $learnship->id; ?>" <?php if (isset($record) && $record->learnship_id == $learnship->id) {
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
                                <div class="col-md-6">
                                    <label class="form-control-label">Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>
                                    <!-- <select class="form-control learnership_sub_type_id" name="learnership_sub_type_id" id="learnership_sub_type_id">
                                        <option value="" hidden>Select Learnership Sub Type Name</option>
                                    </select> -->
                                    <input type="text" placeholder="Enter Your Learnership Sub Type" class="form-control learnership_sub_type_id" value="<?php if (!empty($record)) {
                                                                                                                                echo $record->learnership_subtype	;
                                                                                                                            } ?>" id="learnership_sub_type_id" name="learnership_sub_type_id" readonly>
                                    <input type="hidden" placeholder="Enter Your Learnership Sub Type" class="form-control learnership_sub_type_id" value="<?php if (!empty($record)) {
                                                                                                                                echo $record->learnership_subtype	;
                                                                                                                            } ?>" id="learnership_sub_type_ids" name="learnership_sub_type_ids" readonly>
                                    <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="form-control-label">Class Name</label> 
                                   <?php
                                    if (!empty($_GET['id'])) {
                                        //if($record->learner_classname == $classname->id){
                                    ?>
                                        <input type="hidden" name="learner_classname"  class="form-control" value="<?= $record->class ?>">
                                        <input type="text" name="class" class="form-control" value="<?= $record->class ?>" readonly>
                                    <?php
                                    } else { ?>
                                        <select class="form-control learner_classname" id="learner_classname" name="class">
                                            <option label="" value="" hidden>Select Your Class Name</option>
                                        </select>
                                    <?php } ?>
                                    <label id="classname-error" class="error" for="classname"></label>
                                </div> -->
                                <div class="col-md-6">
                                    <label class="form-control-label">Class<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Class" class="form-control learner_classname" value="<?php if (!empty($record)) {
                                                                                                                        echo $record->class;
                                                                                                                    } ?>" id="class" name="class">
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Bank Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <!-- <select class="form-control bank_name" name="bank_name" id="bank_name">
                                        <option value="" hidden>Select Bank Name</option>
                                        <?php
                                        if (!empty($bank_name)) {
                                            foreach ($bank_name as $key => $bank) { ?>
                                                <option value="<?= $bank->id; ?>" <?php if (isset($record) && $record->bank_name == $bank->id) {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        if (isset($_POST['bank_name']) && $_POST['bank_name'] == $bank->bank_name) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>><?= ucfirst($bank->bank_name); ?></option>
                                        <?php  }
                                        } ?>
                                        
                                    </select> -->
                                    <input type="text" placeholder="Enter Your Bank Name" class="form-control bank_name" value="<?php if (!empty($record)) {
                                                                                                                        echo $record->bank_name;
                                                                                                                    } ?>" id="bank_name" name="bank_name">
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label"> Bank Branch Name <span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Bank Branch Name " class="form-control" name="bank_branch_name" value="<?php if (!empty($record)) {
                                                                                                                                                            echo $record->bank_branch_name;
                                                                                                                                                        } ?>" id="bank_branch_name">

                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Account Type <span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Account Type " class="form-control" name="account_type" value="<?php if (!empty($record)) {
                                                                                                                                                        echo $record->account_type;
                                                                                                                                                    } ?>" id="account_type">
                                    <!-- <select class="form-control account_type" name="account_type" id="account_type">
                                        <option label="" value="" hidden>Select Your Account Type</option>
                                        <option value="saving_account" <?php if (!empty($record) && $record->account_type == "saving_account") {
                                                                            echo 'selected';
                                                                        } ?>>Saving Account</option>
                                        <option value="current_account" <?php if (!empty($record) && $record->account_type == "current_account") {
                                                                            echo 'selected';
                                                                        } ?>>Current Account</option>

                                    </select> -->
                                    <label id="" class=" error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Branch Code<span style="color:red;font-weight:bold;"> *</span> </label>
                                    <input type="text" placeholder="Enter Your Bank Branch Code " class="form-control" name="branch_code" value="<?php if (!empty($record)) {
                                                                                                                                                        echo $record->branch_code;
                                                                                                                                                    } ?>" id="branch_code">

                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Account Number<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Your Account Number " class="form-control" name="account_number" value="<?php if (!empty($record)) {
                                                                                                                                                        echo $record->account_number;
                                                                                                                                                    } ?>" id="acccount_number">

                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label"> Number of days attended<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Your  Number of days attended " class="form-control" name="total_attend" value="<?php if (!empty($record)) {
                                                                                                                                                                echo $record->total_attendence;
                                                                                                                                                            } ?>" id="total_attend">

                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Total to be paid<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Your  Total to be paid" class="form-control" name="paid_amount" value="<?php if (!empty($record)) {
                                                                                                                                                        echo $record->amount;
                                                                                                                                                    } ?>" id="paid_amount">

                                    <label id="" class="error" for=""></label>
                                </div>








                                <input type="hidden" name="created_by" value="<?php echo adminid(); ?>">
                            </div>
                            <div class="line"></div>
                            <div class="form-group row" id="assessorfield">
                            </div>
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