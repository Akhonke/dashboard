<div class="container-fluid px-xl-5">
     <section class="py-5">
         <div class="row">
             <div class="col-lg-12 mb-1">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="h6 text-uppercase mb-0">CREATE MODERATION REPORT</h3>
                     </div>


                     <div class="card-body">
                         <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateModerationForm">
                             <div class="form-group row">
                                 <div class="col-md-6">
                                     <label class="form-control-label">Moderator Name<span style="color:red;font-weight:bold;"> *</span></label>
                                     <input type="text" placeholder="Enter Your Full Name" name="fullname" class="form-control" value="<?= $moderator_Record->fullname ?>" readonly>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-control-label">Moderator Surname<span style="color:red;font-weight:bold;"> *</span></label>
                                     <input type="text" placeholder="Enter Your Surname" name="surname" class="form-control" value="<?= $moderator_Record->surname ?>" readonly>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-control-label">Moderation Number<span style="color:red;font-weight:bold;"> *</span></label>
                                     <select class="form-control" name="moderation_number" id="moderation_number">
                                         <option label="Choose Your Moderation Number"></option>
                                         <option value="1st">1st
                                         </option>
                                         <option value="2nd">2nd
                                         </option>
                                         <option value="3rd">3rd
                                         </option>
                                         <option value="4th">4th
                                         </option>
                                     </select>
                                     <label id="error" class="error" for=""></label>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-control-label">Moderation Date<span style="color:red;font-weight:bold;"> *</span></label>
                                     <input type="date" placeholder="Enter Your Moderation Date" class="form-control" value="" id="moderation_date" name="moderation_date">
                                     <label id="" class="error" for=""></label>
                                 </div>

                                 <div class="col-md-6">
                                     <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                     <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
                                         <option value="" hidden>Select Learnership Type Name</option>
                                         <?php
                                            if (!empty($learnership)) {
                                                foreach ($learnership as $key => $learnship) { ?>
                                                 <option value="<?= $learnship->id; ?>" <?php if (isset($record) && $record->learnship_id == $learnship->id) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            if (isset($_POST['learnship_id']) && $_POST['learnship_id'] == $learnship->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>><?= ucfirst($learnship->name); ?></option>
                                         <?php  }
                                            } ?>
                                     </select>
                                     <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                                 </div>
                                 <div class="col-md-6">
                                     <label class="form-control-label">Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>
                                     <select class="form-control learnership_sub_type_id" name="learnershipSubType" id="learnership_sub_type_id">
                                     <option value="" hidden>Select Learnership Sub Type Name</option>

                                     </select>
                                     <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>
                                 </div>
                                 <!-- <div class="col-md-6">
                                     <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>
                                     <?php
                                        if (!empty($_GET['id'])) {
                                        ?>
                                         <input type="hidden" name="classname" class="form-control" value="<?= $record->classname ?>">
                                         <input type="text" name="classname" class="form-control" value="<?= $record->classname ?>" readonly>
                                     <?php
                                        } else { ?>
                                         <select class="form-control learner_classname" name="classname">
                                             <option label="" value="" hidden>Select Your Class Name</option>

                                         </select>
                                     <?php } ?>
                                     <label id="#learner_classname-error" class="error" for="classname"></label>
                                 </div> -->

                                 <div class="col-md-6">
                                    <label class="form-control-label">Class Name</label>
                                    <?php
                                        if (!empty($_GET['id'])) {
                                        ?>
                                    <input type="hidden" name="classname" class="form-control" value="<?= $record->classname ?>">
                                    <input type="text" name="classname" class="form-control" value="<?= $record->classname ?>" readonly>
                                    <?php
                                        } else { ?>
                                    <select class="form-control learner_classname" name="classname">
                                        <option label="" value="" hidden>Select Your Class Name</option>
                                    </select>
                                    <?php } ?>
                                    <label id="classname-error" class="error" for="classname"></label>
                    			</div>




                               <div class="col-md-6">
                                    <label class="form-control-label">Module Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <?php if (!empty($_GET['id'])) { ?>
                                        <input type="hidden" name="class_module" class="form-control" value="<?= $class_module->title ?>">
                                        <input type="text" name="class_module" class="form-control" value="<?= $class_module->title ?>" readonly>
                                    <?php } else { ?>
                                        <select class="form-control class_module" name="class_module" id="class_module">
                                            <option label="" value="" hidden>Select Your Module</option>
                                        </select>
                                    <?php } ?>
                                    <label id="class_module-error" class="error" for="class_module"></label>
                                </div>


                                 <input type="hidden" placeholder="Enter Your Unit Standard Assessed" name="unit_statndards" id="unit_statndards" class="form-control unit_statndards" readonly>
                                 <div class="col-md-12" style="margin-top: 30px;">
                                     <table id="learner_table" class="learner_table table table-bordered table-striped" style="width:100%">

                                     </table>
                                 </div>
                                 <div class="col-md-12">
                                 <label class="form-control-label">Overall Comment<span style="color:red;font-weight:bold;"> *</span></label>
                                    <textarea class="form-control"  name="overall_comment" id="overall_comment" cols="30" rows="5"></textarea>
                                 </div>
                             </div>
                             <div class="form-group row" id="assessorfield">
                             </div>
                             <div class="line"></div>
                             <div class="form-group row">
                                 <div class="col-md-12">
                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Add</button>
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
