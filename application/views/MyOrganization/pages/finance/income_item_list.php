

<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">Income Item List</h3>



                    </div>



                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Project Manager</th>

                                        <th>Date</th>

                                        <th>Amount</th>

                                        <th>Payer</th>

                                        <th>Description</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 

                                    if (!empty($record)) { 

                                        $i = 0;

                                        foreach ($record as $key => $value) { 

                                            $project = $this->common->accessrecord('project_manager', [], ['id'=>$value->project_id], 'row');

                                            $project_nm = $project?$project->project_manager:"";

                                         $i++; ?>

                                            <tr id="del-<?= $value->id ?>">

                                                <td><?= $i ?></td>

                                                <td><?= $project_nm ?></td>

                                                <td><?= $value->date ?></td>

                                                <td><?='R ' . $value->amount ?></td> 

                                                <td><?= $value->payer ?></td>

                                                <td><?= $value->description ?></td>

                                            </tr>

                                    <?php } } ?>

                            </table>

                        </div>

                        <div class="btn btn-info">Total Income : <?php 

                               if(!empty($count)){

                                echo $count->total_income_amount;

                                }else{

                                 echo "0";

                                } 

                            ?>

                        </div>

                    </div>



                </div>



            </div>

            <div class="col-lg-3 mb-1"></div>

        </div>



    </section>



</div>