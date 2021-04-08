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

            <form class="form-horizontal" method="post" id="CreateTraininForm" enctype="multipart/form-data">

              <!-- <div class="line"></div> -->

              <div class="form-group row">
                <div class="col-md-6">

                  <label class="form-control-label">Company Name</label>

                  <input type="text" placeholder="Enter Your Company Name" class="form-control company_name" name="company_name" value="<?= (isset($record)) ? $record->company_name : ''; ?>" id="company_name">
                  <label id="company_name-error" class="error" for="company_name"></label>
                </div>
                <div class="col-md-6">

                  <label class="form-control-label">Name</label>

                  <input type="text" placeholder="Enter Your Name" class="form-control full_name" name="full_name" value="<?= (isset($record)) ? $record->full_name : ''; ?>" id="full_name">
                  <label id="full_name-error" class="error" for="full_name"></label>
                </div>
                <div class="col-md-6">
                  <label class="form-control-label">Surname</label>
                  <input type="text" placeholder="Enter Your Surname" name="surname" class="form-control surname" value="<?= (isset($record)) ? $record->surname : ''; ?>" id="surname">
                </div>

                <div class="col-md-6">

                  <label class="form-control-label">Email address</label>

                  <input type="text" placeholder="Enter Your Email Address" class="form-control email" name="email" value="<?= (isset($record)) ? $record->email : ''; ?>" id="email">
                  <label id="email-error" class="error" for="email"></label>
                </div>

                <div class="col-md-6">
                  <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                  <label class="form-control-label">Mobile number</label>

                  <input type="text" placeholder="Enter Your Mobile Number" class="form-control mobile" name="mobile" value="<?= (isset($record)) ? $record->mobile : ''; ?>" id="mobile" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Mobile number 9 digit with 0-9">
                  <label id="mobile-error" class="error" for="mobile"></label>
                </div>

                <div class="col-md-6">
                  <span style="position: absolute;top: 45px;z-index: 1;padding: 8px;border-right: 1px solid #ccc;">+27</span>
                  <label class="form-control-label">Landline number</label>

                  <input type="text" placeholder="Enter Your Landline Number" name="landline" class="form-control landline" value="<?= (isset($record)) ? $record->landline : ''; ?>" id="landline" style="position: relative;padding-left: 50px;" pattern="[0-9]{9}" title="Landline number 9 digit with 0-9">
                  <label id="landline-error" class="error" for="landline"></label>
                </div>
                <!-- <div class="col-md-6">



                                    <label class="form-control-label">Project Manager</label>



                                    <select class="form-control" name="project_id">

                                        <option label="Choose Your Project Manager" Hidden></option>

                                        <?php foreach ($project as $key => $value) {

                                        ?>

                                            <option value="<?= $value->id ?>"

                                                <?php

                                                if (isset($record)) {



                                                  if ($record->project_id == $value->id) { ?> selected="selected" 

                                                <?php }
                                                } ?>

                                                ><?= $value->project_manager ?></option>

                                        <?php

                                        } ?>



                                    </select>

                                     <label id="project_id-error" class="error" for="project_id"></label>

                               </div>
                                 <div class="col-md-6">

                                    <label class="form-control-label">Province</label>

                                    <select class="form-control province" name="province">

                                    <option label="Choose Your Province" hidden></option>

                                    <?php

                                    foreach ($province as $key => $value) {

                                    ?>

                                        <option value="<?= $value->name  ?>"

                                             <?php

                                              if (isset($record)) {



                                                if ($record->province == $value->name) { ?> selected="selected" 

                                            <?php }
                                              } ?>

                                            ><?= $value->name  ?></option>

                                    <?php

                                    }

                                    ?>



                                    </select>

                                    <label id="province-error" class="error" for="province"></label>

                               </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">District</label>

                                       <select class="form-control district_option" name="district">

                                        

                                        <?php

                                        if (empty(($record->district))) { ?>

                                                <option label="Choose Your District" hidden></option>

                                          <?php  } else {

                                          foreach ($District as $key => $value) {

                                            if ($record->province == $value->province_id) {

                                          ?>

                                            <option value="<?= $value->id ?>"

                                                <?php

                                                if (isset($record)) {



                                                  if ($record->district == $value->name) { ?> selected="selected" 

                                                <?php }
                                                } ?>

                                                ><?= $value->name ?></option>

                                        <?php

                                            }
                                          }
                                        }  ?>

                                    </select>



                                    <label id="district-error" class="error" for="district"></label>

                               </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Region</label>

                                      <select class="form-control" id="region" name="region">

                                      

                                        <?php if (empty(($record->region))) { ?>

                                                <option label="Choose Your Region" hidden></option>

                                        <?php } else {

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
                                          }
                                        } ?>

                                    </select>

                                    <label id="region-error" class="error" for="region"></label>

                               </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">City</label>

                                       <select class="form-control" name="city" id="city">

                                        <option label="Select Your City" hidden></option>

                                        <?php

                                        if (empty(($record->city))) { ?>

                                                <option label="Choose Your City" hidden></option>

                                          <?php  } else {

                                          foreach ($city as $key => $value) {

                                            if ($record->province == $value->province_id && $record->district == $value->district_id && $record->region == $value->region_id) {

                                          ?>

                                            <option value="<?= $value->id ?>"

                                                <?php

                                                if (isset($record)) {



                                                  if ($record->city == $value->city) { ?> selected="selected" 

                                                <?php }
                                                } ?>

                                                ><?= $value->city ?></option>

                                        <?php

                                            }
                                          }
                                        } ?>

                                    </select>

                                    <label id="city-error" class="error" for="city"></label>

                               </div>


                                <div class="col-md-6">



                                    <label class="form-control-label">Suburb</label>



                                    <input type="text" placeholder="Enter Your Suburb" class="form-control" name="Suburb" value="<?= (isset($record)) ? $record->Suburb : ''; ?>">

                                    <label id="Suburb-error" class="error" for="Suburb"></label>

                               </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Street name</label>



                                    <input type="text" placeholder="Enter Your Street Name" class="form-control" name="Street_name" value="<?= (isset($record)) ? $record->Street_name : ''; ?>">

                                    <label id="Street_name-error" class="error" for="Street_name"></label>

                               </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Street Number</label>



                                    <input type="text" placeholder="Enter Your Street Number" class="form-control" name="Street_number" value="<?= (isset($record)) ? $record->Street_number : ''; ?>">

                                    <label id="Street_number-error" class="error" for="Street_number"></label>

                               </div> -->
                <div class="col-md-6">
                  <label class="form-control-label">Attach Documents</label>
                  <?php
                  $attach_documents = explode(',', $record->attach_documents);
                  ?>
                  <input type="file" name="attach_documents[]" class="form-control" multiple="">
                  <?php
                  foreach ($attach_documents as $value) {
                  ?>

                    <?php if (!empty($value)) { ?>
                      <img src="<?= BASEURL . 'uploads/training/attach_documents/' . $value ?>" width="50px" height="50px">
                  <?php }
                  } ?>
                </div>
                <div class="col-md-6">
                  <label class="form-control-label">Profile Image</label>
                  <input type="file" name="profile_image" class="form-control">
                </div>
              </div>
              <div class="line"></div>
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

