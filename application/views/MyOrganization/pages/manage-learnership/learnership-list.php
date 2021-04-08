<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Learnship List</h3>

                    </div>

                    <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Name</th>

                                    <th>SAQA Registration ID</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($learnership)) { $i = 0;

                                    foreach ($learnership as $key => $learn) {  $i++; ?>

                                <tr id="del-<?= $learn->id ?>">

                                    <td><?= $i ?></td>

                                    <td><?= $learn->name ?></td>

                                    <td><?= $learn->saqa_registration_id ?></td>

                                    <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="All-create-learnership?learnid=<?= $learn->id ?>"

                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                            <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deletedataLearnerName('learnership&behalf','id','<?= $learn->id?>')"><i

                                                        class="fa fa-trash"></i></a>

                                    </td>

                                </tr>

                                <?php } } ?>

                        </table>



                    </div>



                </div>



            </div>

            <div class="col-lg-2 mb-1"></div>

        </div>



    </section>



</div>