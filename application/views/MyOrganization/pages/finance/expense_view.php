
<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Expense Item View</h3>

                    </div>

                    <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Funding ID</th>
                                    <th>Expense Type</th>
                                    <th>Expense Name</th>
                                    <th>Expense Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (!empty($record)) {
                                    $i = 0;
                                    foreach ($record as $key => $value) {
                                      $i++; ?>
                                        <tr id="del-<?= $value->id ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $value->funding_id ?></td>
                                            <td><?= $value->expense_type ?></td> 
                                            <td><?= $value->expense_name ?></td>
                                            <td><?= $value->expense_amount ?></td>
                                        </tr>
                                <?php }  } ?>
                        </table>

                    </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-3 mb-1"></div>
        </div>

    </section>

</div>