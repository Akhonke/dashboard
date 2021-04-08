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
                  <h3 class="h6 text-uppercase mb-0">Create New Programme</h3>
               </div>
               <div class="card-body">
                  <form class="form-horizontal" method="post" id="createNewProgramme" enctype="multipart/form-data">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                       
                        <div class="col-md-6">
                           <label class="form-control-label">Programme Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Programme Name" class="form-control" name="programme_name" id="programme_name" value="<?php if (isset($record)) {
                              echo $record->programme_name;
                              } else {
                              if (isset($_POST['programme_name'])) {
                                  echo set_value('programme_name');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('programme_name') ?></span>
                        </div>
                       

                        <div class="col-md-6">
                           <label class="form-control-label">Start Date<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="date" placeholder="Enter Start Date" class="form-control" name="start_date" id="start_date" value="<?php if (isset($record)) {
                              echo $record->start_date;
                              } else {
                              if (isset($_POST['start_date'])) {
                                  echo set_value('start_date');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('start_date') ?></span>
                        </div>
                        <div class="col-md-6">
                           <label class="form-control-label">End Date<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="date" placeholder="Enter End Date" class="form-control" name="end_date" id="end_date" value="<?php if (isset($record)) {
                              echo $record->start_date;
                              } else {
                              if (isset($_POST['end_date'])) {
                                  echo set_value('end_date');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('end_date') ?></span>
                        </div>
                        
                        
                        
                        <div class="col-md-6">
                          
                           <label class="form-control-label">Total Budget<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="number" placeholder="Enter Total Budget" class="form-control" name="budget" id="budget" value="<?php if (isset($record)) {
                              echo $record->budget;
                              } else {
                              if (isset($_POST['budget'])) {
                                  echo set_value('budget');
                              }
                              } ?>">
                        </div>
                        <span class='error_validate' style='color:red;'><?= form_error('budget') ?></span>
                       
                       
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