<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Our Customers Logo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
</div>
<div class="col-xl-12 col-md-12">
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Our Customers Logo</h6>
            <a href="<?=base_url('superAdmin-our-customer-logo-list')?>" class="ms-text-primary">List</a>
        </div>
        <div class="ms-panel-body">
            <form class="needs-validation" method="post" enctype="multipart/form-data">
               
               
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Logo</label>
                        <div class="custom-file">
                        	<input type="hidden" name="a" value="a">
                            <input type="file" class="custom-file-input"  name="Customerslogo">
                            <label class="custom-file-label" >Choose file...</label>
                            <?php echo form_error('Customerslogo', '<div class="error" style="color:red;">', '</div>'); ?>
                             
                        </div>
                    </div>
                    
                </div>
               

                    <!-- <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button> -->
                    <button class="btn btn-primary mt-4 ml-2 d-inline w-20" type="submit">UPLOAD</button>
            </form>
        </div>
    </div>
</div