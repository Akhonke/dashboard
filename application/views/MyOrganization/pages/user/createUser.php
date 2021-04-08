<style type="text/css">
   label {
   border: 0;
   margin-bottom: 3px;
   display: block;
   width: 100%;
   }
   input {
   @include box-sizing(border-box);
   }
   .error {
   color: red;
   }
</style>
<div class="container-fluid px-xl-5">
   <section class="py-5">
      <div class="row">
         <div class="col-lg-12 mb-1">
            <div class="card">
               <div class="card-header">
                  <h3 class="h6 text-uppercase mb-0">Create User</h3>
               </div>
               <div class="card-body">
                  <form class="form-horizontal" method="post" id="Createuser" enctype="multipart/form-data">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                       
                        <div class="col-md-6">
                           <label class="form-control-label">First Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your First Name" class="form-control" name="first_name" id="first_name" value="<?php if (isset($record)) {
                              echo $record->first_name;
                              } else {
                              if (isset($_POST['first_name'])) {
                                  echo set_value('first_name');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('first_name') ?></span>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Last Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Last Name" class="form-control" name="last_name" id="last_name" value="<?php if (isset($record)) {
                              echo $record->last_name;
                              } else {
                              if (isset($_POST['last_name'])) {
                                  echo set_value('last_name');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('last_name') ?></span>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Organization Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Organization Name" class="form-control" name="organization_name" id="organization_name" value="<?php if (isset($record)) {
                              echo $record->organization_name;
                              } else {
                              if (isset($_POST['organization_name'])) {
                                  echo set_value('organization_name');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('organization_name') ?></span>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Department Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <select class="form-control department" name="department">
                              <option label="" value="" hidden>Choose Your Department</option>
                              <option label="" value="" >Department 1</option>
                              <option label="" value="" >Department 2</option>
                              <option label="" value="" >Department 3</option>
                             
                           </select>
                           <label id="department-error" class="error" for="department"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Email Address<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="email" placeholder="Enter Your Email" class="form-control" name="email" id="email" value="<?php if (isset($record)) {
                              echo $record->email;
                              } else {
                              if (isset($_POST['email'])) {
                                  echo set_value('email');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('email') ?></span>
                        </div>
                        
                        
                        <div class="col-md-6">
                           <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                           <label class="form-control-label">Mobile Number<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="number" placeholder="Enter Your Primary Cellphone Number" class="form-control" name="mobile" id="mobile" value="<?php if (isset($record)) {
                              echo $record->mobile;
                              } else {
                              if (isset($_POST['mobile'])) {
                                  echo set_value('mobile');
                              }
                              } ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary Cellphone number 9 digit with 0-9">
                        </div>
                        <span class='error_validate' style='color:red;'><?= form_error('mobile') ?></span>
                       
                        <div class="col-md-6">
                           <label class="form-control-label">Gender<span style="color:red;font-weight:bold;"> *</span></label>
                           <select class="form-control" name="gender">
                              <option value="" hidden>Select Gender</option>
                              <option value="Male" <?php if (isset($record) && $record->gender == 'Male') {
                                 echo 'selected';
                                 } else {
                                 if (isset($_POST['gender']) && $_POST['gender'] == 'Male') {
                                     echo 'selected';
                                 }
                                 } ?>>
                                 Male
                              </option>
                              <option value="Female" <?php if (isset($record) && $record->gender == 'Female') {
                                 echo 'selected';
                                 } else {
                                 if (isset($_POST['gender']) && $_POST['gender'] == 'Female') {
                                     echo 'selected';
                                 }
                                 } ?>>
                                 Female
                              </option>
                              <option value="Other" <?php if (isset($record) && $record->gender == 'Other') {
                                 echo 'selected';
                                 } else {
                                 if (isset($_POST['gender']) && $_POST['gender'] == 'Other') {
                                     echo 'selected';
                                 }
                                 } ?>>
                                 Other
                              </option>
                           </select>
                           <span class='error_validate' style='color:red;'><?= form_error('gender') ?></span>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Province<span style="color:red;font-weight:bold;"> *</span></label>
                           <select class="form-control province" name="province">
                              <option label="" value="" hidden>Choose Your Province</option>
                              <?php
                                 foreach ($province as $key => $value) {
                                 ?>
                              <option value="<?= $value->name  ?>" <?php
                                 if (isset($record)) {
                                 
                                     if ($record->province == $value->name) { ?> selected="selected" <?php }
                                 } ?>><?= $value->name  ?>
                              </option>
                              <?php }
                                 ?>
                           </select>
                           <label id="province-error" class="error" for="province"></label>
                        </div>
                       
                        <div class="col-md-6">
                           <label class="form-control-label">City<span style="color:red;font-weight:bold;"> *</span></label>
                           <select class="form-control" name="city" id="city">
                              <?php if (!empty($_GET['id'])) {
                                 foreach ($city as $key => $value) {
                                     if ($record->province == $value->province_id && $record->district == $value->district_id && $record->region == $value->region_id) {
                                 ?>
                              <option value="<?= $value->id ?>" <?php
                                 if (isset($record)) {
                                 
                                     if ($record->city == $value->city) { ?> selected="selected" <?php }
                                 } ?>><?= $value->city ?></option>
                              <?php
                                 }
                                 }
                                 } else { ?>
                              <option label="" value="" hidden>Select Your City</option>
                              <?php
                                 } ?>
                           </select>
                           <label id="city-error" class="error" for="city"></label>
                        </div>
                        
                        <div class="col-md-6">
                           <label class="form-control-label">User Role<span style="color:red;font-weight:bold;"> *</span></label>
                           <select class="form-control User" name="user_role">
                              <option label="" value="" hidden>Choose Your User Role</option>
                              <option label="" value="" >User Role 1</option>
                              <option label="" value="" >User Role 2</option>
                              <option label="" value="" >User Role 3</option>
                             
                           </select>
                           
                        </div>
                      
                        <div id="addtextarea" class="col-md-12">
                        </div>
                    </div>
                    
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