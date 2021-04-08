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
                     <h3 class="h6 text-uppercase mb-0"><?= $name ?> Programme Director</h3>
                    </div>
                    <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateProgrammerForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                 <div class="col-md-6">
                                    <label class="form-control-label">Organisation Name</label>
                                    <select class="form-control" name="organisation_id">
                                        <option label="Choose Organisation Name"></option>
                                        <?php foreach ($data as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id ?>"
                                                <?php 
                                                    if (isset($record)) {
                                                        
                                                    if($record->organisation_id == $value->id){ ?> selected="selected" 
                                                <?php } }?>
                                                ><?= $value->organisation_name ?></option>
                                        <?php
                                            }?>

                                    </select>
                                    <label id="organisation_id-error" class="error" for="organisation_id"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Director</label>
                                    <input type="text" placeholder="Enter Your Project Director" name="project_director" class="form-control project_director" value="<?= (isset($record)) ? $record->project_director : ''; ?>" id="project_director">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Programme Name</label>
                                    <input type="text" placeholder="Enter Your Programme Name" name="programme_name" class="form-control programme_name" value="<?= (isset($record)) ? $record->programme_name : ''; ?>" id="programme_name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Full Name" name="fullname"
                                        class="form-control fullname" value="<?= (isset($record)) ? $record->fullname : ''; ?>" id="fullname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname</label>
                                    <input type="text" placeholder="Enter Surname" name="surname" class="form-control surname"
                                        value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Email </label>
                                    <input type="text" placeholder="Enter Your Email" name="email_address" class="form-control" value="<?= (isset($record)) ? $record->email_address : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Programme Start Date</label>
                                    <input type="date" placeholder="Enter Your Programme Start Date" name="programme_start_date" class="form-control programme_start_date" value="<?= (isset($record)) ? $record->programme_start_date : ''; ?>" id="programme_start_date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Programme End Date</label>
                                    <input type="date" placeholder="Enter Your Programme End Date" name="programme_end_date" class="form-control programme_end_date" value="<?= (isset($record)) ? $record->programme_end_date : ''; ?>" id="programme_end_date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 1 Start Date</label>
                                    <input type="date" placeholder="Enter Your Quarter 1 Start Date" name="q1_start_date" class="form-control q1_start_date" value="<?= (isset($record)) ? $record->q1_start_date : ''; ?>" id="q1_start_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 1 End Date</label>
                                    <input type="date" placeholder="Enter Your Quarter 1 End Date" name="q1_end_date" class="form-control q1_end_date" value="<?= (isset($record)) ? $record->q1_end_date : ''; ?>" id="q1_end_date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 2 Start Date</label>
                                    <input type="date" placeholder="Enter Quarter 2 Start Date" name="q2_start_date" class="form-control q2_start_date" value="<?= (isset($record)) ? $record->q2_start_date : ''; ?>" id="q2_start_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 2 End Date</label>
                                    <input type="date" placeholder="Enter Your Quarter 2 End Date" name="q2_end_date" class="form-control q2_end_date" value="<?= (isset($record)) ? $record->q2_end_date : ''; ?>" id="q2_end_date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 3 Start Date</label>
                                    <input type="date" placeholder="Enter Your Quarter 3 Start Date" name="q3_start_date" class="form-control" value="<?= (isset($record)) ? $record->q3_start_date : ''; ?>" id="q3_start_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 3 End Date</label>
                                    <input type="date" placeholder="Enter Your  Quarter 3 End Date" name="q3_end_date" class="form-control q3_end_date" value="<?= (isset($record)) ? $record->q3_end_date : ''; ?>"id="q3_end_date">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 4 Start Date</label>
                                    <input type="date" placeholder="Enter Your Quarter 4 Start Date" name="q4_start_date" class="form-control q4_start_date" value="<?= (isset($record)) ? $record->q4_start_date : ''; ?>" id="q4_start_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Quarter 4 End Date</label>
                                    <input type="date" placeholder="Enter Your Quarter 4 End Date" name="q4_end_date" class="form-control q4_end_date" value="<?= (isset($record)) ? $record->q4_end_date : ''; ?>" id="q4_end_date">
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

                                    <input type="text" placeholder="Enter Suburb" class="form-control" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">
                                    <label id="Suburb-error" class="error" for="Suburb"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street name</label>

                                    <input type="text" placeholder="Enter Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">
                                    <label id="Street_name-error" class="error" for="Street_name"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street Number</label>

                                    <input type="text" placeholder="Enter Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                                    <label id="Street_number-error" class="error" for="Street_number"></label>
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Landline Number</label>
                                    <input type="text" placeholder="Enter Your Landline Number " name="contact_person" class="form-control" value="<?= (isset($record)) ? $record->contact_number : ''; ?>"  style="position: relative;padding-left: 50px;"pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Mobile Number</label>
                                    <input type="text" placeholder="Enter Your Mobile Number " name="mobile_number" class="form-control" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>"  style="position: relative;padding-left: 50px;"pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" placeholder="Enter Your Password" class="form-control password" name="password" value="<?= (isset($record)) ? $record->password : ''; ?>" id="password">
                                    <label id="password-error" class="error" for="password"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Tax Clearance</label>
                                    <?php if(!empty($_GET['id'])){ ?>
                                        <input type="file" name="tax_clearances" class="form-control">
                                         <?php if(!empty($record->tax_clearance)){ ?>
                                        <img src="<?= BASEURL .'uploads/programmer/tax_clearance/'.$record->tax_clearance ?>" width="50px" height="50px">
                                    <?php } }else{?>
                                        <input type="file" name="tax_clearance" class="form-control">
                                        <label id="tax_clearance-error" class="error" for="tax_clearance"></label>
                                     <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Company Registration Documents</label>
                                    <?php if(!empty($_GET['id'])){
                                        $company_registration_documents = explode(',',$record->company_registration_documents);
                                        ?>
                                        <input type="file" name="company_documents[]" class="form-control" multiple="">
                                        <?php
                                          foreach($company_registration_documents as $value){ 
                                     ?>
                                        
                                        <?php if(!empty($value)){ ?>
                                        <img src="<?= BASEURL .'uploads/programmer/company_documents/'.$value ?>" width="50px" height="50px">
                                    <?php }  }
                                    }else{  ?>
                                        <input type="file" name="company_registration_documents[]" class="form-control" multiple>
                                        <label id="company_registration_documents-error" class="error" for="company_registration_documents"></label>
                                     <?php  } ?>
                                    
                                   
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
