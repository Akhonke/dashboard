<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Project Manager Report List</h3>

                    </div>

                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Project Manager</th>

                                    <!-- <th>Total Project Manager </th> -->

                                    <th>Training Providers</th>

                                    <th>Assessors</th>

                                    <th>Moderators</th>

                                    <th>Facilitators</th>

                                    <th>Learners</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {

                                    ?>

                                        <tr>

                                            <td><?= $i; ?></td>

                                            <td><?= $row->project_manager?></td>

                                           

                                            <td>

                                                <?php if(!empty($row->id)){

                                                        if(!empty($row->total_trainer)){ ?>

                                                   <a href="<?=BASEURL.'projectmanager-training-view?id='.$row->id ?>"><?= $row->total_trainer?></a>

                                                <?php }else{ 

                                                     echo "0";

                                                    } 

                                                } 

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                     if(!empty($row->total_assessor)){ 

                                                 ?>

                                                <a href="<?=BASEURL.'projectmanager-assessor-view?id='.$row->id ?>"><?= $row->total_assessor?></a>

                                                <?php }else{ echo "0";

                                                 } 

                                                }

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                   if(!empty($row->total_moderator)){  ?>

                                                <a href="<?=BASEURL.'projectmanager-monderator-view?id='.$row->id ?>"><?= $row->total_moderator?></a>

                                                <?php }else{ 

                                                      echo "0";

                                                    }

                                                } 

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                    if(!empty($row->total_facilitator)){

                                                ?>

                                                    <a href="<?=BASEURL.'projectmanager-facilitator-view?id='.$row->id ?>"><?= $row->total_facilitator?></a>

                                                <?php }else{

                                                        echo "0";

                                                      } 

                                                } 

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                  if(!empty($row->total_learner)){ ?>

                                                <a href="<?=BASEURL.'projectmanager-learner-view?id='.$row->id?>"><?= $row->total_learner?></a>

                                                <?php }else{ 

                                                      echo "0";

                                                    }

                                                } 

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

        </div>

    </section>

</div>