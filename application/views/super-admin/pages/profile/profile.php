<?php

$data = $this->common->accessrecord('master_admin', [], array('id' => 1), 'row');

?>
<div class="container-fluid px-xl-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="https://www.waytwodigital.com/DigiLims/superAdmin-dashboard"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="h6 text-uppercase mb-0">Profile</h3>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="Profile-section">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="profile-image" style="text-align:center;clear: both;">
                                <img src="<?= base_url('uploads/sadminprofile/') ?><?= $data->profile_image ?>" width="200" height="200">
                            </div>
                            <div class="User-name" style="text-align:center;">
                                <h3><span><?= $data->name ?></h3>
                            </div>
                            <div class="Email-id" style="text-align:center;">
                                <h5><?= $data->email_address ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="profile-button" style="text-align:center;margin-top: 70px;">
                                <button class="btn btn-primary mt-4 d-inline w-20" style="" type="submit"><a href="<?= base_url('superadmin-editprofile') ?>"> Edit Profile</a></button></br>
                                <button class="btn btn-primary mt-4 d-inline w-20" style="" type="submit"><a href="<?= base_url('superadmin-changepassword') ?>">Change Password</a></button>


                            </div>
                        </div>
                    </div>





                </div>
            </div>
    </section>

</div>
<script>
    <?php if ($this->session->flashdata('success')) {
    ?>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Profile Updated Successfully',
            showConfirmButton: false,
            timer: 1500
        })
    <?php } ?>
</script>