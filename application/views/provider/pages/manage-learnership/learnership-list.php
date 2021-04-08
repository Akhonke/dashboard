<?php
if (isset($_SESSION['admin']['logintype'])) {
    $res = $this->common->accessrecord('user_permission', ['is_view,is_add,is_edit,is_delete'], ['user_type' => 'Provider', 'user_id' => $_SESSION['admin']['id'], 'module_name' => 'UnitTypes'], 'row_array');
} else {
    $res = array();
    if (empty($res)) {
        $logintype = 'main-user';
        $res['is_edit'] = 1;
        $res['is_delete'] = 1;
    }
}
?>
<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0"> LEARNERSHIP TYPE LIST</h3>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped nowrap" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S. No.</th>

                                        <th>Name</th>

                                        <th>SAQA Registration ID</th>

                                        <th>Total Credits</th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if (!empty($learnership)) {
                                        $i = 0;

                                        foreach ($learnership as $key => $learn) {
                                            $i++; ?>

                                            <tr id="del-<?= $learn->id ?>">

                                                <td><?= $i ?></td>

                                                <td><?= $learn->name ?></td>

                                                <td><?= $learn->saqa_registration_id ?></td>

                                                <td><?= $learn->total_credits ?></td>

                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $learn->id ?>" data-name="<?= $learn->id ?>" onclick="view(<?= $learn->id; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <!-- <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div> -->
                                                                <div class="modal-body " id="personDetails">

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($res['is_edit'] == 1) { ?>

                                                        <a href="create-learnership?learnid=<?= $learn->id ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <?php }
                                                    if ($res['is_delete'] == 1) { ?>

                                                        <a href="javascript:;" class="btn btn-danger btn-sm" style="margin:5px 0 0" onclick="providerdeletedataLearnerName('learnership&behalf','id',<?= $learn->id ?>)"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>

                                                </td>

                                            </tr>

                                    <?php }
                                    } ?>

                            </table>



                        </div>
                    </div>



                </div>



            </div>

            <div class="col-lg-2 mb-1"></div>

        </div>



    </section>



</div>


<script>
    function view() {

        debugger;

        $("#exampleModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id"); //data-id of button which is equal to id (primary key) of person
            var ss = $(this).attr("photoss");
            var base_url = "your base url";
            var trining_provider = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var first_name = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var total_credits = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();



            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-12><span class='pull-left'>Name: </span><span class='pull-right'>" + trining_provider +
                "</div><div class=col-sm-12><span class='pull-left'>SAQA Registration ID: </span><span class='pull-right'> " + first_name +
                "</div><div class=col-sm-12><span class='pull-left'>Total Credits  : </span><span class='pull-right'> " + total_credits +


                "</span></div></div></span>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>

<script>
    function providerdeletedataLearnerName(tablename, columnname, id) {

        swal({

                title: "Are you sure?",

                text: "Delete",

                type: "warning",

                showCancelButton: true,

                confirmButtonClass: "btn-danger",

                confirmButtonText: "Yes, delete it!",

                cancelButtonText: "No, cancel it!",

                closeOnConfirm: false,

                closeOnCancel: false

            },

            function(isConfirm) {

                if (isConfirm) {

                    $.ajax({

                        type: "GET",

                        url: "providerdeletedataLearnerName?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                        dataType: "json",

                        success: function(data) {

                            if (data.status == "true") {

                                swal("Deleted!", "Record Delete Successfully.", "success");

                                $("#del-" + id).remove();

                            }

                            if (data.error == "error") {

                                swal("Error deleting!", "You Can Not Delete Because This Record Have Some Relative Data", "error");

                            }

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                            swal("Error deleting!", "Please try again", "error");

                        }

                    });

                } else {

                    swal("Cancelled", "Your imaginary file is safe :)", "error");

                }

            });

    }
</script>