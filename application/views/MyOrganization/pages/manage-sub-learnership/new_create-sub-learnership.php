<!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<style>

.dropdown-submenu {
    position: relative;
}
ul.dropdown-menu.multi-level.show {
    padding: 30px;
}
.dropdown label {
    padding: 15px 0;
}
.dropdown-submenu>.dropdown-menu {
    top: -1px;
    left: 100%;
    margin-top: 0;
    margin-left: 0;
    -webkit-border-radius: 0 6px 6px 0;
    -moz-border-radius: 0 6px 6px 0;
    border-radius: 0 6px 6px 0;
    padding: 0 30px;
    position: fixed;
    bottom:0;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
li.dropdown-submenu{
    padding:0 15px;
}
li.dropdown-submenu:hover {
    background: #ccc;
}
</style>
<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Add Sub Learnership</h3>
                    </div>
                    <div class="card-body">
                        <!-- <form class="form-horizontal" method="post" id="sublearnshipform">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Learnership type name</label>
                                    <select class="form-control" name="learnship_id">
                                        <option value="" disabled>Select Learnership type name</option>
                                        <?php 
                                          if(!empty($learnership)){
                                            foreach ($learnership as $key => $learnship) { ?>
                                            <option value="<?= $learnship->id; ?>" <?php if(isset($sublearnship)&&$sublearnship->learnship_id==$learnship->id){ echo 'selected'; }else{ if(isset($_POST['learnship_id'])&&$_POST['learnship_id']==$learnship->id){ echo 'selected'; }} ?>><?= ucfirst($learnship->name); ?></option>
                                        <?php  } } ?>
                                    </select>
                                    <span class='error_validate' style='color:red;'><?= form_error('learnship_id') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Sub Type Name</label>
                                    <input type="text" placeholder="Enter your sub type name" class="form-control" id="sub_type" name="sub_type" value="<?php if(isset($sublearnship)){echo $sublearnship->sub_type; }else{ if(isset($_POST['sub_type'])){ echo set_value('sub_type'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('sub_type') ?></span>
                                </div>
                                 <input type="hidden" name="multiple_value" id="multiple_value"  />

                                <div class="col-md-6">
                                    <label class="form-control-label">Unit standards</label>
                                     <select class="form-control 3col active" name="unit_standard[]" multiple="multiple" id="multiple">
                                      <?php 
                                          if(!empty($units)){
                                            foreach ($units as $key => $unit) { 
                                                if(!empty($sublearnship)){
                                                  $chkbox= $sublearnship->unit_standard;
                                                  $arr=explode(",",$chkbox);
                                                }
                                                 ?>
                                            <option  class="unitype" data-id="unittype-<?= $unit->id; ?>" data-price="<?= $unit->total_credits; ?>" value="<?= $unit->id ?>" <?php if(!empty($sublearnship)){ if((in_array($unit->id,$arr))){  echo 'selected'; }}else{ if(isset($_POST['unit_standard'])&&$_POST['unit_standard']==$unit->id){ echo 'selected'; }} ?>><?= ucfirst($unit->title); ?></option>
                                        <?php  } } ?>
                                    </select>
                                    <label id="unit_standard-error" class="error" for="unit_standard"></label>
                                  <span class='error_validate' style='color:red;'><?= form_error('unit_standard') ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">Minimum Credits</label>
                                    <input type="text"  class="form-control" id="min_credit" name="min_credit" value="<?php if(isset($sublearnship)){echo $sublearnship->min_credit; }else{ if(isset($_POST['min_credit'])){echo set_value('min_credit'); }} ?>" readonly>
                                    <span class='error_validate' style='color:red;'><?= form_error('min_credit') ?></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">Total Credits allocated</label>
                                    <input type="text" placeholder="Enter your total credits allocated" class="form-control" id="total_credits_allocated" name="total_credits_allocated" value="<?php if(isset($sublearnship)){echo $sublearnship->total_credits_allocated; }else{ if(isset($_POST['total_credits_allocated'])){echo set_value('total_credits_allocated'); }} ?>">
                                    <span class='error_validate' style='color:red;'><?= form_error('total_credits_allocated') ?></span>
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

                        </form> -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <a id="dLabel" role="button" data-toggle="dropdown" class="form-control"
                                        data-target="#" >
                                        Dropdown <i class="fas fa-sort-down" style="float:right"></i>
                                    </a>
                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                        <li class="dropdown-submenu">
                                            <label tabindex="-1" href="#"><input type="checkbox">  options1 &nbsp; &nbsp; <i class="fas fa-caret-right"></i></label>
                                            <ul class="dropdown-menu">
                                                <li><label tabindex="-1" href="#">Second level1</label></li>
                                                <li><label href="#">Second level2</label></li>
                                                <li><label href="#">Second level3</label></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <label tabindex="-1" href="#"><input type="checkbox">  options2 &nbsp; &nbsp; <i class="fas fa-caret-right" ></i></label>
                                            <ul class="dropdown-menu">
                                                <li><label tabindex="-1" href="#">Second level4</label></li>
                                                <li><label href="#">Second level5</label></li>
                                                <li><label href="#">Second level6</label></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <label tabindex="-1" href="#"><input type="checkbox"> options3 &nbsp; &nbsp; <i class="fas fa-caret-right" ></i></label>
                                            <ul class="dropdown-menu">
                                                <li><label tabindex="-1" href="#">Second level7</label></li>
                                                <li><label href="#">Second level8</label></li>
                                                <li><label href="#">Second level9</label></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <label tabindex="-1" href="#"><input type="checkbox">  options4 &nbsp; &nbsp; <i class="fas fa-caret-right" ></i></label>
                                            <ul class="dropdown-menu">
                                                <li><label tabindex="-1" href="#">Second level</label></li>
                                                <li><label href="#">Second level</label></li>
                                                <li><label href="#">Second level</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>

</script>