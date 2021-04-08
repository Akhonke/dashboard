<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Organisations View</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-striped table-bordered  " style="width:100%">

                            <thead>

                                <tr >

                                    <th>#</th>

                                    <th>Organisation Name</th>

                                    <th>Full Name</th>

                                    <th>Surname</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) { ?>

                                        <tr id="del-<?= $row->id ?>">

                                            <td><?= $i; ?></td>

                                            <td><?= $row->organisation_name; ?></td>

                                            <td><?= $row->fullname; ?></td>

                                            <td><?= $row->surname; ?></td>

                                        </tr>

                                            

                                <?php $i++; } } ?>

                            </tbody>

                        </table>

                    </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>