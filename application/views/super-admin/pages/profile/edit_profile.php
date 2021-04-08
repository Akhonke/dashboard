<style type="text/css">
    .error {
        color: red;
    }
</style>

<?php

$data = $this->common->accessrecord('master_admin', [], ['id'=>1], 'row')
?>


<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Update Your Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($this->session->flashdata('error'))) { ?>
                            <div class='alert alert-danger'><?= $this->session->flashdata('error'); ?></div>
                        <?php } ?>
                        <form id="ChangepasswordForm" class="mt-4" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group mb-4 col-md-6">
                                    <label class="form-control-label">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?=$data->name?>"  class="form-control border-0 shadow form-control-lg text-violet">
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Your New Email" value="<?=$data->email_address?>" class="form-control border-0 shadow form-control-lg text-violet">
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="form-control-label">Mobile Number</label>
                                    <input type="number" id="mobile" name="mobile" placeholder="Enter Your Mobile Number" value="<?=$data->mobile_number?>" class="form-control border-0 shadow form-control-lg">
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="form-control-label">Profile Image</label>
                                    <input type="file" id="profile_image" name="profile" placeholder="Select Your profile" class="form-control border-0 shadow form-control-lg">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary shadow px-5">Update</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>



