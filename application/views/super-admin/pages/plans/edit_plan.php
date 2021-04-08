<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Plan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Plan</li>
        </ol>
    </nav>
</div>
<div class="col-xl-12 col-md-12">
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Update Plan</h6>
            <a href="<?=base_url('plan')?>" class="ms-text-primary">Plan List</a>
        </div>
        <div class="ms-panel-body">
            <form class="needs-validation" action="<?php echo base_url('superAdmin-updatePlan') ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom001">Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="validationCustom001" value="<?php echo $plan[0]->name; ?>" placeholder="Enter  Name">
                              <input type="hidden"  name="planid"  value="<?php echo $plan[0]->id; ?>">
                        </div>
                         <?php echo form_error('name', '<div class="error" style="color:red;">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Price</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="validationCustom002"
                            name="price"  value="<?php echo $plan[0]->price; ?>"placeholder="Enter Price" >

                        </div>
                        <?php echo form_error('price', '<div class="error" style="color:red;">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Duration</label>
                        <div class="input-group">
                            <select class="form-control" name="duration" id="exampleFormControlSelect1">
                              <option hidden>Select </option>
                              <option value="1 Months"  <?php if($plan[0]->duration=="1 Months") echo "selected" ?> >1 Months</option>
                              <option value="3 Months"  <?php if($plan[0]->duration=="3 Months") echo "selected" ?> >3 Months</option>
                              <option value="6 Months"  <?php if($plan[0]->duration=="6 Months") echo "selected" ?> >6 Months</option>
                              <option value="12 Months" <?php if($plan[0]->duration=="12 Months") echo "selected" ?> >12 Months</option>
                              <option value="24 Months" <?php if($plan[0]->duration=="24 Months") echo "selected" ?> >24 Months</option>
                            </select>

                        </div>
                        <?php echo form_error('duration', '<div class="error" style="color:red;">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                       
                        <label for="validationCustom001">Discount(%)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="pricediscount" id="validationCustom001" value="<?php echo $plan[0]->pricediscount; ?>" placeholder="Enter Discount Price">
                        </div>
                        
                    </div>
                </div>
               <!--  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <img src="<?php echo base_url('uploads/planLogo/').$plan[0]->logo; ?>" alt="price" width="120" class="img-fluid">
                        <input type="hidden" value="<?php echo $plan[0]->logo; ?>" name="img">
                        <label>Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="planlogo">
                            <label class="custom-file-label" >Choose file...</label>
                        </div>
                    </div>
                    
                </div> -->
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Feature</label>
                        <?php 
                              $arrayFeature=explode("%@#$",$plan[0]->feature);
                             
                        ?>
                        <div class="custom-control custom-checkbox"> 
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck1" value="FREE E-LEARNING PORTAL" 
                            <?php if (in_array("FREE E-LEARNING PORTAL", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck1">FREE E-LEARNING PORTAL</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck2" value="Learnership Project Management"
                            <?php if (in_array("Learnership Project Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck2">Learnership Project Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck3" value="Advanced Reporting and Analytics"
                            <?php if (in_array("Advanced Reporting and Analytics", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck3">Advanced Reporting and Analytics</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck4" value="Qualification Management"
                            <?php if (in_array("Qualification Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck4">Qualification Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck5" value="SMS and Email Sending"
                            <?php if (in_array("SMS and Email Sending", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck5">SMS and Email Sending</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"  name="feature[]" class="custom-control-input" id="customCheck6" value="Class Management"
                            <?php if (in_array("Class Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck6">Class Management</label>
                        </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]"  class="custom-control-input" id="customCheck7" value="Learner List Management"
                            <?php if (in_array("Learner List Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck7">Learner List Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]"  class="custom-control-input" id="customCheck8" value="Stipend Management"
                            <?php if (in_array("Stipend Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck8">Stipend Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck9" value="Attendance Management"
                            <?php if (in_array("Attendance Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck9">Attendance Management</label>
                        </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck10" value="Facilitator and Moderator Management"
                            <?php if (in_array("Facilitator and Moderator Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck10">Facilitator and Moderator Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck11" value="Drop Out Management"
                            <?php if (in_array("Drop Out Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck11">Drop Out Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck12" value="Learner Performance Management"
                            <?php if (in_array("Learner Performance Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck12">Learner Performance Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck13" value="Host employer Management"
                            <?php if (in_array("Host employer Management", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck13">Host employer Management</label>
                        </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck14" value="Quarterly report Compilation"
                            <?php if (in_array("Quarterly report Compilation", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck14">Quarterly report Compilation</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck15" value="Financial Management (including Stipends)" <?php if (in_array("Financial Management (including Stipends)", $arrayFeature)) echo "checked" ?>>
                            <label class="custom-control-label" for="customCheck15">Financial Management (including Stipends)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            Manage Multiple Projects(Training Projects) 
                            <select class="form-control"  id="exampleFormControlSelect1" name="manage_project_value">
                              <option value="0"  <?php if($plan[0]->manage_project_value=="0") echo "selected" ?> >UNLIMITED</option>
                              <option value="1"  <?php if($plan[0]->manage_project_value=="1") echo "selected" ?> >1</option>
                              <option value="2"   <?php if($plan[0]->manage_project_value=="2") echo "selected" ?> >2</option>
                              <option value="3"  <?php if($plan[0]->manage_project_value=="3") echo "selected" ?> >3</option>
                               <option value="4"  <?php if($plan[0]->manage_project_value=="4") echo "selected" ?> >4</option>
                              <option value="5"  <?php if($plan[0]->manage_project_value=="5") echo "selected" ?> >5</option>
                              <option value="6"  <?php if($plan[0]->manage_project_value=="6") echo "selected" ?> >6</option>
                              <option value="7"  <?php if($plan[0]->manage_project_value=="7") echo "selected" ?> >7</option>
                              <option value="8"  <?php if($plan[0]->manage_project_value=="8") echo "selected" ?> >8</option>
                              <option value="9"  <?php if($plan[0]->manage_project_value=="9") echo "selected" ?> >9</option>
                              <option value="10"  <?php if($plan[0]->manage_project_value=="10") echo "selected" ?> >10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    </div>  
                </div>

                    <!-- <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button> -->
                    <button class="btn btn-primary mt-4 ml-2 d-inline w-20" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div