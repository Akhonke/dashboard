

<div class="container-fluid px-xl-5">



    <section class="py-5">



        <div class="row">



            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">



                <div class="card">



                    <div class="card-header">



                        <h3 class="h6 text-uppercase mb-0">Unit List</h3>



                    </div>



                    <div class="card-body">

                    <div class="table-responsive">



                        <table class="table table-bordered table-striped" style="width:100%">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Title</th>

                                    <th>Unit</th>

                                    <th>Credit</th>

                                    <th>Standard Id</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                if (!empty($units)) { $i = 0;

                                    foreach ($units as $key => $unit) {  $i++; ?>

                                        <tr id="del-<?= $unit->id ?>">

                                            <td><?= $i ?></td>

                                            <td><?= $unit->title ?></td>

                                            <td><?= $unit->unit_standard_type ?></td> 

                                            <td><?= $unit->total_credits ?></td>

                                            <td><?= $unit->standard_id ?></td>

                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>                                    
                                                <a href="All-create-unit?uid=<?= $unit->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deletedataUnit('units&behalf','id','<?= $unit->id?>')"><i

                                                        class="fa fa-trash"></i></a>

                                            </td>

                                        </tr>

                                <?php } } ?>

                        </table>



                    </div>

                    </div>



                </div>



            </div>

            <div class="col-lg-3 mb-1"></div>

        </div>



    </section>



</div>