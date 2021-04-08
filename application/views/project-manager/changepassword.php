
<style type="text/css">
    .error{
        color: red;
    }
</style>            
<!-- <div class="container py-5">
    <div class="row align-items-center">
        <div class="col-2 col-lg-2 mx-auto mb-2 mb-lg-0">
        </div>
        <div class="col-5 col-lg-5 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5" style="padding: 100px 0px;">
                <h1 class="text-base text-primary text-uppercase mb-4">Hi, Fill your password details</h1>
                <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class='alert alert-danger'><?= $this->session->flashdata('error'); ?></div>
                <?php }?>
                <form id="ChangepasswordForm" class="mt-4" method="POST">
                    <div class="form-group mb-4">
                        <input type="password" id="oldpassword" name="oldpassword" placeholder="Enter Your Old Password"
                            class="form-control border-0 shadow form-control-lg text-violet">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" id="password" name="password" placeholder="Enter Your New Password"
                            class="form-control border-0 shadow form-control-lg text-violet" >
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Your Confirm Password"
                            class="form-control border-0 shadow form-control-lg" >
                    </div>
                    <button type="submit" class="btn btn-primary shadow px-5">Change</button>
                </form>
            </div>
        </div>
        <div class="col-2 col-lg-2 mx-auto mb-2 mb-lg-0">
        </div>
    </div>
</div> -->











<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Change Password</h3>
                    </div>
                    <div class="card-body">
                    <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class='alert alert-danger'><?= $this->session->flashdata('error'); ?></div>
                <?php }?>
                <form id="ChangepasswordForm" class="mt-4" method="POST">
                    <div class="row">
                    <div class="form-group mb-4 col-md-6">
                    <label class="form-control-label">Old Password</label>
                        <input type="password" id="oldpassword" name="oldpassword" placeholder="Enter Your Old Password"
                            class="form-control border-0 shadow form-control-lg text-violet">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                    <label class="form-control-label">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your New Password"
                            class="form-control border-0 shadow form-control-lg text-violet" >
                    </div>
                    <div class="form-group mb-4 col-md-6">
                    <label class="form-control-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Your Confirm Password"
                            class="form-control border-0 shadow form-control-lg" >
                    </div>
                    </div>
                    <div class="line"></div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary shadow px-5">Change Password</button>
                    </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
    </section>
</div>
   
    