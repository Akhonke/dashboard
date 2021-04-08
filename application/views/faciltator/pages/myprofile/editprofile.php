<div class="container-fluid px-xl-5">
   <section class="py-5">
      <div class="row">
         <!-- Form Elements -->
         <div class="col-lg-12 mb-1">
            <div class="card">
               <div class="card-header">
                  <h3 class="h6 text-uppercase mb-0">Edit Profile</h3>
               </div>
               <?php 
                  if (!empty($this->session->flashdata('error'))) { ?>
               <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
               <?php } ?>
               <div class="card-body">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data"
                     id="CreateFacilitatorForm">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="form-control-label">Full Name</label>
                           <input type="text" placeholder="Enter Your Full Name" name="fullname"
                              class="form-control" value="<?= (isset($record)) ? $record->fullname : ''; ?>">
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Surname</label>
                           <input type="text" placeholder="Enter Your Surname" name="surname" class="form-control"
                              value="<?= (isset($record)) ? $record->surname : ''; ?>">
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Email </label>
                           <input type="text" placeholder="Enter Your Email" name="email" class="form-control"
                              value="<?= (isset($record)) ? $record->email : ''; ?>">
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">ID Number</label>
                           <input type="text" placeholder="Enter Your ID Number" name="id_number"
                              class="form-control" value="<?= (isset($record)) ? $record->id_number : ''; ?>">
                        </div>
                        <div class="col-md-6">
                           <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                           <label class="form-control-label">Landline Number</label>
                           <input type="text" placeholder="Enter Your Landline Number" name="landline"
                              class="form-control" value="<?= (isset($record)) ? $record->landline : ''; ?>" style="position: relative;padding-left: 50px;">
                        </div>
                        <div class="col-md-6">
                           <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                           <label class="form-control-label">Mobile Number</label>
                           <input type="number" placeholder="Enter Your Mobile Number" name="mobile"
                              class="form-control" value="<?= (isset($record)) ? $record->mobile : ''; ?>" style="position: relative;padding-left: 50px;">
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">Training Provider</label>
                           <select class="form-control" name="trainer_id">
                              <?php 
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
                           <label class="form-control-label">Province</label>
                           <select class="form-control province" name="province">
                           <?php 
                                 if (empty(($record->province))) { ?>
                              <option label="Choose Your Province"></option>
                              <?php  }else{
                                 foreach ($province as $key => $value) {
                                 
                                 ?>
                              <option value="<?= $value->name  ?>"
                                 <?php 
                                    if (!empty($record->province)) { 
                                        if($record->province == $value->name){ ?> selected="selected" 
                                 <?php } }  ?>
                                 ><?= $value->name ?></option> 
                              <?php
                                 } } ?>
                           </select>
                           <label id="province-error" class="error" for="province"></label>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">District</label>
                           <select class="form-control district_option" name="district">
                           
                              <?php 
                                 if (empty(($record->district))) { ?>
                              <option label="Choose Your District"></option>
                              <?php  }else{
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
                                 } } } ?>
                                  
                             
                           </select>
                           <label id="district-error" class="error" for="district"></label>
                        </div>
                        <!-- 
                           <div class="col-md-6">
                           
                           
                           
                               <label class="form-control-label">Region</label>
                           
                                 <select class="form-control" id="region" name="region">
                           
                                  <?php if (empty(($record->region))) { ?>
                           
                                           <option label="Choose Your Region"></option>
                           
                                   <?php }else{
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
                              } }  }?>
                           
                                    
                           
                               </select>
                           
                               <label id="region-error" class="error" for="region"></label>
                           
                           </div>
                           -->
                        <div class="col-md-6">
                           <label class="form-control-label">City</label>
                           <select class="form-control" name="city" id="city">
                          
                              <?php 
                                 if (empty(($record->city))) { ?>
                              <option label="Choose Your City"></option>
                              <?php  }else{
                                 foreach ($city as $key => $value) {
                                 
                                     if($record->province == $value->province_id && $record->district==$value->district_id){
                                 
                                 ?>  
                              <option value="<?= $value->id ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->city == $value->city){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->city ?></option>
                              <?php  } } } ?>
                           </select>
                           <label id="city-error" class="error" for="city"></label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label">Municipality<span style="color:red;font-weight:bold;"> *</span></label>
                            <select class="form-control" name="municipality" id="municipality">
                          
                            <?php 
                                 if (empty(($record->municipality))) { ?>
                              <option label="Choose Your Municipality"></option>
                              <?php  }else{
                                 foreach ($municipality as $key => $value) {
                                 
                                     if($record->city == $value->city_id){
                                 
                                 ?>  
                              <option value="<?= $value->id ?>"
                                 <?php 
                                    if (isset($record)) {
                                    
                                        
                                    
                                    if($record->municipality == $value->municipality){ ?> selected="selected" 
                                 <?php } }?>
                                 ><?= $value->municipality ?></option>
                              <?php  } } }
                               ?>
                                
                            </select>
                            <label id="municipality-error" class="error" for="municipality"></label>
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
                           <input type="number" placeholder="Enter Your Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                           <label id="Street_number-error" class="error" for="Street_number"></label>
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
                        <div class="col-md-6">
                           <label class="form-control-label">Profile Image</label>
                           <input type="File" name="profile_image" id="profile_image"  class="form-control">
                           <label id="" class="error"  for=""></label>
                        </div>
                        <div class="field_wrapper col-md-12">
                           <div class="row">
                              <?php 
                                 if(!empty($record->acreditations_file)){
                                 
                                         $acreditations_file = unserialize($record->acreditations_file);
                                 
                                         if(!empty($acreditations_file)){
                                 
                                            foreach($acreditations_file as $value){ 
                                 
                                            $key = $value['id'];
                                 
                                            $implode = implode(',',$value);
                                 
                                 ?>
                              <div id="remove_file<?=$key?>">
                                 <div class="col-md-6">
                                    <label class="form-control-label">Acreditations</label>
                                    <input type="text" placeholder="Enter Your Acreditations Name"
                                       name="acreditations[]" class="form-control"
                                       value="<?=$value['acreditations'];?>" readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="form-control-label">Acreditations</label>
                                    <img src="<?= BASEURL.'uploads/facilitator/acreditationsfiles/'.$value['acreditations_file'] ?>"
                                       width="50px" height="50px">
                                    <input type="hidden" name="acreditations_image[]" class="form-control" value="<?= $implode ?>">
                                 </div>
                                 <span onclick="remove_file('facilitator','<?= $key?>','<?= $record->id ?>');"><i class="fa fa-times" aria-hidden="true"></i></span>
                              </div>
                              <?php }  } }  ?>
                              <div class="col-md-6">
                                 <a href="javascript:void(0);" class="add_button btn btn-info"
                                    title="Add Acreditations" style="margin:15px 0 0">+ Add More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="line"></div>
                     <div class="form-group row" id="assessorfield">
                     </div>
                     <div class="line"></div>
                     <div class="form-group row">
                        <div class="col-md-12">
                           <div class="text-center">
                              <button type="submit" class="btn btn-primary">Update</button>
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