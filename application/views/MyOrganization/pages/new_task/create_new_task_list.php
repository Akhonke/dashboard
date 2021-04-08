<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">New Task List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-striped table-bordered " style="width:100%">

                            <thead>

                                <tr>

                                     <th>#</th>

                                    <th>Task Name</th>

                                    <th>Task Description</th>

                                    <th>Task Owner</th>

                                    <th>Planned Start Date</th>

                                    <th>Actual Start Date</th>

                                    <th>Planned End Date</th>

                                    <th>Actual End Date</th>

                                    <th>Task Status</th>

                                    <th>Task Status Colors</th>
                                   <th>Action</th>
                                   

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {

                                            $programme =$this->common->accessrecord('programme_director', [], ['id'=>$row->programme_director], 'row');

                                             if(!empty($programme)){

                                                        $project_director =$programme->project_director;

                                                }else{

                                                   $project_director ="";

                                                }

                                         ?>

                                        <tr id="del-<?= $row->id ?>">

                                            <td><?= $i; ?></td>

                                            <td><?= $project_director; ?></td>

                                            <td><?= $row->fullname; ?></td>

                                            <td><?= $row->surname; ?></td>

                                            <td><?= $row->project_manager; ?></td>

                                            <td><?= $row->project_name; ?></td>

                                            <td><?= $row->project_start_date; ?></td>

                                            <td><?= $row->project_end_date; ?></td>

                                            <td><?= $row->q1_start_date; ?></td>

                                            <td><?= $row->q1_end_date; ?></td>

                                         



                                            <td>  <?php 

                                            if(!empty($row->tax_clearance)){ ?>

                                                <img src="<?= BASEURL .'uploads/project/tax_clearance/'.$row->tax_clearance ?>" width="50px">

                                            <?php } ?>

                                            </td>



                                            <td><?php if(!empty($row->company_registration_documents)){

                                                $company_registration_documents = explode(',',$row->company_registration_documents);

                                                  foreach($company_registration_documents as $value){ 

                                                if(!empty($value)){

                                             ?>

                                              <img src="<?= BASEURL .'uploads/project/company_documents/'.$value ?>" width="50px">

                                          <?php } } } ?>

                                         </td>

                                           <td> <?php if(!empty($row->assesor_acreditations)){ ?>

                                            <img src="<?= BASEURL .'uploads/project/assesor_acreditations/'.$row->assesor_acreditations ?>" width="50px">

                                        <?php } ?>

                                        </td>

                                             <td>  

                                                <?php if(!empty($row->moderator_accreditations)){ ?>

                                                    <img src="<?= BASEURL .'uploads/project/moderator_accreditations/'.$row->moderator_accreditations ?>" width="50px">

                                                <?php } ?>

                                                </td>

                                               <td>  

                                                <?php if(!empty($row->seta_creditiations)){ ?>

                                                <img src="<?= BASEURL .'uploads/project/seta_creditiations/'.$row->seta_creditiations ?>" width="50px">

                                                 <?php } ?>

                                            </td>

                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>      
                                                <a href="create_project?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i

                                                        class="fa fa-edit"></i></a>

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deletedataprojectmanager('project_manager&behalf','id',<?= $row->id?>)"><i

                                                        class="fa fa-trash"></i></a>

                                                <?php $tablenm_id ='project_manager'.'.'.$row->id; 

                                                ?>

                                                <i data="<?php echo $tablenm_id;?>" class="status_checks btn

                                                <?php echo ($row->status)? 'btn-success': 'btn-warning'?>"><?php echo ($row->status)? 'Active' : 'Inactive'?></i>

                                            </td>

                                        </tr>

                                            

                                <?php $i++; } } ?>







                        </table>

                    </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>