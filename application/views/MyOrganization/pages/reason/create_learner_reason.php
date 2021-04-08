<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
         <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
               <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Add NeW Absentee Reason</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="CreateReasonForm"><!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="offset-md-3 col-md-6">
                                    <label class="form-control-label">Reason </label><input type="text" placeholder="Enter Your Reason" value="<?= isset($record) ? $record->reason : '' ?>" class="form-control" name="reason" id="reason">
                                    <label id="reason-error" class="error" for="reason"></label>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                       <button type="submit" class="btn btn-primary"><?= isset($record) ? "Update" : "Add" ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="row"><!-- Form Elements -->
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Absentee Reason List</h3>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reason</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($data)){
                                  $i=1;
                                  foreach($data as $row){
                                ?>
                                <tr id="del-<?= $row->id ?>">
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->reason ?></td>
                                    <td><a href="<?= current_url()."?id=".$row->id ?>" class="btn btn-info btn-sm"><i

                                                class="fa fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0"onclick="deleterecord('reason&behalf','id',<?= $row->id?>)"><i
                                                        class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