<script type="text/javascript" src="httpS://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>
  $(function() {

    $.validator.addMethod('full_name', function(value, element) {

      // allow any non-whitespace characters as the host part

      return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);

    }, 'Only letters and white space allowed.');

    $.validator.addMethod('email', function(value, element) {

      // allow any non-whitespace characters as the host part

      return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);

    }, 'Please enter a valid email address.');

    $.validator.addMethod('mobile', function(value, element) {

      return this.optional(element) || /^[0-9]{9}$/.test(value);

    }, 'Invalid Mobile Number');

    $.validator.addMethod('landline', function(value, element) {

      return this.optional(element) || /^[0-9]{9}$/.test(value);

    }, 'Invalid Landline Number');



    $('#CreateTraininForm').validate({

      rules: {

        'full_name': {

          required: true,
          full_name : true
          
        },

        'company_name': {

          required: true,
          full_name : true

        },

        'surname': {

          required: true,
          full_name : true

        },

        'email': {

          required: true,
          email : true

        },

        'mobile': {

          required: true,
          mobile : true

        },

        'landline': {

          required: true,
          mobile : true

        },

        'province': {

          required: true,

        },

        'district': {

          required: true,

        },

        'region': {

          required: true,

        },

        'city': {

          required: true,

        },

        'Suburb': {

          required: true,

        },

        'Street_name': {

          required: true,

        },

        'Street_number': {

          required: true,

        },

        'project_id': {

          required: true,

        },



      },

      messages: {

        'full_name': {

          required: 'Please enter your name',

        },

        'company_name': {

          required: 'Please enter your company name',

        },

        'surname': {

          required: 'Please enter your surname name',

        },



        'email': {

          required: 'Please enter your email',

        },

        'mobile': {

          required: 'Please enter your mobile',

        },

        'landline': {

          required: 'Please enter your landline',

        },

        'province': {

          required: 'Please select your province name',

        },

        'district': {

          required: 'Please select your district name',

        },

        'region': {

          required: 'Please select your region',

        },

        'city': {

          required: 'Please select your city',

        },

        'Suburb': {

          required: 'Please enter your Suburb',

        },

        'Street_name': {

          required: 'Please enter your street name',

        },

        'Street_number': {

          required: 'Please enter your street number',

        },

        'project_id': {

          required: 'Please enter your project manager',

        },



      }

    });

    $.validator.setDefaults({

      submitHandler: function(form) {

        form.submit();

      }

    });

  });

  $('.province').change(function() {

    $.ajax({

      url: 'provider-getdestrict',

      data: {
        'value': $('.province').val()
      },

      dataType: 'json',

      type: 'post',

      success: function(data) {

        var option = '';

        $.each(data, function(i, star) {

          if (i == 'error') {

            $('.district_option').html(option);

            $('#district-error').show();

            $('#district-error').html(star);

          } else {

            option += '<option value=' + star.id + '>' + star.name + '</option>'

            $('.district_option').html('<option hidden>Select District</option>' + option);

            $('#district-error').hide();

          }

        });



      }

    });

  });

  $('.district_option').change(function() {

    $.ajax({

      url: 'provider-getregion',

      data: {
        'value': $('.district_option').val()
      },

      dataType: 'json',

      type: 'post',

      success: function(data) {

        var option = '';

        $.each(data, function(i, star) {

          if (i == 'error') {

            $('#region').html(option);

            $('#region-error').show();

            $('#region-error').html(star);

          } else {

            option += '<option value=' + star.id + '>' + star.region + '</option>'

            $('#region').html('<option hidden>Select Region</option>' + option);

            $('#region-error').hide();

          }

        });



      }

    });

  });



  $('#region').change(function() {

    $.ajax({

      url: 'provider-getcity',

      data: {
        'value': $('#region').val()
      },

      dataType: 'json',

      type: 'post',

      success: function(data) {

        var option = '';

        $.each(data, function(i, star) {

          if (i == 'error') {

            $('#city').html(option);

            $('#city-error').show();

            $('#city-error').html(star);

          } else {

            option += '<option value=' + star.id + '>' + star.city + '</option>'

            $('#city').html('<option hidden>Select City</option>' + option);

            $('#city-error').hide();

          }

        });

      }

    });

  });
</script>