<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <?php if(empty($_GET['id'])){
                           $name = 'Update';
                        } ?> 
                     <h3 class="h6 text-uppercase mb-0"><?= $name ?> Project Manager</h3>
                    </div>
                    <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="upProProjectmanager">
                            <!-- <form id="loginForm" class="mt-4" method="POST"> -->
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Manager</label>
                                    <input type="text" placeholder="Enter Your Project Manager" name="project_manager" class="form-control project_manager" value="<?= (isset($record)) ? $record->project_manager : ''; ?>" id="project_manager">
                                </div>
                                 <div class="col-md-6">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Full Name" name="fullname"
                                        class="form-control fullname" value="<?= (isset($record)) ? $record->fullname : ''; ?>" id="fullname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname</label>
                                    <input type="text" placeholder="Enter Surname" name="surname" class="form-control surname"
                                        value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Photo</label>
                                    <input type="file" class="form-control" name="profile_pic" value="">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row" id="assessorfield">
                            </div>
                            <div class="line"></div>
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

