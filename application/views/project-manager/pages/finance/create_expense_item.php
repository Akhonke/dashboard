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

                            $name = "Capture New";
                        } ?>

                        <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Expense </h3>

                    </div>

                    <?php

                    if (!empty($this->session->flashdata('error'))) { ?>

                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>

                    <?php } ?>

                    <div class="card-body">

                        <form class="form-horizontal" method="post" id="CreateExpenseItem" enctype="multipart/form-data">

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
                                        <?php
                                        if (!empty($learnership_sub)) {
                                            foreach ($learnership_sub as $key => $sublearnship) { ?>
                                                <option value="<?= $sublearnship->id; ?>" <?php if (isset($record) && $record->learnershipSubType == $sublearnship->id) {
                                                                                            echo 'selected';
                                                                                        } else {
                                                                                            if (isset($_POST['learnershipSubType']) && $_POST['learnershipSubType'] == $sublearnship->id) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        } ?>><?= ucfirst($sublearnship->sub_type); ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <label id="learnershipSubType-error" class="error" for="learnershipSubType"></label>
                                </div>


                           

                                <div class="col-md-6">

                                    <label class="form-control-label">Expense Type<span style="color:red;font-weight:bold;"> *</span></label>

                                    <select class="form-control" name="expense_type" id="expense_type">

                                        <option value="" hidden>Select Expense Type</option>

                                        <option value="Tools of trade" <?php if (isset($record)) {
                                                                            if ($record->expense_type) { ?> selected="selected" <?php }
                                                                                                                                                } ?>>Tools of trade</option>

                                        <option value="Training Costs" <?php if (isset($record)) {
                                                                            if ($record->expense_type) { ?> selected="selected" <?php }
                                                                                                                                                } ?>>Training Costs</option>

                                        <option value="Learner Stipends" <?php

                                                                            if (isset($record)) {
                                                                                if ($record->expense_type) { ?> selected="selected" <?php }
                                                                                                                } ?>>Learner Stipends</option>

                                        <option value="Protective clothing" <?php if (isset($record)) {
                                                                                if ($record->expense_type) { ?> selected="selected" <?php }
                                                                                                                                                    } ?>>Protective clothing</option>



                                    </select>

                                </div>

                                <div class="col-md-6">



                                    <label class="form-control-label">Expense Name<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="text" placeholder="Enter Your Expense Name" class="form-control expense_name" name="expense_name" value="<?= (isset($record)) ? $record->expense_name : ''; ?>" id="expense_name">

                                    <label id="expense_name-error" class="error" for="expense_name"></label>

                                </div>



                                <div class="col-md-6">



                                    <label class="form-control-label">Expense Amount<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="number" placeholder="Enter Your Expense Amount" class="form-control expense_amount" name="expense_amount" value="<?= (isset($record)) ? $record->expense_amount : ''; ?>" id="expense_amount">

                                    <?php if (!empty($this->session->flashdata('msg'))) { ?>

                                        <label id="expense_amount-error" class="error" for="expense_amount"><?= $this->session->flashdata('msg'); ?></label>

                                    <?php } ?>

                                    <label id="expense_amount-error" class="error" for="expense_amount"></label>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Date Of Expense Item<span style="color:red;font-weight:bold;"> *</span></label>

                                    <input type="date" placeholder=" Enter Your Date Of Expense Item" class="form-control date" name="date" value="<?= (isset($record)) ? $record->date : ''; ?>" id="date">

                                    <label id="date-error" class="error" for="date"></label>

                                </div>


                                <div class="col-md-12">

                                    <div class="text-center" style="margin-top:30px;">

                                        <button type="submit" class="btn btn-primary"><?= $name ?></button>

                                    </div>

                                </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>