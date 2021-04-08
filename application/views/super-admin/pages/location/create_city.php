<div class="container-fluid px-xl-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="<?= base_url('superAdmin-dashboard') ?>"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">City</li>
        </ol>
    </nav>
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="h6 text-uppercase mb-0">Create New City</h3>
                            </div>
                            <div class="col-4">
                                <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="CreateCityForm">
                            <!-- <div class="line"></div> -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="form-control-label">Province<span style="color:red;font-weight:bold;"> *</span></label>
                                    <!-- <input type="text" placeholder="Enter Province" class="form-control"> -->
                                    <select placeholder="Enter Your Province" class="form-control province" name="province">
                                        <option value="" hidden>Choose Your Province</option>
                                        <?php
                                        foreach ($province as $key => $value) {
                                        ?>
                                            <option value="<?= $value->name ?>" <?php
                                                                                if (isset($record)) {
                                                                                    if ($record->province_id == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                } ?>><?= $value->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label id="province-error" class="error" for="province"></label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-control-label">District<span style="color:red;font-weight:bold;"> *</span></label>
                                    <select class="form-control district_option" name="District">
                                        <option value="" hidden>Choose Your District</option>
                                        <?php
                                        if (!empty($_GET['id'])) {
                                            foreach ($District as $key => $value) {
                                        ?>
                                                <option value="<?= $value->name ?>" <?php
                                                                                    if (isset($record)) {
                                                                                        if ($record->district_id == $value->name) { ?> selected="selected" <?php }
                                                                                                                                                    } ?>><?= $value->name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label id="District-error" class="error" for="District"></label>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-control-label">City<span style="color:red;font-weight:bold;"> *</span></label>
                                    <input type="text" placeholder="Enter Your Region" class="form-control" name="city" value="<?php if (isset($record)) {
                                                                                                                                    echo $record->city;
                                                                                                                                } ?>">
                                    <label id="city-error" class="error" for="city"></label>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <?php
                                        if (!empty($_GET)) {
                                        ?>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        <?php
                                        }
                                        ?>
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
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">City List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Province</th>
                                        <th>District</th>
                                        <!-- <th>Region</th> -->
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($city as $key => $value) {
                                        $i++
                                    ?>
                                        <tr id="del-<?= $value->id ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $value->province_id ?></td>
                                            <td><?= $value->district_id  ?></td>
                                            <!-- <td><?= $value->region_id ?></td> -->
                                            <td><?= $value->city ?></td>
                                            <td>
                                                <!-- <a href="<?= current_url() . "?id=" . $value->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> -->
                                                <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="deletedataCity('city&behalf','id','<?= $value->id ?>')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>