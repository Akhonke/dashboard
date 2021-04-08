<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Drop Out List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Learner Name</th>
                                    <th>Learner Surname</th>
                                    <th>Learner Id Number</th>
                                    <th>Learner Class Name</th>
                                    <th>Learnership Sub Type</th>
                                    <th>Replacement Learner Details</th>
                                    <th>Date of Resignation</th>
                                    <th>Reason For Dropping Out</th>
                                    <th>Attachments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!empty($record)) {
                                        $i = 1;
                                        foreach ($record as $key => $row) { ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row->learner_name; ?></td>
                                            <td><?= $row->learner_surname; ?></td>
                                            <td><?= $row->learner_id_number; ?></td>
                                            <td><?= $row->learner_classname; ?></td>
                                            <td><?=  $row->learnership_sub_type; ?></td>
                                            <td><?=  $row->replacement_learner_details; ?></td>
                                            <td><?= $row->date_of_resignation; ?></td>
                                            <td><?= $row->reason_for_dropping_out; ?></td>
                                            <td>
                                            <?php if(!empty($row->attachments)){ ?> 
                                               <a href="<?= BASEURL .'uploads/learner/drop_out/'.$row->attachments ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                                            <?php } 
                                            ?>
                                            </td>
                                        </tr>
                                <?php $i++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>