<style type="text/css">

    .error_validate p{

        margin-bottom: 0;

    }

</style>

<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->



            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">Create New District</h3>



                    </div>



                    <div class="card-body">



                        <form class="form-horizontal" method="post" id="CreateDistrictForm">



                            <!-- <div class="line"></div> -->



                            <div class="form-group row">



                                <div class="col-md-6">



                                    <label class="form-control-label">Province<span style="color:red;font-weight:bold;"> *</span></label>



                                    <!-- <input type="text" placeholder="Enter Province" class="form-control"> -->



                                    <select placeholder="Enter Your Province" class="form-control" name="province_id" id="province_id">

                                         <option value="" hidden>Choose Your Province</option>

                                        <?php 

                                            foreach ($province as $key => $value) {

                                        ?>

                                            <option value="<?= $value->name ?>" 

                                                <?php if (isset($record)) {

                                                     if($record->province_id == $value->name){ ?> selected="selected" <?php } }?>



                                            ><?= $value->name ?></option>

                                        <?php

                                            }

                                         ?>

                                        



                                    </select>

                                    <label id="province_id-error" class="error" for="province_id"></label>

                                </div>



                                <div class="col-md-6">

                                    <label class="form-control-label">District<span style="color:red;font-weight:bold;"> *</span></label>



                                    <input type="text" placeholder="Enter Your District" class="form-control" name="name" value="<?php if(isset($record)){ echo $record->name; } ?>">

                                    <label id="name-error" class="error" for="name"></label>

                                </div>



                            </div>



                            <div class="line"></div>



                            <div class="form-group row">



                                <div class="col-md-12">



                                    <div class="text-center">



                                        

                                        <?php 

                                            if (!empty($_GET)) {

                                        ?>

                                            <button type="submit" class="btn btn-primary">Update</button>

                                        <?php

                                            }else{

                                         ?>

                                            <button type="submit" class="btn btn-primary">Add</button>

                                         <?php 

                                            }

                                          ?>

                                        <!-- <button type="submit" class="btn btn-secondary">Cancel</button> -->



                                    </div>



                                </div>



                            </div>



                        </form>



                    </div>



                </div>



            </div>



        </div>



    </section>







    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->



            <div class="col-lg-12 ">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">District List</h3>



                    </div>



                    <div class="card-body">

                    <div class="table-responsive">



                        <table class="table table-striped table-bordered" style="width:100%">



                            <thead>



                                <tr>



                                    <th>S. No.</th>



                                    <th>Province</th>



                                    <th>District</th>



                                    <th>Action</th>



                                </tr>



                            </thead>



                            <tbody>

                                <?php 

                                $i = 0;

                                    foreach ($District as $key => $value) {

                                        $i++;

                                ?>

                                    <tr id="del-<?= $value->id ?>">

                                        <td><?= $i ?></td>

                                        <td><?= $value->p_name ?></td>

                                        <td><?= $value->name ?></td>

                                        <td>

                                            <a href="<?= current_url()."?id=".$value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                             <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deletedataDistrict('district&behalf','id','<?= $value->p_name ?>')"><i

                                                        class="fa fa-trash"></i></a>

                                           

                                        </td>

                                    </tr>

                                <?php    

                                    }

                                 ?>

                                

                        </table>



                    </div>

                    </div>



                </div>



            </div>



        </div>



    </section>



</div>