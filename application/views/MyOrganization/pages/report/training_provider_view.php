<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Training Providers View</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Training Company</th>

                                        <th>Full Name</th>

                                        <th>Surname</th>

                                        <th>Project Manager</th>

                                        <th>Email</th>

                                        <th>Number</th>

                                        <th>Landline</th>

                                        <th>Province</th>

                                        <th>District</th>

                                        <th>Region</th>

                                        <th>City</th>

                                        <th>Suburb</th>

                                        <th>Street Name</th>

                                        <th>Street Number</th>

                                        <th>Attach Documents</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 

                                        if (!empty($record)) {

                                            $i = 0;

                                            foreach ($record as  $row) {

                                                foreach ($row as $value) {

                                                 $project =$this->common->accessrecord('project_manager', [], ['id'=>$value->project_id], 'row');

                                                if(!empty($project)){

                                                    $project_manager =$project->project_manager;

                                                }else{

                                                  $project_manager = "";

                                                }

                                            $i++;

                                    ?>

                                        <tr id="del-<?= $value->id ?>">

                                            <td><?= $i ?></td>

                                            <td><?= $value->company_name ?></td>

                                            <td><?= $value->full_name ?></td>

                                            <td><?= $value->surname ?></td>

                                            <td><?= $project_manager ?></td>

                                            <td><?= $value->email ?></td>

                                            <td><?=  "+27-".$value->mobile ?></td>

                                            <td><?=  "+27-".$value->landline ?></td>

                                            <td><?= $value->province ?></td>

                                            <td><?= $value->district ?></td>

                                            <td><?= $value->region ?></td>

                                            <td><?= $value->city ?></td>

                                            <td><?= $value->Suburb ?></td>

                                            <td><?= $value->Street_name ?></td>

                                            <td><?= $value->Street_number ?></td>

                                            <td><?php if(!empty($value->attach_documents)){     $attach_documents = explode(',',$value->attach_documents);

                                                  foreach($attach_documents as $values){ 

                                                if(!empty($value)){

                                             ?>

                                            <img src="<?= BASEURL .'uploads/training/attach_documents/'.$values ?>"

                                                width="50px">

                                            <?php } } } ?>

                                            </td>

                                       </tr>

                                    <?php

                                        } } }

                                     ?>

                                </tbody>

                            </table>

                        </div>

                    </div> 

                </div>

            </div>

        </div>

    </section>

</div>