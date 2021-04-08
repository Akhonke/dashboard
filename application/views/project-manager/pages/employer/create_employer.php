<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">
                        <?php if (!empty($_GET['id'])) {
                            $name = "Update";
                        } else {
                            $name = "Create";
                        } ?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Employer</h3>

                    </div>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" id="CreateEmployerForm" enctype="multipart/form-data">
                            <div class="form-group row">
                                <!--<div class="col-md-6">
                                    <label class="form-control-label">Learner Place Of Employment</label>
                                    <input type="text" placeholder="Enter Your Learner Place Of Employment" class="form-control learner_place_of_employment" name="learner_place_of_employment" value="<?= (isset($record)) ? $record->learner_place_of_employment : ''; ?>" id="learner_place_of_employment">
                                   <label id="learner_place_of_employment-error" class="error" for="learner_place_of_employment"></label>
                                </div>-->
                                <div class="col-md-6">
                                    <label class="form-control-label">Employer Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Employer Name" class="form-control employer_name" name="employer_name" value="<?= (isset($record)) ? $record->employer_name : ''; ?>" id="employer_name">
                                    <label id="employer_name-error" class="error" for="employer_name"></label>
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Contact Number<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Your Contact Number" class="form-control employer_contact_number" name="employer_contact_number" value="<?= (isset($record)) ? $record->employer_contact_number : ''; ?>" id="employer_contact_number" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary Cellphone number 9 digit with 0-9">
                                    <label id="employer_contact_number-error" class="error" for="employer_contact_number"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Email Address<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Contact Email" class="form-control employer_contact_email" name="employer_contact_email" value="<?= (isset($record)) ? $record->employer_contact_email : ''; ?>" id="employer_contact_email">
                                    <label id="employer_contact_email-error" class="error" for="employer_contact_email"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Employer Province<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control employer_province" name="employer_province" id="employer_province">

                                        <option value="" hidden>Choose Your Province</option>

                                        <?php

                                        foreach ($province as $key => $value) {

                                        ?>

                                            <option value="<?= $value->name  ?>" <?php

                                                                                    if (isset($record)) {



                                                                                        if ($record->employer_province == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                            } ?>><?= $value->name  ?>

                                            </option>

                                        <?php }

                                        ?>

                                    </select>

                                    <label id="employer-province-error" class="error" for="employer_province"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Employer District<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control employer_district" name="employer_district" id="employer_district">

                                        <?php if (!empty($_GET['id'])) {

                                            foreach ($District as $key => $value) {

                                                if ($record->employer_province == $value->province_id) {

                                        ?>

                                                    <option value="<?= $value->id ?>" <?php

                                                                                        if (isset($record)) {



                                                                                            if ($record->employer_district == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                                } ?>><?= $value->name ?></option>

                                            <?php

                                                }
                                            }
                                        } else { ?>

                                            <option label="" value="" hidden>Select Your District</option>

                                        <?php } ?>

                                    </select>
                                    <label id="employer_district-error" class="error" for="employer_district"></label>
                                </div>
                                <!-- 
                                <div class="col-md-6">
                                    <label class="form-control-label">Employer Region<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control employer_region" id="employer_region" name="employer_region">
                                        <?php if (!empty($_GET['id'])) {
                                            foreach ($region as $key => $value) {
                                                if ($record->employer_province == $value->province_id && $record->employer_district == $value->district_id) {
                                        ?>
                                                    <option value="<?= $value->id ?>" <?php
                                                                                        if (isset($record)) {

                                                                                            if ($record->employer_region == $value->region) { ?> selected="selected" <?php }
                                                                                                                                                                } ?>><?= $value->region ?></option>
                                            <?php
                                                }
                                            }
                                        } else { ?>
                                            <option value="" hidden>Select Your Employer Region</option>
                                        <?php } ?>
                                    </select>
                                    <label id="employer-region-error" class="error" for="employer_region"></label>
                                </div> -->

                                <div class="col-md-6">
                                    <label class="form-control-label">Employer City<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control employer_city" name="employer_city" id="employer_city">

                                        <?php if (!empty($_GET['id'])) {
                                            foreach ($city as $key => $value) {
                                                if ($record->employer_province == $value->province_id && $record->employer_district == $value->district_id && $record->employer_region == $value->region_id) {
                                        ?>
                                                    <option value="<?= $value->id ?>" <?php
                                                                                        if (isset($record)) {

                                                                                            if ($record->employer_city == $value->city) { ?> selected="selected" <?php }
                                                                                                                                                            } ?>><?= $value->city ?></option>
                                            <?php
                                                }
                                            }
                                        } else { ?>
                                            <option value="" hidden>Select Your Employer City</option>
                                        <?php
                                        } ?>
                                    </select>
                                    <label id="employer-city-error" class="error" for="employer_city"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Municipality<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control" name="municipality" id="municipality">

                                        <?php if (!empty($_GET['id'])) {
                                            foreach ($municipality as $key => $value) {
                                                if ($record->employer_city == $value->city_id) {
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
                                    <label class="form-control-label">Employer Suburb<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Employer Suburb" class="form-control" name="employer_Suburb" value="<?= (isset($record)) ? $record->employer_Suburb : ''; ?>">
                                    <label id="employer-Suburb-error" class="error" for="employer_Suburb"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Employer Street Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Employer Street Name" class="form-control" name="employer_Street_name" value="<?= (isset($record)) ? $record->employer_Street_name : ''; ?>">
                                    <label id="employer_Street_name-error" class="error" for="employer_Street_name"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Employer Street Number</label>
                                    <input type="number" placeholder="Enter Your Employer Street Number" class="form-control" name="employer_Street_number" value="<?= (isset($record)) ? $record->employer_Street_number : ''; ?>">
                                    <label id="employer-Street-number-error" class="error" for="employer_Street_number"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Contact Person Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Contact Person Name" class="form-control contact_person_name" name="contact_person_name" value="<?= (isset($record)) ? $record->contact_person_name : ''; ?>" id="contact_person_name">
                                    <label id="contact_person_name-error" class="error" for="contact_person_name"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Contact Person Surname<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Contact Person Surname" class="form-control contact_person_surname" name="contact_person_surname" value="<?= (isset($record)) ? $record->contact_person_surname : ''; ?>" id="contact_person_surname">
                                    <label id="contact_person_surname-error" class="error" for="contact_person_surname"></label>
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Contact Person Contact Number<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Contact Person Contact Number" class="form-control employer_contact_number" name="contact_person_contact_no" value="<?= (isset($record)) ? $record->contact_person_contact_no : ''; ?>" id="contact_person_contact_no" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Primary Cellphone number 9 digit with 0-9">
                                    <label id="contact_person_contact_no-error" class="error" for="contact_person_contact_no"></label>
                                </div>
                            </div>
                            <div class="line"></div>
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