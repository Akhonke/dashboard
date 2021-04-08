

<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">Learnship Sub List</h3>



                    </div>



                    <div class="card-body">

                    <div class="table-responsive">



                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Learnship Name</th>

                                    <th>Sub Learnship</th>

                                    <th>Unit Standard</th>

                                    <th>Min Credit</th>

                                    <th>Total Credits Allocated</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($learnershipSubType)) { $i = 0;

                                    foreach ($learnershipSubType as $key => $learnSub) {  $i++; 

                                         

                                        ?>

                                        <tr id="del-<?= $learnSub->id ?>">

                                            <td><?= $i ?></td>

                                            <td><?= $learnSub->learnship_name ?></td>

                                            <td><?= $learnSub->sub_type ?></td>

                                            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#unitname-<?php echo $learnSub->id ;?>">View Unit Standard</button>

                                            

                                            <td><?= $learnSub->min_credit ?></td>

                                            <td><?= $learnSub->total_credits_allocated ?></td>

                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="All-create-sub-learnership?sublearnid=<?= $learnSub->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deletedataLearnerShipType('learnership_sub_type&behalf','id','<?= $learnSub->sub_type?>','<?= $learnSub->id?>')"><i

                                                        class="fa fa-trash"></i></a>

                                            </td>

                                        </tr>

                                        <div class="modal fade" id="unitname-<?php echo $learnSub->id ;?>" role="dialog">

                                            <div class="modal-dialog">

                                             <!-- Modal content-->

                                              <div class="modal-content">

                                                <div class="modal-header">

                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                  <h4 class="modal-title">Unit Standard</h4>

                                                </div>

                                                <div class="modal-body">

                                                 <ul id="unitul" class="unit-cls">

                                                    <?php if(!empty($learnSub->id)){

                                                        $exp = explode(',',$learnSub->unit_name);

                                                        $unit_standard = $learnSub->unit_standard;

                                                        $unitstandard = explode(',', $unit_standard);

                                                        foreach ($unitstandard as $key => $value) {

                                                           $unit_id = $value;

                                                         $units = $this->common->accessrecord('units',[],['id'=>$unit_id],'result');

                                                        if(!empty($units)){

                                                        foreach ($units as  $value_two) {

                                                    ?>

                                                     <li id="unitname" class="unitnm-cls"><?= $value_two->title."-".$value_two->standard_id."-".$value_two->unit_standard_type; ?></li>

                                                   <?php } }else{ 

                                                        echo "Unit Standard Not Available";  

                                                        } 

                                                      }

                                                     }

                                                   ?>

                                                </ul>

                                                </div>

                                                <div class="modal-footer">

                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                </div>

                                              </div>

                                            </div>

                                        </div>

                                <?php } } ?>

                            </tbody>

                        </table>



                    </div>

                    </div>



                </div>



            </div>

        </div>



    </section>



</div>









