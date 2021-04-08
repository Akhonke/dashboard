

<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">Expense Item List</h3>



                    </div>



                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Project Manager</th>

                                    <th>Expense ID</th>

                                    <th>Expense Type</th>

                                    <th>Expense Name</th>

                                    <th>Expense Amount</th>

                                    <th>Date of Expense</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($data)) { $i = 0;

                                    foreach ($data as $key => $value) {

                                        $project = $this->common->accessrecord('project_manager', [], ['id'=>$value->project_id], 'row');

                                        $project_nm = $project?$project->project_manager:"";



                                        $i++; ?>

                                        <tr id="del-<?= $value->id ?>">

                                            <td><?= $i ?></td>

                                            <td><?= $project_nm ?></td>

                                            <td><?= $value->expense_id ?></td>

                                            <td><?= $value->expense_type ?></td> 

                                            <td><?= $value->expense_name ?></td>

                                            <td><?='R ' . $value->expense_amount ?></td>

                                            <td><?= $value->date ?></td>

                                        </tr>

                                <?php } } ?>

                        </table>

                    </div>

                    <div class="btn btn-info">Total Expense : <?php 

                               if(!empty($count)){

                                echo $count->total_expense_amount;

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