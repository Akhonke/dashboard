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

                        <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Capture Income</h3>

                    </div>

                    <?php

                    if (!empty($this->session->flashdata('error'))) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" id="CreateIncomeItem" enctype="multipart/form-data">

                            <!-- <div class="line"></div> -->

                            <div class="form-group row">

                                <div class="col-md-12">

                                    <h3 class="h6 text-uppercase mb-0"></h3>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Learnership Type Name<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control learnship_id" name="learnship_id" id="learnship_id">
                                        <option value="" hidden>Select Learnership Type Name</option>
                                        <?php
                                        if (!empty($learnership)) {
                                            foreach ($learnership as $key => $learnship) { ?>
                                                <option value="<?= $learnship->id; ?>" <?php if (isset($record) && $record->learnship_id == $learnship->id) {
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
                                    <label class="form-control-label">Learnership Sub Type<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control learnership_sub_type_id" name="learnershipSubType" id="learnership_sub_type_id">
                                        <option value="" hidden>Select Learnership Sub Type Name</option>
                                    </select>
                                    <label id="learnership_sub_type_id-error" class="error" for="learnership_sub_type_id"></label>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-control-label">Date Received<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder=" Enter Your Date" class="form-control date" name="date" value="<?= (isset($record)) ? $record->date : ''; ?>" id="date">

                                    <label id="date-error" class="error" for="date"></label>

                                </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Amount Received<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="number" placeholder="Enter Your amount" class="form-control amount" name="amount" value="<?= (isset($record)) ? $record->amount : ''; ?>" id="amount">

                                    <label id="amount-error" class="error" for="amount"></label>

                                </div>



                                <div class="col-md-6">



                                    <label class="form-control-label">Source Of Funds<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="text" placeholder="Source Of Funds" class="form-control payer" name="payer" value="<?= (isset($record)) ? $record->payer : ''; ?>" id="payer">

                                    <label id="payer-error" class="error" for="payer"></label>

                                </div>



                                <div class="col-md-12">



                                    <label class="control-label" for="description">Description</label>



                                    <textarea name="description" id="description" rows="10" cols="80"><?= (isset($record)) ? $record->description : ''; ?></textarea>

                                </div>

                                <div class="col-md-12">

                                    <div class="text-center">

                                        <button type="submit" class="btn btn-primary mt-5"><?= $name ?></button>

                                    </div>

                                </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>