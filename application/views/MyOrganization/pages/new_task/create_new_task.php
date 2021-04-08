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
                           $name = "Create";
                        } ?> 
                     <h3 class="h6 text-uppercase mb-0"><?= $name ?> New Task</h3>
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
                                    <label class="form-control-label">Task Name</label>
                                    <input type="text" placeholder="Enter Your Task Name" class="form-control" value="" id="">
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Task Description</label>
                                    <input type="text" placeholder="Enter Your Task Description" class="form-control" value="" id="">
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Task Owner</label>
                                    <input type="text" placeholder="Enter Your Task Owner" class="form-control" value="" id="">
                                    <label id="" class="error" for=""></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Planned  Start Date</label>
                                    <input type="date" placeholder="Enter Your Planned  Start Date" name="" class="form-control" value="" id="">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Actual  Start Date</label>
                                    <input type="date" placeholder="Enter Your Actual  Start Date" name="" class="form-control" value="" id="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Planned  End Date</label>
                                    <input type="date" placeholder="Enter Your Planned  End Date" name="" class="form-control" value="" id="">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Actual  End Date</label>
                                    <input type="date" placeholder="Enter Your Actual  End Date" name="" class="form-control" value="" id="">
                                </div>
                                
                              
                               <div class="col-md-6">
                                    <label class="form-control-label">Task Status</label>
                                     <select class="form-control" name="" id="">

                                        <option label="Select Status"></option>
                                        <option value="Started">Started</option>
                                         <option value="In progress">In progress</option>
                                         <option value="Completed">Completed</option>

                                     </select>

                                    <label id="" class="error" for=""></label>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Task Status Colors</label>
                                     <select class="form-control" name="" id="">

                                        <option label="Select Colors"></option>
                                        <option value="Red">Red</option>
                                         <option value="Amber">Amber</option>
                                         <option value="Green">Green</option>

                                     </select>

                                    <label id="" class="error" for=""></label>

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
