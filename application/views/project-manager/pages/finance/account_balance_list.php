<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Cashflow Report</h3>
                    </div>
                    <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Total Income Item</th>

                                    <th>Total Expense Item</th>

                                    <th>Remaining Amount</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($record)) { 

                                    $i = 0;

                                    foreach ($record as $key => $value) { 

                                        if((!empty($value->total_income))&&(!empty($value->expense_amount))){

                                           $remaining_amount = $value->total_income-$value->expense_amount;

                                        }else{

                                             $remaining_amount = "0";

                                        }

                                    $i++;

                                    ?>

                                        <tr>

                                            <td><?= $i ?></td>

                                            <td><?php if (!empty($value->total_income)) { ?><a href="projectmanager-income-item-list?id=<?= $value->project_id ?>" class="btn btn-info btn-sm"><?= 'R  '.$value->total_income ?></a><?php } ?></td>

                                            <td><?php if (!empty($value->expense_amount)) { ?><a href="projectmanager-expense-item-list?id=<?= $value->expense_project_id ?>" class="btn btn-info btn-sm"><?= 'R  '.$value->expense_amount ?></a><?php } ?></td> 

                                            <td><?= 'R  '.$remaining_amount ?></td>

                                        </tr>

                                <?php } } ?>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-1"></div>
        </div>
    </section>
</div>