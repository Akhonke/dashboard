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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Add New Learner</h3>

                    </div>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" id="learnerForm" enctype="multipart/form-data">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h3 class="h6 text-uppercase mb-0">Personal Information</h3>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Your Full Name" class="form-control"
                                        name="full_name" id="full_name"
                                        value="<?php if(isset($record)){ echo $record->first_name; }else{ if(isset($_POST['full_name'])){ echo set_value('full_name'); }} ?>">
                                    <span class='error_validate'
                                        style='color:red;'><?= form_error('full_name') ?></span>
                                </div>

                               

                                <div class="col-md-6">

                                    <label class="form-control-label">Surname</label>

                                    <input type="text" placeholder="Enter Your Surname" class="form-control" name="surname"
                                        id="surname"
                                        value="<?php if(isset($record)){ echo $record->surname; }else{ if(isset($_POST['surname'])){ echo set_value('surname'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('surname') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Email</label>

                                    <input type="text" placeholder="Enter Your Email" class="form-control" name="email"
                                        id="email"
                                        value="<?php if(isset($record)){echo $record->email; }else{ if(isset($_POST['email'])){ echo set_value('email'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('email') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">ID Number</label>

                                    <input type="text" placeholder="Enter Your ID Number" class="form-control"
                                        name="id_number" id="id_number"
                                        value="<?php if(isset($record)){ echo $record->id_number; }else{ if(isset($_POST['id_number'])){ echo set_value('id_number'); }} ?>">
                                    <span class='error_validate'
                                        style='color:red;'><?= form_error('id_number') ?></span>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-control-label">SETA Registration Number</label>

                                    <input type="text" placeholder="Enter Your SETA Number" class="form-control" name="SETA"
                                        id="SETA"
                                        value="<?php if(isset($record)){ echo $record->SETA; }else{ if(isset($_POST['SETA'])){ echo set_value('SETA'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('SETA') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Primary Cellphone Number</label>
                                   
                                    <input type="text" placeholder="Enter Your Primary Cellphone Number" class="form-control"
                                        name="mobile" id="mobile"
                                        value="<?php if(isset($record)){ echo $record->mobile; }else{ if(isset($_POST['mobile'])){ echo set_value('mobile'); }} ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary Cellphone number 9 digit with 0-9">

                                </div>
                                <span class='error_validate' style='color:red;'><?= form_error('mobile') ?></span>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Second Cellphone Number</label>

                                    <input type="text" placeholder="Enter Your Second Cellphone Number" class="form-control"
                                        name="mobile_number" id="mobile_number"
                                        value="<?php if(isset($record)){ echo $record->mobile_number; }else{ if(isset($_POST['mobile_number'])){ echo set_value('mobile_number'); }} ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Second Cellphone number 9 digit with 0-9">
                                    <span class='error_validate'
                                        style='color:red;'><?= form_error('mobile_number') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Gender</label>

                                    <select class="form-control" name="gender">

                                        <option value="">Select Gender</option>
                                        <option value="Male"
                                            <?php if(isset($record)&&$record->gender=='Male'){ echo 'selected'; }else{ if(isset($_POST['gender'])&&$_POST['gender']=='Male'){ echo 'selected'; }} ?>>
                                            Male</option>
                                        <option value="Female"
                                            <?php if(isset($record)&&$record->gender=='Female'){ echo 'selected'; }else{ if(isset($_POST['gender'])&&$_POST['gender']=='Female'){ echo 'selected'; }} ?>>
                                            Female</option>
                                        <option value="Other"
                                            <?php if(isset($record)&&$record->gender=='Other'){ echo 'selected'; }else{ if(isset($_POST['gender'])&&$_POST['gender']=='Other'){ echo 'selected'; }} ?>>
                                            Other</option>

                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('gender') ?></span>
                                </div>
                                 <div class="col-md-6">
                                    <label class="form-control-label">Learnership Sub Type</label>
                                    <select  class="form-control" name="learnershipSubType">
                                        <option value="">Select learnship sub type</option>
                                        <?php 
                                            foreach ($learnershipSubType as $skey => $shipSubType) { ?>
                                               <option value="<?php echo $shipSubType->sub_type; ?>" <?php if(isset($record)&&$record->learnershipSubType==$shipSubType->sub_type){ echo 'selected'; }else{if(isset($_POST['learnershipSubType'])&&$_POST['learnershipSubType']==$shipSubType->sub_type){ echo 'selected'; }}; ?>><?php echo $shipSubType->sub_type; ?></option> 
                                        <?php  } ?>
                                    </select>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">password</label>
                                       
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
                                <!-- <div class="col-md-6">

                                    <label class="form-control-label">province</label>

                                    <select class="form-control province" name="province">
                                        <option value="">Select Province</option>
                                        <?php 
                                        foreach ($province as $key => $value) {
                                    ?>
                                        <option value="<?= $value->name  ?>" <?php 
                                                if (isset($record)) {
                                                    
                                                if($record->province == $value->name){ ?> selected="selected"
                                            <?php } }?>><?= $value->name  ?></option>
                                        <?php
                                        }
                                     ?>

                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('province') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">District</label>

                                    <select class="form-control district_option" name="district">
                                        <option value=""> Select Your District</option>
                                        <?= (isset($record)) ? '<option value='.$record->district.'>'.$record->district.'</option>': '<option>Select District</option>'; ?>

                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('district') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Region</label>

                                    <select class="form-control" id="region" name="region">
                                        <option value="">Select Region</option>

                                        <?= (isset($record)) ? '<option value='.$record->region.'>'.$record->region.'</option>': '<option>Select District</option>'; ?>

                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('region') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">City</label>

                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select City</option>

                                        <?= (isset($record)) ? '<option value='.$record->city.'>'.$record->city.'</option>': '<option>Select District</option>'; ?>

                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('city') ?></span>
                                </div> -->
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

                                    <input type="text" placeholder="Enter Your Suburb" class="form-control" name="Suburb"
                                        value="<?php if(isset($record)){ echo $record->Suburb; }else{ if(isset($_POST['Suburb'])){ echo set_value('Suburb'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('Suburb') ?></span>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street Name</label>

                                    <input type="text"  class="form-control" name="Street_name"
                                        value=" <?php if(isset($record)){ echo $record->Street_name; }else{ if(isset($_POST['Street_name'])){ echo set_value('Street_name'); }} ?>" placeholder="Enter Your Street Name" id="Street_name">
                                    <!-- <span class='error_validate'
                                        style='color:red;'><?= form_error('Street_name') ?></span> -->
                                        <label id="Street_name-error" class="error" for="Street_name"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street Number</label>

                                    <input type="text" placeholder="Enter Your Street Number" class="form-control"
                                        name="Street_number"
                                        value="<?php if(isset($record)){ echo $record->Street_number; }else{ if(isset($_POST['Street_number'])){ echo set_value('Street_number'); }} ?>">
                                    <span class='error_validate'
                                        style='color:red;'><?= form_error('Street_number') ?></span>
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
                                    <label class="form-control-label">Assessment Status</label>
                                    <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="assessment" value="yes" <?php if(isset($record)&&(($record->assessment=='yes')||($record->assessment=='Yes'))){echo 'checked'; }else{ if(isset($_POST['assessment'])&&$_POST['assessment']=='yes'){echo 'checked'; } } ?>>Assessment Completed</label></div>
                                    <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="assessment" value="no"  <?php if(isset($record)&&(($record->assessment=='no')||($record->assessment=='No'))){echo 'checked'; }else{ if(isset($_POST['assessment'])&&$_POST['assessment']=='no'){echo 'checked'; } } ?>>Assessment Not Completed</label></div>
                                    <label id="assessment-error" class="error" for="assessment"></label>
                                </div>
                                 <div class="col-md-4">
                                    <label class="form-control-label">Is the Learner Disabled ?</label>
                                    <div class="form-check-inline"><label class="form-check-label"><input class="form-check-input" type="radio" name="disable" value="yes" <?php if(isset($record)&&(($record->disable=='yes')||($record->disable=='Yes'))){echo 'checked'; }else{ if(isset($_POST['disable'])&&$_POST['disable']=='yes'){echo 'checked'; } } ?>> Yes</label></div>
                                    <div class="form-check-inline"><label class="form-check-label"><input class="form-check-input" type="radio" name="disable" value="no"  <?php if(isset($record)&&(($record->disable=='no')||($record->disable=='No'))){echo 'checked'; }else{ if(isset($_POST['disable'])&&$_POST['disable']=='no'){echo 'checked'; } } ?>> No</label></div>
                                    <label id="disable-error" class="error" for="disable"></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-control-label">Is the Learner A U.I.F Beneficiary ?</label>

                                    <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="utf_benefits" value="yes" <?php if(isset($record)&&(($record->utf_benefits=='yes')||($record->utf_benefits=='Yes'))){echo 'checked'; }else{ if(isset($_POST['utf_benefits'])&&$_POST['utf_benefits']=='yes'){echo 'checked'; } } ?>> Yes</label></div>

                                    <div class="form-check-inline"><label class="form-check-inline"><input class="form-check-input" type="radio" name="utf_benefits" value="no"  <?php if(isset($record)&&(($record->utf_benefits=='no')||($record->utf_benefits=='No'))){echo 'checked'; }else{ if(isset($_POST['utf_benefits'])&&$_POST['utf_benefits']=='no'){echo 'checked'; } } ?>> No</label></div>
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
                                    <textarea rows="4" cols="50" name="reason" placeholder="Reason" id="reason" class="form-control"><?php if(isset($record)){ echo $record->reason; } ?></textarea><label id="reason-error" class="error" for="reason"></label></div>
                                <?php } ?>
                                <div id="addtextarea" class="col-md-12">
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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script type="text/javascript">
 $('.province').change(function(){
        $.ajax({
            url: 'provider-getdestrict',
            data: { 'value': $('.province').val() },
            dataType:'json',
            type: 'post',
            success: function(data){
                var option = '';
               $.each(data, function(i, star) {
                    if(i == 'error'){
                        $('.district_option').html(option);
                        $('#district-error').show();
                        $('#district-error').html(star);
                    }else{
                      option += '<option value='+star.id+'>'+star.name+'</option>'
                      $('.district_option').html('<option>Select District</option>'+option);
                      $('#district-error').hide();
                    }
                });
              
            }
        });
    });
    $('.district_option').change(function(){
       $.ajax({
            url: 'provider-getregion',
            data: { 'value': $('.district_option').val() },
            dataType:'json',
            type: 'post',
            success: function(data){
                var option = '';
               $.each(data, function(i, star) {
                if(i == 'error'){
                        $('#region').html(option);
                        $('#region-error').show();
                        $('#region-error').html(star);
                 }else{
                       option += '<option value='+star.id+'>'+star.region+'</option>'
                       $('#region').html('<option>Select Region</option>'+option);
                       $('#region-error').hide();
                }
                });
              
            }
        });
    });

    $('#region').change(function(){
       $.ajax({
            url: 'provider-getcity',
            data: { 'value': $('#region').val() },
            dataType:'json',
            type: 'post',
            success: function(data){
                var option = '';
               $.each(data, function(i, star) {
                    if(i == 'error'){
                        $('#city').html(option);
                        $('#city-error').show();
                        $('#city-error').html(star);
                    }else{
                        option += '<option value='+star.id+'>'+star.city+'</option>'
                        $('#city').html('<option>Select City</option>'+option);
                        $('#city-error').hide();
                    }
                });
            }
        });
    });
