<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Training Provider Report List</h3>

                    </div>

                    <div class="card-body">
<div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Training Provider</th>

                                    <!-- <th>Total Training Provider</th> -->

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

                                            <td><?= $row->company_name?></td>

                                            

                                            <td>

                                                <?php if(!empty($row->id)){

                                                     if(!empty($row->total_assessor)){ 

                                                 ?>

                                                <a href="<?=BASEURL.'provider-assessor-view?id='.$row->id ?>"><?= $row->total_assessor?></a>

                                                <?php }else{ echo "0";

                                                 } 

                                                }

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                   if(!empty($row->total_moderator)){  ?>

                                                <a href="<?=BASEURL.'provider-monderator-view?id='.$row->id ?>"><?= $row->total_moderator?></a>

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

                                                    <a href="<?=BASEURL.'provider-facilitator-view?id='.$row->id ?>"><?= $row->total_facilitator?></a>

                                                <?php }else{

                                                        echo "0";

                                                      } 

                                                } 

                                                ?>

                                            </td>

                                            <td>

                                                <?php if(!empty($row->id)){

                                                  if(!empty($row->total_learner)){ ?>

                                                <a href="<?=BASEURL.'provider-learner-view?id='.$row->id?>"><?= $row->total_learner?></a>

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