<div class="container-fluid px-xl-5">

    <section class="py-5">

        <div class="row">

            <!-- Form Elements -->

            <div class="col-lg-12 mb-1">

                <div class="card">

                    <div class="card-header">

                        <h3 class="h6 text-uppercase mb-0">Mark Sheet List</h3>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTable no-footer nowrap" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>S. No.</th>

                                        <th>Training Provider</th>

                                        <th>Learnership Type</th>

                                        <th>Learnership Sub Type</th>

                                        <th>ClassName</th>

                                        <th>Facilitator</th>

                                        <th>Year</th>

                                        <th>Mark Sheet</th>



                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $i = 0;

                                    if (!empty($record)) {

                                        foreach ($record as $key => $value) {
                                            $learnership = $this->common->accessrecord(' learnership', [], ['id' => $value->learnship_id], 'row');

                                            if (!empty($learnership)) {

                                                $type = $learnership->name;
                                            } else {

                                                $type = "";
                                            }
                                            $learnership_sub_type = $this->common->accessrecord(' learnership_sub_type', [], ['id' => $value->learnership_sub_type], 'row');

                                            if (!empty($learnership_sub_type)) {

                                                $sub_type = $learnership_sub_type->sub_type;
                                            } else {

                                                $sub_type = "";
                                            }

                                            $class_name = $this->common->accessrecord('class_name', [], ['id' => $value->learner_classname], 'row');

                                            if (!empty($class_name)) {

                                                $classname = $class_name->class_name;
                                            } else {

                                                $classname = "";
                                            }

                                            $facilitator = $this->common->accessrecord('facilitator', [], ['id' => $value->facilirator], 'row');

                                            if (!empty($facilitator)) {

                                                $facilitatorname = $facilitator->fullname;
                                            } else {

                                                $facilitatorname = "";
                                            }

                                            $i++;

                                    ?>

                                            <tr id="del-<?= $value->id ?>" class="filters">

                                                <td><?= $i ?></td>

                                                <td><?= $value->training_provider ?></td>

                                                <td><?= $type ?></td>

                                                <td><?= $sub_type ?></td>

                                                <td><?= $classname ?></td>

                                                <td><?= $facilitatorname ?></td>

                                                <td><?= $value->year ?></td>

                                                <td><?php if (!empty($value->attachment)) { ?>

                                                        <a href="<?= BASEURL . 'uploads/learner/import_learnermarks/' . $value->attachment ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

                                                    <?php } ?>

                                                </td>

                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="<?= $value->id ?>" data-name="<?= $value->id ?>" onclick="view(<?= $value->id; ?>)" class="btn btn-primary btn-sm preview_product"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body " id="personDetails">

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

        </div>

    </section>

</div>

<script>
    function deleterecord(tablename, columnname, id) {

        swal({

                title: "Are you sure?",

                text: "Delete",

                type: "warning",

                showCancelButton: true,

                confirmButtonClass: "btn-danger",

                confirmButtonText: "Yes, delete it!",

                cancelButtonText: "No, cancel plx!",

                closeOnConfirm: false,

                closeOnCancel: false

            },

            function(isConfirm) {

                if (isConfirm) {

                    $.ajax({

                        type: "GET",

                        url: "Traningprovider/deletedata?table=" + tablename + "&behalf=" + columnname + "&data=" + id,

                        success: function(data) {

                            swal("Deleted!", "Record Delete Successfully.", "success");

                            $("#del-" + id).remove();

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
            var training_provider = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var sub_type = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var classname = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var facilitatorname = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var year = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();




            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-6> Training Provider :  " + training_provider +
                "</div><div class=col-sm-6>Learnership Type : " + type +
                "</div><div class=col-sm-6>Learnership Sub Type : " + sub_type +
                "</div><div class=col-sm-6>ClassName : " + classname +
                "</div><div class=col-sm-6>Facilitator : " + facilitatorname +
                "</div><div class=col-sm-6>Year : " + year +


                "</div></div>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>