<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="<?=base_url('superAdmin-dashboard')?>"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
        </ol>
    </nav>
</div>
<div class="col-xl-12 col-md-12">
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Add Coupon</h6>
            <a href="<?=base_url('superAdmin-couponList')?>" class="ms-text-primary">Coupon Add</a>
        </div>
        <div class="ms-panel-body">
            <form class="needs-validation" method="post">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom001">Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="validationCustom001" value="<?php echo set_value('name'); ?>" placeholder="Enter Coupon Name" >
                           
                        </div>
                         <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom002">Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationCustom002" name="code"  value="<?php echo set_value('code'); ?>"placeholder="Enter Coupon Code" >

                        </div>
                        <?php echo form_error('code', '<div class="error">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <label for="validationCustom004">Discount</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="discount" id="validationCustom004" value="<?php echo set_value('discount'); ?>" placeholder="Discount" >

                        </div>
                        <?php echo form_error('discount', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="validationCustom005">Limit</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="limits" id="validationCustom005" value="<?php echo set_value('limits'); ?>" placeholder="Enter Total Limit" >

                        </div>
                        <?php echo form_error('limits', '<div class="error">', '</div>'); ?>
                    </div>
                    <div class="col-md-4 mb-2">
                    <!--    <label for="validationCustom005">Used</label>-->
                    <!--    <div class="input-group">-->
                    <!--        <input type="text" class="form-control" id="validationCustom005" placeholder="" >-->

                    <!--    </div>-->
                    </div>


                    <!-- <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button> -->
                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div