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
                  <h3 class="h6 text-uppercase mb-0">Create Department</h3>
               </div>
               <div class="card-body">
                  <form class="form-horizontal" method="post" id="createDepartment" enctype="multipart/form-data">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                       
                        <div class="col-md-6">
                           <label class="form-control-label">Department Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Department Name" class="form-control" name="department_name" id="department_name" value="<?php if (isset($record)) {
                              echo $record->department_name;
                              } else {
                              if (isset($_POST['department_name'])) {
                                  echo set_value('department_name');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('department_name') ?></span>
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