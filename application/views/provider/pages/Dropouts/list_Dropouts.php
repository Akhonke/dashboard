<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">List of Learner Dropouts</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Serial No.</th>

                                    <th>Learner ID</th>

                                    <th>Learner Name</th>

                                    <th>Learner Surname</th>

                                    <th>Reason For Leaving</th>

                                    <th>Registration Letter</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($drop_out)) {

                                        $i = 1;

                                        foreach ($drop_out as $key => $row) { 

                                            $learner = $this->common->accessrecord('learner',[],['id'=>$row->learner_id],'row');

                                            if((!empty($learner->surname)) &&(!empty($learner->first_name))){

                                            $learner_name = $learner->first_name;
                                            $learner_surname = $learner->surname;
                                            }else{

                                                $learner_name = "";  
                                                $learner_surname = "";
                                            }
                                            ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $row->learner_id; ?></td>

                                            <td><?= $learner_name; ?></td>

                                            <td><?= $learner_surname; ?></td>

                                            <td><?=  $row->reason_for_dropping_out; ?></td>

                                            <td><button class="btn btn-sm btn-info"><a href="<?=base_url('uploads/learner/drop_out/')?><?= $row->attachments; ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>Download</a></button></td>

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