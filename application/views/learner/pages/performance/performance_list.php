<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Project List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Director</th>
                                    <th>Programme Name</th>
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
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Physical Address</th>                                  
                                    <th>Landline Number</th>
                                    <th>Mobile Number</th>
                                    <th>Tax Clearance</th>
                                    <th>Company Documents</th>
                                    <th>Assesor Acreditations</th>
                                    <th>Seta Creditiations</th>
                                    <th>Moderator Accreditations</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (!empty($record)) {
                                        $i = 1;
                                        foreach ($record as $key => $row) { ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row->project_director; ?></td>
                                            <td><?= $row->programme_name; ?></td>
                                            <td><?= $row->project_manager; ?></td>
                                            <td><?= $row->project_name; ?></td>
                                            <td><?= $row->project_start_date; ?></td>
                                            <td><?= $row->project_end_date; ?></td>
                                            <td><?= $row->q1_start_date; ?></td>
                                            <td><?= $row->q1_end_date; ?></td>
                                            <td><?= $row->q2_start_date; ?></td>
                                            <td><?= $row->q2_end_date; ?></td>
                                            <td><?= $row->q3_start_date; ?></td>
                                            <td><?= $row->q3_end_date; ?></td>
                                            <td><?= $row->q4_start_date; ?></td>
                                            <td><?= $row->q4_end_date; ?></td>
                                            <td><?= "+27-".$row->contact_person; ?></td>
                                            <td><?= $row->email_address; ?></td>
                                            <td><?= $row->physical_address; ?></td>
                                            <td><?= "+27-".$row->landline_number; ?></td>
                                            <td><?= "+27-".$row->mobile_number; ?></td>
                                           
                                        </tr>
                                            
                                <?php $i++; } } ?>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>