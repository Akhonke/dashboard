<style type="text/css">
    .error_validate p {
        margin-bottom: 0;
    }
</style>
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <?php if (!empty($_GET['id'])) {
                $name = 'Update';
            } else {
                $name = "Create";
            } ?>
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Training Provider</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="CreateTraininForm" enctype="multipart/form-data">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Training Provider<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Training Provider" class="form-control company_name" name="company_name" value="<?= (isset($record)) ? $record->company_name : ''; ?>" id="company_name">
                                    <input type="hidden" class="form-control trainer_id" name="trainer_id" value="<?php if (!empty($_GET)) {
                                                                                                                        echo $_GET['id'];
                                                                                                                    } else {
                                                                                                                        echo '0';
                                                                                                                    } ?>" id="trainer_id">
                                    <label id="company_name-error" class="error" for="company_name"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Full Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Full Name" class="form-control full_name" name="full_name" value="<?= (isset($record)) ? $record->full_name : ''; ?>" id="full_name">
                                    <label id="full_name-error" class="error" for="full_name"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Surname<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Surname" name="surname" class="form-control surname" value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Email address<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Email Address" class="form-control email" name="email" value="<?= (isset($record)) ? $record->email : ''; ?>" id="email">
                                    <label id="email-error" class="error" for="email"></label>
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Mobile number<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Your Mobile Number" class="form-control mobile" name="mobile" value="<?= (isset($record)) ? $record->mobile : ''; ?>" id="mobile" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
                                    <label id="mobile-error" class="error" for="mobile"></label>
                                </div>
                                <div class="col-md-6">
                                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                                    <label class="form-control-label">Landline number<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="number" placeholder="Enter Your Landline Number" name="landline" class="form-control landline" value="<?= (isset($record)) ? $record->landline : ''; ?>" id="landline" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                                    <label id="landline-error" class="error" for="landline"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Project Manager<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Project Manager Name" name="project_id" class="form-control project_id" value="<?= $project->project_manager ?>" id="project_id" readonly>
                                    <label id="project_id-error" class="error" for="project_id"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Province<span style="color:red;font-weight:bold;"> *</span></label>
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
                                    <label class="form-control-label">District<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control district_option" name="district">
                                        <?php if (!empty($_GET['id'])) {
                                            foreach ($District as $key => $value) {
                                                if ($record->province == $value->province_id) {
                                        ?>
                                                    <option value="<?= $value->id ?>" <?php
                                                                                        if (isset($record)) {
                                                                                            if ($record->district == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                    } ?>><?= $value->name ?></option>
                                            <?php
                                                }
                                            }
                                        } else { ?>
                                            <option value="" hidden>Select Your District</option>
                                        <?php } ?>
                                    </select>
                                    <label id="district-error" class="error" for="district"></label>
                                </div>
                                <!-- <div class="col-md-6">
                                       <label class="form-control-label">Region<span style="color:red;font-weight:bold;"> *</span></label>
                                       <select class="form-control" id="region" name="region">
                                           <?php if (!empty($_GET['id'])) {
                                                foreach ($region as $key => $value) {
                                                    if ($record->province == $value->province_id && $record->district == $value->district_id) {
                                            ?>
                                                       <option value="<?= $value->id ?>" <?php
                                                                                            if (isset($record)) {
                                                                                                if ($record->region == $value->region) { ?> selected="selected" <?php }
                                                                                                                                                        } ?>><?= $value->region ?></option>
                                               <?php
                                                    }
                                                }
                                            } else { ?>
                                               <option value="" hidden>Select Your Region</option>
                                           <?php } ?>
                                       </select>
                                       <label id="region-error" class="error" for="region"></label>
                                   </div> -->
                                <div class="col-md-6">
                                    <label class="form-control-label">City<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control" name="city" id="city">
                                        <?php if (!empty($_GET['id'])) {
                                            foreach ($city as $key => $value) {
                                                if ($record->province == $value->province_id && $record->district == $value->district_id && $record->region == $value->region_id) {
                                        ?>
                                                    <option value="<?= $value->id ?>" <?php
                                                                                        if (isset($record)) {

                                                                                            if ($record->city == $value->city) { ?> selected="selected" <?php }
                                                                                                                                                } ?>><?= $value->city ?></option>
                                            <?php
                                                }
                                            }
                                        } else { ?>
                                            <option value="" hidden>Select Your City</option>
                                        <?php
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
                                    <label class="form-control-label">Suburb<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Suburb" class="form-control" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">
                                    <label id="Suburb-error" class="error" for="Suburb"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Street name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">
                                    <label id="Street_name-error" class="error" for="Street_name"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Street Number</label>
                                    <input type="number" placeholder="Enter Your Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                                    <label id="Street_number-error" class="error" for="Street_number"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Training provider password<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="password" placeholder="Enter Your Password" class="form-control password" name="password" id="password" value="<?= (isset($record)) ? $record->password : ''; ?>">
                                    <label id="password-error" class="error" for="password"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Attach Documents</label>
                                    <?php if (!empty($_GET['id'])) {
                                        $attach_documents = explode(',', $record->attach_documents);
                                    ?>
                                        <input type="file" name="attach_documents[]" class="form-control" multiple="">
                                        <?php
                                        foreach ($attach_documents as $value) {
                                        ?>
                                            <?php if (!empty($value)) { ?>
                                                <img src="<?= BASEURL . 'uploads/training/attach_documents/' . $value ?>" width="150px" style="margin:15px 15px 0">
                                        <?php }
                                        }
                                    } else {  ?>
                                        <input type="file" name="attach_document[]" class="form-control" multiple>
                                        <label id="attach_document-error" class="error" for="attach_document"></label>
                                    <?php  } ?>
                                </div>
                                <input type="hidden" name="created_by" value="<?php echo projectmanagerid(); ?>">
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
    </section>
</div>