<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Stipends List</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S. No.</th>

                                    <th>Learner Name</th>

                                    <th>Training Provider</th>

                                    <th>Date</th>

                                    <th>Amount</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) { 

                                            $learner = $this->common->accessrecord('learner',[],['id'=>$row->learner_id],'row');

                                            if((!empty($learner->surname)) &&(!empty($learner->first_name))){

                                            $learner_name = $learner->first_name;

                                            }else{

                                                $learner_name = "";  

                                            }

                                            $trainer= $this->common->accessrecord('trainer',[],['id'=>$row->provider_id],'row');

                                            if(!empty($trainer)){

                                              $trainer_nm =$trainer->company_name;

                                            }else{

                                             $trainer_nm = "";

                                            }

                                            ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $learner_name; ?></td>

                                            <td><?= $trainer_nm; ?></td>

                                            <td><?=  $row->date; ?></td>

                                            <td><?= $row->amount; ?></td>

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