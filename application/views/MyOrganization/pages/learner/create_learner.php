<div class="container-fluid px-xl-5">
   <section class="py-5">
      <div class="row">
         <!-- Form Elements -->
         <div class="col-lg-12 mb-1">
            <div class="card">
               <div class="card-header">
                  <?php if(!empty($_GET['id'])){
                     $name ="Update";
                     
                     }else{
                     
                     $name ="Add New";
                     
                     }?>
                  <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Learners</h3>
               </div>
               <div class="card-body">
                  <form class="form-horizontal" method="post" id="CreateLearnerForm" enctype="multipart/form-data">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                        <div class="col-md-12">
                           <h3 class="h6 text-uppercase mb-0">Personal Information</h3>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Full Name</label>
                           <input type="text" placeholder="Enter Your Full Name" class="form-control full_name" name="full_name" value="<?= (isset($record)) ? $record->first_name : ''; ?>" id="full_name">
                           <label id="full_name-error" class="error" for="full_name"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Surname</label>
                           <input type="text" placeholder="Enter Your Surname" class="form-control surname" name="surname" value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                           <label id="surname-error" class="error" for="surname"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Email</label>
                           <input type="text" placeholder="Enter Your Email" class="form-control email" name="email" value="<?= (isset($record)) ? $record->email : ''; ?>" id="email">
                           <label id="email-error" class="error" for="email"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">I.D Number</label>
                           <input type="text" placeholder="Enter Your I D" class="form-control id_number" name="id_number" value="<?= (isset($record)) ? $record->id_number : ''; ?>" id="id_number">
                           <label id="id_number-error" class="error" for="id_number"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">SETA Registration Number</label>
                           <input type="text" placeholder="Enter Your SETA" class="form-control" name="SETA" value="<?= (isset($record)) ? $record->SETA : ''; ?>">
                           <label id="SETA-error" class="error" for="SETA"></label>
                        </div>
                        <div class="col-md-6">
                           <span style="position: absolute;top:47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                           <label class="form-control-label">Primary Cellphone Number</label>
                           <input type="text" placeholder="Enter Your Cellphone Number" class="form-control mobile" name="mobile"value="<?= (isset($record)) ? $record->mobile : ''; ?>" id="mobile" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary cellphone number 9 digit with 0-9">
                           <label id="mobile-error" class="error" for="mobile"></label>
                        </div>
                        <div class="col-md-6">
                           <span style="position: absolute;top:47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                           <label class="form-control-label">Second Cellphone Number</label>
                           <input type="text" placeholder="Enter Your Cellphone Number" class="form-control mobile_number" name="mobile_number" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>" id="mobile_number" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Second cellphone number 9 digit with 0-9"> 
                           <label id="mobile_number-error" class="error" for="mobile_number"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Gender</label>
                           <select class="form-control" name="gender" id="gender">
                              <option label="Select Gender"></option>
                              <option value="Male"<?php if (!empty($record)) {
                                 if($record->gender == 'Male'){ ?> selected="selected" 
                                 <?php } }?>>Male</option>
                              <option value="Female"<?php if (!empty($record)) {
                                 if($record->gender == 'Female'){ ?> selected="selected" 
                                 <?php } }?>>Female</option>
                              <option value="Other"<?php if (!empty($record)) {
                                 if($record->gender == 'Other'){ ?> selected="selected" 
                                 <?php } }?>>Other</option>
                           </select>
                           <label id="gender-error" class="error" for="gender"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Training Provider</label>
                           <select class="form-control" name="trining_provider">
                              <option label="Select Training Provider"></option>
                              <?php 
                                 foreach ($training as $key => $value) {
                                 
                                 ?>
                              <option value="<?= $value->company_name ?>"<?php 
                                 if (isset($record)) {
                                 
                                     
                                 
                                 if($record->trining_provider == $value->company_name){ ?> selected="selected" 
                                 <?php } }?>><?= $value->company_name ?></option>
                              <?php
                                 }
                                 
                                 ?>
                           </select>
                           <label id="trining_provider-error" class="error" for="trining_provider"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Learnership Sub Type</label>
                           <select class="form-control" name="learnershipSubType">
                              <?php if(empty($_GET['id'])){ ?>
                              <option value="">Select Learnership Sub Type</option>
                              <?php } ?>
                              <?php 
                                 if(!empty($learnership_sub_type)){
                                 
                                   foreach ($learnership_sub_type as $key => $learnship) { ?>
                              <option value="<?= $learnship->sub_type; ?>" <?php if(isset($record)&&$record->learnershipSubType==$learnship->sub_type){ echo 'selected'; }else{ if(isset($_POST['learnershipSubType'])&&$_POST['learnershipSubType']==$learnship->sub_type){ echo 'selected'; }} ?>><?= ucfirst($learnship->sub_type); ?></option>
                              <?php  } } ?>
                           </select>
                           <label id="learnership_sub_type-error" class="error" for="learnership_sub_type"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Password</label>
                           <input type="password" placeholder="Enter Your Password" class="form-control password" name="password" value="<?= (isset($record)) ? $record->password : ''; ?>" id="password">
                           <label id="password-error" class="error" for="password"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Class Name</label>
                           <select class="form-control classname" name="classname">
                              <option label="Select Class Name"></option>
                              <?php 
                                 foreach ($classname as $key => $value) {
                                 
                                 ?>
                              <option value="<?= $value->class_name  ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->classname == $value->class_name){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->class_name  ?>
                              </option>
                              <?php }
                                 ?> 
                           </select>
                           <label id="classname-error" class="error" for="classname"></label>
                        </div>
                        <div class="col-md-12">
                           <h3 class="h6 text-uppercase mb-0">Address Information</h3>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Province</label>
                           <select class="form-control province" name="province">
                              <option label="Choose Your Province"></option>
                              <?php 
                                 foreach ($province as $key => $value) {
                                 
                                 ?>
                              <option value="<?= $value->name  ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->province == $value->name){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->name  ?>
                              </option>
                              <?php }
                                 ?> 
                           </select>
                           <label id="province-error" class="error" for="province"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">District</label>
                           <select class="form-control district_option" name="district">
                              <?php if(!empty($_GET['id'])){ 
                                 foreach ($District as $key => $value) {
                                 
                                    if($record->province == $value->province_id){
                                 
                                 ?>
                              <option value="<?= $value->id ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->district == $value->name){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->name ?></option>
                              <?php
                                 } } }else{ ?>
                              <option label="Select Your District"></option>
                              <?php } ?>
                           </select>
                           <label id="district-error" class="error" for="district"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Region</label>
                           <select class="form-control" id="region" name="region">
                              <?php if(!empty($_GET['id'])){ 
                                 foreach ($region as $key => $value) {
                                 
                                     if($record->province == $value->province_id && $record->district==$value->district_id){
                                 
                                 ?>
                              <option value="<?= $value->id ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->region == $value->region){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->region ?></option>
                              <?php
                                 } } }else{ ?>
                              <option label="Select Your Region"></option>
                              <?php } ?>
                           </select>
                           <label id="region-error" class="error" for="region"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">City</label>
                           <select class="form-control" name="city" id="city">
                              <?php if(!empty($_GET['id'])){ 
                                 foreach ($city as $key => $value) {
                                 
                                      if($record->province == $value->province_id && $record->district==$value->district_id &&$record->region == $value->region_id){
                                 
                                 ?>
                              <option value="<?= $value->id ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->city == $value->city){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->city ?></option>
                              <?php
                                 }  } }else{ ?>
                              <option label="Select Your City"></option>
                              <?php
                                 } ?>
                           </select>
                           <label id="city-error" class="error" for="city"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Suburb</label>
                           <input type="text" placeholder="Enter Your Suburb" class="form-control" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">
                           <label id="Suburb-error" class="error" for="Suburb"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Street Name</label>
                           <input type="text" placeholder="Enter Your Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">
                           <label id="Street_name-error" class="error" for="Street_name"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Street Number</label>
                           <input type="text" placeholder="Enter Your Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                           <label id="Street_number-error" class="error" for="Street_number"></label>
                        </div>
                        <div class="col-md-12">
                           <h3 class="h6 text-uppercase mb-0">Attach Document</h3>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">I.D. Copy</label>
                           <input type="file" class="form-control" name="id_copy" value="">
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Certificate Copy</label>
                           <input type="file" class="form-control" name="certificate_copy" value="">
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Contract Copy</label>
                           <input type="file" class="form-control" name="contract_copy" value="">
                        </div>
                        <div class="col-md-12">
                           <h3 class="h6 text-uppercase mb-0">Other Details</h3>
                        </div>
                        <div class="col-md-4">
                           <label class="form-control-label">Assessment Status</label><br>
                           <div class="form-check-inline"><label class="form-check-inline "><input class="form-check-input" type="radio" name="assessment" value="yes"<?php if(!empty($record->assessment)){ if((($record->assessment == 'yes')||($record->assessment == 'Yes'))){ echo "checked";} }?>> Assessment Completed</label></div>
                           <div class="form-check-inline"><label class="form-check-inline "><input class="form-check-input" type="radio" name="assessment" value="no"<?php if(!empty($record->assessment)){ if((($record->assessment == 'no')||($record->assessment == 'No'))){ echo "checked";} }?>> Assessment Not Completed</label></div>
                           <label id="assessment-error" class="error" for="assessment"></label>
                        </div>
                        <div class="col-md-4">
                           <label class="form-control-label">Is The Learner Disabled ?</label><br>
                           <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="disable" value="yes"<?php if(!empty($record->disable)){ if((($record->disable == 'yes')||($record->disable == 'Yes'))){ echo "checked";} }?>> Yes</label></div>
                           <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="disable" value="no"<?php  if(!empty($record->disable)){ if((($record->disable == 'no')||($record->disable == 'No'))){ echo "checked";} }?> > No</label></div>
                           <label id="disable-error" class="error" for="disable"></label>
                        </div>
                        <div class="col-md-4">
                           <label class="form-control-label">Is The Learner A U.I.F Beneficiary ?</label><br>
                           <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="utf_benefits" value="yes"<?php if(!empty($record->utf_benefits)){ if((($record->utf_benefits == 'yes')||($record->utf_benefits == 'Yes'))){ echo "checked";} } ?>> Yes</label></div>
                           <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="utf_benefits" value="no"<?php if(!empty($record->utf_benefits)){ if((($record->utf_benefits == 'no')||($record->utf_benefits == 'No'))){ echo "checked";} } ?>> No</label></div>
                           <label id="utf_benefits-error" class="error" for="utf_benefits"></label>
                        </div>
                        <div class="col-md-4">
                           <label class="form-control-label">The Learner Accepted For Training</label><br>
                           <div class="form-check-inline"><label class="form-check-inline"  onclick="Beneficiary('yes','')"><input class="form-check-input" type="radio" name="learner_accepted_training" value="yes"<?php if(!empty($record->learner_accepted_training)){ if((($record->learner_accepted_training == 'yes')||($record->learner_accepted_training == 'Yes'))){ echo "checked";} } ?>> Yes</label></div>
                           <div class="form-check-inline"><label class="form-check-inline" onclick="Beneficiary('no','<?php if(isset($record)){ echo $record->reason; }else{ echo '';} ?>')"><input class="form-check-input" type="radio" name="learner_accepted_training" value="no"<?php if(!empty($record->learner_accepted_training)){ if((($record->learner_accepted_training == 'no')||($record->learner_accepted_training == 'No'))){ echo "checked";} } ?>> No</label></div>
                           <label id="learner_accepted_training-error" class="error" for="learner_accepted_training"></label>
                        </div>
                        <?php if(isset($record)&&(($record->learner_accepted_training=='no')||($record->learner_accepted_training=='No'))){ ?>
                        <div class="col-md-12" id="textarea"><label class="form-control-label">Reason</label>
                           <textarea rows="4" cols="50" name="reason"  id="reason" class="form-control"><?php if(isset($record)){ echo $record->reason; } ?></textarea><label id="reason-error" class="error" for="reason"></label>
                        </div>
                        <?php } ?>
                        <div id="addtextarea" class=col-md-12>
                        </div>
                     </div>
                     <div class="line"></div>
                     <div class="form-group row">
                        <div class="col-md-12">
                           <div class="text-center">
                              <?= (isset($record)) ? '<button type="submit" class="btn btn-primary">Update</button>' : '<button type="submit" class="btn btn-primary">Add</button>'; ?>
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