</script>



<script type="text/javascript">
$(function() {

    $("#learnerForm").validate({
        rules: {
            full_name: "required",
            surname: "required",
            assessment: "required",
            disable: "required",
            utf_benefits: "required",
            learnershipSubType: "required",
            email: {
                required: true,
                email: true
            },

            id_number: {
                required: true,
                minlength: 5
            },
            SETA: {
                required: true,
                minlength: 5
            },
            mobile: {
                required: true,
                minlength: 9,
                maxlength: 9,
                number: true
            },
            mobile_number: {
                required: true,
                minlength: 9,
                maxlength: 9,
                number: true
            },
            gender: {
                required: true
            },
            province: {
                required: true
            },
            district: {
                required: true
            },
            region: {
                required: true
            },
            city: {
                required: true
            },
            Suburb: {
                required: true
            },
            Street_name: {
                required: true
            },
            Street_number: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            },
             reason:{
               required: true, 
            },
            learner_accepted_training:{
                required: true,
            },
            classname:{
                required: true, 
            },
        },

        messages: {
            full_name: "Please enter your full name",
           
            surname: "Please enter your surname name",
            email: "Please enter a valid email address",
            gender: "Please select your gender",
            province: "Please select your province",
            district: "Please select your district",
            region: "Please select your region",
            city: "Please select your city",
            assessment: "Please select your assessment",
            disable: "Please select your disabled",
            utf_benefits: "Please select your UTF Beneficiary",
            learnershipSubType: "Please choose your learnership Sub Type",
            Suburb: "Please select your suburb",
            Street_name:{
             required: "Please enter your street name"
            },
            Street_number: {
                required: "Please enter your street number"
            },
            id_number: {
                required: "Please enter your id number",
                minlength: "Your id number must be at least 5 characters long"
            },
            password:{
                required: "Please enter your password",
                minlength: "Your password must be at least 5 characters long"
            },
            SETA: {
                required: "Please enter your id seat number",
                minlength: "Your seat number must be at least 5 characters long"
            },
            mobile: {
                required: "Please enter your mobile number",
                minlength: "Your mobile number must be at least 9 characters long"
            },
            mobile_number: {
                required: "Please enter your mobile number",
                minlength: "Your mobile number must be at least 9 characters long"
            },
            reason: {
                required: "Please enter your reason",
            },
            learner_accepted_training:'Please select your learner accpeted for training',
            classname: {
                required: 'Please choose your class name',
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
 function Beneficiary(type,reason){
        if(type =='no'){
         $("#addtextarea").html('<div id="textarea"><label class="form-control-label">Reason</label><textarea rows="4" cols="50" name="reason"class=form-control  id="reason">'+reason+'</textarea><label id="reason-error" class="error" for="reason"></label></div>');
        }
        if(type =='yes'){
          $("#textarea").remove();
        }
    }
</script>