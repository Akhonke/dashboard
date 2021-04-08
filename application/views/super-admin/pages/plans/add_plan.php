<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Plan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Plan</li>
        </ol>
    </nav>
</div>
<div class="col-xl-12 col-md-12">
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Add Plan</h6>
            <a href="<?=base_url('superAdmin-couponList')?>" class="ms-text-primary">Plan List</a>
        </div>
        <div class="ms-panel-body">
            <form class="needs-validation" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom001">Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="validationCustom001" value="<?php echo set_value('name'); ?>" placeholder="Enter  Name" >
                        </div>
                         <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Price</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationCustom002"
                            name="price"  value="<?php echo set_value('price'); ?>"placeholder="Enter Price" >

                        </div>
                        <?php echo form_error('pQrice', '<div class="error">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Duration</label>
                        <div class="input-group">
                            <select class="form-control" name="duration" id="exampleFormControlSelect1">
                              <option value="" >Select </option>
                              <option value="1 Months"> Months</option>
                              <option value="3 Months">3 Months</option>
                              <option value="6 months">6 months</option>
                              <option value="12 months">12 months</option>
                              <option value="24 months">24 months</option>
                              </select>

                        </div>
                        <?php echo form_error('duration', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                       
                        <label for="validationCustom001">Discount(%)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="pricediscount" id="validationCustom001" value="<?php echo set_value('pricediscount'); ?>" placeholder="Enter Discount Price">
                        </div>
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="planlogo">
                            <label class="custom-file-label" >Choose file...</label>
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Feature</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck1" value="FREE E-LEARNING PORTAL">
                            <label class="custom-control-label" for="customCheck1">FREE E-LEARNING PORTAL</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck2" value="Learnership Project Management">
                            <label class="custom-control-label" for="customCheck2">Learnership Project Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck3" value="Advanced Reporting and Analytics">
                            <label class="custom-control-label" for="customCheck3">Advanced Reporting and Analytics</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck4" value="Qualification Management">
                            <label class="custom-control-label" for="customCheck4">Qualification Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck5" value="SMS and Email Sending">
                            <label class="custom-control-label" for="customCheck5">SMS and Email Sending</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"  name="feature[]" class="custom-control-input" id="customCheck6" value="Class Management">
                            <label class="custom-control-label" for="customCheck6">Class Management</label>
                        </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]"  class="custom-control-input" id="customCheck7" value="Learner List Management">
                            <label class="custom-control-label" for="customCheck7">Learner List Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]"  class="custom-control-input" id="customCheck8" value="Stipend Management">
                            <label class="custom-control-label" for="customCheck8">Stipend Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck9" value="Attendance Management">
                            <label class="custom-control-label" for="customCheck9">Attendance Management</label>
                        </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck10" value="Facilitator and Moderator Management">
                            <label class="custom-control-label" for="customCheck10">Facilitator and Moderator Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck11" value="Drop Out Management">
                            <label class="custom-control-label" for="customCheck11">Drop Out Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck12" value="Learner Performance Management">
                            <label class="custom-control-label" for="customCheck12">Learner Performance Management</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck13" value="Host employer Management">
                            <label class="custom-control-label" for="customCheck13">Host employer Management</label>
                        </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck14" value="Quarterly report Compilation">
                            <label class="custom-control-label" for="customCheck14">Quarterly report Compilation</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck15" value="Financial Management (including Stipends)">
                            <label class="custom-control-label" for="customCheck15">Financial Management (including Stipends)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <!-- <input type="checkbox" name="feature[]" class="custom-control-input" id="customCheck16" value="Manage Multiple Projects">
                            <label class="custom-control-label" for="customCheck16">Manage Multiple Projects</label> -->
                            Manage Multiple Projects(Training Projects) 
                          <!--   <div class="input-group">
                               <input type="text" class="form-control" name="manage_project_value"  value="" placeholder="" >
                            </div> -->
                            <select class="form-control"  id="exampleFormControlSelect1" name="manage_project_value">
                              <option value="0">UNLIMITED</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                               <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                               <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    </div>  
                </div>

                    <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button>
                    <button class="btn btn-primary mt-4 ml-2 d-inline w-20" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div