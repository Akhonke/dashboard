<style>
    input.btn.btn-default {

        padding: 2px 10px !important;

        background: #4680ff;

        margin: 3px;

    }

    .subject-info-arrows.text-center {

        margin: 45px 0 0;

    }

    select.form-control[multiple],
    select.form-control[size] {

        height: 130px;

        border-radius: 3px !important;

    }

    select.form-control[multiple] option:hover {

        background: #4680ff;

        color: #fff;

    }

    /*********************3 jan *************/

    .subject-info-box-1,

    .subject-info-box-2 {

        float: left;

        width: 45%;



        select {

            height: 200px;

            padding: 0;



            option {

                padding: 4px 10px 4px 10px;

            }



            option:hover {

                background: #EEEEEE;

            }

        }

    }



    .subject-info-arrows {

        float: left;

        width: 10%;



        input {

            width: 70%;

            margin-bottom: 5px;

        }

    }

    @media(max-width:767px) {
        .subject-info-box-1,

        .subject-info-box-2 {
            width: 40%;
        }

        .subject-info-arrows {
            width: 20%;
        }
    }
</style>

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">CREATE LEARNERSHIP SUB TYPE</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="sublearnshipform">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
                                        <option value="" hidden>Select Learnership Type Name</option>
                                        <?php
                                        if (!empty($learnership)) {
                                            foreach ($learnership as $key => $learnship) { ?>
                                                <option value="<?= $learnship->id; ?>" <?php if (isset($sublearnship) && $sublearnship->learnship_id == $learnship->id) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            if (isset($_POST['learnship_id']) && $_POST['learnship_id'] == $learnship->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>><?= ucfirst($learnship->name); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Sub Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Sub Type Name" class="form-control" id="sub_type" name="sub_type" value="<?php if (isset($sublearnship)) {
                                                                                                                                                            echo $sublearnship->sub_type;
                                                                                                                                                        } else {
                                                                                                                                                            if (isset($_POST['sub_type'])) {
                                                                                                                                                                echo set_value('sub_type');
                                                                                                                                                            }
                                                                                                                                                        } ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('sub_type') ?></span>
                                </div>
                                <input type="hidden" name="multiple_value" id="multiple_value" />
                                <!-- ************************ -->
                                <div class="col-md-12">
                                    <!-- ************************* -->
                                    <div class="subject-info-box-1">
                                        <label class="form-control-label">All Unit Standards<span style="color:red;font-weight:bold;"> *</span></label>
                                        <select multiple="multiple" id='lstBox1' class="form-control multilistselection">
                                            <?php if (!empty($units)) {
                                                foreach ($units as $key => $unit) {
                                                    if (!empty($sublearnship)) {
                                                        $chkbox = $sublearnship->unit_standard;
                                                        $arr = explode(",", $chkbox);
                                                    }
                                            ?>
                                                    <option data-title="<?= $unit->title; ?>" class="unitype" data-id="<?= $unit->id; ?>" data-price="<?= $unit->total_credits; ?>" value="<?= $unit->id ?>" <?php if (!empty($sublearnship)) {
                                                                                                                                                                                                                    if ((in_array($unit->id, $arr))) {
                                                                                                                                                                                                                        echo 'selected';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    if (isset($_POST['unit_standard']) && $_POST['unit_standard'] == $unit->id) {
                                                                                                                                                                                                                        echo 'selected';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?>><?= ucfirst($unit->title); ?></option>



                                            <?php  }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="subject-info-arrows text-center">
                                        <input type='button' id='btnAllRight' value='>>' class="btn btn-default" /><br />
                                        <input type='button' id='btnRight' value='>' class="btn btn-default" /><br />
                                        <input type='button' id='btnLeft' value='<' class="btn btn-default" /><br />
                                        <input type='button' id='btnAllLeft' value='<<' class="btn btn-default" />
                                    </div>
                                    <div class="subject-info-box-2">
                                        <label class="form-control-label">Selected Unit Standards<span style="color:red;font-weight:bold;"> *</span></label>
                                        <select multiple="multiple" id='lstBox2' class="form-control lstBox2new" name="unit_standard[]">
                                            <?php
                                            if (!empty($sublearnship)) {
                                                $chkbox = $sublearnship->unit_standard;
                                                $arr = explode(",", $chkbox);
                                                foreach ($units as $key => $unit) {
                                                    if (in_array($unit->id, $arr)) {
                                            ?>
                                                        <option data-title="<?= $unit->title; ?>" class="unitype" data-id="<?= $unit->id; ?>" data-price="<?= $unit->total_credits; ?>" value="<?= $unit->id ?>" <?php if (!empty($sublearnship)) {
                                                                                                                                                                                                                        if ((in_array($unit->id, $arr))) {
                                                                                                                                                                                                                            echo 'selected';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        if (isset($_POST['unit_standard']) && $_POST['unit_standard'] == $unit->id) {
                                                                                                                                                                                                                            echo 'selected';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } ?>><?= ucfirst($unit->title); ?></option>



                                            <?php  }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    <label style="display: none" id="unit_standard-error" class="error" for="unit_standard"></label>
                                    <span class='error_validate' style='color:red;'><?= form_error('unit_standard') ?></span>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- ************************************************************** -->
                                <div class="col-md-6">
                                    <label class="form-control-label">Minimum Credits<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Minimum Credits" class="form-control" id="min_credit" name="min_credit" value="<?php if (isset($sublearnship)) {
                                                                                                                                                                    echo $sublearnship->min_credit;
                                                                                                                                                                } else {
                                                                                                                                                                    if (isset($_POST['min_credit'])) {
                                                                                                                                                                        echo set_value('min_credit');
                                                                                                                                                                    }
                                                                                                                                                                } ?>" style="text-indent: -1;pointer-events: none;appearance: auto;">
                                    <span class='error_validate' style='color:red;'><?= form_error('min_credit') ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Total Credits Allocated<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input readonly type="text" placeholder="Enter Your Total Credits Allocated" class="form-control" id="total_credits_allocated" name="total_credits_allocated" value="<?php if (isset($sublearnship)) {
                                                                                                                                                                                                                echo $sublearnship->total_credits_allocated;
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                if (isset($_POST['total_credits_allocated'])) {
                                                                                                                                                                                                                    echo set_value('total_credits_allocated');
                                                                                                                                                                                                                }
                                                                                                                                                                                                            } ?>">

                                    <span class='error_validate' style='color:red;'><?= form_error('total_credits_allocated') ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Facilitator<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control facilitator_id" name="facilitator_id" id="facilitator_id">
                                        <option value="" hidden>Select Facilitator Name</option>
                                        <?php
                                        if (!empty($facilitator)) {
                                            foreach ($facilitator as $key => $facili) { ?>
                                                <option value="<?= $facili['id'] ?>" <?php if (isset($sublearnship) && $sublearnship->facilitator == $facili['id']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $facili['fullname']  ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('facilitator_id') ?></span>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <?= (isset($sublearnship)) ? '<button type="submit" class="btn btn-primary">Update</button>' : '<button type="submit" class="btn btn-primary">Add</button>'; ?>
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