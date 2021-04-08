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
                     $name = "CREATE ";
                  } ?>
                  <h3 class="h6 text-uppercase mb-0"><?= $name ?>BANKING DETAILS</h3>
               </div>
               <?php
               if (!empty($this->session->flashdata('error'))) { ?>
                  <div style="color:red;text-align:center;font-size: 30px;border: 1px solid red;width: auto;margin: 0 auto;padding: 1px 11px;margin-top: 19px;border-radius: 30px;">
                     <?= $this->session->flashdata('error'); ?>
                  </div>
               <?php } ?>

               <div class="card-body">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateBankingDetailForm">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">

                        <div class="col-md-6">
                           <label class="form-control-label">I.D Number<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your ID" class="form-control id_number" value="" id="learner_id" name="learner_id">

                           <label id="" class="error" for="id_number"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Learner Name<span style="color:red;font-weight:bold;"> *</span> </label>
                           <input type="text" placeholder="Enter Your Learner Name" class="form-control" value="" id="learner_name" name="learner_name" readonly>
                           <label id="" class="error" for=""></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Learner Surname <span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Learner Surname" class="form-control" value="" id="learner_surname" name="learner_surname" readonly>
                           <label id="" class="error" for=""></label>
                        </div>

                        <div class="col-md-6">
                           <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Learnership Type Name" class="form-control" value="" id="learnship_id" name="learnship_id" readonly>

                           <!-- <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
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
                           </select> -->
                           <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                        </div>

                        <div class="col-md-6">
                           <label class="form-control-label">Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Learnership Sub Type Name" class="form-control" value="" id="learnership_sub_type_id" name="learnership_sub_type_id" readonly>

                           <!-- <select class="form-control learnership_sub_type_id" name="learnership_sub_type_id" id="learnership_sub_type_id">
                           </select> -->
                           <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Class Name" class="form-control" value="" id="learner_classname" name="learner_classname" readonly>

                           <!-- <?php

                                 if (!empty($_GET['id'])) {
                                 ?>
                              <input type="hidden" name="learner_classname" class="form-control" value="<?= $class_name->id ?>">

                              <input type="text" name="learnerclassname" class="form-control" value="<?= $class_name->class_name ?>" readonly>
                           <?php
                                 } else { ?>
                              <select class="form-control learner_classname" name="learner_classname">
                                 <option label="" value="" hidden>Select Your Class Name</option>
                              </select>
                           <?php } ?> -->
                           <label id="classname-error" class="error" for="classname"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Bank Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Bank Name" class="form-control" name="bank_name" value="" id="bank_name" readonly>
                           <!-- <select class="form-control" name="bank_name" id="bank_name">
                              <option value="" hidden>Select Bank Name</option>
                              <?php if (!empty($banklist)) {

                                 foreach ($banklist as $bank) {
                              ?>
                                    <option value="<?php echo $bank->bank_name; ?>"><?php echo $bank->bank_name; ?></option>

                              <?php
                                 }
                              }
                              ?>
                           </select> -->

                           <label id="" class="error" for="bank_name"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label"> Bank Branch Name<span style="color:red;font-weight:bold;"> *</span> </label>
                           <input type="text" placeholder="Enter Your Bank Branch Name " class="form-control" name="bank_branch_name" value="" id="bank_branch_name" readonly>

                           <label id="" class="error" for="bank_branch_name"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Account Type<span style="color:red;font-weight:bold;"> *</span> </label>
                           <input type="text" placeholder="Enter Your Account Type " class="form-control" name="account_type" value="" id="account_type" readonly>
                           <!-- <select class="form-control" name="account_type" id="account_type">
                              <option value="" hidden>Select Account Type</option>
                              <option value="Saving">Saving</option>
                              <option value="CreditCard">Credit Card</option>
                           </select> -->
                           <label id="" class="error" for="account_type"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Branch Code <span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Bank Branch Code " class="form-control" name="branch_code" value="" id="branch_code" readonly>

                           <label id="" class="error" for="branch_code"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Account Number<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="number" placeholder="Enter Your Account Number " class="form-control" name="account_number" value="" id="account_number" readonly>

                           <label id="" class="error" for="account_number"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Account Holder Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Account Holder Name" class="form-control" name="account_holder_name" value="" id="account_holder_name" readonly>

                           <label id="" class="error" for="account_holder_name"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Account Holder Surname<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your account Surname" class="form-control" name="account_holder_surname" value="" id="account_holder_surname" readonly>

                           <label id="" class="error" for=""></label>
                        </div>


                        <div class="col-md-6">
                           <label class="form-control-label">Account Holder I.D Number<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your account holder ID" class="form-control " name="account_holder_idnumber" value="" id="account_holder_idnumber" readonly>

                           <label id="" class="error" for="account_holder_idnumber"></label>
                        </div>

                        <div class="col-md-6">
                           <label class="form-control-label">Upload Account Holder I.D<span style="color:red;font-weight:bold;"> *</span> </label>
                           <input type="file" placeholder="Upload account holder ID" class="form-control " name="account_holder_id" value="" id="account_holder_id" readonly>

                           <label id="" class="error" for="account_holder_id"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Upload Account Holder Proof ID<span style="color:red;font-weight:bold;"> *</span> </label>
                           <input type="file" placeholder="Upload account holder proof id" class="form-control " name="account_holder_proof_id" value="" id="account_holder_proof_id">

                           <label id="" class="error" for="account_holder_proof_id"></label>
                        </div>







                     </div>
                     <div class="line"></div>
                     <div class="form-group row" id="assessorfield">
                     </div>
                     <div class="form-group row">
                        <div class="col-md-12">
                           <div class="text-center">
                              <button type="submit" class="btn btn-primary">Save</button>
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