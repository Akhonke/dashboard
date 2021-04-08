<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Learner List</h3>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Othor Mobile</th>
                                    <th>TD number</th>
                                    <th>SETA</th>
                                    <th>Province</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Region</th>
                                    <th>Suburb</th>
                                    <th>Street name</th>
                                    <th>Street number</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 if(!empty($learner)){ 
                                ?>
                                <tr>
                                    <td>1</td>
                                    <td><?= $learner->first_name ?></td>
                                    <td><?= $learner->surname ?></td>
                                    <td><?= $learner->email ?></td>
                                    <td><?= $learner->mobile ?></td>
                                    <td><?= $learner->mobile_number ?></td>
                                    <td><?= $learner->id_number ?></td>
                                    <td><?= $learner->SETA ?></td>
                                    <td><?= $learner->province ?></td>
                                    <td><?= $learner->district ?></td>
                                    <td><?= $learner->city ?></td>
                                    <td><?= $learner->region ?></td>
                                    <td><?= $learner->Suburb ?></td>
                                    <td><?= $learner->Street_name ?></td>
                                    <td><?= $learner->Street_number ?></td>
                                    <td><?= $learner->gender ?></td>
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