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
                  <h3 class="h6 text-uppercase mb-0">Create Sub Contractor Work Type</h3>
               </div>
               <div class="card-body">
                  <form class="form-horizontal" method="post" id="subContractorType" enctype="multipart/form-data">
                     <!-- <div class="line"></div> -->
                     <div class="form-group row">
                       
                        <div class="col-md-6">
                           <label class="form-control-label">Sub Contractor type Name<span style="color:red;font-weight:bold;"> *</span></label>
                           <input type="text" placeholder="Enter Your Sub Contractor type Name" class="form-control" name="sub_contractor_type" id="sub_contractor_type" value="<?php if (isset($record)) {
                              echo $record->sub_contractor_type;
                              } else {
                              if (isset($_POST['sub_contractor_type'])) {
                                  echo set_value('sub_contractor_type');
                              }
                              } ?>">
                           <span class='error_validate' style='color:red;'><?= form_error('sub_contractor_type') ?></span>
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