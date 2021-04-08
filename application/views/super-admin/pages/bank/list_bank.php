<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="<?= base_url('superAdmin-dashboard') ?>"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banks List</li>
        </ol>
    </nav>
    <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
            <h6>Banks List</h6>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S. No.</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($banklist)) {
                            $i = 1;
                            foreach ($banklist as $bank) {


                        ?>
                                <tr>

                                    <td><?php echo $i ?></td>
                                    <td><?php echo $bank->bank_name; ?></td>
                                    <td>

                                        <?php if ($bank->status == 1) { ?>

                                            <button class="btn btn-success status" onclick="inactive_bank('<?php echo $bank->id; ?>')" value="<?php echo $bank->status ?>.<?php echo $bank->id ?>" title="Make Bank as INACTIVE">Active</button>

                                        <?php } else { ?>

                                            <button class="btn btn-danger status" onclick="active_bank('<?php echo $bank->id; ?>')" id="" title="Make Bank as ACTIVE">Inactive</button>

                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php $i++;
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function inactive_bank(id) {
        $.ajax({
            type: 'POST',
            url: 'SuperAdmin/inactive_bank',
            data: {
                id: id
            },
            datatype: 'json',
            success: function(resultData) {
                if (resultData) {
                    Swal.fire(
                        'Success!',
                        'User In-Activated Successfully!',
                        'success'
                    );
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: 'please try again'
                    })
                }
            }
        });
    }

    function active_bank(id) {
        $.ajax({
            type: 'POST',
            url: 'SuperAdmin/active_bank',
            data: {
                id: id
            },
            datatype: 'json',
            success: function(resultData) {
                if (resultData) {
                    Swal.fire(
                        'Success!',
                        'User Activated Successfully!',
                        'success'
                    );
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: 'please try again'
                    })
                }
            }
        });
    }
</script>