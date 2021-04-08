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
                           $name = "Create";
                        } ?> 
                     <h3 class="h6 text-uppercase mb-0"><?= $name ?> New Porjects</h3>
                    </div>
                    <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                   
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateOrganisationForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Name</label>
                                    <input type="text" placeholder="Enter Your Project Name" class="form-control" value="" id="">
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Type</label>
                                    <select class="form-control province" name="province">
                                        <option label="Choose Your Province"></option>
                                        
                                        <option value="Learnership">
                                             Learnership </option>
                                         <option value="Learnership">
                                           Learnership Sub Type</option>
                                        <option value="Learnership">
                                           Bursary </option>
                                        <option value="Learnership">
                                           Bursary Sub Type </option>
                                      
                                    </select>
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Province</label>
                                    <select class="form-control province" name="province">
                                        <option label="Choose Your Province"></option>
                                         <option value="Mpumalanga">Mpumalanga </option>
                                          <option value="Gauteng">Gauteng </option>
                                      
                                    </select>
                                    <label id="" class="error" for=""></label>
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
                                               <option label="Select Your District" hidden></option>
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
                                         <option label="Select Your Region" hidden></option>
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
                                                <option label="Select Your City" hidden></option>
                                                <?php
                                            } ?>
                                    </select>
                                    <label id="city-error" class="error" for="city"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Planned Project Start Date</label>
                                    <input type="date" placeholder="Enter Your Planned Project Start Date" name="" class="form-control" value="" id="">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Actual Project Start Date</label>
                                    <input type="date" placeholder="Enter Your Actual Project Start Date" name="" class="form-control" value="" id="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Planned Project End Date</label>
                                    <input type="date" placeholder="Enter Your Planned Project End Date" name="" class="form-control" value="" id="">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Actual Project End Date</label>
                                    <input type="date" placeholder="Enter Your Actual Project End Date" name="" class="form-control" value="" id="">
                                </div>
                                <div class="col-md-12">
                                    <h3 class="h6 text-uppercase mb-1">Project Owner</h3>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Your Full Name" name=""
                                        class="form-control" value="" id="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname</label>
                                    <input type="text" placeholder="Enter Your Surname" name="" class="form-control"
                                        value="" id="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Email </label>
                                    <input type="text" placeholder="Enter Your Email" name="" class="form-control" value="">
                                </div>
                                 <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Mobile Number</label>
                                    <input type="text" placeholder="Enter Your Mobile Number" name="mobile_number" class="form-control" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>" style="position: relative;padding-left: 50px;"  pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
                                </div>
                               
                                 <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Landline Number</label>
                                    <input type="text" placeholder="Enter Your Landline Number" name="landline_number" class="form-control" value="<?= (isset($record)) ? $record->landline_number : ''; ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                                </div>
                                <div class="col-md-6">
                                      <label class="form-control-label">I.D Number</label>
                                      <input type="text" placeholder="Enter Your ID" class="form-control id_number" name="" value="" id="">

                                   <label id="" class="error" for=""></label>
</div>
                               <div class="col-md-6">
                                    <label class="form-control-label">Gender</label>
                                     <select class="form-control" name="gender" id="gender">

                                        <option label="Select Gender"></option>
                                        <option value="Male">Male</option>
                                         <option value="Female">Female</option>
                                         <option value="Other">Other</option>

                                     </select>

                                    <label id="gender-error" class="error" for="gender"></label>

                                </div>
                                 <div class="col-md-6">
                                    <label class="form-control-label">D.O.B.</label>
                                    <input type="date" placeholder="Enter Your Date Of Birth" name="" class="form-control" value="" id="">
                                </div>
                               <div class="col-md-12">
                                    <h3 class="h6 text-uppercase mb-1">Project Timelines</h3>
                                </div>	
                                  <div class="col-md-6">
                                    <label class="form-control-label">Pre-Implementation Phase</label>
                                     <select class="form-control" name="" id="">
                                         <option label="Select Pre-Implementation Phase"></option>
                                         <option value="Actual Start Date">Actual Start Date</option>
                                         <option value="Planned End Date">Planned End Date</option>
                                         <option value="Actual End Date">Actual End Date</option>
   
                                     </select>
                                    <label id="" class="error" for=""></label>
                                </div>
                                  <div class="col-md-6">
                                    <label class="form-control-label">Implementation Phase</label>
                                     <select class="form-control" name="" id="">
                                         <option label="Select Implementation Phase"></option>
                                         <option value="Actual Start Date">Actual Start Date</option>
                                         <option value="Planned End Date">Planned End Date</option>
                                         <option value="Actual End Date">Actual End Date</option>
   
                                     </select>
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Close Out Phase</label>
                                     <select class="form-control" name="" id="">
                                         <option label="Select Close Out Phase"></option>
                                         <option value="Actual Start Date">Planned Start Date</option>
                                         <option value="Planned End Date">Planned End Date</option>
                                         <option value="Actual End Date">Actual End Date</option>
   
                                     </select>
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
