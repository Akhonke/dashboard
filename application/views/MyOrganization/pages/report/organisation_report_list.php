<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Organisation Report List</h3>

                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-responsive" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Organisation Name</th>

                                    <!-- <th>Total Organisation</th> -->

                                    <th>Total Programme Directors</th>

                                    <th>Total Project Managers </th>

                                    <th>Total Training Providers</th>

                                    <th>Total Assessors</th>

                                    <th>Total Moderators</th>

                                    <th>Total Facilitators</th>

                                    <th>Total Learners</th>

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

                                            <td><?= $row->organisation_name?></td>

                                           

                                            

                                            <td>

                                                <?php if(!empty($row->id)){

                                                    if(!empty($row->total_programme_director)){

                                                 ?>

                                                <a href="<?=BASEURL.'progammer-director-view?id='.$row->id ?>"><?= $row->total_programme_director?></a>

                                                <?php }else{

                                                   echo "0";

                                                } } ?>

                                            </td>

                                            

                                            <td>

                                                <?php if(!empty($row->id)){

                                                 if(!empty($row->total_project_manager)){ ?>

                                                <a href="<?=BASEURL.'project-manager-view?id='.$row->id ?>"><?= $row->total_project_manager?></a>

                                                <?php }else{ 

                                                    echo "0";



                                                } } ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                        if(!empty($row->total_trainer)){ ?>

                                                   <a href="<?=BASEURL.'training-provider-view?id='.$row->id ?>"><?= $row->total_trainer?></a>

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

                                                <a href="<?=BASEURL.'assessor-view?id='.$row->id ?>"><?= $row->total_assessor?></a>

                                                <?php }else{ echo "0";

                                                 } 

                                                }

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                   if(!empty($row->total_moderator)){  ?>

                                                <a href="<?=BASEURL.'monderator-view?id='.$row->id ?>"><?= $row->total_moderator?></a>

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

                                                    <a href="<?=BASEURL.'facilitator-view?id='.$row->id ?>"><?= $row->total_facilitator?></a>

                                                <?php }else{

                                                        echo "0";

                                                      } 

                                                } 

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                  if(!empty($row->total_learner)){ ?>

                                                <a href="<?=BASEURL.'learner-view?id='.$row->id?>"><?= $row->total_learner?></a>

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

    </section>

</div>