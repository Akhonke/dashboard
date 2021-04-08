

<div class="container-fluid px-xl-5">

  <section class="py-5">

    <div class="row">

      <!-- Form Elements -->

      <div class="col-lg-12 mb-1">

        <div class="card">

          <div class="card-header">

            <h3 class="h6 text-uppercase mb-0">Edit Profile</h3>

          </div>

          <div class="card-body">

            <form class="form-horizontal" method="post" id="editlearnerForm" enctype="multipart/form-data">

              <div class="form-group row">

                <div class="col-md-12">

                  <h2>Personal Information</h2>

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

                  <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>

                  <label class="form-control-label">Primary Cellphone number</label>

                  <input type="text" placeholder="Enter Your Cellphone" class="form-control mobile" name="mobile"value="<?= (isset($record)) ? $record->mobile : ''; ?>" id="mobile" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary Cellphone number 9 digit with 0-9">

                  <label id="mobile-error" class="error" for="mobile"></label>

                </div>

               

                <div class="col-md-6">

                  <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>

                  <label class="form-control-label">Second Cellphone Number</label>

                  <input type="text" placeholder="Enter Your Cellphone" class="form-control mobile_number" name="mobile_number" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>" id="mobile_number" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Second Cellphone number 9 digit with 0-9"> 

                  <label id="mobile_number-error" class="error" for="mobile_number"></label>

                </div>



                <div class="col-md-6">



                    <label class="form-control-label">Gender</label>



                    <select class="form-control" name="gender" id="gender">

                        <option value="" hidden label="">Select Gender</option>

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



                    <label class="form-control-label">Profile Image</label>



                    <input type="file"  class="form-control" name="profile_image" value="<?= (isset($record)) ? $record->profile_image : ''; ?>">
                    <?php if (!empty($record->profile_image)) { ?>
                      <img src="<?= BASEURL . './uploads/learner/profile_image/' . $record->profile_image ?>" width="50px" height="50px">
                  <?php }
                   ?>
                   <label id="" class="" for=""></label>

                </div>

               
                <div class="col-md-12">

                  <h2>Address Information</h2>

                </div>

                <div class="col-md-6">

                  <label class="form-control-label">Province</label>

                  <select class="form-control province" name="province">

                    <option label="Choose Your Province"></option>

                    <?php 

                      foreach ($province as $key => $value) {

                     ?>

                    <option value="<?= $value->name  ?>"

                      <?php if (isset($record)) {

                          if($record->province == $value->name){ ?> selected="selected" <?php } }?> ><?= $value->name  ?>

                    </option>

                    <?php } ?> 

                  </select>

                  <label id="province-error" class="error" for="province"></label>

                                </div>



                                <div class="col-md-6">

                                    <label class="form-control-label">District</label>

                                       <select class="form-control district_option" name="district">

                                            <?php 

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

                                            } }  ?>

                                       </select>

                                    <label id="district-error" class="error" for="district"></label>

                                </div>
<!-- 


                                <div class="col-md-6">

                                    <label class="form-control-label">Region</label>

                                      <select class="form-control" id="region" name="region">

                                       <?php 

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

                                            } }  ?>

                                    </select>

                                    <label id="region-error" class="error" for="region"></label>

                                </div> -->



                                <div class="col-md-6">

                                    <label class="form-control-label">City</label>

                                    <select class="form-control" name="city" id="city">

                                       

                                           <?php  

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

                                            }  }  ?>

                                    </select>

                                    <label id="city-error" class="error" for="city"></label>

                                </div>

                <div class="col-md-6">



                    <label class="form-control-label">Suburb</label>



                    <input type="text" placeholder="Enter Your Suburb" class="form-control" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">

                   <label id="Suburb-error" class="error" for="Suburb"></label>

                </div>
                



                <div class="col-md-6">



                    <label class="form-control-label">Street name</label>



                    <input type="text" placeholder="Enter Your Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">

                   <label id="Street_name-error" class="error" for="Street_name"></label>

                </div>



                <div class="col-md-6">

                  <label class="form-control-label">Street Number</label>

                  <input type="number" placeholder="Enter Your Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">

                  <label id="Street_number-error" class="error" for="Street_number"></label>

                </div>

                <div class="col-md-12">

                    <h2>Attach Document</h2>

                </div>



                <div class="col-md-6">

                    <label class="form-control-label">I.D. Copy</label>

                    <input type="file" class="form-control" name="id_copy" value="<?= (isset($record)) ? $record->id_copy : ''; ?>">
                    <?php if (!empty($record->id_copy)) { ?>
                      <img src="<?= BASEURL . './uploads/learner/id_copy/' . $record->id_copy ?>" width="50px" height="50px">
                  <?php }
                   ?>

                </div>



                <div class="col-md-6">

                    <label class="form-control-label">Certificate Copy</label>

                    <input type="file" class="form-control" name="certificate_copy" value="<?= (isset($record)) ? $record->certificate_copy : ''; ?>">
                    <?php if (!empty($record->id_copy)) { ?>
                      <img src="<?= BASEURL . './uploads/learner/certificate_copy/' . $record->certificate_copy ?>" width="50px" height="50px">
                  <?php }
                   ?>
                </div>

                <div class="col-md-6">

                    <label class="form-control-label">Contract Copy</label>

                    <input type="file" class="form-control" name="contract_copy" value="<?= (isset($record)) ? $record->contract_copy : ''; ?>">
                    <?php if (!empty($record->contract_copy)) { ?>
                      <img src="<?= BASEURL . './uploads/learner/contract_copy/' . $record->contract_copy ?>" width="50px" height="50px">
                  <?php }
                   ?>
                </div>

                <div class="col-md-12">

                    <h2>Other Details</h2>

                </div>

                <div class="col-md-4">

                  <label class="form-control-label">Assessment Status</label><br>

                  <div class="form-check-inline"><label class="form-check-inline "><input class="form-check-input" type="radio" name="assessment" value="yes"<?php if(!empty($record->assessment)){ if($record->assessment == 'yes'){ echo "checked";} }?>> Assessment Completed</label>

                  </div>

                  <div class="form-check-inline"><label class="form-check-inline "><input class="form-check-input" type="radio" name="assessment" value="no"<?php if(!empty($record->assessment)){ if($record->assessment == 'no'){ echo "checked";} }?>> Assessment Not Completed</label></div>

                  <label id="assessment-error" class="error" for="assessment"></label>

                </div>


                <div class="col-md-4">

                  <label class="form-control-label">Is the Learner A U.I.F Beneficiary ?</label><br>

                  <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="utf_benefits" value="yes"<?php if(!empty($record->utf_benefits)){ if($record->utf_benefits == 'yes'){ echo "checked";} } ?>> Yes</label></div>

                  <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="utf_benefits" value="no"<?php if(!empty($record->utf_benefits)){ if($record->utf_benefits == 'no'){ echo "checked";} } ?>> No</label></div>

                  <label id="utf_benefits-error" class="error" for="utf_benefits"></label>

                </div>


             

              </div> 

              <div class="line"></div>

              <div class="form-group row">

                <div class="col-md-12">

                  <div class="text-center">

                   <?php if(isset($record)){ ?><button type="submit" class="btn btn-primary">Update</button><?php } ?>

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



