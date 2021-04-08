<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                           <?php if(!empty($_GET['id'])){
                                $name ="Update";
                           }else{
                                $name ="Add";
                           }?>
                        <h3 class="h6 text-uppercase mb-0"><?= $name; ?> Expense Item</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="CreateExpenseItem" enctype="multipart/form-data">
                            <!-- <div class="line"></div> -->                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h3 class="h6 text-uppercase mb-0"></h3>
                                </div>
                                 <div class="col-md-6">

                                    <label class="form-control-label">Funding ID</label>
                                    <select class="form-control" name="funding_id" id="funding_id">
                                        <option value="">Select Funding Id</option>
                                        <?php foreach($income as $row):?>
                                        <option value="<?php echo $row->funding_id;?>" <?php 
                                                if (isset($record)) {                                   
                                                if($record->funding_id == $row->funding_id){ ?> selected="selected" 
                                            <?php } }?>>
                                            <?php echo $row->funding_id;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6">                                       
                                    <label class="form-control-label">Expense Type</label>
                                    <select class="form-control" name="expense_type" id="expense_type">
                                        <option value="">Select Expense Type</option>
                                        <option value="Tools of trade" <?php if (isset($record)) {  if($record->expense_type){ ?> selected="selected" <?php } } ?>>Tools of trade</option>
                                        <option value="Training Costs" <?php if (isset($record)) { if($record->expense_type){ ?> selected="selected" <?php } } ?>>Training Costs</option>
                                        <option value="Learner Stipends" <?php 
                                                if (isset($record)) { if($record->expense_type){ ?> selected="selected"  <?php } }?> >Learner Stipends</option>
                                        <option value="Protective clothing" <?php if (isset($record)) { if($record->expense_type){ ?> selected="selected" <?php } } ?>>Protective clothing</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-control-label">Expense Name</label>
                                    <input type="text" placeholder="Enter Your Expense Name" class="form-control expense_name" name="expense_name" value="<?= (isset($record)) ? $record->expense_name : ''; ?>" id="expense_name">
                                    <label id="expense_name-error" class="error" for="expense_name"></label>
                                </div>

                                <div class="col-md-6">

                                    <label class="form-control-label">Expense Amount</label>

                                    <input type="text" placeholder="Enter Your Expense Amount" class="form-control expense_amount" name="expense_amount" value="<?= (isset($record)) ? $record->expense_amount : ''; ?>" id="expense_amount">
                                    <?php if (!empty($this->session->flashdata('error'))) { ?>
                                       <label id="expense_amount-error" class="error" for="expense_amount"><?= $this->session->flashdata('error'); ?></label>
                                    <?php } ?>
                                    <label id="expense_amount-error" class="error" for="expense_amount"></label>
                                </div>                               
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary"><?= $name?></button>
                                    </div>
                                </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
