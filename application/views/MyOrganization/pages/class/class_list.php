<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Class Name List</h3>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                        <table class="table table-striped table-bordered  " style="width:100%">

                            <thead>

                                <tr >

                                    <th>#</th>

                                    <th>Training Provider</th>

                                    <th>Learnership Sub Type</th>

                                    <th>Class Name</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                    if (!empty($record)) {

                                        $i = 1;

                                        foreach ($record as $key => $row) { 

                                            $learner =$this->common->accessrecord('learnership_sub_type', ['sub_type'], ['id'=>$row->learnership_sub_type_id], 'row');

                                            if(!empty($learner)){

                                              $learner_nm =$learner->sub_type;

                                            }else{

                                               $learner_nm = "";

                                            }

                                            $trainer =$this->common->accessrecord('trainer', ['full_name','company_name'], ['id'=>$row->trainer_id], 'row');

                                            if(!empty($trainer)){

                                              $company_name =$trainer->company_name;

                                            }else{

                                               $company_name = "";

                                            }

                                            ?>

                                        <tr id="del-<?= $row->id ?>">

                                            <td><?= $i; ?></td>

                                            <td><?= $company_name ?></td>

                                            <td><?= $learner_nm ?></td>

                                            <td><?= $row->class_name; ?></td>

                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="create-class?id=<?= $row->id ?>" class="btn btn-info btn-sm"><i

                                                        class="fa fa-edit"></i></a>

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecordClass('class_name&behalf','id','<?= $row->id?>','<?= $row->class_name;?>')"><i class="fa fa-trash"></i></a>

                                            </td>

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