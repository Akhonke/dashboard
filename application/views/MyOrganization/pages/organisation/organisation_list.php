<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">OrganisationS List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-striped table-bordered  " style="width:100%">

                            <thead>

                                <tr >

                                    <th>#</th>

                                    <th>Organisation Name</th>

                                    <th>Full Name</th>

                                    <th>Surname</th>

                                    <th>Email</th>

                                    <th>Mobile Number</th>

                                    <th>Landline Number</th>

                                    <th>Province</th>

                                    <th>District</th>

                                    <th>Region</th>

                                    <th>City</th>

                                    <th>Suburb</th>

                                    <th>Street name</th>

                                    <th>Street Number</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($organisation)) {

                                        $i = 1;

                                        foreach ($organisation as $key => $row) { ?>

                                        <tr id="del-<?= $row->id ?>">

                                            <td><?= $i; ?></td>

                                            <td><?= $row->organisation_name; ?></td>

                                            <td><?= $row->fullname; ?></td>

                                            <td><?= $row->surname; ?></td>

                                            <td><?= $row->email_address; ?></td>

                                            <td><?= '+27-'.$row->mobile_number; ?></td>

                                            <td><?= '+27-'.$row->landline_number; ?></td>

                                            <td><?= $row->province ?></td>

                                            <td><?= $row->district ?></td>

                                            <td><?= $row->region ?></td>

                                            <td><?= $row->city ?></td>

                                            <td><?= $row->Suburb ?></td>

                                            <td><?= $row->Street_name ?></td>

                                            <td><?= $row->Street_name ?></td>

                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="create_organisation?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i

                                                        class="fa fa-edit"></i></a>

                                               <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecordCommon('organisation&behalf','id','<?= $row->id?>')"><i

                                                        class="fa fa-trash"></i></a>

                                                 

                                                <?php $tablenm_id ='organisation'.'.'.$row->id; 

                                                ?>

                                                <i data="<?php echo $tablenm_id;?>" class="status_checks btn

                                                <?php echo ($row->status)? 'btn-success': 'btn-warning'?>"><?php echo ($row->status)? 'Active' : 'Inactive'?></i>

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