<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Attendance List</h3>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped table-responsive" style="width:100%">

                            <thead>

                                <tr>

                                    <th>S.No.</th>

                                    <th>Training Provider</th>

                                    <th>Learnership Sub Type</th>

                                    <th>ClassName</th>

                                    <th>Facilitator</th>

                                    <th>Year</th>

                                    <th>Week Ending Date</th>

                                    <th>Attendance Sheet</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                if (!empty($record)) {

                                    foreach ($record as $key => $value) {

                                        $learnership_sub_type = $this->common->accessrecord(' learnership_sub_type', [], ['id' => $value->learnership_sub_type], 'row');

                                        if (!empty($learnership_sub_type)) {

                                            $sub_type = $learnership_sub_type->sub_type;
                                        } else {

                                            $sub_type = "";
                                        }

                                        $class_name = $this->common->accessrecord('class_name', [], ['id' => $value->classname], 'row');

                                        if (!empty($class_name)) {

                                            $classname = $class_name->class_name;
                                        } else {

                                            $classname = "";
                                        }

                                        $facilitator = $this->common->accessrecord('facilitator', [], ['id' => $value->facilitator], 'row');
                                        if (!empty($class_name)) {

                                            $facilitator = $facilitator->fullname;
                                        } else {

                                            $facilitator = "";
                                        }
                                        $i++;

                                ?>

                                        <tr id="del-<?= $value->id ?>" class="filters">

                                            <td><?= $i ?></td>

                                            <td><?= $value->training_provider ?></td>

                                            <td><?= $sub_type ?></td>

                                            <td><?= $classname ?></td>

                                            <td><?= $facilitator ?></td>

                                            <td><?= $value->year ?></td>

                                            <td><?= $value->week_date ?></td>

                                            <td><?php if (!empty($value->attachment_one)) { ?>

                                                    <a href="<?= BASEURL . 'uploads/attendance/attachment_one/' . $value->attachment_one ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                                                <?php } ?>

                                            </td>

                                            <td><a href="assessor-create-attendance?id=<?= $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deleterecord('attendance&behalf','id',<?= $value->id ?>)"><i class="fa fa-trash"></i></a>

                                            </td>

                                        </tr>

                                <?php

                                    }
                                }

                                ?>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>