<div class="container-fluid px-xl-5">

<section class="py-5">

<div class="row">

<!-- Form Elements -->

<div class="col-lg-12 mb-1">

<div class="card">

    <div class="card-header">

        <h3 class="h6 text-uppercase mb-0">Marksheets List</h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped" style="width:100%">

            <thead> 

                

                    <th>#</th>

                    <th>Training Provider</th>

                    <th>Learnership Sub Type</th>

                    <th>ClassName</th>

                    <th>Facilitator</th>

                    <th>Year</th>

                    <th>Mark Sheet</th>
                    

            

            </thead>

            <tbody>

                <?php

                    $i = 0; 

                   if(!empty($marksheet)){

                    foreach ($marksheet as $key => $value) {

                         $learnership_sub_type =$this->common->accessrecord(' learnership_sub_type', [], ['id'=>$value->learnership_sub_type], 'row');

                                if(!empty($learnership_sub_type)){

                                        $sub_type =$learnership_sub_type->sub_type;

                                }else{

                                   $sub_type ="";

                                }

                            $class_name =$this->common->accessrecord('class_name', [], ['id'=> $value->learner_classname], 'row');

                                if(!empty($class_name)){

                                        $classname =$class_name->class_name;

                                }else{

                                   $classname ="";

                                }

                      $i++;

                ?>

                <tr id="del-<?= $value->id ?>" class="filters">

                    <td><?= $i ?></td>

                    <td><?= $value->training_provider ?></td>

                    <td><?= $sub_type ?></td>

                    <td><?= $classname ?></td>

                    <td><?= $value->facilirator ?></td>

                    <td><?= $value->year ?></td>

                    <td><?php if(!empty($value->attachment)){ ?>

                        <a href="<?= BASEURL .'uploads/learner/import_learnermarks/'.$value->attachment ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                        <?php } ?>

                    </td>

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

</section>

</div>
