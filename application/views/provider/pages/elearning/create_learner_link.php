<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <?php
                        //  if (!empty($_GET['id'])) {

                        //     $name = 'Update';
                        // } else {

                        //     $name = "CEATE A NEW";
                        // }
                        ?>

                        <h3 class="h6 text-uppercase mb-0" style="display: inline-block;">Create Live Class</h3>


                        <button type="submit" class="btn btn-primary" style="float: right;background: radial-gradient(circle, rgba(138,214,226,1) 0%, rgba(32,188,213,1) 100%);color: #fff;box-shadow: 0 4px 12px #00000029;"> <a target="_blank" href="<?php echo BIG_BLUE_SIGNIN; ?>" style="color: #fff">Create Class Link</a></button>
                    </div>

                    <?php

                    if (!empty($this->session->flashdata('error'))) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>



                    <div class="card-body">

                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateClassForm">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-6">

                                    <label class="form-control-label">Trainer Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="type" name="trainer_id" value="<?= $training->company_name ?>" class="form-control class_name" readonly>

                                    <input type="hidden" name="trainer_id" value="<?= $training->id ?>">



                                </div>


                                <div class="col-md-6">
                                    <label class="form-control-label">Class Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control facilitator" name="class_id" id="class_id">
                                        <option value="">Select Class</option>
                                        <?php
                                        if (!empty($classrecord)) {
                                            foreach ($classrecord as $key => $class) { ?>
                                                <option value="<?= $class->id; ?>" <?php if (isset($_POST['class_id']) && $_POST['class_id'] == $class->id) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>><?= ucfirst($class->class_name); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('class_id') ?></span>
                                </div>



                                <div class="col-md-6">
                                    <label class="form-control-label"> Date</label>
                                    <input type="date" placeholder="" name="date" class="form-control" value="" id="date">
                                    <span class='error_validate' style='color:red;'><?= form_error('date') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Time</label>
                                    <input type="time" placeholder="" name="time" class="form-control" value="" id="time">
                                    <span class='error_validate' style='color:red;'><?= form_error('time') ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label"> Mobile</label>
                                    <input type="Number" placeholder="Enter your Number" name="mobile" class="form-control" value="" id="mobile">
                                    <span class='error_validate' style='color:red;'><?= form_error('mobile') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Email</label>
                                    <input type="text" placeholder="Enter Your Email ID" name="email" class="form-control" value="" id="email">
                                    <span class='error_validate' style='color:red;'><?= form_error('email') ?></span>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-control-label">Link URL<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="url" placeholder="Enter your Link" name="link" class="form-control" value="" id="link" required>
                                    <span class='error_validate' style='color:red;'><?= form_error('link') ?></span>
                                </div>

                                <div class="line"></div>


                            </div>
                            <div class="form-group row">

                                    <div class="col-md-12">

                                        <div class="text-center">

                                            <button type="submit" class="btn btn-primary">Save</button>

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
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
    $(function() {

        $('#CreateClassForm').validate({


            rules: {

                /* 'trainer_id':{

                   required: true,

                 },*/

                class_id: {

                    required: true,

                },

                date: {

                    required: true,

                },
                time: {

                    required: true,

                },

                mobile: {

                    required: true,

                },

                email: {

                    required: true,

                },

                link: {

                    required: true,

                }



            },

            messages: {

                /* 'trainer_id':{

                   required: 'Please select your training provider',

                 },*/

                class_id: {

                    required: 'Please select your Class',

                },

                date: {

                    required: 'Please enter your Date',

                },

                time: {

                    required: 'Please select your Time',

                },

                mobile: {

                    required: 'Please enter your Mobile Number',

                },
                email: {

                    required: 'Please select your Email ID',

                },

                link: {

                    required: 'Please enter your class Link',

                }


            }

        });

        $.validator.setDefaults({

            submitHandler: function(form) {

                form.submit();

            }

        });

    });
</script>