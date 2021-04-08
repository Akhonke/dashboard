
<style type="text/css">
    .error{
        color: red;
    }
</style>



<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Change Password</h3>
                    </div>
                    <div class="card-body">
                    <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class='alert alert-danger'><?= $this->session->flashdata('error'); ?></div>
                <?php }else if (!empty($this->session->flashdata('success'))) { ?>
                     <div class='alert alert-success'><?= $this->session->flashdata('success'); ?></div>
                <?php } ?>
                
                <?php 
                    if (validation_errors()) {
                       echo "<div class='alert alert-danger'>".validation_errors()."</div>";
                    }

                 ?>
                <form id="updateForm" class="mt-4" method="POST">
                    <div class="row">
                    <div class="form-group mb-4 col-md-6">
                    <label class="form-control-label">Old Password<span style="color:red;font-weight:bold;"> *</span></label>
                        <input type="password" id="oldpassword" name="oldpassword" placeholder="Old Password"
                            class="form-control border-0 shadow form-control-lg text-violet">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                    <label class="form-control-label">New Password<span style="color:red;font-weight:bold;"> *</span></label>
                        <input type="password" id="password" name="password" placeholder="New Password"
                            class="form-control border-0 shadow form-control-lg text-violet" >
                    </div>
                    <div class="form-group mb-4 col-md-6">
                    <label class="form-control-label">Confirm Password<span style="color:red;font-weight:bold;"> *</span></label>
                        <input type="password" id="newpassword" name="newpassword" placeholder="Confirm Password"
                            class="form-control border-0 shadow form-control-lg" >
                    </div>
                    <!-- <div class="form-group mb-4 col-md-6">
                   
                    </div> -->
                    <!-- <button type="submit" class="btn btn-primary shadow px-5">Change</button> -->
                </div>
                <div class="line"></div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary shadow px-5">Change Password</button>
                </div>
                </form>
                </div>
                
                </div>
                </div>
                </div>
                </section>
                </div>
   
    <script src="<?= BASEURL ?>assets/admin/cloudfront/vendor/jquery/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#updateForm').submit(function(e) {
            var oldpassword = $('#oldpassword').val();
            var password = $('#password').val();
            var newpassword = $('#newpassword').val();
         
            $(".error").remove();
            if (oldpassword=='') {
                 $('#oldpassword').after('<span class="error">Old password is required</span>');
                 $('#oldpassword').attr('required', 'required');
             }else if (oldpassword.length < 5) {
               $('#oldpassword').after('<span class="error">Old password is required</span>');
                 $('#oldpassword').attr('required', 'required');
            }
             if (password=='') {
                $('#password').after('<span class="error">New password is required</span>');
                 $('#password').attr('required', 'required');
             }else if (password.length < 5) {
                $('#password').after('<span class="error">New Password must be at least 5 characters long</span>');
                 $('#password').attr('required', 'required');
             }
             if (newpassword=='') {
                $('#newpassword').after('<span class="error">Confirm password is required</span>');
                 $('#newpassword').attr('required', 'required');
                return false;
             }else if (newpassword!==password) {
                $('#newpassword').after('<span class="error">Confirm Password is not matched!!</span>');
                 $('#newpassword').attr('required', 'required');
                return false;
             }
             
          });
         
        });
    </script>