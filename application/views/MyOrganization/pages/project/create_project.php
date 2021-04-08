<style>
  #CreateProjectForm {
    background-color: #ffffff;


    width: 100%;
    min-width: 300px;
  }

  #CreateProjectForm h1 {
    text-align: center;
  }

  #CreateProjectForm input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  #CreateProjectForm input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  #CreateProjectForm .tab {
    display: none;
  }

  #CreateProjectForm button {
    background-color: #20bcd5 !important;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  #CreateProjectForm button:hover {
    opacity: 0.8;
  }

  #CreateProjectForm #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  #CreateProjectForm .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  #CreateProjectForm .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid:  */
  #CreateProjectForm .step.finish {
    background-color: #bbbbbb;
  }

  #CreateProjectForm .step.active {
    background-color: #20bcd5 !important;
  }
</style>




<div class="container-fluid px-xl-5">
  <section class="py-5">
    <div class="row">
      <!-- Form Elements -->
      <div class="col-lg-12 mb-1">
        <div class="card">
          <div class="card-header">
            <?php if (!empty($_GET['id'])) {
              $name = 'Update';
            } else {
              $name = "Create";
            } ?>
            <h3 class="h6 text-uppercase mb-0"><?= $name ?> Project Manager</h3>
          </div>
          <?php
          if (!empty($this->session->flashdata('error'))) { ?>
            <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
          <?php } ?>
          <div class="card-body">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateProjectForm">

              <!-- One "tab" for each step in the form: -->
              <div class="tab">Name:
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="form-control-label">Project Manager<span style="color:red;font-weight:bold;"> *</span></label>
                    <input type="text" placeholder="Enter Your Project Manager" name="project_manager" class="form-control project_manager input" value="<?= (isset($record)) ? $record->project_manager : ''; ?>" id="project_manager">
                  </div>
                  <div class="col-md-6">

                    <label class="form-control-label">Organization<span style="color:red;font-weight:bold;"> *</span></label>

                    <select class="form-control" name="organization">
                      <option value="" hidden>Choose Organization</option>
                      <?php foreach ($organization as $key => $value) {
                      ?>
                        <option value="<?= $value->id ?>" selected="selected"><?= $value->organisation_name ?></option>
                      <?php
                      } ?>

                    </select>
                    <label id="programme_director-error" class="error" for="programme_director"></label>
                  </div>


                  <div class="col-md-6">
                    <label class="form-control-label">First Name<span style="color:red;font-weight:bold;">*</span></label>
                    <input type="text" placeholder="Enter First Name" name="fullname" class="form-control fullname input" value="<?= (isset($record)) ? $record->fullname : ''; ?>" id="fullname">
                    <label class="error"></label>
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Surname<span style="color:red;font-weight:bold;">*</span></label>
                    <input type="text" placeholder="Enter Surname" name="surname" class="form-control surname input" value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                  </div>
                </div>
              </div>
              <div class="tab">
                <div class="form-group row">

                  <div class="col-md-6">
                    <label class="form-control-label">Email<span style="color:red;font-weight:bold;">*</span> </label>
                    <input type="email" placeholder="Enter Your Email" name="email_address" class="form-control input" value="<?= (isset($record)) ? $record->email_address : ''; ?>">
                  </div>

                  <div class="col-md-6">
                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                    <label class="form-control-label">Landline Number<span style="color:red;font-weight:bold;">*</span></label>
                    <input type="number" placeholder="Enter Your Landline Number" name="landline_number" class="form-control input" value="<?= (isset($record)) ? $record->landline_number : ''; ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                  </div>
                  <div class="col-md-6">
                    <span style="position: absolute;top: 47px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                    <label class="form-control-label">Mobile Number<span style="color:red;font-weight:bold;">*</span></label>
                    <input type="number" placeholder="Enter Your Mobile Number" name="mobile_number" class="form-control input" value="<?= (isset($record)) ? $record->mobile_number : ''; ?>" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Province<span style="color:red;font-weight:bold;">*</span></label>
                    <select class="form-control province input" name="province">
                      <option value="" hidden>Choose Your Province</option>
                      <?php
                      foreach ($province as $key => $value) {
                      ?>
                        <option value="<?= $value->name  ?>" <?php
                                                              if (isset($record)) {

                                                                if ($record->province == $value->name) {
                                                                  echo ('selected');
                                                                }
                                                              } ?>><?= $value->name  ?>
                        </option>
                      <?php }
                      ?>
                    </select>
                    <label id="province-error" class="error" for="province"></label>
                  </div>

                  <div class="col-md-6">
                    <label class="form-control-label">District<span style="color:red;font-weight:bold;">*</span></label>
                    <select class="form-control district_option input" name="district">
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



                  <div class="col-md-6">
                    <label class="form-control-label">City<span style="color:red;font-weight:bold;">*</span></label>
                    <select class="form-control input" name="city" id="city">

                      <?php if (!empty($_GET['id'])) {
                        foreach ($city as $key => $value) {
                          if ($record->province == $value->province_id &&  $record->district ==  $value->district_id) {
                      ?>
                            <option value="<?= $value->id ?>" <?php
                                                              if (isset($record)) {

                                                                if ($record->city == $value->city) {
                                                                  echo ('selected');
                                                                }
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
                    <select class="form-control input" name="municipality" id="municipality">

                      <?php if (!empty($_GET['id'])) {
                        foreach ($municipality as $key => $values) {
                          if ($record->city == $values->city_id) {
                      ?>
                            <option value="<?= $values->id  ?>" <?php
                                                                if (isset($record)) {

                                                                  if ($record->municipality == $values->municipality) { ?> selected="selected" <?php }
                                                                                                                                            } ?>><?= $values->municipality ?></option>
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

                    <label class="form-control-label">Suburb<span style="color:red;font-weight:bold;">*</span></label>

                    <input type="text" placeholder="Enter Suburb" class="form-control input" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">
                    <label id="Suburb-error" class="error" for="Suburb"></label>
                  </div>

                  <div class="col-md-6">

                    <label class="form-control-label">Street name<span style="color:red;font-weight:bold;">*</span></label>

                    <input type="text" placeholder="Enter Street Name" class="form-control input" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">
                    <label id="Street_name-error" class="error" for="Street_name"></label>
                  </div>

                  <div class="col-md-6">

                    <label class="form-control-label">Street Number</label>

                    <input type="number" placeholder="Enter Street Number" class="form-control " name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">
                    <label id="Street_number-error" class="error" for="Street_number"></label>
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Password<span style="color:red;font-weight:bold;">*</span></label>
                    <input type="password" placeholder="Enter Your Password" class="form-control password input" name="password" value="<?= (isset($record)) ? $record->password : ''; ?>" id="password">
                    <label id="password-error" class="error" for="password"></label>
                  </div>
                </div>
              </div>
              <div class="tab">
                <div class="form-group row">
                  <div class="col-md-12">
                    <h3 class="h6 text-uppercase mb-0"> Attachments<span style="color:red;font-weight:bold;">*</span></h3>
                  </div>

                  <div class="col-md-6">
                    <label class="form-control-label">Tax Clearance</label>
                    <?php if (!empty($_GET['id'])) { ?>
                      <input type="file" name="tax_clearances" class="form-control input">
                      <?php if (!empty($record->tax_clearances)) { ?>
                        <img src="<?= BASEURL . 'uploads/project/tax_clearance/' . $record->tax_clearance ?>" width="50px" height="50px">
                      <?php }
                    } else { ?>
                      <input type="file" name="tax_clearance" class="form-control">
                      <label id="tax_clearance-error" class="error" for="tax_clearance"></label>
                    <?php } ?>
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Moderator Accreditations</label>
                    <?php if (!empty($_GET['id'])) { ?>
                      <input type="file" name="moderator_accreditations" class="form-control input">
                      <?php if (!empty($record->moderator_accreditations)) { ?>
                        <img src="<?= BASEURL . 'uploads/project/moderator_accreditations/' . $record->moderator_accreditations ?>" width="50px" height="50px">
                      <?php }
                    } else { ?>
                      <input type="file" name="moderator_accreditation" class="form-control">
                      <label id="moderator_accreditations-error" class="error" for="moderator_accreditations"></label>
                    <?php } ?>
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Assesor Acreditations</label>
                    <?php if (!empty($_GET['id'])) { ?>
                      <input type="file" name="assesor_acreditation" class="form-control input">
                      <?php if (!empty($record->assesor_acreditations)) { ?>
                        <img src="<?= BASEURL . 'uploads/project/assesor_acreditations/' . $record->assesor_acreditations ?>" width="50px" height="50px">
                      <?php }
                    } else { ?>
                      <input type="file" name="assesor_acreditations" class="form-control">
                      <label id="assesor_acreditations-error" class="error" for="assesor_acreditations"></label>
                    <?php } ?>
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Seta Creditiations</label>
                    <?php if (!empty($_GET['id'])) { ?>
                      <input type="file" name="seta_creditiations" class="form-control input">
                      <?php if (!empty($record->seta_creditiations)) { ?>
                        <img src="<?= BASEURL . 'uploads/project/seta_creditiations/' . $record->seta_creditiations ?>" width="50px" height="50px">
                      <?php }
                    } else { ?>
                      <input type="file" name="seta_creditiation" class="form-control input">
                      <label id="seta_creditiations-error" class="error" for="seta_creditiation"></label>
                    <?php } ?>
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Company Registration Documents</label>
                    <?php if (!empty($_GET['id'])) {
                      $company_registration_documents = explode(',', $record->company_registration_documents);
                    ?>
                      <input type="file" name="company_documents" class="form-control input" multiple="">
                      <?php
                      foreach ($company_registration_documents as $value) {
                      ?>

                        <?php if (!empty($value)) { ?>
                          <img src="<?= BASEURL . 'uploads/project/company_documents/' . $value ?>" width="50px" height="50px">
                      <?php }
                      }
                    } else {  ?>
                      <input type="file" name="company_registration_documents" class="form-control input" multiple="">
                      <label id="company_registration_documents-error" class="error" for="company_registration_documents"></label>
                    <?php  } ?>


                  </div>
                </div>
              </div>

              <div style="overflow:auto;">
                <div style="float:right;">
                  <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                  <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                  <button id="sdsd" class="btn btn-primary" type="submit"></button>

                </div>
              </div>
              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("sdsd").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }

    if (n == 1) {

      document.getElementById("sdsd").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "none";
    }



    if (n == 2) {
      document.getElementById("sdsd").style.display = "inline";
      document.getElementById("nextBtn").style.display = "none";
      document.getElementById("prevBtn").style.display = "inline";
    } else {
      document.getElementById("nextBtn").style.display = "inline";

    }

    if (n == (x.length - 1)) {

    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    if (n == (x.length - 1)) {
      document.getElementById("sdsd").innerHTML = "Submit";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("CreateProjectForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByClassName("input");
    // z = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += "";
        // and set the current valid status to false
        valid = false;
      }
    }
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].className != "error") {
        // add an "invalid" class to the field:
        // y[i].className += "";
        console.log("y[i].className");
        // and set the current valid status to false
        // valid = false;
      }
    }



    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
</script>