<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <?php if(!empty($_GET['id'])){
                           $name = 'Update';
                        }else{
                           $name = "Add";
                        } ?>
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0"><?= $name ;?> Stipend</h3>
                    </div>
                    <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                    <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data"
                            id="CreateStipendForm">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Learner Name</label>
                                    <select class="form-control" name="learner_id">
                                        <?php if(empty($_GET['id'])){ ?>
                                        <option label="Select Learner"></option>
                                        <?php }
                                         foreach ($learner as $key => $value) { ?>
                                        <option value="<?= $value->id ?>" <?php 
                                                if (isset($record)) {
                                                if($record->learner_id == $value->id){ ?> selected="selected"
                                            <?php } }?>><?= $value->first_name ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <label id="learner_id-error" class="error" for="learner_id"></label>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-control-label">Date</label>
                                    <input type="date" placeholder="Enter Date" name="date" class="form-control"
                                        value="<?= (isset($record)) ? $record->date : ''; ?>">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-control-label">Amount</label>
                                    <input type="text" placeholder="Enter Amount" name="amount"
                                        class="form-control" value="<?= (isset($record)) ? $record->amount : ''; ?>">
                                </div>
                                
                                
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary"><?= $name?></button>
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