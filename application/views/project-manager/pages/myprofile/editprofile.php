<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateProjectForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Manager</label>
                                    <input type="text" placeholder="Enter Your Project Manager" name="project_manager" class="form-control project_manager" value="<?= (isset($record)) ? $record->project_manager : ''; ?>" id="project_manager">
                                </div>



                                <div class="col-md-6">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" placeholder="Enter Full Name" name="fullname" class="form-control fullname" value="<?= (isset($record)) ? $record->fullname : ''; ?>" id="fullname">
                                    <label class="error"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname</label>
                                    <input type="text" placeholder="Enter Surname" name="surname" class="form-control surname" value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                                </div>

                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Landline Number</label>
                                    <input type="number" placeholder="Enter Your Landline Number" name="landline_number" class="form-control" value="<?= (isset($record)) ? $record->landline_number : ''; ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Mobile Number</label>
                                    <input type="number" placeholder="Enter Your Mobile Number" name="mobile_number" class="form-control" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
                                </div>
                                <div class="col-md-6">

                                    <label class="form-control-label">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_pic">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Province</label>
                                    <select class="form-control province" name="province">
                                        <option value="" hidden>Choose Your Province</option>
                                        <?php
                                        foreach ($province as $key => $value) {
                                        ?>
                                            <option value="<?= $value->name  ?>" <?php
                                                                                    if (isset($record)) {

                                                                                        if ($record->province == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                } ?>><?= $value->name  ?>
                                            </option>
                                        <?php }
                                        ?>
                                    </select>
                                    <label id="province-error" class="error" for="province"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">District</label>
                                    <select class="form-control district_option" name="district">
                                        <?php
                                        foreach ($District as $key => $value) {
                                            if ($record->province == $value->province_id) {
                                        ?>
                                                <option value="<?= $value->id ?>" <?php
                                                                                    if (isset($record)) {

                                                                                        if ($record->district == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                } ?>><?= $value->name ?></option>
                                        <?php
                                            }
                                        }  ?>
                                    </select>
                                    <label id="district-error" class="error" for="district"></label>
                                </div>

                                <!-- <div class="col-md-6">
                                    <label class="form-control-label">Region</label>
                                      <select class="form-control" id="region" name="region">
                                       <?php
                                        foreach ($region as $key => $value) {
                                            if ($record->province == $value->province_id && $record->district == $value->district_id) {
                                        ?>
                                            <option value="<?= $value->id ?>"
                                                <?php
                                                if (isset($record)) {

                                                    if ($record->region == $value->region) { ?> selected="selected" 
                                                <?php }
                                                } ?>
                                                ><?= $value->region ?></option>
                                        <?php
                                            }
                                        }  ?>
                                    </select>
                                    <label id="region-error" class="error" for="region"></label>
                                </div> -->

                                <div class="col-md-6">
                                    <label class="form-control-label">City</label>
                                    <select class="form-control" name="city" id="city">

                                        <?php
                                        foreach ($city as $key => $value) {
                                            if ($record->province == $value->province_id && $record->district == $value->district_id && $record->region == $value->region_id) {
                                        ?>
                                                <option value="<?= $value->id ?>" <?php
                                                                                    if (isset($record)) {

                                                                                        if ($record->city == $value->city) { ?> selected="selected" <?php }
                                                                                                                                            } ?>><?= $value->city ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                    <label id="city-error" class="error" for="city"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Municipality<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control" name="municipality" id="municipality">
                                        <?php if (!empty($_GET['id'])) {
                                            foreach ($municipality as $key => $value) {
                                                if ($record->city == $value->city_id) {
                                        ?>
                                                    <option value="<?= $value->id ?>" <?php
                                                                                        if (isset($record)) {
                                                                                            if ($record->municipality == $value->municipality) { ?> selected="selected" <?php }
                                                                                                                                                                } ?>><?= $value->municipality ?></option>
                                            <?php
                                                }
                                            }
                                        } else { ?>
                                            <option label="Select Your Municipality"></option>
                                        <?php
                                        } ?>
                                    </select>
                                    <label id="municipality-error" class="error" for="municipality"></label>
                                </div>


                                <div class="col-md-6">

                                    <label class="form-control-label">Suburb</label>

                                    <input type="text" placeholder="Enter Suburb" class="form-control" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">
                                    <label id="Suburb-error" class="error" for="Suburb"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street name</label>

                                    <input type="text" placeholder="Enter Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">
                                    <label id="Street_name-error" class="error" for="Street_name"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Street Number</label>

                                    <input type="number" placeholder="Enter Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                                    <label id="Street_number-error" class="error" for="Street_number"></label>
                                </div>

                                <div class="col-md-12">
                                    <h3 class="h6 text-uppercase mb-0"> Attachments</h3>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Tax Clearance</label>

                                    <input type="file" name="tax_clearances" class="form-control">
                                    <?php if (!empty($record->tax_clearances)) { ?>
                                        <img src="<?= BASEURL . 'uploads/project/tax_clearance/' . $record->tax_clearance ?>" width="50px" height="50px">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Moderator Accreditations</label>

                                    <input type="file" name="moderator_accreditations" class="form-control">
                                    <?php if (!empty($record->moderator_accreditations)) { ?>
                                        <img src="<?= BASEURL . 'uploads/project/moderator_accreditations/' . $record->moderator_accreditations ?>" width="50px" height="50px">
                                    <?php }  ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Assesor Acreditations</label>
                                    <input type="file" name="assesor_acreditation" class="form-control">
                                    <?php if (!empty($record->assesor_acreditations)) { ?>
                                        <img src="<?= BASEURL . 'uploads/project/assesor_acreditations/' . $record->assesor_acreditations ?>" width="50px" height="50px">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Seta Creditiations</label>
                                    <input type="file" name="seta_creditiations" class="form-control">
                                    <?php if (!empty($record->seta_creditiations)) { ?>
                                        <img src="<?= BASEURL . 'uploads/project/seta_creditiations/' . $record->seta_creditiations ?>" width="50px" height="50px">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Company Registration Documents</label>
                                    <input type="file" name="company_documents[]" class="form-control" multiple="">
                                    <?php
                                    if (!empty($record->company_registration_documents)) {
                                        $company_registration_documents = explode(',', $record->company_registration_documents);
                                        foreach ($company_registration_documents as $value) {
                                            if (!empty($value)) { ?>
                                                <img src="<?= BASEURL . 'uploads/project/company_documents/' . $value ?>" width="50px" height="50px">
                                    <?php }
                                        }
                                    } ?>



                                </div>

                            </div>
                            <div class="line"></div>
                            <div class="form-group row" id="assessorfield">
                            </div>
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
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