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
                     <h3 class="h6 text-uppercase mb-0"><?= $name ?> Organisation</h3>
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
                                    <label class="form-control-label">Organisation Name</label>
                                    <input type="text" placeholder="Enter Your Organisation Name" name="organisation_name" class="form-control organisation_name" value="<?= (isset($record)) ? $record->organisation_name : ''; ?>" id="organisation_name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Your Full Name" name="fullname"
                                        class="form-control fullname" value="<?= (isset($record)) ? $record->fullname : ''; ?>" id="fullname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname</label>
                                    <input type="text" placeholder="Enter Your Surname" name="surname" class="form-control surname"
                                        value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Email </label>
                                    <input type="text" placeholder="Enter Your Email" name="email_address" class="form-control" value="<?= (isset($record)) ? $record->email_address : ''; ?>">
                                </div>
                               
                                 <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Landline Number</label>
                                    <input type="text" placeholder="Enter Your Landline Number" name="landline_number" class="form-control" value="<?= (isset($record)) ? $record->landline_number : ''; ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Mobile Number</label>
                                    <input type="text" placeholder="Enter Your Mobile Number" name="mobile_number" class="form-control" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>" style="position: relative;padding-left: 50px;"  pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
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

                                    <label class="form-control-label">Street name</label>
                                    <input type="text" placeholder="Enter Your Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">
                                    <label id="Street_name-error" class="error" for="Street_name"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Street Number</label>
                                    <input type="text" placeholder="Enter Your Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                                    <label id="Street_number-error" class="error" for="Street_number"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" placeholder="Enter Your Password" class="form-control password" name="password" value="<?= (isset($record)) ? $record->password : ''; ?>" id="password">
                                    <label id="password-error" class="error" for="password"></label>
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
