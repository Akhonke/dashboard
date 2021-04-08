<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Training View</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Surname</th>
                                        <th>Project Manager</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if (!empty($record)) {
                                            $i = 0;
                                                foreach ($record as $value) {
                                                 $project =$this->common->accessrecord('project_manager', [], ['id'=>$value->project_id], 'row');
                                                if(!empty($project)){
                                                    $project_manager =$project->project_manager;
                                                }else{
                                                  $project_manager = "";
                                                }
                                            $i++;
                                    ?>
                                        <tr id="del-<?= $value->id ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $value->full_name ?></td>
                                            <td><?= $value->surname ?></td>
                                            <td><?= $project_manager ?></td>
                                        </tr>
                                    <?php
                                        } } 
                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</div>