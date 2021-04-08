<div class="container-fluid px-xl-5">
  <section class="py-5">
    <div class="row">
      <!-- Form Elements -->
      <?php
      $report = $this->common->accessrecord('organisation', [], ['id' =>  $_SESSION['organisation']['id']], 'row')

      ?>
      <div class="col-lg-12 mb-1">
        <div class="card">
          <div class="card-header">
            <h3 class="h6 text-uppercase mb-0">Edit Profile</h3>
          </div>
          <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" id="EditProfileForm">
              <div class="form-group row">
                <div class="col-md-6">
                  <label class="form-control-label">Organization Name</label>
                  <input type="text" placeholder="Enter your Organization Name " class="form-control" id="" name="organisation_name" value="<?= $report->organisation_name ?>">
                </div>



                <div class="col-md-6">
                  <label class="form-control-label">Full Name</label>
                  <input type="text" placeholder="Enter your Full Name" class="form-control" id="full_name" name="fullname" value="<?= $report->fullname ?>">
                </div>



                <div class="col-md-6">
                  <label class="form-control-label">SurName</label>
                  <input type="text" placeholder="Enter your SurName" class="form-control" id="" name="surname" value="<?= $report->surname ?>">
                </div>



                <div class="col-md-6">
                  <label class="form-control-label">Email Address</label>
                  <input type="text" placeholder="Enter your Email Address" class="form-control" id="email" name="email_address" value="<?= $report->email_address ?>">
                </div>


                <div class="col-md-6">
                  <label class="form-control-label">Mobile</label>
                  <input type="number" placeholder="Enter your mobile" class="form-control" id="mobile" name="mobile_number" value="<?= $report->mobile_number ?>">
                </div>

                <div class="col-md-6">
                  <label class="form-control-label">Landline </label>
                  <input type="number" placeholder="Enter your Landline" class="form-control" id="" name="landline_number" value="<?= $report->landline_number ?>">
                </div>



                <!-- <div class="col-md-6">
                  <label class="form-control-label">Province<span style="color:red;font-weight:bold;">*</span></label>
                  <select class="form-control" name="" aria-invalid="true">
                    <option value="" hidden="">Choose Your Province</option>
                    <option value="test">test </option>
                  </select>
                  <label id="province-error" class="error" for=""></label>
                </div>

                <div class="col-md-6">
                  <label class="form-control-label">District<span style="color:red;font-weight:bold;">*</span></label>
                  <select class="form-control" name="" aria-invalid="true">
                    <option value="" hidden="">Choose Your District</option>
                    <option value="test">test </option>
                  </select>
                  <label id="province-error" class="error" for=""></label>
                </div>


                <div class="col-md-6">
                  <label class="form-control-label">Region<span style="color:red;font-weight:bold;">*</span></label>
                  <select class="form-control" name="" aria-invalid="true">
                    <option value="" hidden="">Choose Your Region</option>
                    <option value="test">test </option>
                  </select>
                  <label id="province-error" class="error" for=""></label>
                </div> -->


                <div class="col-md-6">
                  <label class="form-control-label">Physical Address</label>
                  <input type="text" placeholder="Enter your Physical Address" class="form-control" id="" name="physical_address" value="<?= $report->physical_address ?>">
                </div>

                <div class="col-md-6">
                  <label class="form-control-label">Street Name</label>
                  <input type="text" placeholder="Enter your Street Name" class="form-control" id="" name="Street_name" value="<?= $report->Street_name ?>">
                </div>

                <div class="col-md-6">
                  <label class="form-control-label">Street Number</label>
                  <input type="number" placeholder="Enter your Street Number" class="form-control" id="" name="Street_number" value="<?= $report->Street_number ?>">
                </div>

                <div class="col-md-6">
                  <label class="form-control-label">Suburb</label>
                  <input type="text" placeholder="Enter your Suburb" class="form-control" id="" name="Suburb" value="<?= $report->Suburb ?>">
                </div>
                <div class="col-md-6">
                  <label class="form-control-label">Profile Image</label>
                  <input type="file" class="form-control" id="" name="profile_image" value="<?= (isset($record)) ? $record->profile_image : ''; ?>">
                  <?php if (!empty($record->profile_image)) { ?>
                      <img src="<?= BASEURL . 'uploads/orgprofile/' . $record->profile_image ?>" width="50px" height="50px">
                  <?php }
                   ?>
                </div>


              </div>
              <div class="line"></div>
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="text-center">
                    <?php if (isset($record)) { ?>
                      <button type="submit" class="btn btn-primary">Update</button>
                    <?php } ?>
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