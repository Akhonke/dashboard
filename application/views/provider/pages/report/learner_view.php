<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row"><!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Learners View</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-responsive" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Training Provider</th>

                                        <th>Full name</th>

                                        <th>Surname</th>

                                        <th>Email</th>

                                        <th>Mobile</th>

                                        <th>Other Mobile</th>

                                        <th>ID Number</th>

                                        <th>SETA</th>

                                        <th>Province</th>

                                        <th>District</th>

                                        <th>City</th>

                                        <th>Region</th>

                                        <th>Suburb</th>

                                        <th>Street name</th>

                                        <th>Street number</th>

                                        <th>Learnership Sub Type</th>

                                        <th>Gender</th>

                                        <th>Learner Accepted Training</th>

                                        <th>Assessment</th>

                                        <th>Disable</th>

                                        <th>U.I.F Beneficiary</th>
                                       
                                        <th>Reason</th>

                                        <th>Class Name</th>

                                        <th>I.D.Copy</th>

                                        <th>Certificate Copy</th>

                                        <th>Contract Copy</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 

                                    if(!empty($record)){

                                        $i = 0;

                                        foreach ($record as $key => $row) {

                                            foreach ($row as $value) {

                                         $i++;

                                    ?>

                                    <tr id="del-<?= $value->id ?>">

                                        <td><?= $i ?></td>

                                        <td><?= $value->trining_provider ?></td>

                                        <td><?= $value->first_name ?></td>

                                        <td><?= $value->surname ?></td>

                                        <td><?= $value->email ?></td>

                                        <td><?='+27-'.$value->mobile ?></td>

                                        <td><?= '+27-'.$value->mobile_number ?></td>

                                        <td><?= $value->id_number ?></td>

                                        <td><?= $value->SETA ?></td>

                                        <td><?= $value->province ?></td>

                                        <td><?= $value->district ?></td>

                                        <td><?= $value->city ?></td>

                                        <td><?= $value->region ?></td>

                                        <td><?= $value->Suburb ?></td>

                                        <td><?= $value->Street_name ?></td>

                                        <td><?= $value->Street_number ?></td>

                                        <td><?= $value->learnershipSubType ?></td>

                                        <td><?= $value->gender ?></td>

                                        <td><?= $value->learner_accepted_training ?></td>

                                        <td><?= $value->assessment ?></td>

                                        <td><?= $value->disable ?></td>

                                        <td><?= $value->utf_benefits ?></td>

                                        

                                        <td><?= $value->reason ?></td>

                                        <td><?= $value->classname ?></td>

                                        <td>  

                                            <?php if(!empty($value->id_copy)){ ?>

                                                <img src="<?= BASEURL .'uploads/learner/id_copy/'.$value->id_copy ?>"

                                                    width="50px" height="50px">

                                                <?php } ?>

                                        </td>

                                        <td>  

                                            <?php if(!empty($value->certificate_copy)){ ?>

                                            <img src="<?= BASEURL .'uploads/learner/certificate_copy/'.$value->certificate_copy ?>"

                                                width="50px" height="50px">

                                            <?php } ?>

                                        </td>

                                        <td>  

                                            <?php if(!empty($value->contract_copy)){ ?>

                                            <img src="<?= BASEURL .'uploads/learner/contract_copy/'.$value->contract_copy ?>"

                                                width="50px" height="50px">

                                            <?php } ?>

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