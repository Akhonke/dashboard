<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Project Manager View</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered " style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Programme Director</th>
                                    <th>Full Name</th>
                                    <th>Surname</th>
                                    <th>Project Manager</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!empty($record)) {
                                        $i = 1;
                                            foreach ($record as  $value) {
                                                $programme =$this->common->accessrecord('programme_director', [], ['id'=>$value->programme_director], 'row');
                                                if(!empty($programme)){
                                                    $project_director =$programme->project_director;
                                                }else{
                                                   $project_director ="";
                                                }
                                        ?>
                                        <tr id="del-<?= $value->id ?>">
                                            <td><?= $i; ?></td>
                                            <td><?= $project_director; ?></td>
                                            <td><?= $value->fullname; ?></td>
                                            <td><?= $value->surname; ?></td>
                                            <td><?= $value->project_manager; ?></td>
                                        </tr>
                                            
                                <?php $i++; } }  ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>