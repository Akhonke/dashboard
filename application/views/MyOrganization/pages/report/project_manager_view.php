<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Project Managers View</h3>

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

                                    <th>Project Name</th>

                                    <th>Programme Start Date</th>

                                    <th>Programme End Date</th>

                                    <th>Quarter 1 Start Date</th>

                                    <th>Quarter 1 End Date</th>

                                    <th>Quarter 2 Start Date</th>

                                    <th>Quarter 2 End Date</th>

                                    <th>Quarter 3 Start Date</th>

                                    <th>Quarter 3 End Date</th>

                                    <th>Quarter 4 Start Date</th>

                                    <th>Quarter 4 End Date</th>

                                    <th>Email</th>

                                    <th>Landline Number</th>

                                    <th>Mobile Number</th>

                                    <th>Province</th>

                                    <th>District</th>

                                    <th>Region</th>

                                    <th>city</th>

                                    <th>Suburb</th>

                                    <th>Street name</th>

                                    <th>Street Number</th>

                                    <th>Tax Clearance</th>

                                    <th>Company Documents</th>

                                    <th>Assesor Acreditations</th>

                                    <th>Seta Creditiations</th>

                                    <th>Moderator Accreditations</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as  $row) {

                                            foreach ($row as  $value) {

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

                                            <td><?= $value->project_name; ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->project_start_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->project_end_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q1_start_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q1_end_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q2_start_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q2_end_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q3_start_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q3_end_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q4_start_date)); ?></td>

                                            <td><?=  date('d-M-Y',strtotime($value->q4_end_date)); ?></td>

                                            <td><?= $value->email_address; ?></td>

                                            <td><?= "+27-".$value->landline_number; ?></td>

                                            <td><?= "+27-".$value->mobile_number; ?></td>

                                            <td><?= $value->province ?></td>

                                            <td><?= $value->district ?></td>

                                            <td><?= $value->region ?></td>

                                            <td><?= $value->city ?></td>

                                            <td><?= $value->Suburb ?></td>

                                            <td><?= $value->Street_name ?></td>

                                            <td><?= $value->Street_name ?></td>



                                            <td>  <?php 

                                            if(!empty($value->tax_clearance)){ ?>

                                                <img src="<?= BASEURL .'uploads/project/tax_clearance/'.$value->tax_clearance ?>" width="50px">

                                            <?php } ?>

                                            </td>



                                            <td><?php if(!empty($value->company_registration_documents)){

                                                $company_registration_documents = explode(',',$value->company_registration_documents);

                                                  foreach($company_registration_documents as $value_one){ 

                                                if(!empty($value_one)){

                                             ?>

                                              <img src="<?= BASEURL .'uploads/project/company_documents/'.$value_one ?>" width="50px">

                                          <?php } } } ?>

                                         </td>

                                           <td> <?php if(!empty($value->assesor_acreditations)){ ?>

                                            <img src="<?= BASEURL .'uploads/project/assesor_acreditations/'.$value->assesor_acreditations ?>" width="50px">

                                        <?php } ?>

                                        </td>

                                             <td>  

                                                <?php if(!empty($value->moderator_accreditations)){ ?>

                                                    <img src="<?= BASEURL .'uploads/project/moderator_accreditations/'.$value->moderator_accreditations ?>" width="50px">

                                                <?php } ?>

                                                </td>

                                               <td>  

                                                <?php if(!empty($value->seta_creditiations)){ ?>

                                                <img src="<?= BASEURL .'uploads/project/seta_creditiations/'.$value->seta_creditiations ?>" width="50px">

                                                 <?php } ?>

                                            </td>

                                        </tr>

                                            

                                <?php $i++; } } } ?>

                            </tbody>

                        </table>

                    </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>