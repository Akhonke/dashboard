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
                  <h3 class="h6 text-uppercase mb-0">Create User Groups</h3>
               </div>
               <div class="card-body">
                  <form class="form-horizontal" method="post" id="userGroup" enctype="multipart/form-data">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                       
                        <div class="col-md-6">
                           <label class="form-control-label">User Group Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your First Name" class="form-control" name="group_name" id="group_name" value="<?php if (isset($record)) {
                              echo $record->group_name;
                              } else {
                              if (isset($_POST['group_name'])) {
                                  echo set_value('group_name');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('group_name') ?></span>
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
                           <label class="form-control-label"> Add Users <span style="color:red;font-weight:bold;"> *</span></label>
                           <select class="form-control User" multiple name="user[]">
                              <option label="" value="" hidden>Choose  User</option>
                              <option label="" value="" >User 1</option>
                              <option label="" value="" >User 2</option>
                              <option label="" value="" >User 3</option>
                             
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