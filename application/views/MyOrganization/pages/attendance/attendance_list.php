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

                                        <th>Week Ending Date</th>

                                        <th>Attendance Sheet</th>



                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $i = 0;

                                    if (!empty($record)) {

                                        foreach ($record as $key => $value) {
                                            $learnership = $this->common->accessrecord(' learnership', [], ['id' => $value->learnership_id], 'row');

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

                                            $class_name = $this->common->accessrecord('class_name', [], ['id' => $value->classname], 'row');

                                            if (!empty($class_name)) {

                                                $classname = $class_name->class_name;
                                            } else {

                                                $classname = "";
                                            }


                                            $trainer = $this->common->accessrecord('trainer', [], ['id' => $value->training_provider], 'row');

                                            if (!empty($trainer)) {

                                                $trainername = $trainer->full_name;
                                            } else {

                                                $trainername = "";
                                            }

                                            $facilitator = $this->common->accessrecord('facilitator', [], ['id' => $value->facilitator], 'row');

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

                                                <td><?= $value->facilitator ?></td>

                                                <td><?= $value->year ?></td>

                                                <td><?= $value->week_date ?></td>

                                                <td><?php if (!empty($value->attachment_one)) { ?>

                                                        <a href="<?= BASEURL . 'uploads/attendance/attachment_one/' . $value->attachment_one ?>" download class="btn btn-sm btn-info">Download <i class="fa fa-download" aria-hidden="true"></i></a>

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
            var trainername = $(event.relatedTarget).closest("tr").find("td:eq(1)").text();
            var type = $(event.relatedTarget).closest("tr").find("td:eq(2)").text();
            var sub_type = $(event.relatedTarget).closest("tr").find("td:eq(3)").text();
            var classname = $(event.relatedTarget).closest("tr").find("td:eq(4)").text();
            var facilitatorname = $(event.relatedTarget).closest("tr").find("td:eq(5)").text();
            var year = $(event.relatedTarget).closest("tr").find("td:eq(6)").text();
            var week_date = $(event.relatedTarget).closest("tr").find("td:eq(7)").text();



            //displays values to modal
            $(this).find("#personDetails").html($("<div class=row><div class=col-sm-6> Training Provider :  " + trainername +
                "</div><div class=col-sm-6>Learnership Type : " + type +
                "</div><div class=col-sm-6>Learnership Sub Type : " + sub_type +
                "</div><div class=col-sm-6>ClassName : " + classname +
                "</div><div class=col-sm-6>Facilitator : " + facilitatorname +
                "</div><div class=col-sm-6>Year : " + year +
                "</div><div class=col-sm-6>Week Ending Date : " + week_date +

                "</div></div>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    }
</script>