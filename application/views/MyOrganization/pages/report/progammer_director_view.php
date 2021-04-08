<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Programme Directors View</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-bordered" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Organisation Name</th>

                                        <th>Project Director</th>

                                        <th>Programme Name</th>

                                        <th>Full Name</th>

                                        <th>Surname</th>

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

                                        <th>Province</th>

                                        <th>District</th>

                                        <th>Region</th>

                                        <th>City</th>

                                        <th>Landline Number</th>

                                        <th>Mobile Number</th>

                                        <th>Suburb</th>

                                        <th>Street Name</th>

                                        <th>Street Number</th>

                                        <th>Tax Clearance</th>

                                        <th>Company Documents</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) {

                                                $organisation =$this->common->accessrecord('organisation', [], ['id'=> $row->organisation_id], 'row');

                                                if(!empty($organisation)){

                                                        $organisation_name =$organisation->organisation_name;

                                                }else{

                                                   $organisation_name ="";

                                                }

                                         ?>

                                    <tr id="del-<?= $row->id ?>">

                                        <td><?= $i; ?></td>

                                        <td><?= $organisation_name;?></td>

                                        <td><?= $row->project_director; ?></td>

                                        <td><?= $row->programme_name; ?></td>

                                        <td><?= $row->fullname; ?></td>

                                        <td><?= $row->surname; ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->programme_start_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->programme_end_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q1_start_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q1_end_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q2_start_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q2_end_date));?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q3_start_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q3_end_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q4_start_date)); ?></td>

                                        <td><?= date('d-M-Y',strtotime($row->q4_end_date)); ?></td>

                                        <td><?= $row->email_address; ?></td>

                                        <td><?= $row->province ?></td>

                                        <td><?= $row->district ?></td>

                                        <td><?= $row->region ?></td>

                                        <td><?= $row->city ?></td>

                                        <td><?= "+27-".$row->contact_number ?></td>

                                        <td><?= "+27-".$row->mobile_number ?></td>

                                        <td><?= $row->Suburb ?></td>

                                        <td><?= $row->Street_name ?></td>

                                        <td><?= $row->Street_name ?></td> 

                                        <td>  

                                            <?php if(!empty($row->tax_clearance)){ ?>

                                            <img src="<?= BASEURL .'uploads/programmer/tax_clearance/'.$row->tax_clearance ?>"

                                                width="50px" height="50px">

                                            <?php } ?>

                                        </td>

                                        <td><?php if(!empty($row->company_registration_documents)){

                                                $company_registration_documents = explode(',',$row->company_registration_documents);

                                                  foreach($company_registration_documents as $value){ 

                                                if(!empty($value)){

                                             ?>

                                            <img src="<?= BASEURL .'uploads/programmer/company_documents/'.$value ?>"

                                                width="50px" >

                                            <?php } } } ?>

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